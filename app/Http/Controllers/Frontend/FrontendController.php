<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Category;
use App\Models\Contact;
use App\Models\CustomerRespons;
use App\Models\Faq;
use App\Models\FrontendProperty;
use App\Models\Page;
use App\Models\Property;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function index()
    {
        $query = Property::query();
        $data['properties'] = $query->where('status', 'active')->latest()->paginate(8);
        $data['featureProperties'] = $query->where(['status' => 'active', 'is_featured' => 1])->latest()->limit(8)->get();
        $data['hotOfferProperty'] = Property::where(['status' => 'active', 'contract' => 'hot offer'])->latest()->first();
        $data['route'] = '/';
        $data['categories'] = Category::whereNull('parent_id')->latest()->get();
        $data['areas'] = Area::whereNull('parent_id')->latest()->get();
        return view('frontend.index', $data);
    }


    public function getChildAreaByParent(Request $request, $id)
    {
        $area = Area::findOrFail($id);
        if ($area) {
            $area_id = Area::getChildAreaByParentId($id);
            if (count($area_id) <= 0) {
                return response()->json(['status' => false, 'date' => null, 'msg' => '']);
            }
            return response()->json(['status' => true, 'data' => $area_id, 'msg' => '']);
        } else {
            return response()->json(['status' => false, 'data' => null, 'msg' => '']);
        }
    }



    public function propertyDetails($slug)
    {
        $property = Property::where('slug', $slug)->first();
        $ratings = Review::where('property_id',$property->id)->get();
        $ratingValue = [];
        foreach($ratings as $aRating) {
            $ratingValue[] = $aRating->rating;
        }
        $ratingAvarage = null;
        if($ratingValue != null && count($ratings) != 0){
            $ratingAvarage = ceil(collect($ratingValue)->sum() / $ratings->count());
        }
        $featureProperties = Property::where(['status' => 'active', 'is_featured' => 1])->latest()->limit(3)->get();
        $relatedProperties = Property::where('id', '<>', $property->id)
            ->where('area_id', $property->area_id)
            ->orWhere('sub_area_id', $property->sub_area_id)
            ->orWhere('category_id', $property->category_id)
            ->orWhere('sub_category_id', $property->sub_category_id)
            ->orWhere('address', 'RLIKE', $property->address)
            ->orWhere('title', 'RLIKE', $property->title)
            ->latest()
            ->limit(8)
            ->get();
        return view('frontend.pages.property-details', compact('property', 'featureProperties', 'relatedProperties','ratingAvarage'));
    }

    public function customerResponse(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|min:8',
            'email' => 'nullable|email',
            'message' => 'nullable|string'
        ]);
        if (!$data->passes()) {
            return response()->json(['status' => 0, 'errors' => $data->errors()->toArray()]);
        } else {
            CustomerRespons::create($request->all());
            return response()->json(['status' => 1, 'msg' => 'Your response successfully']);
        }
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function properties(Request $request)
    {
        $sort = '';
        if ($request->sort != null) {
            $sort = $request->sort;
        }
        if ($request->sort && !blank($request->sort)) {
            if ($sort == 'newest') {
                $data['properties'] = Property::where('status', 'active')->orderBy('id', 'DESC')->paginate(9);
            } else if ($sort == 'oldest') {
                $data['properties'] = Property::where('status', 'active')->orderBy('id', 'ASC')->paginate(9);
            } else if ($sort == 'popular') {
                $data['properties'] = Property::where('status', 'active')->orderBy('id', 'ASC')->paginate(9);
            } else if ($sort == 'priceAsc') {
                $data['properties'] = Property::where('status', 'active')->orderBy('price', 'ASC')->paginate(9);
            } else if ($sort == 'priceDesc') {
                $data['properties'] = Property::where('status', 'active')->orderBy('price', 'DESC')->paginate(9);
            } else {

                $data['properties'] = Property::where('status', 'active')->latest()->paginate(3);
            }
        } else if ($request->category_id && !blank($request->category_id)) {
            $data['properties'] = Property::where('category_id', $request->category_id)->orderBy('id', 'DESC')->paginate(9);
        } else if ($request->area_id && !blank($request->area_id)) {
            $data['properties'] = Property::where('area_id', $request->area_id)->orderBy('id', 'DESC')->paginate(9);
        } else if ($request->has('price_range')) {
            $data['properties'] = Property::whereBetween('price', $request->price_range)->orderBy('id', 'DESC')->paginate(9);
        } 
        else if($request->status && !blank($request->status)) {
            if($request->status == 'for sale' || $request->status == 'to rent'){
                $data['properties'] = Property::where(['status'=>'active','purpose'=>$request->status])->orderBy('id', 'DESC')->paginate(9);
            }
            else {
                $data['properties'] = Property::where(['status'=>'active','contract'=>$request->status])->latest()->paginate(9);
            }
        }
        else {
            $data['properties'] = Property::where('status', 'active')->latest()->paginate(3);
        }
        $data['route'] = 'properties';
        $data['categories'] = Category::whereNull('parent_id')->latest()->get();
        $data['areas'] = Area::whereNull('parent_id')->latest()->get();
        return view('frontend.pages.properties', $data);
    }

    public function page($slug)
    {
        $page = Page::where('slug',$slug)->first();
        return view('frontend.pages.dynamic_page',compact('page'));
    }

    public function faqs()
    {
        $faqs = Faq::latest()->get();
        return view('frontend.pages.faqs',compact('faqs'));
    }

    public function addProperty()
    {
        $data['categories'] = Category::whereNull('parent_id')->latest()->get();
        $data['areas'] = Area::whereNull('parent_id')->latest()->get();
        return view('frontend.pages.add-property', $data);
    }

    public function addPropertyStore(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'purpose' => 'required',
            'consumer' => 'required',
            'category_id' => 'required',
            'area_id' => 'required',
            'sub_area_id' => 'nullable',
        ]);

        if (!$data->passes()) {
            return response()->json(['status' => 0, 'errors' => $data->errors()->toArray()]);
        }
        else{
            FrontendProperty::create($request->all());
            return response()->json(['status' => 1, 'msg' => 'Your response submited']);
        }
    }

    public function reviewStore(Request $request)
    {
        $data = Validator::make($request->all(),[
            'comment' => 'required|string',
        ]);

        if (!$data->passes()) {
            return response()->json(['status' => 0, 'errors' => $data->errors()->toArray()]);
        }
        else{
            Review::create($request->all()); 
            return response()->json(['status' => 1, 'msg' => 'Your review submited']);
        }

    }

    public function contactStore(Request $request)
    {
        $data = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'nullable|string|email',
            'phone' => 'required|numeric',
            'message' => 'required|string'
        ]);

        if(!$data->passes()) {
            return response()->json(['status'=>0,'errors'=>$data->errors()->toArray()]);
        }
        else {
            Contact::create($request->all());
            return response()->json(['status'=>1,'msg'=>'Your message send success']);
        }
    }
}

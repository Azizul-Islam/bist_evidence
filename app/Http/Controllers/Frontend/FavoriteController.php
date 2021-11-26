<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addToFavorite(Request $request)
    {
        $favorites = Favorite::where(['user_id'=>auth()->guard('agent')->id(),'property_id'=>$request->property_id])->count();
        if($favorites == 0){
            if(auth()->guard('agent')->id() && !blank(auth()->guard('agent')->id())){
                $favorite = new Favorite();
                $favorite->user_id = auth()->guard('agent')->id();
                $favorite->property_id = $request->property_id;
                $favorite->save();
                $html = view('frontend.include.user-menu')->render();
                return response()->json(['status'=>1,'msg'=>'The property has been added to favorites','html'=>$html]);
            }
            else {
                return response()->json(['status'=>0,'msg'=>'Please login first']);
            }
        }
        else {
            return response()->json(['status'=>0,'msg'=>'You have already added this property to your favorite.']);
        }
        
    }

    public function destroy(Request $request,$id)
    {
        $favorite = Favorite::findOrfail($id);
        $favorite->delete();
        if($request->ajax()){
            $favorites = Favorite::where(['user_id'=>auth()->guard('agent')->id()])->latest()->paginate(5);
            $html = view('agent.partials._favorite_data',compact('favorites'))->render();
            $html1 = view('frontend.include.user-menu')->render();
            return response()->json(['status'=>1,'msg'=>'Your favorite list deleted success','html'=>$html,'html1'=>$html1]);
        }
    }
}

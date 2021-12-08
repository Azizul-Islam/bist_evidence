@if(\App\Models\Client::where(['status'=>'active','type'=>'media partner'])->latest()->count() > 0)
<div class="section mt-3">
    <div class="px-3">
        <div class="theme-container">
            <h1 class="section-title mb-3">Our Media Partner</h1>
            {{-- <p class="text-center text-muted fw-500">Sed magna ipsum, ultricies sed sagittis nec, scelerisque eu libero. Donec at metus ac eros accumsan semper.</p> --}}
            <div class="clients-carousel"> 
                <div class="swiper-container"> 
                    <div class="swiper-wrapper"> 
                        @foreach (\App\Models\Client::where(['status'=>'active','type'=>'media partner'])->latest()->get() as $item)
                            
                        <div class="swiper-slide">
                            <a href="{{ $item->link }}">
                            <div class="client-item"> 
                                <img src="{{ asset('frontend/assets/images/others/transparent-bg.png') }}" alt="slide image" data-src="{{ asset('frontend/assets/images/clients/'.$item->photo) }}" class="swiper-lazy"> 
                                <div class="swiper-lazy-preloader"></div>
                            </div>
                        </a>
                        </div>
                        @endforeach     

                    </div> 
                </div>
            </div> 
        </div>
    </div>   
</div> 
@endif
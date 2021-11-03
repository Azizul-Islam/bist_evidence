@php
    $testimonials = App\Models\Testimonial::latest()->limit(8)->get();
@endphp
@if(count($testimonials) > 0)
<div class="section testimonials">
    <div class="px-3">
        <div class="theme-container">
            <h1 class="section-title">What people are saying</h1>  
            <div class="testimonials-carousel"> 
                <div class="swiper-container">
                    <div class="swiper-wrapper"> 
                        @foreach ($testimonials as $item) 
                        <div class="swiper-slide"> 
                            <div class="content text-center">
                                 <img src="{{ asset('frontend/assets/images/testimonials/'.$item->photo) }}" alt="{{ $item->name }}">
                                <div class="quote open text-left primary-color">“</div>
                                <p class="text">{{ $item->comment }}</p>
                                <div class="quote close text-right primary-color">”</div> 
                                <h3 class="author">{{ $item->name }}</h3>
                                <p>{{ $item->designation }}</p>  
                            </div>  
                        </div>
                        @endforeach

                    </div>  
                    <div class="swiper-pagination"></div> 
                </div>  
            </div> 
        </div>
    </div>   
</div>
@endif 
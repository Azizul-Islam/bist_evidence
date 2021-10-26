<div class="section default">
    <div class="px-3">
        <div class="theme-container">
            <h1 class="section-title">Our Mission</h1>   
            <div class="mdc-card p-0 row o-hidden"> 
                <div class="col-xs-12 col-lg-6 col-xl-6 p-3">            
                   <div class="row">
                    @foreach (\App\Models\Service::where('status','mission')->latest()->limit(4)->get() as $mission)
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2">
                            <i class="material-icons mat-icon-xlg primary-color">{{ $mission->icon }}</i>
                            <h2 class="capitalize fw-600 mb-2">{{ $mission->title }}</h2>
                            <p class="text-muted fw-500">{{ $mission->description }}</p>
                        </div>
                    @endforeach
                   </div>                     
                </div> 
                <div class="col-xs-12 col-lg-6 col-xl-6 p-0 d-none d-lg-flex d-xl-flex">                    
                    <img src="{{ asset('frontend/assets/images/others/mission.jpg') }}" alt="mission" class="mw-100 d-block">                
                </div>            
            </div>
                
        </div>
    </div>   
</div> 
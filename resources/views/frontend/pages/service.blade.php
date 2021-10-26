<div class="section mt-3">
    <div class="px-3">
        <div class="theme-container">
            <h1 class="section-title">Our Services</h1>  
            <div class="services-wrapper row">
                @foreach (\App\Models\Service::where('status','service')->latest()->limit(4)->get() as $service)
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 p-2"> 
                    <div class="mdc-card h-100 w-100 text-center middle-xs p-3">            
                        <i class="material-icons mat-icon-xlg primary-color">{{ $service->icon }}</i>
                        <h2 class="capitalize fw-600 my-3">{{ $service->title }}</h2>
                        <p class="text-muted fw-500">{{ $service->description }}</p>           
                    </div> 
                </div>
                @endforeach
                  
            </div> 
        </div>
    </div>   
</div> 
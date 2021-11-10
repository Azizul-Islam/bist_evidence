@extends('layouts.app')
@section('title','FAQS')
@section('content')
<div class="px-3">  
    <div class="theme-container">  
        <div class="py-5">
            <div class="column center-xs middle-xs text-center">  
                <h1 class="uppercase">Frequently Asked Questions</h1>             
                <p class="text-muted fw-500">Click on a question to expand and reveal the answer.</p>
            </div>
            <div class="expansion-panel-wrapper"> 
                <div class="mdc-card expansion-panel">
                    <div class="row between-xs middle-xs expansion-panel-header">
                        <div class="fw-500">What payment methods are available?</div>
                        <div class="text-muted d-none d-md-flex d-lg-flex d-xl-flex">Question about selling</div>                         
                    </div>
                    <div class="expansion-panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc feugiat, sapien id rhoncus pretium, leo massa pellentesque magna, non mattis lectus risus sit amet turpis. Cras et semper tellus. Sed sed leo sapien. Nunc eros nibh, tempor quis rhoncus eget, condimentum vel odio. Duis vitae lacus ligula. Aenean elementum euismod pretium. Nullam sit amet lectus molestie, condimentum odio accumsan, sodales nibh.</p>
                        <div class="p-relative py-2 px-4">
                            <div class="divider"></div>
                        </div>
                        <p class="row middle-xs mt-2 mb-0">
                            <span class="text-muted">Was this answer helpful? </span>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>Yes</button>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>No</button>  
                        </p>
                    </div>
                </div> 
                <div class="mdc-card expansion-panel">
                    <div class="row between-xs middle-xs expansion-panel-header">
                        <div class="fw-500">What is the difference between a real estate agent and a real estate broker?</div>
                        <div class="text-muted d-none d-md-flex d-lg-flex d-xl-flex">Agents FAQs</div>                         
                    </div>
                    <div class="expansion-panel-body">
                        <p>Maecenas aliquet cursus tellus in imperdiet. Vivamus consequat ipsum augue, a vulputate eros porta eu. Sed consectetur turpis a arcu dapibus, sit amet elementum dui posuere. Ut sodales nisl nec rhoncus dignissim. Nunc maximus est sed nibh mattis fringilla. Donec vehicula interdum neque bibendum feugiat. Sed porttitor elementum vehicula. Phasellus fermentum leo erat, non fermentum ipsum elementum sed.</p>
                        <div class="p-relative py-2 px-4">
                            <div class="divider"></div>
                        </div>
                        <p class="row middle-xs mt-2 mb-0">
                            <span class="text-muted">Was this answer helpful? </span>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>Yes</button>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>No</button>  
                        </p>
                    </div>
                </div> 
                <div class="mdc-card expansion-panel">
                    <div class="row between-xs middle-xs expansion-panel-header">
                        <div class="fw-500">How long does the loan process take?</div>
                        <div class="text-muted d-none d-md-flex d-lg-flex d-xl-flex">Question about renting</div>                         
                    </div>
                    <div class="expansion-panel-body">
                        <p>Etiam a faucibus tortor, pellentesque viverra orci. Donec et cursus quam, eget molestie nisl. Etiam venenatis libero turpis, non placerat orci consequat ut. Nullam vitae lacinia elit. Proin pulvinar faucibus enim, et ullamcorper risus dapibus sit amet. Nam magna sapien, hendrerit eget gravida id, dapibus a diam. Proin condimentum elementum vestibulum. Sed hendrerit vestibulum diam, quis cursus ex efficitur non.</p>
                        <div class="p-relative py-2 px-4">
                            <div class="divider"></div>
                        </div>
                        <p class="row middle-xs mt-2 mb-0">
                            <span class="text-muted">Was this answer helpful? </span>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>Yes</button>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>No</button>  
                        </p>
                    </div>
                </div>
                <div class="mdc-card expansion-panel">
                    <div class="row between-xs middle-xs expansion-panel-header">
                        <div class="fw-500">When buying a new home, what upgrades should we go for?</div>
                        <div class="text-muted d-none d-md-flex d-lg-flex d-xl-flex">Question about selling</div>                         
                    </div>
                    <div class="expansion-panel-body">
                        <p>Curabitur vitae lorem felis. Aenean eu dolor et tortor viverra tempor ac eu lacus. Morbi eget elit ac ligula convallis sollicitudin eu et metus. Nam tempor lacus quis urna tincidunt varius non eu est. Fusce nec lorem eget ipsum dapibus tincidunt. Donec ut mauris efficitur ante pretium finibus. Vestibulum suscipit quis sapien in tincidunt. Aenean dictum sem sed justo venenatis, suscipit fringilla diam suscipit. Mauris sit amet lobortis purus, quis faucibus justo. Quisque tincidunt magna turpis, nec ultrices lorem mollis quis.</p>
                        <div class="p-relative py-2 px-4">
                            <div class="divider"></div>
                        </div>
                        <p class="row middle-xs mt-2 mb-0">
                            <span class="text-muted">Was this answer helpful? </span>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>Yes</button>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>No</button>  
                        </p>
                    </div>
                </div>
                <div class="mdc-card expansion-panel">
                    <div class="row between-xs middle-xs expansion-panel-header">
                        <div class="fw-500">What benefits do I receive from private mortgage insurance?</div>
                        <div class="text-muted d-none d-md-flex d-lg-flex d-xl-flex">Question about renting</div>                         
                    </div>
                    <div class="expansion-panel-body">
                        <p>Ut sodales nisl nec rhoncus dignissim. Nunc maximus est sed nibh mattis fringilla. Donec vehicula interdum neque bibendum feugiat. Sed porttitor elementum vehicula. Phasellus fermentum leo erat, non fermentum ipsum elementum sed. Mauris non risus lectus. Morbi ut metus et nisi malesuada mollis. Maecenas placerat ante urna, sed efficitur magna tempor ac. Nam posuere lorem diam, sit amet rhoncus massa consectetur in. In nec tincidunt ipsum, non volutpat augue. Nam quis imperdiet nisi.</p>
                        <div class="p-relative py-2 px-4">
                            <div class="divider"></div>
                        </div>
                        <p class="row middle-xs mt-2 mb-0">
                            <span class="text-muted">Was this answer helpful? </span>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>Yes</button>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>No</button>  
                        </p>
                    </div>
                </div>
                <div class="mdc-card expansion-panel">
                    <div class="row between-xs middle-xs expansion-panel-header">
                        <div class="fw-500">Why should I use a real estate salesperson?</div>
                        <div class="text-muted d-none d-md-flex d-lg-flex d-xl-flex">Agents FAQs</div>                         
                    </div>
                    <div class="expansion-panel-body">
                        <p>Phasellus nec dapibus est. Nullam erat neque, porttitor sed massa non, vulputate vestibulum libero. Donec quis odio id mi auctor pellentesque. Nulla facilisi. Morbi sed orci neque. Mauris dictum sapien efficitur sagittis efficitur. Fusce tristique rhoncus mauris, sed tristique arcu scelerisque id.</p>
                        <div class="p-relative py-2 px-4">
                            <div class="divider"></div>
                        </div>
                        <p class="row middle-xs mt-2 mb-0">
                            <span class="text-muted">Was this answer helpful? </span>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>Yes</button>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>No</button>  
                        </p>
                    </div>
                </div>
                <div class="mdc-card expansion-panel">
                    <div class="row between-xs middle-xs expansion-panel-header">
                        <div class="fw-500">Can a home depreciate in value?</div>
                        <div class="text-muted d-none d-md-flex d-lg-flex d-xl-flex">Question about selling</div>                         
                    </div>
                    <div class="expansion-panel-body">
                        <p>Etiam a faucibus tortor, pellentesque viverra orci. Donec et cursus quam, eget molestie nisl. Etiam venenatis libero turpis, non placerat orci consequat ut. Nullam vitae lacinia elit. Proin pulvinar faucibus enim, et ullamcorper risus dapibus sit amet. Nam magna sapien, hendrerit eget gravida id, dapibus a diam. Proin condimentum elementum vestibulum. Sed hendrerit vestibulum diam, quis cursus ex efficitur non.</p>
                        <div class="p-relative py-2 px-4">
                            <div class="divider"></div>
                        </div>
                        <p class="row middle-xs mt-2 mb-0">
                            <span class="text-muted">Was this answer helpful? </span>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>Yes</button>
                            <button class="mdc-button"><span class="mdc-button__ripple"></span>No</button>  
                        </p>
                    </div>
                </div>
            </div>
        </div> 
        <div class="get-in-touch bg-primary"> 
            <img src="assets/images/others/operator.png" alt="operator" class="d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">        
            <div class="row between-xs middle-xs content"> 
                <div class="column p-3">
                    <h2>LOOKING TO SELL YOUR HOME?</h2>
                    <p class="mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
                <div class="row start-xs middle-xs p-3">
                    <i class="material-icons mat-icon-xlg mx-2">call</i>
                    <div class="column">               
                        <p class="mb-0">CALL US NOW</p>
                        <h2 class="ws-nowrap">(+100) 123 456 7890</h2>
                    </div>
                </div>
                <div class="p-3">
                    <a href="javascript:void(0);" class="mdc-button mdc-button--raised mx-3">
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label">get in touch</span> 
                    </a>  
                </div>
            </div>
        </div>  
    </div>  
</div> 
@endsection
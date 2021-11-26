<ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
    <li class="user-info row start-xs middle-xs">
        @if(empty(auth()->user()->photo))
        <img src="{{ asset('frontend/assets/agents/default_photo.png') }}" alt="user-image" width="50">
        @else
        <img src="{{ asset('frontend/assets/agents/'.auth()->user()->photo) }}" alt="user-image" width="50">
        @endif
        <p class="m-0">{{ auth()->user()->name ?? '' }} <br> <small></small></p>
    </li>
    <li role="separator" class="mdc-list-divider m-0"></li> 
    <li>
        <a href="{{ route('agent.submit-property') }}" class="mdc-list-item" role="menuitem">
            <i class="material-icons mat-icon-sm text-muted">add_circle</i> 
            <span class="mdc-list-item__text px-3">Submit Property</span>
        </a> 
    </li>
    <li>
        <a href="{{ route('agent.my-properties') }}" class="mdc-list-item" role="menuitem">
            <i class="material-icons mat-icon-sm text-muted">home</i> 
            <span class="mdc-list-item__text px-3">My Properties</span>
        </a>
    </li>
    <li>
        <a href="{{ route('agent.favorite') }}" class="mdc-list-item" role="menuitem">
            <i class="material-icons mat-icon-sm text-muted">favorite_border</i> 
            <span class="mdc-list-item__text px-3">Favorites
                <span class="badge warn">{{ \App\Models\Favorite::where('user_id',auth()->guard('agent')->id())->count() ?? '' }}</span>
            </span> 
        </a>
    </li>
    <li>
        <a href="{{ route('agent.compare') }}" class="mdc-list-item" role="menuitem">
            <i class="material-icons mat-icon-sm text-muted">compare_arrows</i> 
            <span class="mdc-list-item__text px-3">Compare
                <span class="badge primary">3</span>
            </span> 
        </a>
    </li> 
    <li>
        <a href="#" class="mdc-list-item" role="menuitem">
            <i class="material-icons mat-icon-sm text-muted">search</i> 
            <span class="mdc-list-item__text px-3">Saved Searches</span>
        </a>
    </li>
    <li>
        <a href="{{ route('agent.home') }}" class="mdc-list-item" role="menuitem">
            <i class="material-icons mat-icon-sm text-muted">edit</i> 
            <span class="mdc-list-item__text px-3">Edit Profile</span>
        </a>
    </li>
    <li>
        <a href="{{ route('agent.lock-screen') }}" class="mdc-list-item" role="menuitem">
            <i class="material-icons mat-icon-sm text-muted">lock</i> 
            <span class="mdc-list-item__text px-3">Lock screen</span>
        </a>
    </li>
    <li>
        <a href="{{ route('agent.faqs') }}" class="mdc-list-item" role="menuitem">
            <i class="material-icons mat-icon-sm text-muted">help</i> 
            <span class="mdc-list-item__text px-3">Help</span>
        </a>
    </li>
    <li role="separator" class="mdc-list-divider m-0"></li>
    <li>
        <a onclick="event.preventDefault();document.getElementById('logout_form').submit();" class="mdc-list-item" role="menuitem">
            <i class="material-icons mat-icon-sm text-muted">power_settings_new</i> 
            <span class="mdc-list-item__text px-3">Sign Out</span>
        </a>
    </li> 
</ul>
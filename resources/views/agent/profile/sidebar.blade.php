<aside class="mdc-drawer mdc-drawer--modal page-sidenav">
    <a href="#" class="h-0"></a>
    <div class="mdc-card"> 
        <div class="row start-xs middle-xs p-3">
            @if(empty(auth()->user()->photo))
            <img src="{{ asset('frontend/assets/agents/default_photo.png') }}" alt="user-image" width="50">
            @else
            <img src="{{ asset('frontend/assets/agents/'.auth()->user()->photo) }}" alt="user-image" width="50">
            @endif
            <h2 class="text-muted fw-500 mx-3">{{ auth()->user()->name }}</h2> 
        </div>
        <hr class="mdc-list-divider m-0">
        <ul class="mdc-list">
            <li>
                <a href="{{ route('agent.home') }}" class="mdc-list-item py-1">
                    <span class="mdc-list-item__graphic material-icons text-muted mx-3">person</span>
                    <span class="mdc-list-item__text">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('agent.my-properties') }}" class="mdc-list-item py-1">
                    <span class="mdc-list-item__graphic material-icons text-muted mx-3">view_list</span>
                    <span class="mdc-list-item__text">My Properties</span>
                </a>
            </li>
            <li>
                <a href="{{ route('agent.favorite') }}" class="mdc-list-item py-1">
                    <span class="mdc-list-item__graphic material-icons text-muted mx-3">favorite</span>
                    <span class="mdc-list-item__text">Favorites</span>
                </a> 
            </li>
            <li>
                <a href="{{ route('agent.submit-property') }}" class="mdc-list-item py-1">
                    <span class="mdc-list-item__graphic material-icons text-muted mx-3">add_circle</span>
                    <span class="mdc-list-item__text">Submit Property</span>
                </a>
            </li>
            <li>
                <a href="" class="mdc-list-item py-1" onclick="event.preventDefault();document.getElementById('logout_form').submit();">
                    <span class="mdc-list-item__graphic material-icons text-muted mx-3">power_settings_new</span>
                    <span class="mdc-list-item__text">Logout</span>
                </a>
                <form action="{{ route('agent.logout') }}" method="POST" id="logout_form">@csrf</form>
            </li>
        </ul>  
    </div>
</aside>
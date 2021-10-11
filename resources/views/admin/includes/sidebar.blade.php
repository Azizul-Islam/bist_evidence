<div class="menu">
    <div class="menu-header">
        <a href="{{ route('admin.home') }}" class="menu-header-logo">
            <img src="{{ asset('logo.png') }}" alt="logo">
        </a>
        <a href="{{ route('admin.home') }}" class="btn btn-sm menu-close-btn">
            <i class="bi bi-x"></i>
        </a>
    </div>
    <div class="menu-body">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                <div class="avatar me-3">
                    @if(!blank(auth()->user()->photo))
                    <img src="{{ auth()->user()->photo }}" class="rounded-circle" alt="image">
                    @else
                    <img src="{{ asset('backend/assets/images/default.png') }}" class="rounded-circle" alt="image">
                    @endif
                </div>
                <div>
                    <div class="fw-bold">{{ ucfirst(auth()->user()->name) }}</div>
                    <small class="text-muted">{{ ucfirst(auth()->user()->role) }}</small>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="#" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-person dropdown-item-icon"></i> Profile
                </a>
                <a href="#" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-envelope dropdown-item-icon"></i> Inbox
                </a>
                <a href="#" class="dropdown-item d-flex align-items-center" data-sidebar-target="#settings">
                    <i class="bi bi-gear dropdown-item-icon"></i> Settings
                </a>
                <a href="" onclick="event.preventDefault();document.getElementById('logoutForm').submit();" class="dropdown-item d-flex align-items-center text-danger"
                   target="_blank">
                    <i class="bi bi-box-arrow-right dropdown-item-icon"></i> Logout
                </a>
                <form action="{{ route('logout') }}" method="POST" id="logoutForm" class="d-none">@csrf</form>
            </div>
        </div>
        <ul>
            <li class="menu-divider">Real Estate</li>
            <li>
                <a  class="{{ \Request::is('admin') ? 'active' : '' }}"
                    href="{{ route('admin.home') }}">
                    <span class="nav-link-icon">
                        <i class="bi bi-bar-chart"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="{{ \Request::is('admin/categories') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <span class="nav-link-icon">
                        <i class="bi bi-view-stacked"></i>
                    </span>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a class="{{ \Request::is('admin/areas') ? 'active' : '' }}" href="{{ route('admin.areas.index') }}">
                    <span class="nav-link-icon">
                        <i class="bi bi-geo"></i>
                    </span>
                    <span>Area</span>
                </a>
            </li>
            <li>
                <a class="{{ \Request::is('admin/amenities') || \Request::is('admin/amenities/create') ? 'active' : '' }}" href="{{ route('admin.amenities.index') }}">
                    <span class="nav-link-icon">
                        <i class="bi bi-geo"></i>
                    </span>
                    <span>Amenity</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-house"></i>
                    </span>
                    <span>Properties</span>
                </a>
                <ul>
                   
                    <li>
                        <a {{ \Request::is('admin/properties') ? 'active' : '' }} href="{{ route('admin.properties.index') }}">Property List</a>
                    </li>
                    <li>
                        <a {{ \Request::is('admin/properties/create') ? 'active' : '' }} href="{{ route('admin.properties.create') }}">Add Property</a>
                    </li>
                    
                </ul>
            </li>
            {{-- <li>
                <a class="{{ \Request::is('admin/consumer-request') ? 'active' : '' }}" href="{{ route('admin.consumer-request') }}">
                    <span class="nav-link-icon">
                        <i class="bi bi-cpu"></i>
                    </span>
                    <span>Request Property</span>
                </a>
            </li> --}}
            
            
        </ul>
    </div>
</div>
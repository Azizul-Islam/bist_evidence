


<div class="row mdc-card between-xs middle-xs w-100 p-2 mdc-elevation--z1 text-muted d-md-none d-lg-none d-xl-none mb-3">
    <button id="page-sidenav-toggle" class="mdc-icon-button material-icons">more_vert</button> 
    <h3 class="fw-500">My Account</h3>
</div> 
<div class="mdc-card p-3">
    <div class="mdc-text-field mdc-text-field--outlined custom-field w-100">
        <input class="mdc-text-field__input" placeholder="Type for filter properties">
        <div class="mdc-notched-outline">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
                <label class="mdc-floating-label">Filter properties</label>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
        </div>
    </div>  
    <div class="mdc-data-table border-0 w-100 mt-3" >
        <table class="mdc-data-table__table" aria-label="Dessert calories">
            <thead>
                <tr class="mdc-data-table__header-row">
                    <th class="mdc-data-table__header-cell">ID</th>
                    <th class="mdc-data-table__header-cell">Image</th>
                    <th class="mdc-data-table__header-cell">Title</th>
                    <th class="mdc-data-table__header-cell">Remove</th>
                </tr>
            </thead>
            <tbody class="mdc-data-table__content">
                @forelse ($favorites as $i=>$favorite)
                <tr class="mdc-data-table__row">
                    <td class="mdc-data-table__cell">{{ $i+1 }}</td>
                    <td class="mdc-data-table__cell"><img src="{{ asset('backend/properties/'.$favorite->property->images[0]->path) }}" alt="pro-image" width="100" class="d-block py-3"></td>
                    <td class="mdc-data-table__cell"><a href="{{ route('property.details',$favorite->property->slug) }}" class="mdc-button mdc-ripple-surface mdc-ripple-surface--primary normal">{{ $favorite->property->title ?? '' }}</a></td>
                    <td class="mdc-data-table__cell"><button class="mdc-icon-button material-icons warn-color delFavorite" data-id="{{ $favorite->id }}" data-url="{{ route('agent.favorite.destroy',$favorite->id) }}">delete</button></td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center">No data available in this table!</td>
                    </tr>
                @endforelse
                
            </tbody>
        </table>
    </div> 
</div> 
<div class="row center-xs middle-xs my-3 w-100">  
    {!! $favorites->appends(request()->query())->links('pagination::bootstrap-4') !!}
</div> 
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
    <div class="mdc-data-table border-0 w-100 mt-3">
        <table class="mdc-data-table__table" aria-label="Dessert calories">
            <thead>
                <tr class="mdc-data-table__header-row">
                    <th class="mdc-data-table__header-cell">ID</th>
                    <th class="mdc-data-table__header-cell">Image</th>
                    <th class="mdc-data-table__header-cell">Title</th>
                    <th class="mdc-data-table__header-cell">Published</th>
                    <th class="mdc-data-table__header-cell">Status</th>
                    {{-- <th class="mdc-data-table__header-cell">Views</th> --}}
                    <th class="mdc-data-table__header-cell">Actions</th>
                </tr>
            </thead>
            <tbody class="mdc-data-table__content">
                @forelse ($properties as $property)
                <tr class="mdc-data-table__row">
                    <td class="mdc-data-table__cell">1</td>
                    <td class="mdc-data-table__cell"><img src="{{ isset($property->images[0]->path) ? asset('backend/properties/'.$property->images[0]->path)  : '' }}" alt="pro-image" width="100" class="d-block py-3"></td>
                    <td class="mdc-data-table__cell"><a href="{{ route('property.details',$property->slug) }}" class="mdc-button mdc-ripple-surface mdc-ripple-surface--primary normal">{{ Str::limit($property->title, 30, '...') }}</a></td>
                    <td class="mdc-data-table__cell">{{ date('d M, Y',strtotime($property->created_at)) }}</td>
                    <td class="mdc-data-table__cell">{{ ucfirst($property->property_status) }}</td>
                    <td class="mdc-data-table__cell">
                        <a href="{{ route('agent.property.edit',$property) }}" class="mdc-icon-button material-icons primary-color">edit</a>
                        {{-- <form action="{{ route('agent.property.destroy',$property) }}" onsubmit="return confirm('Are you sure you want to permanently remove this record ?')" style="float: left">
                            @csrf
                            @method('DELETE') --}}

                            <button type="submit" data-id="{{ $property->id }}" data-url="{{ route('agent.property.destroy',$property->id) }}" class="mdc-icon-button material-icons warn-color delProperty">delete</button>
                        {{-- </form> --}}
                    </td>
                </tr>
                @empty
                    <tr>
                        <td>No data available in this table</td>
                    </tr>
                @endforelse
               
            </tbody>
        </table>
    </div> 
</div> 
<div class="row center-xs middle-xs p-2 w-100">                
    <div class="mdc-card w-100"> 
        {!! $properties->appends(request()->query())->links('pagination::bootstrap-4') !!}
       
    </div>
</div> 
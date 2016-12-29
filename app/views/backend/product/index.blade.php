 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('ProductIndex') }}">Pregled svih proizvoda</a></li>
    
    <a href="{{ URL::route('ProductCreate') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novi proizvod
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih proizvoda</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-1">Istaknuta slika</th>  
                <th class="col-md-2">Naziv</th>
                <th>SKU</th>
                <th>Cijena</th>
                <th>Zalihe</th>
                <th>Tip proizvoda</th> 
                <th>Datum</th> 
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->product_id }}</td> 
                    <td>
                        @if ($entry->image != null || $entry->image != '')  
                            {{ HTML::image(URL::to('/') . '/uploads/backend/product/' . $entry->image, $entry->title, array('class' => 'img-responsive')) }}  
                        @endif
                    </td>
                    <td>{{ $entry->title }}</td> 
                    <td>{{ $entry->sku }}</td>
                    <td>{{ $entry->price }} kn</td>
                    <td>{{ $entry->stock }}</td>
                    <td>{{ $entry->product_type }}</td> 
                    <td>Uvezeno iz WordPressa <br /> {{ $entry->created_at->format('d. m. Y. h:m:i') }}</td>  
                    <td class="col-md-1">

                        <a href="{{ URL::route('ProductEdit', array('id' => $entry->id)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <button type="button" id="btn-delete-tag-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-tag-id-{{ $entry->id }}"><i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@if (count($entries) > 0) 
    @foreach($entries as $entry)
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="delete-tag-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati proizvod: {{ $entry->title }}?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('ProductDestroy', array('id' => $entry->id)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 

<div class="text-center">{{$entries->links()}}</div>

    <script type="text/javascript">
    $(document).ready(function() {
        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-delete-tag-id-{{ $entry->id }}").click(function() { 
                    $('#delete-tag-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 
    });
    </script>
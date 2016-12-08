 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('ClientIndex') }}">Pregled svih klijenata</a></li>
    
    <a href="{{ URL::route('ClientCreate') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novog klijenta
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih klijenata ({{ count($entries['entries']) }})</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                <th>Naziv</th>
                <th>Adresa</th>
                <th>Kontakt</th>
                <th>OIB</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries['entries']) > 0) 
                @foreach($entries['entries'] as $entry)
                <tr>
                    <td>{{ $entry->first_name }} {{ $entry->last_name }}</td>
                    <td>{{ $entry->address }}  </td>
                    <td>{{ $entry->email}}</td>
                    <td>{{ $entry->oib}}</td>

                    <td class="col-md-1">

                        <a href="{{ URL::route('ClientEdit', array('id' => $entry->id)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <button type="button" id="btn-delete-client-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-client-id-{{ $entry->id }}"><i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
                @endforeach 
            @else
                <p>Nema niti jednog unešenog klijenta</p>
            @endif
        </tbody>
    </table>
</div>

@if (count($entries['entries']) > 0) 
    @foreach($entries['entries'] as $entry)
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="delete-client-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati klijenta: {{ $entry->username }}?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('ClientDestroy', array('id' => $entry->id)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 

<div class="text-center">{{$entries['entries']->links()}}</div>

    <script type="text/javascript">
    $(document).ready(function() {
        @if (count($entries['entries']) > 0) 
            @foreach($entries['entries'] as $entry)
                $("#btn-delete-client-id-{{ $entry->id }}").click(function() { 
                    $('#delete-client-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 
    });
    </script>
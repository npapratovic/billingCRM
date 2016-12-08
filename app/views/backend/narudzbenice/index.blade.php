 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('NarudzbeniceIndex') }}">Pregled svih narudžbenica</a></li>
    
    <a href="{{ URL::route('NarudzbeniceCreate') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novu narudžbenicu
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih narudžbenica ({{ count($entries['entries']) }})</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                <th>Broj narudžbenice</th>
                <th>Ime kupca</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries['entries']) > 0) 
                @foreach($entries['entries'] as $entry)
                <tr>
                    <td>{{ $entry->narudzbenica_number }}</td>
                    <td>{{ $entry->first_name }} {{ $entry->last_name }} </td>
                    <td class="col-md-1">

                        <a href="{{ URL::route('NarudzbeniceEdit', array('id' => $entry->id)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <button type="button" id="btn-delete-tag-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-tag-id-{{ $entry->id }}"><i class="fa fa-times"></i>
                        </button>
                        <a href="{{ URL::route('NarudzbeniceCreatePdf', array('entry_id' => $entry->id)) }}" target="_blank">
                        <button type="button" id="btn-pdf-narudzbenica-id-{{ $entry->id }}" class="btn btn-warning btn-xs"><i class="fa fa-file-text-o"></i>
                        </button>
                        </a>
                        <button type="button" id="btn-email-narudzbenica-id-{{ $entry->id }}" class="btn btn-primary btn-xs" data-target="#email-narudzbenica-id-{{ $entry->id }}"><i class="fa fa-envelope-o"></i></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
      
@if (count($entries['entries']) > 0) 
    @foreach($entries['entries'] as $entry)
    {{ Form::open(array('route' => 'NarudzbeniceSendMail', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'method' => 'post')) }}
    {{Form::hidden('id', $entry->id, array('id' => 'id'))}}
    
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="email-narudzbenica-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Slanje narudžbenice u PDF obliku klijentu: {{ $entry->first_name }}  {{ $entry->last_name }}</h4>
                </div>
                <div class="modal-body">
                                <div class="form-group">  
                                <label for="narudzbenica_comment">Upišite komentar ispod narudžbenice:</label>
                                {{ Form::textarea('narudzbenica_comment', isset($entry->narudzbenica_comment) ? $entry->narudzbenica_comment : null, ['class' => 'form-control', 'id' => 'narudzbenica_comment']) }}
                                <small class="text-danger">{{ $errors->first('narudzbenica_comment') }}</small>
                                </div>
                </div>
                <div class="modal-footer">
                    {{ Form::button('Pošalji ', array('type' => 'submit', 'class' => 'btn btn-default')) }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    @endforeach
@endif 

@if (count($entries['entries']) > 0) 
    @foreach($entries['entries'] as $entry)
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
                    <p>Želite li obrisati račun: {{ $entry->narudzbenica_number }} ?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('NarudzbeniceDestroy', array('id' => $entry->id)) }}">
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
                $("#btn-delete-tag-id-{{ $entry->id }}").click(function() { 
                    $('#delete-tag-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        @if (count($entries['entries']) > 0) 
            @foreach($entries['entries'] as $entry)
                $("#btn-email-narudzbenica-id-{{ $entry->id }}").click(function() { 
                    $('#email-narudzbenica-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 
    });
    </script>
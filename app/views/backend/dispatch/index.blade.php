 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('DispatchIndex') }}">Pregled svih otpremnica</a></li>
    
    <a href="{{ route('admin.dispatch.create') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novu otpremnicu
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih otpremnica ({{ count($entries) }})</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                <th>Broj otpremnice</th>
                <th>Ime kupca</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->dispatch_number }}</td>
                    <td>{{ $entry->client->first_name }} {{ $entry->client->last_name }} </td>
                    <td class="col-md-1">

                        <a href="{{ route('admin.dispatch.edit', array('id' => $entry->id)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <button type="button" id="btn-delete-tag-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-tag-id-{{ $entry->id }}"><i class="fa fa-times"></i>
                        </button>
                        <a href="{{ route('DispatchCreatePdf', array('entry_id' => $entry->id)) }}" target="_blank">
                        <button type="button" id="btn-pdf-dispatch-id-{{ $entry->id }}" class="btn btn-warning btn-xs"><i class="fa fa-file-text-o"></i>
                        </button>
                        </a>
                        <button type="button" id="btn-email-dispatch-id-{{ $entry->id }}" class="btn btn-primary btn-xs" data-target="#email-dispatch-id-{{ $entry->id }}"><i class="fa fa-envelope-o"></i></i>
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
    {{ Form::open(array('route' => 'DispatchSendMail', 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'method' => 'post')) }}
    {{Form::hidden('id', $entry->id, array('id' => 'id'))}}
    
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="email-dispatch-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Slanje otpremnice u PDF obliku klijentu: {{ $entry->first_name }}  {{ $entry->last_name }}</h4>
                </div>
                <div class="modal-body">
                                <div class="form-group">  
                                <label for="dispatch_comment">Upišite komentar ispod otpremnice:</label>
                                {{ Form::textarea('dispatch_comment', isset($entry->dispatch_comment) ? $entry->dispatch_comment : null, ['class' => 'form-control', 'id' => 'dispatch_comment']) }}
                                <small class="text-danger">{{ $errors->first('dispatch_comment') }}</small>
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
                    <p>Želite li obrisati otpremnicu: {{ $entry->dispatch_number }} ?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('admin.dispatch.destroy', array('id' => $entry->id)) }}">
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

        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-email-dispatch-id-{{ $entry->id }}").click(function() { 
                    $('#email-dispatch-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 
    });
    </script>
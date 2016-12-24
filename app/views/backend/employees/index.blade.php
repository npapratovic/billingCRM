  <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ route('admin.employees.index') }}">Pregled svih zaposlenika</a></li>
    
    <a href="{{ route('admin.employees.create') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novog zaposlenika
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih zaposlenika ({{ count($entries) }})</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>E-mail</th> 
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->first_name }}</td>
                    <td> {{ $entry->last_name }}</td>
                    <td>{{ $entry->email}}</td> 

                    <td class="col-md-1"> 
                        <a href="{{ route('admin.employees.edit', $entry->id) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <button type="button" id="btn-delete-employee-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-employee-id-{{ $entry->id }}"><i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
                @endforeach 
            @else
                <p>Nema niti jednog unešenog zaposlenika</p>
            @endif
        </tbody>
    </table>
</div>

@if (count($entries) > 0) 
    @foreach($entries as $entry)
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="delete-employee-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati zaposlenika: {{ $entry->first_name }} {{ $entry->last_name }}?</p>
                </div>
                <div class="modal-footer">
                	<div class="row">
                		<div class="col-md-7">
						</div>
						<div class="col-md-2">
							{{ Form::open(['method' => 'DELETE', 'route'=>['admin.employees.destroy', $entry->id]]) }}
		            		{{ Form::submit('Uredu', ['class' => 'btn btn-default', 'data-ok' => 'modal']) }}
		             		{{ Form::close() }} 
						</div>
						<div class="col-md-2">
							<button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
						</div>
						<div class="col-md-1">
 						</div>
                	</div> 

                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 

<div class="text-center">{{ $entries->links() }}</div>

    <script type="text/javascript">
    $(document).ready(function() {
        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-delete-employee-id-{{ $entry->id }}").click(function() { 
                    $('#delete-employee-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 
    });
    </script>
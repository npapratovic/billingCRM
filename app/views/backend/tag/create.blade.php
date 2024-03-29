<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ route('admin.tags.index') }}">Pregled svih oznaka</a></li>
    <li class="active">Dodaj oznaku</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos nove oznake</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ route('admin.tags.index') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(['url' => 'admin/tags', 'files' => 'false']) }}
	    <div class="col-md-4">
	            <div class="form-group">  
	                                           {{ Form::label('title', 'Naslov oznake:') }}
					{{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Naslov oznake']) }}
					<small class="text-danger">{{ $errors->first('title') }}</small>
	            </div>
	         	<div class="form-group">  
	                                           {{ Form::label('permalink', 'Poveznica:') }}
					{{ Form::text('permalink', isset($entry->permalink) ? $entry->permalink : null, ['class' => 'form-control', 'id' => 'permalink', 'placeholder' => 'Poveznica oznake']) }}
					<small class="text-danger">{{ $errors->first('permalink') }}</small>
	            </div>    
	            	   <div class="form-group">  
	                                           {{ Form::label('description', 'Opis:') }}
					{{ Form::text('description', isset($entry->description) ? $entry->description : null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Opis oznake']) }}
					<small class="text-danger">{{ $errors->first('description') }}</small>
	            </div>    
	              {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
	    </div>

	    {{ Form::close() }}

	    <div class="col-md-7 col-md-offset-1">
	    	    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                <th>Id</th>
                <th>Naslov</th>
                <th>Permalink</th>
                <th>Opis</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->id }}</td>
                    <td>{{ $entry->title }}</td>
                    <td>{{ $entry->permalink }}</td>
                    <td>{{ $entry->description }}</td>
                    <td class="col-md-1">

                        <a href="{{ route('admin.tags.edit', array('id' => $entry->id)) }}">
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
    <div class="text-center">{{$entries->links()}}</div>
	    </div>
    </div>
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
                    <p>Želite li obrisati oznaku: {{ $entry->title }}?</p>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-7">
                        </div>
                        <div class="col-md-2">
                            {{ Form::open(['method' => 'DELETE', 'route'=>['admin.tags.destroy', $entry->id]]) }}
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
 
<script type="text/javascript">
	$(document).ready(function() {
    	$("#title").stringToSlug();

        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-delete-tag-id-{{ $entry->id }}").click(function() { 
                    $('#delete-tag-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

	});
</script>

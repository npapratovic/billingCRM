<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('admin.services.index') }}">Pregled svih usluga</a></li>
    <li class="active">Dodaj uslugu</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos nove usluge</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ URL::route('admin.services.index') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(['url' => 'admin/services', 'files' => 'true']) }}
	    <div class="col-md-6">
	            <div class="form-group">  
                     {{ Form::label('title', 'Naslov usluge:') }}
                     {{ Form::text('title', null, ['class'=>'form-control']) }}
					<small class="text-danger">{{ $errors->first('title') }}</small>
	            </div>
                <div class="form-group">
                    {{ Form::label('intro', 'Opis usluge:') }} 
                    {{ Form::text('intro', null, ['class'=>'form-control']) }} 
                    <small class="text-danger">{{ $errors->first('intro') }}</small>
                </div>
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">  
                    {{ Form::label('measurement', 'Jedinična mjera:') }}   
                    {{ Form::select('measurement', array('piece' => 'kom', 'hour' => 'sat', 'year' => 'god', 'km' => 'km', 'lit' => 'lit', 'kg' => 'kg', 'kWh' => 'kWh', 'm³' => 'm³', 't' => 't', 'm²' => 'm²', 'm' => 'm', 'day' => 'dan', 'night' => 'noć', 'kart' => 'kart', 'rč' => 'rč', 'par' => 'par', 'ml' => 'ml', 'pax' => 'pax', 'room' => 'soba', 'apt' => 'apt', 'term' => 'term', 'set' => 'set', 'pak' => 'pak', 'bod' => 'bod', 'usi' => 'usi'), 'piece',  ['class'=>'form-control']) }}
                    <small class="text-danger">{{ $errors->first('measurement') }}</small>
                    </div>     
                </div> 
                <div class="col-md-2">
                    <div class="form-group">  
                    {{ Form::label('amount', 'Količina:') }}
                    {{ Form::text('amount', null, ['class' => 'form-control']) }}
                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                    </div>    
                </div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('price', 'Cijena:') }}
                    {{ Form::text('price', null, ['class' => 'form-control']) }}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                    </div>    
                </div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('discount', 'Popust:') }}
                    {{ Form::text('discount', null, ['class' => 'form-control']) }}
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                    </div>    
                </div>
                <div class="col-md-2">
                   <div class="form-group">  
                    {{ Form::label('tax', 'Stopa:') }}
                    {{ Form::text('tax', null, ['class' => 'form-control']) }}
                    <small class="text-danger">{{ $errors->first('tax') }}</small>
                    </div>    
                </div>
                </div>
	            <div class="row">
                    <div class="col-md-12">
                    {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
                    </div>
                </div> 
           {{ Form::close() }}
	    </div>

	 

	    <div class="col-md-5 col-md-offset-1">
	    	    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                <th>Id</th>
                <th>Naslov</th>
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
                    <td>{{ $entry->intro }}</td>
                    <td class="col-md-1">

                        <a href="{{ URL::route('admin.services.edit', array('id' => $entry->id)) }}">
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
                    <p>Želite li obrisati uslugu: {{ $entry->title }}?</p>
                </div>
                <div class="modal-footer">
                       <div class="row">
                        <div class="col-md-7">
                        </div>
                        <div class="col-md-2">
                            {{ Form::open(['method' => 'DELETE', 'route'=>['admin.services.destroy', $entry->id]]) }}
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
	    $(":file").filestyle();
	    $('.editor').summernote({
	    	height: 200
	    });
    	$("#title").stringToSlug();

        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-delete-tag-id-{{ $entry->id }}").click(function() { 
                    $('#delete-tag-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

    	 $('#entries-list').DataTable( 
        	{
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.11/i18n/Croatian.json"
            }
        	})
	});
</script>

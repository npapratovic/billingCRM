<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('CategoryIndex') }}">Pregled svih kategorija</a></li>
    <li class="active">Dodaj kategoriju</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos nove kategorije</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ URL::route('CategoryIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
	    <div class="col-md-4">
	            <div class="form-group">  
	                <label for="title">Naslov kategorije:</label>  
					{{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Naslov kategorije']) }}
					<small class="text-danger">{{ $errors->first('title') }}</small>
	            </div>
	         	<div class="form-group">  
	                <label for="title">Poveznica:</label>  
					{{ Form::text('permalink', isset($entry->permalink) ? $entry->permalink : null, ['class' => 'form-control', 'id' => 'permalink', 'placeholder' => 'Poveznica kategorije']) }}
					<small class="text-danger">{{ $errors->first('permalink') }}</small>
	            </div>    
	            	   <div class="form-group">  
	                <label for="title">Opis:</label>  
					{{ Form::text('description', isset($entry->description) ? $entry->description : null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Opis kategorije']) }}
					<small class="text-danger">{{ $errors->first('description') }}</small>
	            </div>    
	            	<div class="form-group"> 
	        	<label class="col-md-12" for="image">Slika</label>
				{{ Form::file('image', array('class' => 'form-control'))  }}
				@if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
				<small class="text-danger">{{ $errors->first('image') }}</small>
				@endif
	        </div>
	              {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
	    </div>

	    {{ Form::close() }}

	     <div class="col-md-7 col-md-offset-1">
	    	    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                <th>Slika</th>
                <th>Naziv</th>
                <th>Permalink</th>
                <th>Opis</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries['entries']) > 0) 
                @foreach($entries['entries'] as $entry)
                <tr>
                    <td>{{ HTML::image(URL::to('/') . '/uploads/frontend/category/thumbs/' . $entry->image, $entry->title) }}</td>
                    <td>{{ $entry->title }}</td>
                    <td>{{ $entry->permalink }}</td>
                    <td>{{ $entry->description}}</td>
                    <td class="col-md-1">
                                            <a href="{{ URL::route('ClientEdit', array('id' => $entry->id)) }}">
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
 
<script type="text/javascript">
	$(document).ready(function() {
	    $(":file").filestyle();
	    $('.editor').summernote({
	    	height: 200
	    });
    	$("#title").stringToSlug();
	});
</script>
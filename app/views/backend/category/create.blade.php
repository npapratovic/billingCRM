<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ route('admin.categories.index') }}">Pregled svih kategorija</a></li>
    <li class="active">Dodaj kategoriju</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos nove kategorije</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ route('admin.categories.index') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">

        <div class="col-md-5">
            {{ Form::open(['url' => 'admin/categories', 'files' => 'true']) }}
            <div class="form-group">
                {{ Form::label('title', 'Naslov kategorije:') }}
                {{ Form::text('title', null, ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>
            <div class="form-group">
                {{ Form::label('permalink', 'Poveznica:') }}
                {{ Form::text('permalink', null, ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('permalink') }}</small>
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Opis:') }}
                {{ Form::text('description', null, ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('description') }}</small>
            </div>        
            <div class="form-group"> 
                {{ Form::label('image', 'Slika:') }}
                {{ Form::file('image', ['class'=>'form-control'])  }}
                @if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
                <small class="text-danger">{{ $errors->first('image') }}</small>
                @endif
            </div>  
            <div class="row">
                <div class="col-md-12">
                    {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
                </div>
            </div> 
	       {{ Form::close() }}
        </div>

	     <div class="col-md-6 col-md-offset-1">
             <table class="table table-hover" id="entries-list">
                <thead>
                    <tr>
                        <th>Slika</th>
                        <th>Naslov</th>
                        <th>Permalink</th>
                        <th>Kratki opis</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                     @if (count($entries) > 0) 
                        @foreach($entries as $entry)
                        <tr>
                            <td>{{ HTML::image(URL::to('/') . '/uploads/backend/category/' . $entry->image, $entry->title) }}</td>
                            <td>{{ $entry->title }}</td>
                            <td>{{ $entry->permalink }}</td>
                            <td>{{ $entry->description }}</td>
                            <td class="col-md-1"> 
                                <a href="{{ route('admin.categories.edit', $entry->id) }}">
                                    <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                </a> 
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
    	$("#title").stringToSlug();
	});
</script>
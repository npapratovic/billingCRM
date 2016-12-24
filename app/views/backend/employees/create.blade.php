<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ route('admin.employees.index') }}">Pregled svih zaposlenika</a></li>
    <li class="active">Dodaj zaposlenika</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos novog zaposlenika</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ route('admin.employees.index') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">

        <div class="col-md-5">
            {{ Form::open(['url' => 'admin/employees', 'files' => 'true']) }}
            <div class="form-group">
                {{ Form::label('first_name', 'Ime:') }}
                {{ Form::text('first_name', null, ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('first_name') }}</small>
            </div>
            <div class="form-group">
                {{ Form::label('last_name', 'Prezime:') }}
                {{ Form::text('last_name', null, ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('last_name') }}</small>
            </div> 
            <div class="form-group">
                {{ Form::label('region', 'Županija:') }}
                {{ Form::select('region', $regions, null, ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('region') }}</small>
            </div>
            <div class="form-group">
                {{ Form::label('city', 'Grad:') }}
                {{ Form::select('city', $cities, null, ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('city') }}</small>
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Lozinka:') }}
                {{ Form::password('password', ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('password') }}</small>
            </div>
            <div class="form-group">
                {{ Form::label('repeat_password', 'Lozinka ponovo:') }}
                {{ Form::password('repeat_password', ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('repeat_password') }}</small>
            </div>
            <div class="form-group">
                {{ Form::label('email', 'E-mail:') }}
                {{ Form::text('email', null, ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('email') }}</small>
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
 
    </div>
</div>
  

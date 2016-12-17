<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ route('admin.employees.index') }}">Pregled svih korisnika</a></li>
    <li class="active">Dodaj korisnika</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos novog korisnika</h4>
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
            {{ Form::open(['url' => 'admin/employees']) }}
            <div class="form-group">
                {{ Form::label('first_name', 'Ime:') }}
                {{ Form::text('first_name', null, ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('first_name') }}</small>
            </div>
            <div class="form-group">
                {{ Form::label('last_name', 'Prezime:') }}
                {{ Form::text('last_name', null, ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('first_name') }}</small>
            </div>
            <div class="form-group">
                {{ Form::label('email', 'E-mail:') }}
                {{ Form::text('email', null, ['class'=>'form-control']) }}
                <small class="text-danger">{{ $errors->first('first_name') }}</small>
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
  

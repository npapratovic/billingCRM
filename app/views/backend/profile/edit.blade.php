<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li> 
    <li class="active">Uredi profil</li>
</ul>
<div class="panel-heading">
    <div class="row">
        <div class="col-md-10">
            <h4>Uredi profil</h4>
        </div>
        <div class="col-md-2">
            <a href="{{ URL::route('getDashboard') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
        </div>
    </div>
</div>
<div class="panel-body">
	<div class="row">


            {{ Form::model($profile, ['method' => 'PATCH','route'=>['admin.profile.update', $profile->id], 'files' => 'true']) }}
                <div class="col-md-5"> 
                    <div class="form-group">
                        {{ Form::label('first_name', 'Ime:') }}
                        {{ Form::text('first_name', null, ['class'=>'form-control']) }}
                        <small class="text-danger">{{ $errors->first('first_name') }}</small>
                    </div>
                    <div class="form-group">
                        {{ Form::label('region', 'Županija:') }}
                        {{ Form::select('region', $regions, null, ['class'=>'form-control']) }}
                        <small class="text-danger">{{ $errors->first('region') }}</small>
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'E-mail:') }}
                        {{ Form::text('email', null, ['class'=>'form-control']) }}
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('phone', 'Kontakt broj:') }}
                        {{ Form::text('phone', null, ['class'=>'form-control']) }}
                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                    </div>  
                    <div class="form-group">
                        {{ Form::label('consumer_key', 'API ključ:') }}
                        {{ Form::text('consumer_key', null, ['class'=>'form-control']) }}
                        <small class="text-danger">{{ $errors->first('consumer_key') }}</small>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('store_url', 'Adresa webshopa:') }}
                        {{ Form::text('store_url', null, ['class'=>'form-control']) }}
                        <small class="text-danger">{{ $errors->first('store_url') }}</small>
                    </div> 
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::label('last_name', 'Prezime:') }}
                        {{ Form::text('last_name', null, ['class'=>'form-control']) }}
                        <small class="text-danger">{{ $errors->first('last_name') }}</small>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('city', 'Grad:') }}
                        {{ Form::select('city', $cities, null, ['class'=>'form-control']) }}
                        <small class="text-danger">{{ $errors->first('city') }}</small>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('username', 'Korisničko ime:') }}
                        {{ Form::text('username', null, ['class'=>'form-control']) }}
                        <small class="text-danger">{{ $errors->first('username') }}</small>
                    </div> 
                    @if ($profile->image != null || $profile->image != '') 
                    <div class="form-group">
                        <h5> {{ Form::label('image', 'Stara slika:') }}</h5> 
                        {{ HTML::image(URL::to('/') . '/uploads/backend/profile/' . $profile->image, $profile->first_name . ' ' . $profile->last_name) }} 
                    </div> 
                    @endif
                    <div class="form-group"> 
                        {{ Form::label('image', 'Slika:') }}
                        {{ Form::file('image', ['class'=>'form-control'])  }}
                        @if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
                        <small class="text-danger">{{ $errors->first('image') }}</small>
                        @endif
                    </div> 
                    <div class="form-group">
                        {{ Form::label('consumer_secret', 'API lozinka:') }}
                        {{ Form::text('consumer_secret', null, ['class'=>'form-control']) }}
                        <small class="text-danger">{{ $errors->first('consumer_secret') }}</small>
                    </div> 
                </div>
 
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
                    </div>
                </div> 

            </div>
        {{ Form::close() }}


    </div>
</div>
  


    <main>

      <div class="login-block">
        <a class="logo" href="{{ URL::route('getlanding') }}">
       {{ HTML::image('img/frontend/dentist-finder-logo.png', 'Dentist finder je aplikacija za povezivanje pacijenata i zubara') }}
       </a>
        <h1>Registrirajte svoj korisnički račun</h1>

       {{ Form::open(array('route' => 'postRegister', 'autocomplete' => 'on', 'role' => 'form', 'class' => 'form-container')) }}

		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="ti-user"></i></span>
				{{ Form::text('first_name', null, array('id' => 'first_name', 'class' => 'form-control', 'placeholder'=>'Vaše ime', 'required')) }}
				@if (isset($errors) && ($errors->first('first_name') != '' || $errors->first('first_name') != null))
				<p><em>{{ $errors->first('first_name') }}</em></p>
				@endif
			</div>
		</div>

      	<hr class="hr-xs">

  		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="ti-user"></i></span>
				{{ Form::text('last_name', null, array('id' => 'last_name', 'class' => 'form-control', 'placeholder'=>'Vaše prezime', 'required')) }}
				@if (isset($errors) && ($errors->first('last_name') != '' || $errors->first('last_name') != null))
				<p><em>{{ $errors->first('last_name') }}</em></p>
				@endif
			</div>
		</div>

          <hr class="hr-xs">

       	<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="ti-email"></i></span>
				{{ Form::text('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder'=>'Vaš email', 'required')) }}
				@if (isset($errors) && ($errors->first('email') != '' || $errors->first('email') != null))
				<p><em>{{ $errors->first('email') }}</em></p>
				@endif
			</div>
		</div>

 		<hr class="hr-xs">

		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="ti-unlock"></i></span>
				{{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder'=>'Vaša lozinka', 'required')) }}
				@if (isset($errors) && ($errors->first('password') != '' || $errors->first('password') != null))
				<p><em>{{ $errors->first('password') }}</em></p>
				@endif
			</div>
		</div>

      	<hr class="hr-xs">

		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="ti-unlock"></i></span>
				{{ Form::password('repeat_password', array('id' => 'repeat_password', 'class' => 'form-control', 'placeholder'=>'Ponovite lozinku', 'required')) }}
				@if (isset($errors) && ($errors->first('repeat_password') != '' || $errors->first('repeat_password') != null))
				<p><em>{{ $errors->first('repeat_password') }}</em></p>
				@endif
			</div>
		</div>

      	<hr class="hr-xs">

  		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="ti-face-smile"></i></span>
					{{ Form::select('user_group', array('patient' => 'Želim pronaći zubara', 'dentist' => 'Želim pronaći pacijente'), 'patient', array('class'=>'form-control','style'=>'' )) }}
			</div>
		</div>


        {{ Form::button('Registrirajte se', array('class' => 'btn btn-primary btn-block', 'type' => 'submit')) }}

      	{{ Form::close() }}

      </div>

      <div class="login-links">
        <p class="text-center">Već imate račun? <a class="txt-brand" href="{{ URL::route('signin') }}">Prijavite se</a></p>
      </div>

    </main>


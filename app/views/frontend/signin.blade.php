    <main>

      <div class="login-block">
      <a class="logo" href="{{ URL::route('getlanding') }}">
      BillingCRM
       </a>
        <h1>Prijavite se u svoj račun</h1>

       {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}

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

          {{ Form::button('Prijavite se', array('type' => 'submit', 'class' => 'btn btn-primary btn-block')) }}
        {{ Form::close() }}

      </div>

      <div class="login-links">
        <p class="text-center"><a href="{{ URL::route('forgotPassword') }}">Zaboravljena lozinka?</a></p>
       </div>


    </main>

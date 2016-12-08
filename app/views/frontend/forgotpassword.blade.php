

    <main>

      <div class="login-block">
       {{ Form::open(array('route' => 'postRemind', 'autocomplete' => 'on', 'role' => 'form', 'class' => 'form-container')) }}

        <a class="logo" href="{{ URL::route('getlanding') }}">
       BillingCRM
       </a>
        <h1>Zatražite novu lozinku </h1>



        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="ti-email"></i></span>
            {{ Form::text('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder'=>'Vaš email', 'required')) }}
            @if (isset($errors) && ($errors->first('email') != '' || $errors->first('email') != null))
            <p><em>{{ $errors->first('email') }}</em></p>
            @endif
          </div>
        </div>

          {{ Form::button('Pošalji link za povrat lozinke', array('class' => 'btn btn-primary btn-block', 'type' => 'submit')) }}

        {{ Form::close() }}

      </div>

      <div class="login-links">
        <p class="text-center"><a href="{{ URL::route('signin') }}">Nazad na prijavu</a></p>
      </div>

    </main>

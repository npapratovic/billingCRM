<?php
/*
 *  Frontend template file
 *
 *  Contains variables for content input
 *  - $title        - string  - Page title, for <title> and og:title (if not default)
 *  - $css_files      - array - list of additional CSS files
 *  - $js_header_files  - array - list of additional JS files
 *  - $js_footer_files  - array - list of additional JS files
 *  - $body_content   - boolean - false if body tag should be empty of HTML tags, except
 *                      footer JS and Google Analytics
 */
?>

<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" class="no-js">

<head>
    <meta charset="UTF-8">


  <title>Postavljanje nove lozinke </title>

  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


    <meta name="description" content="Postavljanje nove lozinke ">


    <meta name="keywords" content="Postavljanje nove lozinke ">

  <meta name="author" content="Culex d.o.o., info@culex.hr">

  <link rel="icon" href="{{ URL::asset('favicon.png') }}">

  <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('favicon.png') }}">

  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('favicon.png') }}">

  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('favicon.png') }}">

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('favicon.png') }}">

    <!-- App js -->

  {{ HTML::script('js/frontend/app.min.js') }}

    <!-- Styles -->

  {{ HTML::style('css/frontend/app.min.css') }}
  {{ HTML::style('css/frontend/custom.css') }}

    <!-- Fonts -->

    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

  {{-- Loop that implements additional CSS for a module and/or view --}}
  @if (isset($css_files) && is_array($css_files))
    @foreach  ($css_files as $css_file)
  {{ HTML::style($css_file) }}
    @endforeach
  @endif

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->



  {{-- Loads default path to a JS variable (no trailing slash) --}}
  <script>
  var rootPath = "{{{ url('/') }}}";
  </script>


  {{-- Loop that implements additional header JS for a module and/or view --}}
  @if (isset($js_header_files) && is_array($js_header_files))
    @foreach ($js_header_files as $js_file)
  {{ HTML::script($js_file) }}
    @endforeach
  @endif

</head>



<body class="login-page">


    <main>

      <div class="login-block">
       {{ Form::open(array('route' => 'postReset', 'autocomplete' => 'off', 'role' => 'form', 'class' => 'form-container')) }}

        <a class="logo" href="{{ URL::route('getlanding') }}">
       {{ HTML::image('img/frontend/dentist-finder-logo.png', 'Zdravizub.hr je aplikacija za povezivanje pacijenata i zubara') }}
       </a>
        <h1>Postavite novu lozinku za vaš račun: </h1>

          <input type="hidden" name="token" value="{{ $token }}">

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
              {{ Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder'=>'Ponovite lozinku', 'required')) }}
              @if (isset($errors) && ($errors->first('password_confirmation') != '' || $errors->first('password_confirmation') != null))
              <p><em>{{ $errors->first('password_confirmation') }}</em></p>
              @endif
            </div>
          </div>

        <hr class="hr-xs">

          {{ Form::button('Postavite lozinku', array('class' => 'btn btn-primary btn-block', 'type' => 'submit')) }}

        {{ Form::close() }}


      </div>

      <div class="login-links">
        <p class="text-center"><a href="{{ URL::route('signin') }}">Nazad na prijavu</a></p>
      </div>

    </main>


  {{ HTML::script('js/frontend/custom.js') }}
  {{ HTML::script('js/backend/jquery.noty.packaged.min.js') }}
  {{ HTML::script('js/backend/noty.app.theme.js') }}

  @if (Session::has('message'))
  <script>
  var n = noty({
    text: '{{{ Session::get('message') }}}',
    type: 'alert', // Alert, Success, Error, Warning, Information, Confirm
    theme: 'app', // or 'defaultTheme'
    layout: 'bottomRight', // top - topLeft - topCenter - topRight - center - centerLeft - centerRight - bottom - bottomLeft - bottomCenter - bottomRight
    animation: {
      open: 'animated bounceInUp',
      close: 'animated bounceOutDown',
    }
  });
  </script>
  @endif

  @if (Session::has('error_message'))
  <script>
  var n = noty({
    text: '{{{ Session::get('error_message') }}}',
    type: 'error',
    theme: 'app',
    layout: 'bottomRight',
    animation: {
      open: 'animated bounceInUp',
      close: 'animated bounceOutDown',
    }
  });
  </script>
  @endif

  @if (Session::has('info_message'))
  <script>
  var n = noty({
    text: '{{{ Session::get('info_message') }}}',
    type: 'information',
    theme: 'app',
    layout: 'bottomRight',
    animation: {
      open: 'animated bounceInUp',
      close: 'animated bounceOutDown',
    }
  });
  </script>
  @endif

  @if (Session::has('warning_message'))
  <script>
  var n = noty({
    text: '{{{ Session::get('warning_message') }}}',
    type: 'warning',
    theme: 'app',
    layout: 'bottomRight',
    animation: {
      open: 'animated bounceInUp',
      close: 'animated bounceOutDown',
    }
  });
  </script>
  @endif

  @if (Session::has('success_message'))
  <script>
  var n = noty({
    text: '{{{ Session::get('success_message') }}}',
    type: 'success',
    theme: 'app',
    layout: 'bottomRight',
    animation: {
      open: 'animated bounceInUp',
      close: 'animated bounceOutDown',
    }
  });
  </script>
  @endif


    {{-- Loop that implements additional footer JS for a module or specific view --}}
  @if (isset($js_footer_files) && is_array($js_footer_files))
    @foreach ($js_footer_files as $js_file)
    {{ HTML::script($js_file) }}
    @endforeach
  @endif


</body>

</html>









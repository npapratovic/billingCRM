<?php
/*
 *	Master template file
 *
 *	Contains variables for content input
 *	-	$title				-	string	-	Page title, for <title> and og:title (if not default)
 *	-	$css_files			-	array	-	list of additional CSS files
 *	-	$js_header_files	-	array	-	list of additional JS files
 *	-	$js_footer_files	-	array	-	list of additional JS files
 *	-	$body_content		-	boolean -	false if body tag should be empty of HTML tags, except
 *											footer JS and Google Analytics
 */
?>

<!DOCTYPE html>

<!--

Hi.

If you are looking for developers of this website, thank you for you interest.

More details about us can be found on our official website: http://www.shopcentar.hr/

-->

<html lang="{{ App::getLocale() }}" class="no-js">

<head>
    <meta charset="UTF-8">

	<?php
		if (isset($title))
		{
			$final_title = $title;
		}
		else
		{
			$final_title = Lang::get('core.app_title');
		}
	?>

	<title>{{ $final_title }}</title>

	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <meta name="description" content="BillingCRM">

    <meta name="keywords" content="BillingCRM">

 	<meta name="author" content="S.H.O.P. CENTAR d.o.o.">

	<link rel="icon" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('favicon.png') }}">

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('favicon.png') }}">

    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	{{-- Load the Modernizr before everything, for feature detection --}}
	{{ HTML::script('js/backend/modernizr.js') }}

	<!-- select2 4.0.3 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!-- bootstrap 3.0.2 -->

	{{ HTML::style('css/backend/bootstrap.min.css') }}

    <!-- font Awesome -->

	{{ HTML::style('css/backend/font-awesome.min.css') }}

    <!-- Ionicons -->

	{{ HTML::style('css/backend/ionicons.min.css') }}

	<!--- pickmeup.css  -->

	{{ HTML::style('css/backend/pickmeup.css') }}


    <!-- google font -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    <!-- Theme style -->

	{{ HTML::style('css/backend/style.css') }}

    <!-- Custom style -->

	{{ HTML::style('css/backend/custom.css') }}


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

	{{ HTML::script('js/backend/jquery.noty.packaged.min.js') }}
	{{ HTML::script('js/backend/noty.app.theme.js') }}

 	{{ HTML::script('js/backend/jquery.pickmeup.js') }}


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

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <header class="header green-border">
        <a href="{{ URL::route('getDashboard') }}" class="logo">
           billing<span style="font-weight: 900">CRM</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">

            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        {{ HTML::image('favicon.png', '', array('class' => 'img-circle')) }}
                    </div>
                    <div class="pull-left info">
                        <p>Bok, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                    
                    </div>
                </div>
 
                <ul class="sidebar-menu">
                    <li>
                        <a href="{{ URL::route('getDashboard') }}">
                            <i class="fa fa-dashboard"></i> <span>Početna</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Postavke</span>  <i class="fa fa-angle-down" style="float: right;"></i></span> 
                        </a>
                        <ul class="treeview-menu">
                              <li>
                                    <a href="{{ URL::route('ProfileIndex') }}">
                                        <i class="fa fa-user" aria-hidden="true"></i>Uredi profil
                                    </a>
                              </li>
                              <li>
                                    <a href="#">
                                        <i class="fa fa-unlock" aria-hidden="true"></i>Postavke aplikacije
                                    </a>
                              </li>
                              <li>
                                    <a href="{{ URL::route('CompanyIndex') }}">
                                        <i class="fa fa-building" aria-hidden="true"></i>Moja tvrtka
                                    </a>
                               </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Korisnici</span>
                        </a>
                    </li>
                    <hr>
                    <li class="treeview">
                        <a href="#">
                          <i class="fa fa-tasks" aria-hidden="true"></i><span>Proizvodi</span>  <i class="fa fa-angle-down" style="float: right;"></i></span> 
                        </a>
                        <ul class="treeview-menu">
                                <li>
                                    <a href="{{ URL::route('ProductCreate') }}">
                                       <i class="fa fa-plus-circle" aria-hidden="true"></i><span>Novi proizvod</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('ProductIndex') }}"> 
                                      <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Katalog proizvoda</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('CategoryIndex') }}">
                                        <i class="fa fa-th-list"></i><span>Kategorije proizvoda</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('TagIndex') }}">
                                        <i class="fa fa-tags"></i><span>Oznake proizvoda</span>
                                    </a>
                                </li> 
                                <li>
                                    <a href="{{ URL::route('AttributeIndex') }}">
                                      <i class="fa fa-bookmark-o" aria-hidden="true"></i><span>Atributi proizvoda</span>
                                    </a>
                                </li>

                        </ul>
                    </li>  
                    <li class="treeview">
                        <a href="#">
                          <i class="fa fa-cloud" aria-hidden="true"></i><span>Usluge</span>  <i class="fa fa-angle-down" style="float: right;"></i></span> 
                        </a>
                        <ul class="treeview-menu">
                                <li>
                                    <a href="{{ URL::route('ServiceCreate') }}">
                                       <i class="fa fa-plus-circle" aria-hidden="true"></i><span>Nova usluga</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('ServiceIndex') }}"> 
                                      <i class="fa fa-bar-chart" aria-hidden="true"></i><span>Katalog usluga</span>
                                    </a>
                                </li> 
                        </ul>
                    </li> 
                    <li class="treeview">
                        <a href="#">
                          <i class="fa fa-users" aria-hidden="true"></i><span>Klijenti</span>  <i class="fa fa-angle-down" style="float: right;"></i></span> 
                        </a>
                        <ul class="treeview-menu">
                                <li>
                                    <a href="{{ URL::route('ClientCreate') }}">
                                       <i class="fa fa-plus-circle" aria-hidden="true"></i><span>Novi klijent</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('ClientIndex') }}"> 
                                      <i class="fa fa-bar-chart" aria-hidden="true"></i><span>Popis klijenata </span>
                                    </a>
                                </li> 
                        </ul>
                    </li>  
                    <hr> 
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-wordpress"></i> <span>WpApi</span>  <i class="fa fa-angle-down" style="float: right;"></i></span> 
                        </a>
                        <ul class="treeview-menu">
                              <li>
                                    <a href="{{ URL::route('WpApiProducts') }}">
                                        <i class="fa fa-tasks" aria-hidden="true"></i>Proizvodi
                                    </a>
                              </li>
                              <li>
                                    <a href="{{ URL::route('WpApiOrders') }}">
                                        <i class="fa fa-truck" aria-hidden="true"></i>Narudžbe
                                    </a>
                              </li>
                              <li>
                                    <a href="{{ URL::route('WpApiCustomers') }}">
                                        <i class="fa fa-users" aria-hidden="true"></i>Klijenti
                                    </a>
                               </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ URL::route('OrderIndex') }}">
                           <i class="fa fa-truck" aria-hidden="true"></i>Narudžbe</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('OfferIndex') }}">
                            <i class="fa fa-certificate" aria-hidden="true"></i><span>Ponude</span>
                        </a>
                    </li> 
                     <li>
                        <a href="{{ URL::route('InvoiceIndex') }}">
                            <i class="fa fa-ticket" aria-hidden1="true"></i><span>Računi</span>
                        </a>
                    </li> 
                    <li>
                        <a href="{{ URL::route('DispatchIndex') }}">
                            <i class="fa fa-certificate" aria-hidden="true"></i><span>Otpremnice</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('WorkingOrderIndex') }}">
                            <i class="fa fa-certificate" aria-hidden="true"></i><span>Radni nalozi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('NarudzbeniceIndex') }}">
                            <i class="fa fa-ticket" aria-hidden1="true"></i><span>Narudžbenice</span>
                        </a>
                    </li>
                    <hr> 
                    <li class="treeview">
                        <a href="#">
                          <i class="fa fa-trash" aria-hidden="true"></i><span>Smeće</span>  <i class="fa fa-angle-down" style="float: right;"></i></span> 
                        </a>
                        <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#">
                          <i class="fa fa-tasks" aria-hidden="true"></i><span>Proizvodi</span>  <i class="fa fa-angle-down" style="float: right;"></i></span> 
                        </a>
                        <ul class="treeview-menu">
                                <li>
                                    <a href="{{ URL::route('TrashIndex', 'products') }}"> 
                                      <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Katalog proizvoda</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('TrashIndex', 'productcategories') }}">
                                        <i class="fa fa-th-list"></i><span>Kategorije proizvoda</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('TrashIndex', 'producttags') }}">
                                        <i class="fa fa-tags"></i><span>Oznake proizvoda</span>
                                    </a>
                                </li> 
                                <li>
                                    <a href="{{ URL::route('TrashIndex', 'productattributes') }}">
                                      <i class="fa fa-bookmark-o" aria-hidden="true"></i><span>Atributi proizvoda</span>
                                    </a>
                                </li>

                        </ul>
                    </li>  
                    <li>
                        <a href="{{ URL::route('TrashIndex', 'services') }}">
                           <i class="fa fa-cloud" aria-hidden="true"></i>Usluge</span>
                        </a>
                    </li>
                     <li>
                        <a href="{{ URL::route('TrashIndex', 'clients') }}">
                           <i class="fa fa-users" aria-hidden="true"></i>Klijenti</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('TrashIndex', 'orders') }}">
                           <i class="fa fa-truck" aria-hidden="true"></i>Narudžbe</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('TrashIndex', 'offers') }}">
                            <i class="fa fa-certificate" aria-hidden="true"></i><span>Ponude</span>
                        </a>
                    </li> 
                     <li>
                        <a href="{{ URL::route('TrashIndex', 'invoices') }}">
                            <i class="fa fa-ticket" aria-hidden1="true"></i><span>Računi</span>
                        </a>
                    </li> 
                    <li>
                        <a href="{{ URL::route('TrashIndex', 'dispatches') }}">
                            <i class="fa fa-certificate" aria-hidden="true"></i><span>Otpremnice</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('TrashIndex', 'workingorders') }}">
                            <i class="fa fa-certificate" aria-hidden="true"></i><span>Radni nalozi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route('TrashIndex', 'narudzbenice') }}">
                            <i class="fa fa-ticket" aria-hidden1="true"></i><span>Narudžbenice</span>
                        </a>
                    </li>
                        </ul>
                    </li>  
                    <hr>
                 	<li>
                        <a href="{{ URL::route('signout') }}">
                            <i class="fa fa-sign-out"></i><span>Odjava</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content">

	          	<!-- Your Page Content Here -->

					{{ $content or null }}

 				<!-- End page content  -->

            </section>
            <!-- /.content -->

        </aside>
        <!-- /.right-side -->

       	<footer>
	      	<div class="row">
	            <div class="footer-main">
	                Copyright &copy S.H.O.P. CENTAR d.o.o., 2016 
	            </div>
	        </div>
		</footer>

    </div>

    <!-- ./wrapper -->





    <!-- Le javascript -->


 	<!-- App js -->

 	{{ HTML::script('js/backend/app.js') }}


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

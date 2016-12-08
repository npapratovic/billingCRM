
<div class="container">
<div class="row"> 


<h1 style="text-align: center;">BillingCRM</h1>


    @if (Auth::guest())
    <div class="text-center">
      <a class="btn btn-sm btn-primary" href="{{ URL::route('signin') }}">Prijava</a> 
    </div>
    @endif

    @if (!Auth::guest()) 
        <p class="text-center"> Dobro došli, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        <p class="text-center">
          <a href="{{ URL::route('getDashboard') }}">Administracija</a> <br />
          <a href="{{ URL::route('signout') }}">Odjava</a> 
        </p>
    @endif
  </div>
</div>


<html>

	<head>
   			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 		<title>Izdavanje ponude {{ $offersdata['0']['offer']->id }}</title>
			<style>
			body {
				font-size: 12px;
				font-weight: normal !important;
			    font-family: DejaVu Sans;
			}
			b {
				font-weight: bold !important;
			}
		      h3 {
		      	font-weight: bold;
		      }
   			</style>
	</head>
	
<body>
   	<table style="width:100%;" id="pdfreport">
    <tbody>
        <tr>
            <td style="width:200px;">
                <h3>
                    <img src="favicon.png" width="200" height="auto" />
                </h3>
            </td>
            <td style="width:300px;">
                <h3>BillingCRM</h3>
            </td>
            <td>

                <h4 style="text-align:right; color:#808080;">Današnji datum: {{ $currdate }}</h4>
            </td>
        </tr>
    </tbody>
</table>
<hr style="color:#ddd;">
<table style="width:100%;">
    <tbody>
        <tr>
            <td style="color:#595959;">Izdavatelj</td>
            <td style="color:#595959;">Klijent</td>
            <td style="color:#595959;">Broj ponude #{{ $offersdata['0']['offer']->offer_number}} </td>
        </tr>
        <tr>
            <td style="color:#000000;">{{ $offersdata['0']['employeeinfo']->first_name }} {{ $offersdata['0']['employeeinfo']->last_name }}</td>
            <td style="color:#000000;">{{ $offersdata['0']['offer']->first_name }} {{ $offersdata['0']['offer']->last_name }}</td>
            <td style="color:#595959;">Datum izdavanja ponude: {{ date('d.m.Y', strtotime($offersdata['0']['offer']->offer_start))}}</td>
            <td></td>
        </tr>
        <tr>
            <td style="color:#595959;">{{ $offersdata['0']['employeeinfo']->address }}</td>
            <td style="color:#595959;">{{ $offersdata['0']['offer']->address }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Hrvatska, {{ $offersdata['0']['employeeinfo']->zip }} {{ $offersdata['0']['employeeinfo']->cityname }}</td>
            <td style="color:#595959;">Hrvatska, {{ $offersdata['0']['offer']->zip }} {{ $offersdata['0']['offer']->cityname }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Telefon: {{ $offersdata['0']['employeeinfo']->phone }}</td>
            <td style="color:#595959;">Telefon: {{ $offersdata['0']['offer']->phone }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Email: {{ $offersdata['0']['employeeinfo']->email }}</td>
            <td style="color:#595959;">Email: {{ $offersdata['0']['offer']->email }}</td>
        </tr>
    </tbody>
</table>
<br>
<br>
<table style="width:100%;">
    <thead>
        <tr style="background:#ddd;">
            <th style="color:#595959; text-align:left;">Proizvod</th>
            <th style="color:#595959;">Cijena</th>
            <th style="color:#595959;">Popust</th>
            <th style="color:#595959;">Stopa</th>
            <th style="color:#595959;">Količina</th>
            <th style="color:#595959;">Ukupna cijena po proizvodu</th>
        </tr>
    </thead>
    <tbody>

    @foreach($productsperoffer as $singleproduct)
        <tr>
            <td style="text-align:left;">{{ $singleproduct['productServices'][0]->title }}</td>
            <td style="text-align:center;">{{ $singleproduct->price }} kn</td>
            <td style="text-align:center;">{{ $singleproduct->discount }} %</td>
            <td style="text-align:center;">{{ $singleproduct->taxpercent }} %</td>
            <td style="text-align:center;">{{ $singleproduct->amount }}</td> 
            <td style="text-align:center;">{{ number_format(($singleproduct->price * ( 1 - ($singleproduct->discount / 100)) * $singleproduct->amount) * ( 1 + ($singleproduct->taxpercent / 100)), 2, '.', ',') }} kn</td> 
        </tr>
        @endforeach
    </tbody>
</table>
<br>
<br>
<table style="width:100%;">
    <tbody>
        <tr style="background:#ddd;">
            <td style="color:#595959; width:400px;">Način plaćanja</td>
            <td style="color:#595959; text-align:right;"></td>
        </tr>
        <tr>
            @if($offersdata['0']['offer']->payment_way == 'virman')
                <td>Virman (bankovna transakcija)</td>
            @elseif($offersdata['0']['offer']->payment_way == 'preuzimanje')
                <td>Po preuzimanju</td>
            @elseif($offersdata['0']['offer']->payment_way == 'kartica')
                <td>Kartično plaćanje</td>
            @elseif($offersdata['0']['offer']->payment_way == 'paypal')
                <td>PayPal</td>
            @endif
            <td>
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td>Ukupno:</td>
                            <td style="text-align: right;">{{ $offersdata['0']['totalprice'] }} kn</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

</body> 
</html>
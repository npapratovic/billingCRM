<html>

	<head>
   			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 		<title>Izdavanje ponude {{ $offersdata['0']['offer']['entry']->id }}</title>
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
            <td style="color:#595959;">Broj ponude #{{ $offersdata['0']['offer']['entry']->offer_number}} </td>
        </tr>
        <tr>
            <td style="color:#000000;">{{ $offersdata['0']['employeeinfo']->first_name }} {{ $offersdata['0']['employeeinfo']->last_name }}</td>
            <td style="color:#000000;">{{ $offersdata['0']['offer']['entry']->first_name }} {{ $offersdata['0']['offer']['entry']->last_name }}</td>
            <td style="color:#595959;">Datum izdavanja ponude: {{ date('d.m.Y', strtotime($offersdata['0']['offer']['entry']->offer_start))}}</td>
            <td></td>
        </tr>
        <tr>
            <td style="color:#595959;">{{ $offersdata['0']['employeeinfo']->address }}</td>
            <td style="color:#595959;">{{ $offersdata['0']['offer']['entry']->address }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Hrvatska, {{ $offersdata['0']['employeeinfo']->zip }} {{ $offersdata['0']['employeeinfo']->cityname }}</td>
            <td style="color:#595959;">Hrvatska, {{ $offersdata['0']['offer']['entry']->zip }} {{ $offersdata['0']['offer']['entry']->cityname }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Telefon: {{ $offersdata['0']['employeeinfo']->phone }}</td>
            <td style="color:#595959;">Telefon: {{ $offersdata['0']['offer']['entry']->phone }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Email: {{ $offersdata['0']['employeeinfo']->email }}</td>
            <td style="color:#595959;">Email: {{ $offersdata['0']['offer']['entry']->email }}</td>
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
            <th style="color:#595959;">Količina</th>
            <th style="color:#595959;">Ukupna cijena po proizvodu</th>
        </tr>
    </thead>
    <tbody>

    @foreach($productsperoffer['offerbycustomer'] as $singleproduct)
        <tr>
            <td style="text-align:left;">{{ $singleproduct->productname }}</td>
            <td style="text-align:center;">{{ $singleproduct->price }} kn</td>
            <td style="text-align:center;">{{ $singleproduct->amount }}</td> 
            <td style="text-align:center;">{{ $singleproduct->price * $singleproduct->amount }} kn</td> 
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
            @if($offersdata['0']['offer']['entry']->payment_way == 'virman')
                <td>Virman (bankovna transakcija)</td>
            @elseif($offersdata['0']['offer']['entry']->payment_way == 'preuzimanje')
                <td>Po preuzimanju</td>
            @elseif($offersdata['0']['offer']['entry']->payment_way == 'kartica')
                <td>Kartično plaćanje</td>
            @elseif($offersdata['0']['offer']['entry']->payment_way == 'paypal')
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
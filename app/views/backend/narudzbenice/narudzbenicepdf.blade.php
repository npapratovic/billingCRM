<html>

	<head>
   			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 		<title>Izdavanje narudžbenice {{ $narudzbeniceData['0']['narudzbenice']->narudzbenica_number }}</title>
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
            <td style="color:#595959;">Broj narudžbenice #{{ $narudzbeniceData['0']['narudzbenice']->narudzbenica_number}} </td>
        </tr>
        <tr>
            <td style="color:#000000;">{{ $narudzbeniceData['0']['employeeinfo']->first_name }} {{ $narudzbeniceData['0']['employeeinfo']->last_name }}</td>
            <td style="color:#000000;">{{ $narudzbeniceData['0']['narudzbenice']->client->first_name }} {{ $narudzbeniceData['0']['narudzbenice']->client->last_name }}</td>
            <td style="color:#595959;">Datum izdavanja narudžbenice: {{ date('d.m.Y', strtotime($narudzbeniceData['0']['narudzbenice']->narudzbenica_start))}}</td>
            <td></td>
        </tr>
        <tr>
            <td style="color:#595959;">{{ $narudzbeniceData['0']['employeeinfo']->address }}</td>
            <td style="color:#595959;">{{ $narudzbeniceData['0']['narudzbenice']->client->address }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Hrvatska, {{ $narudzbeniceData['0']['employeeinfo']->zip }} {{ $narudzbeniceData['0']['employeeinfo']->cityname }}</td>
            <td style="color:#595959;">Hrvatska, {{ $narudzbeniceData['0']['narudzbenice']->client->zip }} {{ $narudzbeniceData['0']['narudzbenice']->client->cityname }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Telefon: {{ $narudzbeniceData['0']['employeeinfo']->phone }}</td>
            <td style="color:#595959;">Telefon: {{ $narudzbeniceData['0']['narudzbenice']->client->phone }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Email: {{ $narudzbeniceData['0']['employeeinfo']->email }}</td>
            <td style="color:#595959;">Email: {{ $narudzbeniceData['0']['narudzbenice']->client->email }}</td>
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
    @foreach($productspernarudzbenice as $singleproduct)
            <tr>
            <td style="text-align:left;">{{ $singleproduct->products->title }}</td>
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
            @if($narudzbeniceData['0']['narudzbenice']->payment_way == 'virman')
                <td>Virman (bankovna transakcija)</td>
            @elseif($narudzbeniceData['0']['narudzbenice']->payment_way == 'preuzimanje')
            <td>Po preuzimanju</td>
            @elseif($narudzbeniceData['0']['narudzbenice']->payment_way == 'kartica')
            <td>Kartično plaćanje</td>
            @elseif($narudzbeniceData['0']['narudzbenice']->payment_way == 'paypal')
            <td>PayPal</td>
            @endif
            <td>
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td>Ukupno:</td>
                            <td style="text-align: right;">{{ $narudzbeniceData['0']['totalprice'] }} kn</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

</body> 
</html>
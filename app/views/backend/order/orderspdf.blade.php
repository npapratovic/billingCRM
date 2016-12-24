<html>

	<head>
   			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 		<title>Izdavanje narudžbe {{ $ordersdata['0']['order']->order_id }}</title>
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
            <td style="color:#595959;">Broj narudžbe #{{ $ordersdata['0']['order']->order_id}} </td>
        </tr>
        <tr>
            <td style="color:#000000;">{{ $ordersdata['0']['employeeinfo']->first_name }} {{ $ordersdata['0']['employeeinfo']->last_name }}</td>
            <td style="color:#000000;">{{ $ordersdata['0']['order']->first_name }} {{ $ordersdata['0']['order']->last_name }}</td>
            <td style="color:#595959;">Datum izdavanja narudžbe: {{ date('d.m.Y', strtotime($ordersdata['0']['order']->order_date))}}</td>
            <td></td>
        </tr>
        <tr>
            <td style="color:#595959;">{{ $ordersdata['0']['employeeinfo']->address }}</td>
            <td style="color:#595959;">{{ $ordersdata['0']['order']->billing_address }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Hrvatska, {{ $ordersdata['0']['employeeinfo']->zip }} {{ $ordersdata['0']['employeeinfo']->cityname }}</td>
            <td style="color:#595959;">Hrvatska, {{ $ordersdata['0']['order']->zip }} {{ $ordersdata['0']['order']->cityname }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Telefon: {{ $ordersdata['0']['employeeinfo']->phone }}</td>
            <td style="color:#595959;">Telefon: {{ $ordersdata['0']['order']->phone }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Email: {{ $ordersdata['0']['employeeinfo']->email }}</td>
            <td style="color:#595959;">Email: {{ $ordersdata['0']['order']->email }}</td>
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
            <th style="color:#595959;">Ukupna cijena</th>
        </tr>
    </thead>
    <tbody>

     @if($ordersdata[0]['order']->show_only == '1')
      @foreach($productsperorder as $singleproduct)
        <tr>
            <td style="text-align:left;">{{ $singleproduct['importedOrderProducts'][0]->name }}</td>
            <td style="text-align:center;">{{ $singleproduct->price }} kn</td>
            <td style="text-align:center;">{{ $singleproduct->quantity }}</td> 
            <td style="text-align:center;">{{ $singleproduct->price * $singleproduct->quantity }} kn</td> 
        </tr>
        @endforeach
     @else
      @foreach($productsperorder as $singleproduct)
        <tr>
            <td style="text-align:left;">{{ $singleproduct['productServices'][0]->title }}</td>
            <td style="text-align:center;">{{ $singleproduct->price }} kn</td>
            <td style="text-align:center;">{{ $singleproduct->quantity }}</td> 
            <td style="text-align:center;">{{ $singleproduct->price * $singleproduct->quantity }} kn</td> 
        </tr>
        @endforeach
     @endif
   
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
        @if($ordersdata['0']['order']->payment_way == 'virman')
            <td>Virman (bankovna transakcija)</td>
        @elseif($ordersdata['0']['order']->payment_way == 'preuzimanje')
        <td>Po preuzimanju</td>
        @elseif($ordersdata['0']['order']->payment_way == 'kartica')
        <td>Kartično plaćanje</td>
        @elseif($ordersdata['0']['order']->payment_way == 'paypal')
        <td>PayPal</td>
        @endif
        @if($ordersdata['0']['order']->show_only == '1')
        <td>{{ $ordersdata['0']['order']->shipping_way }}
        @endif
            <td>
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td>Ukupno:</td>
                            <td style="text-align: right;">{{ $ordersdata['0']['totalprice'] }} kn</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

</body> 
</html>
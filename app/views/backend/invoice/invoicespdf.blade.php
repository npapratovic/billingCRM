<html>

	<head>
   			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 		<title>Izdavanje računa {{ $invoicesdata['0']['invoice']->invoice_number }}</title>
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
            <td style="color:#595959;">Broj računa #{{ $invoicesdata['0']['invoice']->invoice_number}} </td>
        </tr>
        <tr>
            <td style="color:#000000;">{{ $invoicesdata['0']['employeeinfo']->first_name }} {{ $invoicesdata['0']['employeeinfo']->last_name }}</td>
            <td style="color:#000000;">{{ $invoicesdata['0']['invoice']->first_name }} {{ $invoicesdata['0']['invoice']->last_name }}</td>
            <td style="color:#595959;">Datum izdavanja računa: {{ date('d.m.Y', strtotime($invoicesdata['0']['invoice']->invoice_date))}}</td>
            <td></td>
        </tr>
        <tr>
            <td style="color:#595959;">{{ $invoicesdata['0']['employeeinfo']->address }}</td>
            <td style="color:#595959;">{{ $invoicesdata['0']['invoice']->address }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Hrvatska, {{ $invoicesdata['0']['employeeinfo']->zip }} {{ $invoicesdata['0']['employeeinfo']->cityname }}</td>
            <td style="color:#595959;">Hrvatska, {{ $invoicesdata['0']['invoice']->zip }} {{ $invoicesdata['0']['invoice']->cityname }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Telefon: {{ $invoicesdata['0']['employeeinfo']->phone }}</td>
            <td style="color:#595959;">Telefon: {{ $invoicesdata['0']['invoice']->phone }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Email: {{ $invoicesdata['0']['employeeinfo']->email }}</td>
            <td style="color:#595959;">Email: {{ $invoicesdata['0']['invoice']->email }}</td>
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
            <th style="color:#595959;">Popust</th>
            <th style="color:#595959;">Stopa</th>
            <th style="color:#595959;">Cijena s popustom</th>
            <th style="color:#595959;">Ukupna cijena po proizvodu</th>
        </tr>
    </thead>
    <tbody>
    @if($imported != '0')
    @foreach($imported as $singleproduct)
   
        <tr>
            <td style="text-align:left;">{{ $singleproduct['importedOrders'][0]->name }}</td>
            <td style="text-align:center;">{{ $singleproduct['importedOrders'][0]->price }} kn</td>
            <td style="text-align:center;">{{ $singleproduct->amount }}</td> 
            <td style="text-align:center;">{{ $singleproduct->discount }}%</td>
            <td style="text-align:center;">{{ $singleproduct->taxpercent }}%</td>  
            <td style="text-align:center;">{{ number_format($singleproduct['importedOrders'][0]->price - ($singleproduct['importedOrders'][0]->price * ($singleproduct->taxpercent / 100)), 2, '.', ',') }} kn</td> 
            <td style="text-align:center;">{{ number_format(($singleproduct['importedOrders'][0]->price * ( 1 - ($singleproduct->discount / 100)) * $singleproduct->amount) * ( 1 + ($singleproduct->taxpercent / 100)), 2, '.', ',') }} kn</td> 
        </tr>
        @endforeach
    @endif
    @foreach($productsperinvoice as $singleproduct)
        <tr>
            <td style="text-align:left;">{{ $singleproduct['productServices'][0]->title }}</td>
            <td style="text-align:center;">{{ $singleproduct->price }} kn</td>
            <td style="text-align:center;">{{ $singleproduct->amount }}</td>
            <td style="text-align:center;">{{ $singleproduct->discount }}%</td>  
            <td style="text-align:center;">{{ $singleproduct->taxpercent }}%</td> 
            <td style="text-align:center;">{{ number_format($singleproduct->price - ($singleproduct->price * ($singleproduct->taxpercent / 100)), 2, '.', ',') }} kn</td> 
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
            @if($invoicesdata['0']['invoice']->payment_way == 'virman')
                <td>Virman (bankovna transakcija)</td>
            @elseif($invoicesdata['0']['invoice']->payment_way == 'preuzimanje')
            <td>Po preuzimanju</td>
            @elseif($invoicesdata['0']['invoice']->payment_way == 'kartica')
            <td>Kartično plaćanje</td>
            @elseif($invoicesdata['0']['invoice']->payment_way == 'paypal')
            <td>PayPal</td>
            @endif
            @if($invoicesdata['0']['invoice']->from_order == '1')
            <td>{{ $invoicesdata['0']['invoice']->payment_way}}</td>
            @endif
            <td>
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td>Ukupno:</td>
                            <td style="text-align: right;">{{ $invoicesdata['0']['totalprice'] }} kn</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

</body> 
</html>
<html>

	<head>
   			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 		<title>Izdavanje otpremnice {{ $dispatchdata['0']['dispatch']['entry']->dispatch_number }}</title>
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
            <td style="color:#595959;">Broj otpremnice #{{ $dispatchdata['0']['dispatch']['entry']->dispatch_number}} </td>
        </tr>
        <tr>
            <td style="color:#000000;">{{ $dispatchdata['0']['employeeinfo']->first_name }} {{ $dispatchdata['0']['employeeinfo']->last_name }}</td>
            <td style="color:#000000;">{{ $dispatchdata['0']['dispatch']['entry']->first_name }} {{ $dispatchdata['0']['dispatch']['entry']->last_name }}</td>
            <td style="color:#595959;">Datum izdavanja otpremnice: {{ date('d.m.Y', strtotime($dispatchdata['0']['dispatch']['entry']->dispatch_date_ship))}}</td>
            <td></td>
        </tr>
        <tr>
            <td style="color:#595959;">{{ $dispatchdata['0']['employeeinfo']->address }}</td>
            <td style="color:#595959;">{{ $dispatchdata['0']['dispatch']['entry']->address }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Hrvatska, {{ $dispatchdata['0']['employeeinfo']->zip }} {{ $dispatchdata['0']['employeeinfo']->cityname }}</td>
            <td style="color:#595959;">Hrvatska, {{ $dispatchdata['0']['dispatch']['entry']->zip }} {{ $dispatchdata['0']['dispatch']['entry']->cityname }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Telefon: {{ $dispatchdata['0']['employeeinfo']->phone }}</td>
            <td style="color:#595959;">Telefon: {{ $dispatchdata['0']['dispatch']['entry']->phone }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Email: {{ $dispatchdata['0']['employeeinfo']->email }}</td>
            <td style="color:#595959;">Email: {{ $dispatchdata['0']['dispatch']['entry']->email }}</td>
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

    @foreach($productsperdispatch['dispatchbycustomer'] as $singleproduct)
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

            <td style="color:#595959; text-align:right;"></td>
        </tr>
        <tr>

            <td>
                <table style="width:100%;">
                    <tbody>
                        <tr>
                            <td></td>
                            <td style="text-align: right;">Ukupno: {{ $dispatchdata['0']['totalprice'] }} kn</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<br>
<br>
<br>
<br>
<div style="float:left; width:40%; display:inline-block;">
<p style="font-size:10px; text-align:center;">Izdao</p>
<br>
<p style="font-size:10px; text-align:center;">________________________________</p>
<p style="font-size:16px; text-align:center;">{{ $dispatchdata['0']['employeeinfo']->first_name }} {{ $dispatchdata['0']['employeeinfo']->last_name }}</p>
</div>
<div style="width:20%;display:inline-block"></div>
<div style="float:right; width:40%; display:inline-block;">
<p style="font-size:10px; text-align:center;">Primio</p>
<br>
<p style="font-size:10px; text-align:center;">________________________________</p>
<p style="font-size:16px; text-align:center;">Potpis primatelja</p>
</div>
</body> 
</html>
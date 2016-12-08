<html>

	<head>
   			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 		<title>Izdavanje radnog naloga {{ $workingordersdata['0']['workingorder']['entry']->id }}</title>
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
            <td style="color:#595959;">Broj radnog naloga #{{ $workingordersdata['0']['workingorder']['entry']->workingorder_number}} </td>
        </tr>
        <tr>
            <td style="color:#000000;">{{ $workingordersdata['0']['employeeinfo']->first_name }} {{ $workingordersdata['0']['employeeinfo']->last_name }}</td>
            <td style="color:#000000;">{{ $workingordersdata['0']['workingorder']['entry']->first_name }} {{ $workingordersdata['0']['workingorder']['entry']->last_name }}</td>
            <td style="color:#595959;">Datum izdavanja radnog naloga: {{ date('d.m.Y', strtotime($workingordersdata['0']['workingorder']['entry']->workingorder_date_ship))}}</td>
            <td></td>
        </tr>
        <tr>
            <td style="color:#595959;">{{ $workingordersdata['0']['employeeinfo']->address }}</td>
            <td style="color:#595959;">{{ $workingordersdata['0']['workingorder']['entry']->address }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Hrvatska, {{ $workingordersdata['0']['employeeinfo']->zip }} {{ $workingordersdata['0']['employeeinfo']->cityname }}</td>
            <td style="color:#595959;">Hrvatska, {{ $workingordersdata['0']['workingorder']['entry']->zip }} {{ $workingordersdata['0']['workingorder']['entry']->cityname }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Telefon: {{ $workingordersdata['0']['employeeinfo']->phone }}</td>
            <td style="color:#595959;">Telefon: {{ $workingordersdata['0']['workingorder']['entry']->phone }}</td>
        </tr>
        <tr>
            <td style="color:#595959;">Email: {{ $workingordersdata['0']['employeeinfo']->email }}</td>
            <td style="color:#595959;">Email: {{ $workingordersdata['0']['workingorder']['entry']->email }}</td>
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

    @foreach($productsperworkingorder['workingorderbycustomer'] as $singleproduct)
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
                            <td style="text-align: right;">Ukupno: {{ $workingordersdata['0']['totalprice'] }} kn</td>
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
<p style="font-size:10px; text-align:center;">Izvršitelj radova</p>
<br>
<p style="font-size:10px; text-align:center;">________________________________</p>
<p style="font-size:16px; text-align:center;">{{ $workingordersdata['0']['employeeinfo']->first_name }} {{ $workingordersdata['0']['employeeinfo']->last_name }}</p>
</div>
<div style="width:20%;display:inline-block"></div>
<div style="float:right; width:40%; display:inline-block;">
<p style="font-size:10px; text-align:center;">Naručitelj radova</p>
<br>
<p style="font-size:10px; text-align:center;">________________________________</p>
<p style="font-size:16px; text-align:center;">Potpis primatelja</p>
</div>
</body> 
</html>
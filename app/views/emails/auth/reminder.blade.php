<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" style="font-size: 87.5%;">
	<head>
		<meta charset="utf-8">
	</head>
	<body style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #ffffff;">
		<table cellspacing="0" cellpadding="0" border="0" width="600" style="margin: 0 auto;">
			<thead>
				 <tr>
				 	<td style="border: 1px solid #d0d0d0;" >
				 		<h3 style="text-align: center;">Zdravizub.hr</h3>
				 	</td>
				 </tr>
			</thead>
			<tbody>
				<tr>
					<td style="border: 1px solid #d0d0d0; padding: 20px 10px; text-align: center;">
						<p style="padding: 20px;">Hvala vam što ste nas kontaktirali. Zatražili ste novu lozinku, klikom na poveznicu ispod postavljate novu lozinku:</p>
						<br>
						<a href="{{ URL::route('getResetPassword', array($token)) }}" target="_blank" style="    background-color: #29aafe;
    border-color: #29aafe!important; height: 44px; line-height: 44px; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; border-radius: 3px; padding: 0 30px; color: #fff;  transition: .2s linear; display: block;     text-decoration: none;">Postavite novu lozinku</a>
						<br>

<p>Nakon što kliknete na gornju poveznicu, biti ćete zatraženi da upišete vašu email adresu, i dva puta ponovite novu lozinku.</p>

					</td>
				</tr>
				<tr>
					<td>

					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>

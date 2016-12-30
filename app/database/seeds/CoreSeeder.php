<?php


// Run the database seeds for the core elements of app.
class CoreSeeder extends Seeder
{
	public function run()
	{
		$this->call('LanguagesSeeder');
		$this->call('UserRolesSeeder');
		$this->call('CitySeeder'); 
		$this->call('RegionSeeder'); 
		$this->call('DefaultUsersSeeder'); 
	}
}

// Seeds languages
class LanguagesSeeder extends Seeder
{
	public function run()
	{
		Language::create(array('iso_tag' => 'en', 'language' => 'English'));
		Language::create(array('iso_tag' => 'hr', 'language' => 'Croatian', 'local_name' => 'Hrvatski'));
		Language::create(array('iso_tag' => 'de', 'language' => 'German', 'local_name' => 'Deutsch'));
	}
}

// Seeds user roles
class UserRolesSeeder extends Seeder
{
	public function run()
	{
		// This is we. We control the system. We are the law!
		Role::create(array('name' => 'superadmin'));

		// These are the administrators.
		Role::create(array('name' => 'admin'));

		// These are managers.
		Role::create(array('name' => 'manager'));

		// These are employees.
		Role::create(array('name' => 'employee'));

		// These are people, just ordinary users.
		Role::create(array('name' => 'user'));

		// These are anonymously logged-in users.
		// Not THE Anonymous, like, hackers and stuff.
		// Though, maybe some of them are of the Anonymous!
		// We will never know. Or will we?
		// *cue dramatic music*
		Role::create(array('name' => 'anonymous'));
	}
}




class RegionSeeder extends Seeder
{

	public function run()
	{
		Region::create(array('name' => 'Zagrebačka županija', 'permalink' => 'zagrebacka-zupanija'));
		Region::create(array('name' => 'Krapinsko-zagorska županija', 'permalink' => 'krapinsko-zagorska-zupanija'));
		Region::create(array('name' => 'Sisačko-moslavačka županija', 'permalink' => 'sisacko-moslavacka-zupanija'));
		Region::create(array('name' => 'Karlovačka županija', 'permalink' => 'karlovacka-zupanija'));
		Region::create(array('name' => 'Varaždinska županija', 'permalink' => 'varazdinska-zupanija'));
		Region::create(array('name' => 'Koprivničko-križevačka županija', 'permalink' => 'koprivnicko-krizevacka-zupanija'));
		Region::create(array('name' => 'Bjelovarsko-bilogorska županija', 'permalink' => 'bjelovarsko-bilogorska-zupanija'));
		Region::create(array('name' => 'Primorsko-goranska županija', 'permalink' => 'primorsko-goranska-zupanija'));
		Region::create(array('name' => 'Ličko-senjska županija', 'permalink' => 'licko-senjska-zupanija'));
		Region::create(array('name' => 'Virovitičko-podravska županija', 'permalink' => 'viroviticko-podravska-zupanija'));
		Region::create(array('name' => 'Požeško-slavonska županija', 'permalink' => 'pozesko-slavonska-zupanija'));
		Region::create(array('name' => 'Brodsko-posavska županija', 'permalink' => 'brodsko-posavska-zupanija'));
		Region::create(array('name' => 'Zadarska županija', 'permalink' => 'zadarska-zupanija'));
		Region::create(array('name' => 'Osječko-baranjska županija', 'permalink' => 'osjecko-baranjska-zupanija'));
		Region::create(array('name' => 'Šibensko-kninska županija', 'permalink' => 'sibensko-kninska-zupanija'));
		Region::create(array('name' => 'Vukovarsko-srijemska županija', 'permalink' => 'vukovarsko-srijemska-zupanija'));
		Region::create(array('name' => 'Splitsko-dalmatinska županija', 'permalink' => 'splitsko-dalmatinska-zupanija'));
		Region::create(array('name' => 'Istarska županija', 'permalink' => 'istarska-zupanija'));
		Region::create(array('name' => 'Dubrovačko-neretvanska županija', 'permalink' => 'dubrovacko-neretvanska-zupanija'));
		Region::create(array('name' => 'Međimurska županija', 'permalink' => 'medimurska-zupanija'));
		Region::create(array('name' => 'Grad Zagreb', 'permalink' => 'grad-zagreb'));
	}
}

class CitySeeder extends Seeder
{
	public function run()
	{
		City::create(array('permalink' => 'zagreb', 'name' => 'Zagreb'));
		City::create(array('permalink' => 'dugo-selo', 'name' => 'Dugo Selo'));
		City::create(array('permalink' => 'ivanic-grad', 'name' => 'Ivanić Grad'));
		City::create(array('permalink' => 'jastrebarsko', 'name' => 'Jastrebarsko'));
		City::create(array('permalink' => 'samobor', 'name' => 'Samobor'));
		City::create(array('permalink' => 'sveta-nedelja', 'name' => 'Sveta Nedelja'));
		City::create(array('permalink' => 'sveti-ivan-zelina', 'name' => 'Sveti Ivan Zelina'));
		City::create(array('permalink' => 'velika-gorica', 'name' => 'Velika Gorica'));
		City::create(array('permalink' => 'vrbovec', 'name' => 'Vrbovec'));
		City::create(array('permalink' => 'zapresic', 'name' => 'Zaprešić'));
		City::create(array('permalink' => 'donja-stubica', 'name' => 'Donja Stubica'));
		City::create(array('permalink' => 'klanjec', 'name' => 'Klanjec'));
		City::create(array('permalink' => 'krapina', 'name' => 'Krapina'));
		City::create(array('permalink' => 'oroslavje', 'name' => 'Oroslavje'));
		City::create(array('permalink' => 'pregrada', 'name' => 'Pregrada'));
		City::create(array('permalink' => 'zabok', 'name' => 'Zabok'));
		City::create(array('permalink' => 'zlatar', 'name' => 'Zlatar'));
		City::create(array('permalink' => 'glina', 'name' => 'Glina'));
		City::create(array('permalink' => 'hrvatska-kostajnica', 'name' => 'Hrvatska Kostajnica'));
		City::create(array('permalink' => 'kutina', 'name' => 'Kutina'));
		City::create(array('permalink' => 'novska', 'name' => 'Novska'));
		City::create(array('permalink' => 'petrinja', 'name' => 'Petrinja'));
		City::create(array('permalink' => 'popovaca', 'name' => 'Popovača'));
		City::create(array('permalink' => 'sisak', 'name' => 'Sisak'));
		City::create(array('permalink' => 'duga-resa', 'name' => 'Duga Resa'));
		City::create(array('permalink' => 'karlovac', 'name' => 'Karlovac'));
		City::create(array('permalink' => 'ogulin', 'name' => 'Ogulin'));
		City::create(array('permalink' => 'ozalj', 'name' => 'Ozalj'));
		City::create(array('permalink' => 'slunj', 'name' => 'Slunj'));
		City::create(array('permalink' => 'ivanec', 'name' => 'Ivanec'));
		City::create(array('permalink' => 'lepoglava', 'name' => 'Lepoglava'));
		City::create(array('permalink' => 'ludbreg', 'name' => 'Ludbreg'));
		City::create(array('permalink' => 'novi-marof', 'name' => 'Novi Marof'));
		City::create(array('permalink' => 'varazdin', 'name' => 'Varaždin'));
		City::create(array('permalink' => 'varazdinske-toplice', 'name' => 'Varaždinske Toplice'));
		City::create(array('permalink' => 'durdevac', 'name' => 'Đurđevac'));
		City::create(array('permalink' => 'koprivnica', 'name' => 'Koprivnica'));
		City::create(array('permalink' => 'krizevci', 'name' => 'Križevci'));
		City::create(array('permalink' => 'bjelovar', 'name' => 'Bjelovar'));
		City::create(array('permalink' => 'cazma', 'name' => 'Čazma'));
		City::create(array('permalink' => 'daruvar', 'name' => 'Daruvar'));
		City::create(array('permalink' => 'garesnica', 'name' => 'Garešnica'));
		City::create(array('permalink' => 'grubisno-polje', 'name' => 'Grubišno Polje'));
		City::create(array('permalink' => 'bakar', 'name' => 'Bakar'));
		City::create(array('permalink' => 'cres', 'name' => 'Cres'));
		City::create(array('permalink' => 'crikvenica', 'name' => 'Crikvenica'));
		City::create(array('permalink' => 'cabar', 'name' => 'Čabar'));
		City::create(array('permalink' => 'delnice', 'name' => 'Delnice'));
		City::create(array('permalink' => 'kastav', 'name' => 'Kastav'));
		City::create(array('permalink' => 'kraljevica', 'name' => 'Kraljevica'));
		City::create(array('permalink' => 'krk', 'name' => 'Krk'));
		City::create(array('permalink' => 'mali-losinj', 'name' => 'Mali Lošinj'));
		City::create(array('permalink' => 'novi-vinodolski', 'name' => 'Novi Vinodolski'));
		City::create(array('permalink' => 'opatija', 'name' => 'Opatija'));
		City::create(array('permalink' => 'rab', 'name' => 'Rab'));
		City::create(array('permalink' => 'rijeka', 'name' => 'Rijeka'));
		City::create(array('permalink' => 'vrbovsko', 'name' => 'Vrbovsko'));
		City::create(array('permalink' => 'gospic', 'name' => 'Gospić'));
		City::create(array('permalink' => 'novalja', 'name' => 'Novalja'));
		City::create(array('permalink' => 'otocac', 'name' => 'Otočac'));
		City::create(array('permalink' => 'senj', 'name' => 'Senj'));
		City::create(array('permalink' => 'orahovica', 'name' => 'Orahovica'));
		City::create(array('permalink' => 'slatina', 'name' => 'Slatina'));
		City::create(array('permalink' => 'virovitica', 'name' => 'Virovitica'));
		City::create(array('permalink' => 'kutjevo', 'name' => 'Kutjevo'));
		City::create(array('permalink' => 'lipik', 'name' => 'Lipik'));
		City::create(array('permalink' => 'pakrac', 'name' => 'Pakrac'));
		City::create(array('permalink' => 'pleternica', 'name' => 'Pleternica'));
		City::create(array('permalink' => 'pozega', 'name' => 'Požega'));
		City::create(array('permalink' => 'nova-gradiska', 'name' => 'Nova gradiška'));
		City::create(array('permalink' => 'slavonski-brod', 'name' => 'Slavonski Brod'));
		City::create(array('permalink' => 'benkovac', 'name' => 'Benkovac'));
		City::create(array('permalink' => 'biograd-na-moru', 'name' => 'Biograd na Moru'));
		City::create(array('permalink' => 'nin', 'name' => 'Nin'));
		City::create(array('permalink' => 'obrovac', 'name' => 'Obrovac'));
		City::create(array('permalink' => 'pag', 'name' => 'Pag'));
		City::create(array('permalink' => 'zadar', 'name' => 'Zadar'));
		City::create(array('permalink' => 'beli-manastir', 'name' => 'Beli Manastir'));
		City::create(array('permalink' => 'belisce', 'name' => 'Belišće'));
		City::create(array('permalink' => 'donji-miholjac', 'name' => 'Donji Miholjac'));
		City::create(array('permalink' => 'dakovo', 'name' => 'Đakovo'));
		City::create(array('permalink' => 'nasice', 'name' => 'Našice'));
		City::create(array('permalink' => 'osijek', 'name' => 'Osijek'));
		City::create(array('permalink' => 'valpovo', 'name' => 'Valpovo'));
		City::create(array('permalink' => 'drnis', 'name' => 'Drniš'));
		City::create(array('permalink' => 'knin', 'name' => 'Knin'));
		City::create(array('permalink' => 'skradin', 'name' => 'Skradin'));
		City::create(array('permalink' => 'sibenik', 'name' => 'Šibenik'));
		City::create(array('permalink' => 'vodice', 'name' => 'Vodice'));
		City::create(array('permalink' => 'ilok', 'name' => 'Ilok'));
		City::create(array('permalink' => 'otok', 'name' => 'Otok'));
		City::create(array('permalink' => 'vinkovci', 'name' => 'Vinkovci'));
		City::create(array('permalink' => 'vukovar', 'name' => 'Vukovar'));
		City::create(array('permalink' => 'zupanja', 'name' => 'Županja'));
		City::create(array('permalink' => 'hvar', 'name' => 'Hvar'));
		City::create(array('permalink' => 'imotski', 'name' => 'Imotski'));
		City::create(array('permalink' => 'kastela', 'name' => 'Kaštela'));
		City::create(array('permalink' => 'komiza', 'name' => 'Komiža'));
		City::create(array('permalink' => 'makarska', 'name' => 'Makarska'));
		City::create(array('permalink' => 'omis', 'name' => 'Omiš'));
		City::create(array('permalink' => 'sinj', 'name' => 'Sinj'));
		City::create(array('permalink' => 'solin', 'name' => 'Solin'));
		City::create(array('permalink' => 'split', 'name' => 'Split'));
		City::create(array('permalink' => 'stari-grad', 'name' => 'Stari Grad'));
		City::create(array('permalink' => 'supetar', 'name' => 'Supetar'));
		City::create(array('permalink' => 'trilj', 'name' => 'Trilj'));
		City::create(array('permalink' => 'trogir', 'name' => 'Trogir'));
		City::create(array('permalink' => 'vis', 'name' => 'Vis'));
		City::create(array('permalink' => 'vrgorac', 'name' => 'Vrgorac'));
		City::create(array('permalink' => 'vrlika', 'name' => 'Vrlika'));
		City::create(array('permalink' => 'buje-buie', 'name' => 'Buje-Buie'));
		City::create(array('permalink' => 'buzet', 'name' => 'Buzet'));
		City::create(array('permalink' => 'labin', 'name' => 'Labin'));
		City::create(array('permalink' => 'novigrad', 'name' => 'Novigrad'));
		City::create(array('permalink' => 'pazin', 'name' => 'Pazin'));
		City::create(array('permalink' => 'porec', 'name' => 'Poreč'));
		City::create(array('permalink' => 'pula', 'name' => 'Pula'));
		City::create(array('permalink' => 'rovinj', 'name' => 'Rovinj'));
		City::create(array('permalink' => 'umag', 'name' => 'Umag'));
		City::create(array('permalink' => 'vodnjan', 'name' => 'Vodnjan'));
		City::create(array('permalink' => 'dubrovnik', 'name' => 'Dubrovnik'));
		City::create(array('permalink' => 'korcula', 'name' => 'Korčula'));
		City::create(array('permalink' => 'metkovic', 'name' => 'Metković'));
		City::create(array('permalink' => 'opuzen', 'name' => 'Opuzen'));
		City::create(array('permalink' => 'ploce', 'name' => 'Ploče'));
		City::create(array('permalink' => 'cakovec', 'name' => 'Čakovec'));
		City::create(array('permalink' => 'mursko-sredisce', 'name' => 'Mursko Središće'));
		City::create(array('permalink' => 'prelog', 'name' => 'Prelog'));
	}
}


// Seeds default users
class DefaultUsersSeeder extends Seeder
{
	public function run()
	{
		// Seed Guest user (5)
 		User::create(array('id' => '0', 'first_name' => 'Gost', 'last_name' => 'Korisnik', 'client_id' => '0', 'city' => '83', 'region' => '14')); 

		// Seed admin user (2)
		$user = new User();
		$user->email = 'admin@gmail.com';
		$user->password = Hash::make('123456');

		$user->username = 'admin';
		$user->first_name = 'Ivan';
		$user->last_name = 'Horvat';
		$user->address = 'Sunčana ulica 365';
		$user->city = '83';
		$user->region = '14';
		$user->phone = '0959039610';
		$user->consumer_key = 'ck_134dc0c2783b089ec2a5e51c31b80c90b260318d';
		$user->consumer_secret = 'cs_608d6abe228cd7634a4c65578c60182cadc2e933';
		$user->store_url = 'http://zlatnazora.hr/webshop/'; 

		$user->save();

		$user->attachRole(2); // admin 
  

		
	}
}
 
<?php


// Run the database seeds for the core elements of app.
class CoreSeeder extends Seeder
{
	public function run()
	{
		$this->call('LanguagesSeeder');
		$this->call('UserRolesSeeder');
		$this->call('DefaultUsersSeeder');
		$this->call('RegionSeeder');
		$this->call('CitySeeder');
		$this->call('TagSeeder');
		$this->call('CategorySeeder');
		$this->call('AttributeSeeder');
		$this->call('ProductsSeeder');
 		$this->call('ServiceSeeder');
 	//	$this->call('DispatchSeeder');
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


// Seeds default users
class DefaultUsersSeeder extends Seeder
{
	public function run()
	{
		// Seed admin user (2)
		$defaultuser = new User();
		$defaultuser->email = 'admin@gmail.com';
		$defaultuser->password = Hash::make('123456');

		$defaultuser->username = 'admin';
		$defaultuser->first_name = 'Ivan';
		$defaultuser->last_name = 'Horvat';
		$defaultuser->address = 'Sunčana ulica 365';
		$defaultuser->city = '83';
		$defaultuser->region = '14';
		$defaultuser->phone = '0959039610';


		$defaultuser->save();

		$defaultuser->attachRole(2); // admin


		// Seed user (5)
		$defaultuser2 = new User();
		$defaultuser2->email = 'jbarnese@blogger.com';
		$defaultuser2->password = Hash::make('123456');
		$defaultuser2->username = 'jbarnese';
		$defaultuser2->first_name = 'Joyce';
		$defaultuser2->last_name = 'Barnese';
		$defaultuser2->address = '56 Sherman Lane';
		$defaultuser2->city = '83';
		$defaultuser2->region = '14';
		$defaultuser2->phone = '8912824968';
		$defaultuser2->user_group = 'client';
		$defaultuser2->zip = '30000';

		$defaultuser2->save();

		$defaultuser2->attachRole(5); //1. user

		// Seed user (5)
		$defaultuser3 = new User();
		$defaultuser3->email = 'fbrownb@weebly.com';
		$defaultuser3->password = Hash::make('123456');
		$defaultuser3->username = 'fbrownb';
		$defaultuser3->first_name = 'Fred';
		$defaultuser3->last_name = 'Brown';
		$defaultuser3->address = '2014 Hoffman Parkway';
		$defaultuser3->city = '83';
		$defaultuser3->region = '14';
		$defaultuser3->phone = '5237464341';
		$defaultuser3->user_group = 'client';
		$defaultuser3->zip = '31000';

		$defaultuser3->save();

		$defaultuser3->attachRole(5); //2. user

		// Seed user (5)
		$defaultuser4 = new User();
		$defaultuser4->email = 'blanec@businessweek.com';
		$defaultuser4->password = Hash::make('123456');
		$defaultuser4->username = 'blanec';
		$defaultuser4->first_name = 'Brian';
		$defaultuser4->last_name = 'Lane';
		$defaultuser4->address = '1 Hanover Street';
		$defaultuser4->city = '83';
		$defaultuser4->region = '14';
		$defaultuser4->phone = '2024359010';
		$defaultuser4->user_group = 'client';
		$defaultuser4->zip = '32000';

		$defaultuser4->save();

		$defaultuser4->attachRole(5); //3. user

		// Seed user (5)
		$defaultuser5 = new User();
		$defaultuser5->email = 'shayesd@hubpages.com';
		$defaultuser5->password = Hash::make('123456');
		$defaultuser5->username = 'shayesd';
		$defaultuser5->first_name = 'Shiley';
		$defaultuser5->last_name = 'Hayes';
		$defaultuser5->address = '3 Quincy Way';
		$defaultuser5->city = '83';
		$defaultuser5->region = '14';
		$defaultuser5->phone = '2253961257';
		$defaultuser5->user_group = 'client';
		$defaultuser5->zip = '33000';

		$defaultuser5->save();

		$defaultuser5->attachRole(5); //4. user

		// Seed user (5)
		$defaultuser6 = new User();
		$defaultuser6->email = 'epeters8@dagondesign.com';
		$defaultuser6->password = Hash::make('123456');
		$defaultuser6->username = 'epeters8';
		$defaultuser6->first_name = 'Eugene';
		$defaultuser6->last_name = 'Peters';
		$defaultuser6->address = '82 Duke Avenue';
		$defaultuser6->city = '83';
		$defaultuser6->region = '14';
		$defaultuser6->phone = '3984360132';
		$defaultuser6->user_group = 'client';
		$defaultuser6->zip = '34000';

		$defaultuser6->save();

		$defaultuser6->attachRole(5); //5. user

		// Seed user (5)
		$defaultuser7 = new User();
		$defaultuser7->email = 'wgraham9@marriott.com';
		$defaultuser7->password = Hash::make('123456');
		$defaultuser7->username = 'wgraham9';
		$defaultuser7->first_name = 'Willie';
		$defaultuser7->last_name = 'Graham';
		$defaultuser7->address = '53 Carey Parkway';
		$defaultuser7->city = '83';
		$defaultuser7->region = '14';
		$defaultuser7->phone = '8912824968';
		$defaultuser7->user_group = 'client';
		$defaultuser7->zip = '35000';

		$defaultuser7->save();

		$defaultuser7->attachRole(5); //6. user

		// Seed user (5)
		$defaultuser8 = new User();
		$defaultuser8->email = 'achapmana@wordpress.org';
		$defaultuser8->password = Hash::make('123456');
		$defaultuser8->username = 'achapmana';
		$defaultuser8->first_name = 'Andrew';
		$defaultuser8->last_name = 'Chapman';
		$defaultuser8->address = '0 Gale Trail';
		$defaultuser8->city = '83';
		$defaultuser8->region = '14';
		$defaultuser8->phone = '9292275546';
		$defaultuser8->user_group = 'client';
		$defaultuser8->zip = '36000';

		$defaultuser8->save();

		$defaultuser8->attachRole(5); //7. user

		// Seed user (5)
		$defaultuser9 = new User();
		$defaultuser9->email = 'cfreeman7@jimdo.com';
		$defaultuser9->password = Hash::make('123456');
		$defaultuser9->username = 'cfreeman7';
		$defaultuser9->first_name = 'Clarence';
		$defaultuser9->last_name = 'Freeman';
		$defaultuser9->address = '0621 Spaight Way';
		$defaultuser9->city = '83';
		$defaultuser9->region = '14';
		$defaultuser9->phone = '2822200509';
		$defaultuser9->user_group = 'client';
		$defaultuser9->zip = '37000';

		$defaultuser9->save();

		$defaultuser9->attachRole(5); //8. user

		// Seed user (5)
		$defaultuser10 = new User();
		$defaultuser10->email = 'erogers6@tamu.edu';
		$defaultuser10->password = Hash::make('123456');
		$defaultuser10->username = 'erogers6';
		$defaultuser10->first_name = 'Emily';
		$defaultuser10->last_name = 'Rogers';
		$defaultuser10->address = '969 Parkside Park';
		$defaultuser10->city = '83';
		$defaultuser10->region = '14';
		$defaultuser10->phone = '4589807140';
		$defaultuser10->user_group = 'client';
		$defaultuser10->zip = '38000';

		$defaultuser10->save();

		$defaultuser10->attachRole(5); //9. user

		// Seed user (5)
		$defaultuser11 = new User();
		$defaultuser11->email = 'wlittle5@tuttocitta.it';
		$defaultuser11->password = Hash::make('123456');
		$defaultuser11->username = 'wlittle5';
		$defaultuser11->first_name = 'Wanda';
		$defaultuser11->last_name = 'Little';
		$defaultuser11->address = '12 Hauk Place';
		$defaultuser11->city = '83';
		$defaultuser11->region = '14';
		$defaultuser11->phone = '8171047682';
		$defaultuser11->user_group = 'client';
		$defaultuser11->zip = '39000';

		$defaultuser11->save();

		$defaultuser11->attachRole(5); //10. user

		// Seed user (5)
		$defaultuser12 = new User();
		$defaultuser12->email = 'rdiaz4@canalblog.com';
		$defaultuser12->password = Hash::make('123456');
		$defaultuser12->username = 'rdiaz4';
		$defaultuser12->first_name = 'Rebecca';
		$defaultuser12->last_name = 'Diaz';
		$defaultuser12->address = '85646 Cottonwood Parkway';
		$defaultuser12->city = '83';
		$defaultuser12->region = '14';
		$defaultuser12->phone = '9211325551';
		$defaultuser12->user_group = 'client';
		$defaultuser12->zip = '40000';

		$defaultuser12->save();

		$defaultuser12->attachRole(5); //11. user

		// Seed user (5)
		$defaultuser13 = new User();
		$defaultuser13->email = 'bcastillo3@deviantart.com';
		$defaultuser13->password = Hash::make('123456');
		$defaultuser13->username = 'bcastillo3';
		$defaultuser13->first_name = 'Bonnie';
		$defaultuser13->last_name = 'Castillo';
		$defaultuser13->address = '30 Acker Center';
		$defaultuser13->city = '83';
		$defaultuser13->region = '14';
		$defaultuser13->phone = '9396412064';
		$defaultuser13->user_group = 'client';
		$defaultuser13->zip = '41000';

		$defaultuser13->save();

		$defaultuser13->attachRole(5); //12. user

		// Seed user (5)
		$defaultuser14 = new User();
		$defaultuser14->email = 'jgomez2@imdb.com';
		$defaultuser14->password = Hash::make('123456');
		$defaultuser14->username = 'jgomez2';
		$defaultuser14->first_name = 'Jacqueline';
		$defaultuser14->last_name = 'Gomez';
		$defaultuser14->address = '08 Towne Place';
		$defaultuser14->city = '83';
		$defaultuser14->region = '14';
		$defaultuser14->phone = '9396412064';
		$defaultuser14->user_group = 'client';
		$defaultuser14->zip = '42000';

		$defaultuser14->save();

		$defaultuser14->attachRole(5); //13. user

		// Seed user (5)
		$defaultuser15 = new User();
		$defaultuser15->email = 'kday0@walmart.com';
		$defaultuser15->password = Hash::make('123456');
		$defaultuser15->username = 'kday0';
		$defaultuser15->first_name = 'Kathleen';
		$defaultuser15->last_name = 'Day';
		$defaultuser15->address = '53964 Spenser Trail';
		$defaultuser15->city = '83';
		$defaultuser15->region = '14';
		$defaultuser15->phone = '7732294081';
		$defaultuser15->user_group = 'client';
		$defaultuser15->zip = '43000';

		$defaultuser15->save();

		$defaultuser15->attachRole(5); //14. user

		// Seed user (5)
		$defaultuser16 = new User();
		$defaultuser16->email = 'bcarter1@auda.org.au';
		$defaultuser16->password = Hash::make('123456');
		$defaultuser16->username = 'bcarter1';
		$defaultuser16->first_name = 'Barbara';
		$defaultuser16->last_name = 'Carter';
		$defaultuser16->address = '697 Jenifer Way';
		$defaultuser16->city = '83';
		$defaultuser16->region = '14';
		$defaultuser16->phone = '8326578470';
		$defaultuser16->user_group = 'client';
		$defaultuser16->zip = '44000';

		$defaultuser16->save();

		$defaultuser16->attachRole(5); //15. user


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

// Seeds default tags
class TagSeeder extends Seeder
{
	public function run()
	{
		$item1 = new Tag();
		$item1->title = '1. tag';
		$item1->permalink = '1-tag';
		$item1->description = '1. description';
		$item1->save();

		$item2 = new Tag();
		$item2->title = '2. tag';
		$item2->permalink = '2-tag';
		$item2->description = '2. description';
		$item2->save();

		$item3 = new Tag();
		$item3->title = '3. tag';
		$item3->permalink = '3-tag';
		$item3->description = '3. description';
		$item3->save();

		$item4 = new Tag();
		$item4->title = '4. tag';
		$item4->permalink = '4-tag';
		$item4->description = '4. description';
		$item4->save();

		$item5 = new Tag();
		$item5->title = '5. tag';
		$item5->permalink = '5-tag';
		$item5->description = '5. description';
		$item5->save();

		$item6 = new Tag();
		$item6->title = '6. tag';
		$item6->permalink = '6-tag';
		$item6->description = '6. description';
		$item6->save();

		$item7 = new Tag();
		$item7->title = '7. tag';
		$item7->permalink = '7-tag';
		$item7->description = '7. description';
		$item7->save();

		$item8 = new Tag();
		$item8->title = '8. tag';
		$item8->permalink = '8-tag';
		$item8->description = '8. description';
		$item8->save();

		$item9 = new Tag();
		$item9->title = '9. tag';
		$item9->permalink = '9-tag';
		$item9->description = '9. description';
		$item9->save();

		$item10 = new Tag();
		$item10->title = '10. tag';
		$item10->permalink = '10-tag';
		$item10->description = '10. description';
		$item10->save();

		$item11 = new Tag();
		$item11->title = '11. tag';
		$item11->permalink = '11-tag';
		$item11->description = '11. description';
		$item11->save();

		$item12 = new Tag();
		$item12->title = '12. tag';
		$item12->permalink = '12-tag';
		$item12->description = '12. description';
		$item12->save();

		$item13 = new Tag();
		$item13->title = '13. tag';
		$item13->permalink = '13-tag';
		$item13->description = '13. description';
		$item13->save();

		$item14 = new Tag();
		$item14->title = '14. tag';
		$item14->permalink = '14-tag';
		$item14->description = '14. description';
		$item14->save();

		$item15 = new Tag();
		$item15->title = '15. tag';
		$item15->permalink = '15-tag'; 
		$item15->description = '15. description';
		$item15->save();


	}
}

	// Seeds default category
	class CategorySeeder extends Seeder
	{
	public function run()
	{
		$item1 = new Category();
		$item1->title = '1. category';
		$item1->permalink = '1-category';
		$item1->description = '1. description';
		$item1->image = '/uploads/frontend/category/hotdog.jpg';
		$item1->save();

		$item2 = new Category();
		$item2->title = '2. category';
		$item2->permalink = '2-category';
		$item2->description = '2. description';
		$item2->save();

		$item3 = new Category();
		$item3->title = '3. category';
		$item3->permalink = '3-category';
		$item3->description = '3. description';
		$item3->save();

		$item4 = new Category();
		$item4->title = '4. category';
		$item4->permalink = '4-category';
		$item4->description = '4. description';
		$item4->save();

		$item5 = new Category();
		$item5->title = '5. category';
		$item5->permalink = '5-category';
		$item5->description = '5. description';
		$item5->save();

		$item6 = new Category();
		$item6->title = '6. category';
		$item6->permalink = '6-category';
		$item6->description = '6. description';
		$item6->save();

		$item7 = new Category();
		$item7->title = '7. category';
		$item7->permalink = '7-category';
		$item7->description = '7. description';
		$item7->save();

		$item8 = new Category();
		$item8->title = '8. category';
		$item8->permalink = '8-category';
		$item8->description = '8. description';
		$item8->save();

		$item9 = new Category();
		$item9->title = '9. category';
		$item9->permalink = '9-category';
		$item9->description = '9. description';
		$item9->save();

		$item10 = new Category();
		$item10->title = '10. category';
		$item10->permalink = '10-category';
		$item10->description = '10. description';
		$item10->save();

		$item11 = new Category();
		$item11->title = '11. category';
		$item11->permalink = '11-category';
		$item11->description = '11. description';
		$item11->save();

		$item12 = new Category();
		$item12->title = '12. category';
		$item12->permalink = '12-category';
		$item12->description = '12. description';
		$item12->save();

		$item13 = new Category();
		$item13->title = '13. category';
		$item13->permalink = '13-category';
		$item13->description = '13. description';
		$item13->save();

		$item14 = new Category();
		$item14->title = '14. category';
		$item14->permalink = '14-category';
		$item14->description = '14. description';
		$item14->save();

		$item15 = new Category();
		$item15->title = '15. category';
		$item15->permalink = '15-category'; 
		$item15->description = '15. description';
		$item15->save();


		}
	}

	// Seeds default attribute
	class AttributeSeeder extends Seeder
	{
	public function run()
	{
		$item1 = new Attribute();
		$item1->title = '1. attribute';
		$item1->permalink = '1-attribute';
		$item1->save();

		$item2 = new Attribute();
		$item2->title = '2. attribute';
		$item2->permalink = '2-attribute';
		$item2->save();

		$item3 = new Attribute();
		$item3->title = '3. attribute';
		$item3->permalink = '3-attribute';
		$item3->save();

		$item4 = new Attribute();
		$item4->title = '4. attribute';
		$item4->permalink = '4-attribute';
		$item4->save();

		$item5 = new Attribute();
		$item5->title = '5. attribute';
		$item5->permalink = '5-attribute';
		$item5->save();

		$item6 = new Attribute();
		$item6->title = '6. attribute';
		$item6->permalink = '6-attribute';
		$item6->save();

		$item7 = new Attribute();
		$item7->title = '7. attribute';
		$item7->permalink = '7-attribute';
		$item7->save();

		$item8 = new Attribute();
		$item8->title = '8. attribute';
		$item8->permalink = '8-attribute';
		$item8->save();

		$item9 = new Attribute();
		$item9->title = '9. attribute';
		$item9->permalink = '9-attribute';
		$item9->save();

		$item10 = new Attribute();
		$item10->title = '10. attribute';
		$item10->permalink = '10-attribute';
		$item10->save();

		$item11 = new Attribute();
		$item11->title = '11. attribute';
		$item11->permalink = '11-attribute';
		$item11->save();

		$item12 = new Attribute();
		$item12->title = '12. attribute';
		$item12->permalink = '12-attribute';
		$item12->save();

		$item13 = new Attribute();
		$item13->title = '13. attribute';
		$item13->permalink = '13-attribute';
		$item13->save();

		$item14 = new Attribute();
		$item14->title = '14. attribute';
		$item14->permalink = '14-attribute';
		$item14->save();

		$item15 = new Attribute();
		$item15->title = '15. attribute';
		$item15->permalink = '15-attribute'; 
		$item15->save();


		}
	}

		// Seeds default product(s)
		class ProductsSeeder extends Seeder
		{
		public function run()
		{

			$product1 = new ProductService();
			$product1->title = '1. produkt';
			$product1->permalink = '1-produkt';
			$product1->product_type = '1';
			
			$product1->intro = '1. intro';
			$product1->content = '1. content';
			$product1->visibility = '1';
			$product1->stock_status = '500';
			$product1->total_sales = '1000';
			$product1->downloadable = '1';
			$product1->virtual = '1';
			$product1->regular_price = '1';
			$product1->sale_price = '0';
			$product1->purchase_note = '1. purchase note';
			$product1->featured = '1';
			$product1->weight = '3.4';
			$product1->length = '8.3';
			$product1->width = '5.1';
			$product1->height = '3.8';
			$product1->sku = '11';
			$product1->price = '6.888';
			$product1->sold_individually = '1';
			$product1->manage_stock = '1';
			$product1->backorders = '1';
			$product1->stock = '1414';
			$product1->type = 'product';
			$product1->save();

			$product2 = new ProductService();
			$product2->title = '2. produkt';
			$product2->permalink = '2-produkt';
			$product2->product_type = '1';
			
			$product2->intro = '2. intro';
			$product2->content = '2. content';
			$product2->visibility = '1';
			$product2->stock_status = '500';
			$product2->total_sales = '1000';
			$product2->downloadable = '1';
			$product2->virtual = '1';
			$product2->regular_price = '1';
			$product2->sale_price = '0';
			$product2->purchase_note = '1. purchase note';
			$product2->featured = '1';
			$product2->weight = '3.4';
			$product2->length = '8.3';
			$product2->width = '5.1';
			$product2->height = '3.8';
			$product2->sku = '11';
			$product2->price = '6.888';
			$product2->sold_individually = '1';
			$product2->manage_stock = '1';
			$product2->backorders = '1';
			$product2->stock = '1414';
			$product2->type = 'product';
			$product2->save();

		}
	}

 

	// Seeds default services
	class ServiceSeeder extends Seeder
	{
		public function run()
		{
			$item1 = new ProductService();
			$item1->title = '1. service';
			$item1->intro = '1. description';
			$item1->measurement = 'piece';
			$item1->amount = '20';
			$item1->price = '100.10';
			$item1->discount = '10';
			$item1->tax = '13%';
			$item1->type = 'service';
			$item1->save();

			$item2 = new ProductService();
			$item2->title = '2. service';
			$item2->intro = '2. description';
			$item2->measurement = 'piece';
			$item2->amount = '20';
			$item2->price = '100.10';
			$item2->discount = '10';
			$item2->tax = '13%';
			$item2->type = 'service';
			$item2->save();

			$item3 = new ProductService();
			$item3->title = '3. service';
			$item3->intro = '3. description';
			$item3->measurement = 'piece';
			$item3->amount = '20';
			$item3->price = '100.10';
			$item3->discount = '10';
			$item3->tax = '13%';
			$item3->type = 'service';
			$item3->save();

			$item4 = new ProductService();
			$item4->title = '4. service';
			$item4->intro = '4. description';
			$item4->measurement = 'piece';
			$item4->amount = '20';
			$item4->price = '100.10';
			$item4->discount = '10';
			$item4->tax = '13%';
			$item4->type = 'service';
			$item4->save();

			$item5 = new ProductService();
			$item5->title = '5. service';
			$item5->intro = '5. description';
			$item5->measurement = 'piece';
			$item5->amount = '20';
			$item5->price = '100.10';
			$item5->discount = '10';
			$item5->tax = '13%';
			$item5->type = 'service';
			$item5->save();

			$item6 = new ProductService();
			$item6->title = '6. service';
			$item6->intro = '6. description';
			$item6->measurement = 'piece';
			$item6->amount = '20';
			$item6->price = '100.10';
			$item6->discount = '10';
			$item6->tax = '13%';
			$item6->type = 'service';
			$item6->save();

			$item7 = new ProductService();
			$item7->title = '7. service';
			$item7->intro = '7. description';
			$item7->measurement = 'piece';
			$item7->amount = '20';
			$item7->price = '100.10';
			$item7->discount = '10';
			$item7->tax = '13%';
			$item7->type = 'service';
			$item7->save();

			$item8 = new ProductService();
			$item8->title = '8. service';
			$item8->intro = '8. description';
			$item8->measurement = 'piece';
			$item8->amount = '20';
			$item8->price = '100.10';
			$item8->discount = '10';
			$item8->tax = '13%';
			$item8->type = 'service';
			$item8->save();

			$item9 = new ProductService();
			$item9->title = '9. service';
			$item9->intro = '9. description';
			$item9->measurement = 'piece';
			$item9->amount = '20';
			$item9->price = '100.10';
			$item9->discount = '10';
			$item9->tax = '13%';
			$item9->type = 'service';
			$item9->save();

			$item10 = new ProductService();
			$item10->title = '10. service';
			$item10->intro = '10. description';
			$item10->measurement = 'piece';
			$item10->amount = '20';
			$item10->price = '100.10';
			$item10->discount = '10';
			$item10->tax = '13%';
			$item10->type = 'service';
			$item10->save();

			$item11 = new ProductService();
			$item11->title = '11. service';
			$item11->intro = '11. description';
			$item11->measurement = 'piece';
			$item11->amount = '20';
			$item11->price = '100.10';
			$item11->discount = '10';
			$item11->tax = '13%';
			$item11->type = 'service';
			$item11->save();

			$item12 = new ProductService();
			$item12->title = '12. service';
			$item12->intro = '12. description';
			$item12->measurement = 'piece';
			$item12->amount = '20';
			$item12->price = '100.10';
			$item12->discount = '10';
			$item12->tax = '13%';
			$item12->type = 'service';
			$item12->save();

			$item13 = new ProductService();
			$item13->title = '13. service';
			$item13->intro = '13. description';
			$item13->measurement = 'piece';
			$item13->amount = '20';
			$item13->price = '100.10';
			$item13->discount = '10';
			$item13->tax = '13%';
			$item13->type = 'service';
			$item13->save();

			$item14 = new ProductService();
			$item14->title = '14. service';
			$item14->intro = '14. description';
			$item14->measurement = 'piece';
			$item14->amount = '20';
			$item14->price = '100.10';
			$item14->discount = '10';
			$item14->tax = '13%';
			$item14->type = 'service';
			$item14->save();

			$item15 = new ProductService();
			$item15->title = '15. service';
			$item15->intro = '15. intro';
			$item15->measurement = 'piece';
			$item15->amount = '20';
			$item15->price = '100.10';
			$item15->discount = '10';
			$item15->tax = '13%';
			$item15->type = 'service';
			$item15->save();

		}

	// Seeds default dispatches
	/*class DispatchSeeder extends Seeder
	{
		public function run()
		{
			$item1 = new Dispatch();
			$item1->dispatch_number = '1-DISPATCH';
			$item1->hide_amount = '1';
			$item1->taxable = '1';
			$item1->client_id = '2';
			$item1->dispatch_employee = 'Joža Goranski';
			$item1->stock_label = 'Skladište 2';
			$item1->save();

			$item2 = new Dispatch();
			$item2->dispatch_number = '2-DISPATCH';
			$item2->hide_amount = '1';
			$item2->taxable = '1';
			$item2->client_id = '3';
			$item2->dispatch_employee = 'Joža Goranski';
			$item2->stock_label = 'Skladište 2';
			$item2->save();

			$item3 = new Dispatch();
			$item3->dispatch_number = '3-DISPATCH';
			$item3->hide_amount = '1';
			$item3->taxable = '1';
			$item3->client_id = '4';
			$item3->dispatch_employee = 'Joža Goranski';
			$item3->stock_label = 'Skladište 2';
			$item3->save();

			$item4 = new Dispatch();
			$item4->dispatch_number = '4-DISPATCH';
			$item4->hide_amount = '1';
			$item4->taxable = '1';
			$item4->client_id = '2';
			$item4->dispatch_employee = 'Joža Goranski';
			$item4->stock_label = 'Skladište 2';
			$item4->save();

			$item5 = new Dispatch();
			$item5->dispatch_number = '5-DISPATCH';
			$item5->hide_amount = '1';
			$item5->taxable = '1';
			$item5->client_id = '3';
			$item5->dispatch_employee = 'Joža Goranski';
			$item5->stock_label = 'Skladište 2';
			$item5->save();

			$item6 = new Dispatch();
			$item6->dispatch_number = '6-DISPATCH';
			$item6->hide_amount = '1';
			$item6->taxable = '1';
			$item6->client_id = '4';
			$item6->dispatch_employee = 'Joža Goranski';
			$item6->stock_label = 'Skladište 2';
			$item6->save();

			$item7 = new Dispatch();
			$item7->dispatch_number = '7-DISPATCH';
			$item7->hide_amount = '1';
			$item7->taxable = '1';
			$item7->client_id = '2';
			$item7->dispatch_employee = 'Joža Goranski';
			$item7->stock_label = 'Skladište 2';
			$item7->save();

			$item8 = new Dispatch();
			$item8->dispatch_number = '8-DISPATCH';
			$item8->hide_amount = '1';
			$item8->taxable = '1';
			$item8->client_id = '3';
			$item8->dispatch_employee = 'Joža Goranski';
			$item8->stock_label = 'Skladište 2';
			$item8->save();

			$item9 = new Dispatch();
			$item9->dispatch_number = '9-DISPATCH';
			$item9->hide_amount = '1';
			$item9->taxable = '1';
			$item9->client_id = '2';
			$item9->dispatch_employee = 'Joža Goranski';
			$item9->stock_label = 'Skladište 2';
			$item9->save();

			$item10 = new Dispatch();
			$item10->dispatch_number = '10-DISPATCH';
			$item10->hide_amount = '1';
			$item10->taxable = '1';
			$item10->client_id = '4';
			$item10->dispatch_employee = 'Joža Goranski';
			$item10->stock_label = 'Skladište 2';
			$item10->save();

			$item11 = new Dispatch();
			$item11->dispatch_number = '11-DISPATCH';
			$item11->hide_amount = '1';
			$item11->taxable = '1';
			$item11->client_id = '3';
			$item11->dispatch_employee = 'Joža Goranski';
			$item11->stock_label = 'Skladište 2';
			$item11->save();

			$item12 = new Dispatch();
			$item12->dispatch_number = '12-DISPATCH';
			$item12->hide_amount = '1';
			$item12->taxable = '1';
			$item12->client_id = '2';
			$item12->dispatch_employee = 'Joža Goranski';
			$item12->stock_label = 'Skladište 2';
			$item12->save();

			$item13 = new Dispatch();
			$item13->dispatch_number = '13-DISPATCH';
			$item13->hide_amount = '1';
			$item13->taxable = '1';
			$item13->client_id = '4';
			$item13->dispatch_employee = 'Joža Goranski';
			$item13->stock_label = 'Skladište 2';
			$item13->save();

			$item14 = new Dispatch();
			$item14->dispatch_number = '14-DISPATCH';
			$item14->hide_amount = '1';
			$item14->taxable = '1';
			$item14->client_id = '3';
			$item14->dispatch_employee = 'Joža Goranski';
			$item14->stock_label = 'Skladište 2';
			$item14->save();

			$item15 = new Dispatch();
			$item15->dispatch_number = '15-DISPATCH';
			$item15->hide_amount = '1';
			$item15->taxable = '1';
			$item15->client_id = '2';
			$item15->dispatch_employee = 'Joža Goranski';
			$item15->stock_label = 'Skladište 2';
			$item15->save();

		}
	}*/
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		// $this->load->view('welcome_message');
		$faker = Faker\Factory::create('en_HK');
		for ($i=0; $i < 1000; $i++) {
			$fake = array(
				"name"=>$faker->name,
				"companyEmail"=>$faker->companyEmail,
				"address"=>$faker->address,
				"userName"=>$faker->userName,
				"password"=>$faker->password,
				"realText"=>$faker->realText($maxNbChars = 200, $indexSize = 2),
				"ipv4"=>$faker->ipv4,
				"mobileNumber"=>$faker->mobileNumber
			);
			echo "<pre>";
			print_r ($fake);
			echo "</pre>";
			// $this->common->insertData('faker',$fake);
		}
	}

	/*public function accessLiveUrl()
	{
		setcookie('folder','',time() - 60*60);
		setcookie('folder','live',time() + 60*60);
		redirect(base_url());
	}*/
}

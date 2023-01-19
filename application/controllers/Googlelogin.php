<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googlelogin extends CI_Controller {

public function __construct()
{
	parent::__construct();
	require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
}
	
	public function index()
	{
		$this->load->view('login_view');
	}
	
	public function login()
	{
	
		// $clientId = '871507132270-50gf81imlqt3fif0ma44e1243iv7461t.apps.googleusercontent.com'; //Google client ID
		// $clientSecret = 'zBv6-3PEH05RdUMUoq8NENTn'; //Google client secret
		$clientId = '120473004246-brdi158s96slvsfaldqmsso4v54ct6pc.apps.googleusercontent.com'; //Google client ID
		$clientSecret = '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'; //Google client secret
		// $redirectURL = base_url() .'googlelogin/login';
		$redirectURL = "https://www.chezpablomoses.bi/Commande/passer_commande";
		
		//https://curl.haxx.se/docs/caextract.html

		//Call Google API
		$gClient = new Google_Client();
		$gClient->setApplicationName('chez pablo');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if(isset($_GET['code']))
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			
			 $session = array(
        	                    'TOKEN' => $gClient->getAccessToken()
	                          );
	               $this->session->set_userdata($session);
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (!empty($this->session->userdata('TOKEN'))) 
		{
			$gClient->setAccessToken($this->session->userdata('TOKEN'));
		}
		
		if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
			echo "<pre>";
			print_r($userProfile);
			die;
        } 
		else 
		{
            $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
        }
	}	
}

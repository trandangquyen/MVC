<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->library('session');
        require FCPATH.'vendor/autoload.php';
    }
    /**
     * proccess login with google account
     * @return redirect home
     */
    public function google() {
        //require FCPATH.'vendor/autoload.php';
        //session_start();

        $client_id = $this->config->item('gg_clientid');
        $client_secret = $this->config->item('gg_secret');
        $redirect_uri = $this->config->item('gg_redirect_uri');
        $simple_api_key = $this->config->item('api_key');

        // Create Client Request to access Google API
        $client = new Google_Client();
        $client->setHttpClient(new \GuzzleHttp\Client(['verify' => false]));
        $client->setApplicationName("PHP Google OAuth Login Example");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->setDeveloperKey($simple_api_key);
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");

        // Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);

        // Add Access Token to Session
        if (!isset($_GET['code'])) {
            $authUrl = $client->createAuthUrl();
            /*$client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));*/
            //exit($authUrl);
            redirect($authUrl);
        } else {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            $client->setAccessToken($_SESSION['access_token']);
            $user = $objOAuthService->userinfo->get();
            //var_dump($userData);exit;
            $insert['name'] = $user['familyName'].' '.$user['givenName'];
            $insert['email'] = $user['email'];
            $user = $this->user_model->getUser($insert['email']);
            //var_dump($user);exit;
            if(empty($user)) {
                $this->user_model->create($insert);
                $user = $this->user_model->getUser($insert['email']);
            }
            //exit($this->db->last_query());
            
            $this->session->set_userdata('login', $user);
            //var_dump($user);exit;
            
            redirect('');
        }
        /*exit();
        // Set Access Token to make Request
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
        }

        // Get User Data from Google and store them in $data
        if ($client->getAccessToken()) {
            $userData = $objOAuthService->userinfo->get();
            $data['userData'] = $userData;
            $_SESSION['access_token'] = $client->getAccessToken();
        } else {
            $authUrl = $client->createAuthUrl();
            $data['authUrl'] = $authUrl;
        }
        echo $data['authUrl'];*/
    }
    /**
     * proccess login with facebook account
     * @return redirect home
     */
    public function facebook(){
        //require FCPATH.'vendor/autoload.php';
        $fb = new \Facebook\Facebook([
          'app_id' => $this->config->item('fb_appid'),
          'app_secret' => $this->config->item('fb_secret'),
          'default_graph_version' => 'v2.9',
          'default_access_token' => 'APP-ID|APP-SECRET'
          //'default_access_token' => '{access-token}', // optional
        ]);
        if(!$this->input->get('code')) {
            $helper = $fb->getRedirectLoginHelper();

            $permissions = ['email']; // Optional permissions
            $loginUrl = $helper->getLoginUrl(base_url().'/login/facebook', $permissions);

            //echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
            redirect($loginUrl);
        } else {
            $helper = $fb->getRedirectLoginHelper();

            try {
              $accessToken = $helper->getAccessToken();
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
              // When Graph returns an error
              echo 'Graph returned an error: ' . $e->getMessage();
              exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
              // When validation fails or other local issues
              echo 'Facebook SDK returned an error: ' . $e->getMessage();
              exit;
            }
            //echo $accessToken;
            try {
              // Returns a `Facebook\FacebookResponse` object
              $response = $fb->get('/me?fields=id,name,email', $accessToken);
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
              echo 'Graph returned an error: ' . $e->getMessage();
              exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
              echo 'Facebook SDK returned an error: ' . $e->getMessage();
              exit;
            }

            $user = $response->getGraphUser();
            $insert['name'] = $user['name'];
            $insert['email'] = $user['email'];
            $user = $this->user_model->getUser($insert['email']);
            //var_dump($user);exit;
            if(empty($user)) {
                $this->user_model->create($insert);
                $user = $this->user_model->getUser($insert['email']);
            }
            //exit($this->db->last_query());
            
            $this->session->set_userdata('login', $user);
            //var_dump($user);exit;
            
            redirect('');
        }
    }
}

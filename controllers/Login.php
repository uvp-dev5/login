<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        if ( $this->session->user ) {
            $this->load->view('welcome');
        } else {
            $this->load->view('login');
        }
    }

    public function signin() {
        if (! $this->input->post() ) {
            $this->load->view('login');
        }
        if (! $this->form_validation->run() ) {
            $this->load->view('login');
        }
        date_default_timezone_set('America/Mexico_City');
        require_once APPPATH.'/modules/login/third_party/google-api-php-client-2.2.2/vendor/autoload.php';
        //Setting a tolerance in seconds for tokens to be valid
        \Firebase\JWT\JWT::$leeway = 1800;
        $client = new Google_Client(['client_id' => $this->config->item('google_oauth')]);
        $payload = $client->verifyIdToken($this->input->post('token'));
        if ( $payload ) {
            $this->session->email = $payload['email'];
            redirect('welcome');
        } else {
            //Error connecting with Google API
            $this->load->view('login');
        }
    }

    public function signout() {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('login');
    }
}
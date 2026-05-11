<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
    }

    public function authenticate()
    {
        $this->load->library('form_validation');
        $this->load->model('User_model');

        // SET VALIDATION RULE 
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // IF VALIDATION FAILED THEN AGAIN OPEN TEH LOGIN PAGE
        if ($this->form_validation->run() === FALSE) {

            // $data['title'] = 'Login';
            // $this->load->view('layouts/header', $data);
            // $this->load->view('auth/login', $data);
            // $this->load->view('layouts/footer');
            $this->render('auth/login', [
                'title' => 'Login'
            ]);

            return;
        }

        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $user = $this->User_model->authenticate($username, $password); // CHECK THE DATA IN MODEL IN DB TABLE IF CURRECT IT RETURNS

        if ($user) {

            $this->session->sess_regenerate(TRUE); // CREATE A NEW SESSION ID FOR SECURITY AFTER SUCCESSFULL LOGIN
            $this->session->set_userdata('user', array(
                'user_id' => $user->id,
                'username' => $user->username,
                // 'logged_in' => true, // THIS DOESN'T REQUIRED IF DATA SAVED IN user
            ));

            redirect('dashboard');
            return;
        } else {
            $this->session->set_flashdata('login_error', 'Invalid username or password');
            redirect('login');
        }
    }

    public function login()
    {
        // IF USER LOGGED IN & TRYE TO ACCESS THE LOGIN PAGE SO REDIRECT TO CURRENT URL
        $loggedUser = $this->session->userdata('user');

        // if ($this->session->userdata('logged_in') === true) {
        if ($loggedUser) {

            $prev = $this->agent->referrer(); // USED THE user_agent LIBRARY

            if ($prev) {
                redirect($prev);
            } else {
                redirect('dashboard');
            }
            return;
        }
        // $data['title'] = 'Login';
        // $this->load->view('layouts/header', $data);
        // $this->load->view('auth/login', $data);
        // $this->load->view('layouts/footer');

        $this->render('auth/login', [
            'title' => 'Login',
        ]);
    }


    public function logout()
    {

        $this->session->sess_destroy();
        redirect('login');
        // return;
    }
}

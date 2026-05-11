<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // FOR EASY LAYOUTS
    // COMMON HEADER AND FOOTER
    // IT COMES FROM THE CONTROLLERS
    protected function render($view, $data = [])
    {
        $data['content_view'] = $view; // ASSIGN THE PAGE TO THE DATA VARIABLE SO MAIN CAN PASS THE content_view VARIABLE
        $data['site_name'] = 'Testing';

        $this->load->view('layouts/main', $data);
    }
}

class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user')) {
            redirect('login');
            exit;
        }
    }
}

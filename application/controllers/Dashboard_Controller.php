<?php
defined('BASEPATH') or exit("No direct script access allowed.");

class Dashboard_Controller extends Admin_Controller
{
    // public function index()
    // {

    //     $data['title'] = 'Dashboard';

    //     $loggedUser = $this->session->userdata('user');
    //     // if ($this->session->userdata('logged_in') === true) {
    //     if ($loggedUser) {
    //         $this->load->view('layouts/header', $data);
    //         $this->load->view('pages/dashboard', $data);
    //         $this->load->view('layouts/footer');
    //     } else {
    //         redirect('login');
    //     }
    // }

    // MORE EASY WAY TO SHOW VIEW FILE
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Dashboard',
    //         'content_view' => 'pages/dashboard'
    //     ];

    //     $loggedUser = $this->session->userdata('user');
    //     // if ($this->session->userdata('logged_in') === true) {
    //     if ($loggedUser) {
    //         $this->load->view('layouts/main', $data); // PASS DATA TO main.php FILE
    //     } else {
    //         redirect('login');
    //     }
    // }

    // EVEN MORE EASY WAY TO SHOW VIEW FILE
    // CHECK THE application/core/MY_Controller.php FILE FOR THIS FUNCTION 
    // DATA GOES TO THERE FROM HERE, LIKE VIEW FILE PATH AND $data
    public function index()
    {
        $this->render('pages/dashboard', [
            'title' => 'Dashboard',
            // 'site_name' => 'Testing'
        ]);
    }
}

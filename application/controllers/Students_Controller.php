<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students_Controller extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
    }
    public function index()
    {
        $this->render('students/index', [
            'title' => 'Students List',
            'students_list' => $this->Student_model->get_students(),
        ]);
    }
}

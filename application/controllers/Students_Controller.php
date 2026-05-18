<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students_Controller extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->render('students/index', [
            'title' => 'Students List',
            'students_list' => $this->Student_model->get_all_students(),
            'success' => $this->session->flashdata('success'),
            'delete' => $this->session->flashdata('delete_error'),
        ]);
    }

    public function create()
    {
        $this->render('students/create', [
            'title' => 'Create',
        ]);
    }

    public function store()
    {
        $validation = [
            [
                'field' => 'full_name',
                'label' => 'Full Name',
                'rules' => 'trim|required|alpha_numeric_spaces',
                'errors' => [
                    'required' => 'You must provide %s.'
                ],
            ],

            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|is_unique[students.email]',
                'errors' => [
                    'required' => 'You must provide %s.',
                    'valid_email' => 'Add valid %s.',
                    'is_unique' => 'This email is already exists.',

                ],
            ],

            [
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'trim|numeric',
                'errors' => [
                    'numeric' => 'Add valid %s.'
                ],
            ],

            [
                'field' => 'course',
                'label' => 'Course',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'You must provide %s.'
                ],
            ],

        ];

        $this->form_validation->set_rules($validation);

        if ($this->form_validation->run() === FALSE) {
            // redirect('students/create');
            $this->render('students/create', [
                'title' => 'Create',
            ]);
        } else {

            $data = [
                'full_name' => $this->input->post('full_name', true),
                'email' => $this->input->post('email', true),
                'phone' => $this->input->post('phone', true),
                'course' => $this->input->post('course', true),
            ];

            $this->Student_model->store_student($data);
            $this->session->set_flashdata('success', 'Student added successfully.');
            redirect('students');
        }
    }

    public function edit($id)
    {

        $edit_student = $this->Student_model->get_student($id);

        if ($edit_student) {
            $this->render('students/edit', [
                'title' => 'Edit',
                'student' => $edit_student,
            ]);
        } else {
            redirect('students');
        }
    }

    public function update($id)
    {
        $student = $this->Student_model->get_student($id);
        if (!$student) {
            redirect('students');
            return;
        }

        // GET SUBMITTED EMAIL
        $postedEmail = $this->input->post('email', true);

        if ($postedEmail !== $student->email) {
            $emailRule = 'trim|required|valid_email|is_unique[student.email]';
        } else {
            $emailRule = 'trim|required|valid_email';
        }

        $validation = [
            'full_name' => array(
                'field' => 'full_name',
                'label' => 'Full Name',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => '%s is required.'
                ),
            ),
            'email' => [
                'field' => 'email',
                'label' => 'Email',
                'rules' => $emailRule,
                'errors' => [
                    'required' => '%s is required.',
                    'valid_email' => 'Add valid %s.',
                    'is_unique' => 'This email is already exists.',
                ],
            ],
            'phone' => [
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'trim',
            ],
            'course' => [
                'field' => 'course',
                'label' => 'Course',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => '%s is required.'
                ]
            ],
        ];

        $this->form_validation->set_rules($validation);

        if ($this->form_validation->run() === false) {

            $this->render('students/edit', [
                'title' => 'edit',
                'student' => $student,
            ]);
        } else {
            $data = [
                'full_name' => $this->input->post('full_name', true),
                'email' => $this->input->post('email', true),
                'phone' => $this->input->post('phone', true),
                'course' => $this->input->post('course', true),
            ];

            $this->Student_model->update_student($id, $data);
            $this->session->flashdata('success', 'Student updated successfully.');
            redirect('students');
        }
    }

    public function delete($id)
    {
        if ($this->input->method() !== 'post') {
            show_404();
        }
        $student = $this->Student_model->get_student($id);

        if (!$student) {
            $this->session->set_flashdata(
                'delete_error',
                'Student does not exists.'
            );
            redirect('students');
        } else {
            $this->Student_model->delete_student($id);
            $this->session->set_flashdata(
                'success',
                'Student deleted successfully.'
            );
            redirect('students');
        }
    }
}

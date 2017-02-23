<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aleksandr_vashchenko_crud extends Controller_Base
{
    public $__load_default = true;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        // Load model
        $this->load->model('Aleksandr_vashchenko_crud_model');
    }

    /**
     * Generates page
     */
    public function index()
    {
        // Rights verification
        if (!$this->ion_auth->logged_in()) {
            redirect(site_url('/aleksandr_vashchenko_crud/login/'));
            die();
        }

        // Seo
        $this->data['seo_title'] = 'User\'s crud';
        $this->data['seo_description'] = 'Create/read/update/delete user';
        $this->data['seo_keywords'] = 'CRUD';

        // Number of users
        $this->data['count'] = $this->db->count_all('users');
        // Render layout + page content
        $this->data['page_center'] = 'aleksandr_vashchenko_crud/index';
        $this->__render('outside/main_template_alek');
    }

    /**
     * Generates table
     */
    public function table()
    {
        // Getting info
        $this->data['result'] = $this->Aleksandr_vashchenko_crud_model->table();
        // Load view
        $this->load->view('outside/pages/aleksandr_vashchenko_crud/table', $this->data);
    }

    /**
     * Generates add-page
     */
    public function add()
    {
        // Seo
        $this->data['seo_title'] = 'Add new user';
        $this->data['seo_description'] = 'Adding user';
        $this->data['seo_keywords'] = 'CRUD, Add';

        // Getting groups info
        $this->data['groups'] = $this->Aleksandr_vashchenko_crud_model->groups_info();

        // Rendering page
        $this->data['page_center'] = 'aleksandr_vashchenko_crud/add';
        $this->__render('outside/main_template_alek');
    }

    /**
     * Generates edit-page
     */
    public function edit($id)
    {
        // Seo
        $this->data['seo_title'] = 'Edit user\'s info';
        $this->data['seo_description'] = 'Edit user\s info';
        $this->data['seo_keywords'] = 'CRUD, Edit';

        // Getting user's info
        $this->data['row'] = $this->Aleksandr_vashchenko_crud_model->user_info(intval($id));

        // Getting groups info
        $this->data['groups'] = $this->data['groups'] = $this->Aleksandr_vashchenko_crud_model->groups_info();
        $this->data['page_center'] = 'aleksandr_vashchenko_crud/edit';
        $this->__render('outside/main_template_alek');
    }

    /**
     * Generates login-page
     */
    public function login()
    {
        // Seo
        $this->data['seo_title'] = 'Login';
        $this->data['seo_description'] = 'Login';
        $this->data['seo_keywords'] = 'Login';

        // Load html
        $this->data['page_center'] = 'aleksandr_vashchenko_crud/login';
        $this->__render('outside/main_template_alek');
    }

    /**
     * Adds new user
     */
    public function add_request()
    {
        // Native validations
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('groups[]', 'Groups', 'required');

        // If there are errors - echo them
        if ($this->form_validation->run() === false) {
            echo "<div class='echo-message' style='color: #" . rand(555555, 999999) . "'>" . validation_errors() . "</div>";
            die();
        }

        // Adding new user
        if ($this->Aleksandr_vashchenko_crud_model->add_user()) {
            echo "<div class='echo-message' style='color: #" . rand(555555, 999999) . "'>New user was added!</div>";
        } else {
            echo "<div class='echo-message' style='color: #" . rand(555555, 999999) . "'>Something went wrong!</div>";
        }
    }

    /**
     * Edits user's information
     */
    public function edit_request($id)
    {
        // Native validations
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('groups[]', 'Groups', 'required');

        // If there are errors - echo them
        if ($this->form_validation->run() === false) {
            echo "<div class='echo-message' style='color: #" . rand(555555, 999999) . "'>" . validation_errors() . "</div>";
            die();
        }

        // Editing user
        if ($this->Aleksandr_vashchenko_crud_model->edit_user($id)) {
            echo "<div class='echo-message' style='color: #" . rand(555555, 999999) . "'>User's information was updated!</div>";
        } else {
            echo "<div class='echo-message' style='color: #" . rand(555555, 999999) . "'>Something went wrong!</div>";
        }
    }

    /**
     * Deletes user
     */
    public function del_request()
    {
        $this->Aleksandr_vashchenko_crud_model->delete_user();
    }

    /**
     * Login
     */
    public function login_request()
    {
        // Logging in
        if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'))) {
            echo "<script>document.location = 'http://ci3project.esy.es/ci3/aleksandr_vashchenko_crud/';</script>";
            die();
        } else {
            echo "<div class='echo-message' style='color: red'>Wrong credentials</div>";
        }
    }

    /**
     * Logout
     */
    public function logout()
    {
        $this->ion_auth->logout();
        redirect(site_url('/aleksandr_vashchenko_crud/login/'));
        die();
    }
}
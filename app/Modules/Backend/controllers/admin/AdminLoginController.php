<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminLoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in) {
            redirect('admin');
        }
        $this->load->helper('url');
        $this->load->model('AdminLoginModel');
        $this->load->library('form_validation');
    }


    public function setValidationRules()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    }

    public function index()
    {
        $this->load->view('admin/registration');
    }

    public function register_user()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == false){
            $this->load->view('admin/registration');
        }else{ $admin = array(
            'name' => $this->input->post('name'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            
        );
        $email_check = $this->AdminLoginModel->email_check($admin['email']);

        if ($email_check) {
           
            $this->AdminLoginModel->register_user($admin);
            echo " <p style='text-align: center;color: red;'>Registered successfully.Now login to your account</p>"; 
            $this->load->view('admin/registration');

        } else {
            echo " <p style='text-align: center;color: red;'>Email already Exits Use different Email</p>";  
            $this->load->view('admin/registration');
        }}
       
    }

    public function showLoginForm()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // $this->setValidationRules();
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run()) {

                $email = $this->input->post('email');
                //Encrypt password using MD5
                $password = md5($this->input->post('password'));
                $admin = $this->AdminLoginModel->attemptLogin($email, $password);

                $this->session->set_userdata($admin);

                if ($admin) {
                    //Set user session
                    $this->setUserSession($admin);
                    $redirect_url = $this->session->userdata('redirect_to');
                    if ($redirect_url) {  
                        redirect($redirect_url);
                    } else {
                        redirect(base_url('admin'));
                    }
                } else {
                   
                    echo " <p style='text-align: center;color: red;'>Inccorect Email or Password</p>";  
                }
            }
        }

        $this->load->view('Backend/admin/login');
    }

    /**
     * Set Users Login session
     *
     * @param $admin
     */
    private function setUserSession($admin)
    {

        $logged_in = array(
            'admin'  => $admin,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($logged_in);
    }
   
    public function logout()
    {
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('logged_in');
        redirect(base_url('login'));
    } 
}

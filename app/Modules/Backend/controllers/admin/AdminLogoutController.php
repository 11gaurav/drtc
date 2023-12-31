<?php
namespace App\Controllers;
class AdminLogoutController extends BaseController {
    /**
     * LogoutController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if(!$this->session->logged_in){
            redirect(base_url('login'));
        }
    }

    /**
     * Destroy user session
     *
     * @param $user
     */
    public function logout()
    {
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('logged_in');
        redirect(base_url('login'));
    }
}

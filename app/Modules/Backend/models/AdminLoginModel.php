<?php

class AdminLoginModel extends CI_Model {

    public $_table = 'admin';

    public function attemptLogin($email,$password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('admin.email',$email);
        $this->db->where('admin.password',$password);
        $query = $this->db->get();
        $result = $query->row_array();

        return $result;

    }
    public function register_user( $admin)
	{
		$this->db->insert('admin',  $admin);
	}

	public function email_check($email)
	{

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('email', $email);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

}

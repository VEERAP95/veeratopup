<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function check_email($email) 
	{
        $where = array(
			'email' => $email
		);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
    }

    function check_password($email,$password)
    {
        $where = array(
            'email' => $email,
            'password' => $password
        );
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function change_password($email) 
	{
        $new_pass = mt_rand(100000, 999999);
        $new_pass2 = md5($new_pass);
		$this->db->set('password', $new_pass2);
        $this->db->where('email', $email);
        $this->db->update('users');
		return $new_pass;
    }

    function check_otp($email,$otp)
    {
        $where = array(
            'email' => $email,
            'otp' => $otp
        );
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function check_mpin($email,$otp)
    {
        $where = array(
            'email' => $email,
            'mpin' => $otp
        );
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function register($name, $email, $password, $Mobile) 
	{
        $data = array(
            'id' => NULL,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'mobile' => $Mobile,
            'status' => '0'
    );
        $this->db->insert('users', $data);
        return;
    }

    function update_otp($email, $otp) 
	{
        $data = array(
            'otp' => $otp
        );
        $this->db->where('email', $email);
        $this->db->update('users', $data);
		return true;
    }



}
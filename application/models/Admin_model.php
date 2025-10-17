<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function check_email($email) 
	{
        $where = array(
			'email' => $email
		);
		$this->db->select('*');
		$this->db->from('admin');
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
        $this->db->from('admin');
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
        $this->db->update('admin');
		return $new_pass;
    }

    function profile($acid)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id', $acid);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function emailsetting()
    {
        $this->db->select('*');
        $this->db->from('emailsetting');
        $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function update_emailsetting($data) 
	{
        $userid=$this->session->userdata('id');
        $this->db->where('id', 1);
        $this->db->update('emailsetting', $data);
		return true;
    }

    function update_websetting($data) 
	{
        $userid=$this->session->userdata('id');
        $this->db->where('id', 1);
        $this->db->update('admin', $data);
		return true;
    }

    function websetting()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function webpage()
    {
        $this->db->select('*');
        $this->db->from('webpage');
        $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function update_webpage($data) 
	{
        $userid=$this->session->userdata('id');
        $this->db->where('id', 1);
        $this->db->update('webpage', $data);
		return true;
    }

    function slider()
    {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function update_slider($data) 
	{
        $userid=$this->session->userdata('id');
        $this->db->where('id', 1);
        $this->db->update('sliders', $data);
		return true;
    }

    function api()
    {
        $this->db->select('*');
        $this->db->from('api');
        $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function api_update($data) 
	{
        $this->db->where('id', 1);
        $this->db->update('api', $data);
		return true;
    }

    function users()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('status', 0);
        $this->db->order_by('rdate', 'DESC');
        $this->db->limit(100);
        $query = $this->db->get();
        return $query->result();
    }

    function update_customer($data) 
	{
        $userid=$this->session->userdata('id');
        $this->db->where('id', $userid);
        $this->db->update('admin', $data);
		return true;
    }

    function recharge_history()
    {
        $this->db->select('*');
        $this->db->from('rech_reports');
        $this->db->order_by('rch_time', 'DESC');
        $this->db->limit(100);
        $query = $this->db->get();
        return $query->result();
    }

    function recharge_history_last()
    {
        $this->db->select('*');
        $this->db->from('rech_reports');
        $this->db->order_by('rch_time', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function order_history()
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->order_by('tdate', 'DESC');
        $this->db->limit(100);
        $query = $this->db->get();
        return $query->result();
    }


}
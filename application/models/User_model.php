<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    

    function profile($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function update_customer($data) 
	{
        $email=$this->session->userdata('email');
        $this->db->where('email', $email);
        $this->db->update('users', $data);
		return true;
    }

    function update_wallet($data,$email) 
	{
        //$email=$this->session->userdata('email');
        $this->db->where('email', $email);
        $this->db->update('users', $data);
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

    function recharge_history($email)
    {
        $this->db->select('*');
        $this->db->from('rech_reports');
        $this->db->where('email', $email);
        $this->db->order_by('rch_time', 'DESC');
        $this->db->limit(100);
        $query = $this->db->get();
        return $query->result();
    }

    function recharge_history_by_txnid($userid,$txnid)
    {
        $this->db->select('*');
        $this->db->from('rech_reports');
        $this->db->where('userid', $userid);
        $this->db->where('txnid', $txnid);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function order_history_by_txnid($userid,$id)
    {
        $this->db->select('*');
        $this->db->from('wallet_transaction');
        $this->db->where('userid', $userid);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function order_history($userid)
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->where('email', $userid);
        $this->db->order_by('tdate', 'DESC');
        $this->db->limit(100);
        $query = $this->db->get();
        return $query->result();
    }

    function recharge_insert($data) 
	{
        $this->db->insert('rech_reports', $data);
        return;
    }
    function transaction_insert($data) 
	{
        $this->db->insert('transaction', $data);
        return;
    }

    
    function ticket_add($data) 
	{
        $this->db->insert('ticket', $data);
        return;
    }
    function get_ticket($txnid)
    {
        $this->db->select('*');
        $this->db->from('ticket');
        $this->db->where('txnid', $txnid);
        $query = $this->db->get();
        return $query->first_row('array');
    }
    function ticket_update($data,$a) 
	{
        $this->db->where('txnid', $a);
        $this->db->update('ticket', $data);
		return true;
    }
    function emaillist()
    {
        $this->db->select('email');
        $this->db->from('customer');
        $this->db->where('utype', 2);
        $query = $this->db->get();
        return $query->result();
    }

    function txn_check($userid,$Rid)
    {
        $where = array(
            'email' => $userid,
            'txnid' => $Rid
        );
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->where($where);
        $this->db->order_by('tdate', 'DESC');
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function apicheck($a)
    {
        $this->db->select('*');
        $this->db->from('api');
        $this->db->where('name', $a);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function txncheck($a)
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->where('txnid', $a);
        $query = $this->db->get();
        return $query->first_row('array');
    }
    


}
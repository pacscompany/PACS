<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bill
 *
 * @author Pramod Shehan
 */
class Bill extends CI_Model{
   
    public function __construct() {
        parent::__construct();
    }
    
    function add_bill($tokenid,$billamount,$locationid,$loc,$time,$srivce,$items)
    {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('UTC'));
        $date->setTimezone(new DateTimeZone('Asia/Colombo'));
        $data=array(
            'token_id' => $tokenid,
            'bill_amount' => $billamount,
            'location_id' => $locationid,
            'loc' => $loc,
            'timestamp' => date_timestamp_get($date),
            'servicecharge' => $srivce,
            'items' => $items,
        );
      
         $result=$this->db->insert('bill', $data);
         echo $result;
    }
    
    function get_bill($tokenid)
    {
         $this->db->select('*');
        $this->db->from('bill');
        $this->db->where('token_id', $tokenid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return json_encode($result);
        }
        else
        {
            return false;
        }

//// serialize 
//$serialized_array=serialize($multidimentional_array);
//print_r($serialized_array);
//
//$original_array=unserialize($serialized_array);
//var_export($original_array);
    }
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of book
 *
 * @author Pramod Shehan
 */
class book extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_booked($userid) {
        $jsonarray = array();
        $this->db->select('*');
        $this->db->from('book');
        $this->db->where('userid', $userid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result();
            foreach ($row as $rowhot) {
                $this->db->select('*');
                if (($rowhot->loc) == '1') {
                    $this->db->from('pub');
                } else if (($rowhot->loc) == '2') {
                    $this->db->from('hotel');
                } else {
                    $this->db->from('restaurant');
                }
                $this->db->where('id', $rowhot->locid);
                $query1 = $this->db->get();
                if ($query1->num_rows() > 0) {
                    $row1 = $query1->result();
                    foreach ($row1 as $rowhot1) {
                        $isfav='0';
                        $this->db->select('*');
                        $this->db->from('faviorute');
                        $array = array('userid' => $userid, 'locid' => $rowhot->id, 'loc' => $rowhot->loc);
                        $this->db->where($array);
                        $query1 = $this->db->get();
                        if ($query1->num_rows() > 0) {
                            $isfav='1';
                        }
                        else{
                            $isfav='0';
                        }
                        $jsonarray1 = array(
                            'id' => $rowhot->id,
                            'locid' => $rowhot->locid,
                            'loc' => $rowhot->loc,
                            'name' => $rowhot1->name,
                            'lat' => $rowhot1->lat,
                            'lon' => $rowhot1->lon,
                            'description' => $rowhot1->description,
                            'imageurl' => $rowhot1->imageurl,
                            'address' => $rowhot1->address,
                            'room' => $rowhot->room,
                            'adults' => $rowhot->adults,
                            'children' => $rowhot->children,
                            'starttimestamp' => $rowhot->starttimestamp,
                            'endtimestamp' => $rowhot->endtimestamp,
                            'isfav'=>$isfav
                        );
                        array_push($jsonarray, $jsonarray1);
                    }
                }
                //print_r($jsonarray);

                
            }
            return json_encode($jsonarray);
        } else {
            return json_encode($jsonarray);
        }
    }

    function save_bookedlocation($locid,$loc,$starttimestamp,$endtimestamp,$usedid,$room,$adults,$children){
        $data = array(
            'locid' => $locid,
            'loc' => $loc,
            'starttimestamp' => $starttimestamp,
            'endtimestamp' => $endtimestamp,
            'userid' => $usedid,
            'room' => $room,
             'adults' => $adults,
             'children' => $children,
        );
        $result=$this->db->insert('book', $data);
    }
}

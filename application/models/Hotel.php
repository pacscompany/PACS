<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Hotel
 *
 * @author Pramod Shehan
 */
class hotel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get($id,$userid) {
        $jsonarray = array();
        $this->db->select('*');
        if ($id == '1') {//pub
            $this->db->from('pub');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $result = $query->result();
                foreach ($result as $rowres) {
                    $jsonarray1 = array(
                        'id' => $rowres->id,
                        'loc' => '1',
                        'name' => $rowres->name,
                        'lat' => $rowres->lat,
                        'lon' => $rowres->lon,
                        'description' => $rowres->description,
                        'imageurl' => $rowres->imageurl,
                        'address' => $rowres->address,
                        'website' => $rowres->website,
                        'phonenumber' => $rowres->phonenumber
                    ); //print_r($jsonarray);

                    array_push($jsonarray, $jsonarray1);
                }
                $arr = array(
                    'mappoints' => $jsonarray,
                    'nextlevel' => $this->get_path($userid),
                'mylevel' => $this->user_location($userid)
                );
                return json_encode($arr);
            }
        } else if ($id == '2') {//hotel
            $this->db->from('hotel');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $result = $query->result();
                foreach ($result as $rowres) {
                    $jsonarray1 = array(
                        'id' => $rowres->id,
                        'loc' => '2',
                        'name' => $rowres->name,
                        'lat' => $rowres->lat,
                        'lon' => $rowres->lon,
                        'description' => $rowres->description,
                        'imageurl' => $rowres->imageurl,
                        'address' => $rowres->address,
                        'website' => $rowres->website,
                        'phonenumber' => $rowres->phonenumber
                    ); //print_r($jsonarray);

                    array_push($jsonarray, $jsonarray1);
                }
                $arr = array(
                    'mappoints' => $jsonarray,
                    'nextlevel' => $this->get_path($userid),
                'mylevel' => $this->user_location($userid)
                );
                return json_encode($arr);
            }
        } else if ($id == '3') {//resturant
            $this->db->from('restaurant');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $result = $query->result();
                foreach ($result as $rowres) {
                    $jsonarray1 = array(
                        'id' => $rowres->id,
                        'loc' => '3',
                        'name' => $rowres->name,
                        'lat' => $rowres->lat,
                        'lon' => $rowres->lon,
                        'description' => $rowres->description,
                        'imageurl' => $rowres->imageurl,
                        'address' => $rowres->address,
                        'website' => $rowres->website,
                        'phonenumber' => $rowres->phonenumber
                    ); //print_r($jsonarray);

                    array_push($jsonarray, $jsonarray1);
                }
                $arr = array(
                    'mappoints' => $jsonarray,
                    'nextlevel' => $this->get_path($userid),
                'mylevel' => $this->user_location($userid)
                );
                return json_encode($arr);
            }
        } else {//all
            $hotresult;
            $pubresult;
            $resresult;
            $this->db->from('restaurant');
            $resquery = $this->db->get();
            if ($resquery->num_rows() > 0) {
                $resresult = $resquery->result();
                foreach ($resresult as $rowres) {
                    $jsonarray1 = array(
                        'id' => $rowres->id,
                        'loc' => '3',
                        'name' => $rowres->name,
                        'lat' => $rowres->lat,
                        'lon' => $rowres->lon,
                        'description' => $rowres->description,
                        'imageurl' => $rowres->imageurl,
                        'address' => $rowres->address,
                        'website' => $rowres->website,
                        'phonenumber' => $rowres->phonenumber
                    ); //print_r($jsonarray);

                    array_push($jsonarray, $jsonarray1);
                }
            }
            $this->db->from('pub');
            $pubquery = $this->db->get();
            if ($pubquery->num_rows() > 0) {
                $pubresult = $pubquery->result();
                foreach ($pubresult as $rowpub) {
                    $jsonarray1 = array(
                        'id' => $rowpub->id,
                        'loc' => '1',
                        'name' => $rowpub->name,
                        'lat' => $rowpub->lat,
                        'lon' => $rowpub->lon,
                        'description' => $rowpub->description,
                        'imageurl' => $rowpub->imageurl,
                        'address' => $rowpub->address,
                        'website' => $rowpub->website,
                        'phonenumber' => $rowpub->phonenumber
                    ); //print_r($jsonarray);

                    array_push($jsonarray, $jsonarray1);
                }
            }
            $this->db->from('hotel');
            $hotquery = $this->db->get();
            if ($hotquery->num_rows() > 0) {
                $hotresult = $hotquery->result();
                foreach ($hotresult as $rowhot) {
                    $jsonarray1 = array(
                        'id' => $rowhot->id,
                        'loc' => '2',
                        'name' => $rowhot->name,
                        'lat' => $rowhot->lat,
                        'lon' => $rowhot->lon,
                        'description' => $rowhot->description,
                        'imageurl' => $rowhot->imageurl,
                        'address' => $rowhot->address,
                        'website' => $rowhot->website,
                        'phonenumber' => $rowhot->phonenumber
                    ); //print_r($jsonarray);

                    array_push($jsonarray, $jsonarray1);
                }
            }
            $arr = array(
                'mappoints' => $jsonarray,
                'nextlevel' => $this->get_path($userid),
                'mylevel' => $this->user_location($userid)
            );
            //array_push($jsonarray, $resresult)
            return json_encode($arr);
        }
    }

    function user_location($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result();
            return $row;
        }
    }
    
    
    function get_path($userid) {
        $completdlevel = $this->db->select('levelid')->where('userid',$userid)->order_by('levelid', 'desc')->limit(1)->get('history')->row('levelid');
        $this->db->select('*');
        $this->db->from('gameflow');
        $this->db->where('id', ($completdlevel + 1));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->loc == '1') {
                $this->db->select('*');
                $this->db->from('pub');
                $this->db->where('id', $row->locid);
                $resquery = $this->db->get();
                if ($resquery->num_rows() > 0) {
                    //echo $resquery->result();
                    $result = $resquery->result();
                    foreach ($result as $rowhot) {
                        $jsonarray1 = array(
                            'id' => $rowhot->id,
                            'loc' => '1',
                            'name' => $rowhot->name,
                            'lat' => $rowhot->lat,
                            'lon' => $rowhot->lon,
                            'description' => $rowhot->description,
                            'imageurl' => $rowhot->imageurl,
                            'address' => $rowhot->address,
                            'website' => $rowhot->website,
                            'phonenumber' => $rowhot->phonenumber
                        ); //print_r($jsonarray);
                    }
                    return $jsonarray1;
                }
            } else if ($row->loc == '2') {
                $this->db->select('*');
                $this->db->from('hotel');
                $this->db->where('id', $row->locid);
                $resquery = $this->db->get();
                if ($resquery->num_rows() > 0) {
                    $result = $resquery->result();
                    foreach ($result as $rowhot) {
                        $jsonarray1 = array(
                            'id' => $rowhot->id,
                            'loc' => '2',
                            'name' => $rowhot->name,
                            'lat' => $rowhot->lat,
                            'lon' => $rowhot->lon,
                            'description' => $rowhot->description,
                            'imageurl' => $rowhot->imageurl,
                            'address' => $rowhot->address,
                            'website' => $rowhot->website,
                            'phonenumber' => $rowhot->phonenumber
                        ); //print_r($jsonarray);
                    }
                    return $jsonarray1;
                }
            } else if ($row->loc == '3') {
                $this->db->select('*');
                $this->db->from('restaurant');
                $this->db->where('id', $row->locid);
                $resquery = $this->db->get();
                if ($resquery->num_rows() > 0) {
                    $result = $resquery->result();
                    foreach ($result as $rowhot) {
                        $jsonarray1 = array(
                            'id' => $rowhot->id,
                            'loc' => '3',
                            'name' => $rowhot->name,
                            'lat' => $rowhot->lat,
                            'lon' => $rowhot->lon,
                            'description' => $rowhot->description,
                            'imageurl' => $rowhot->imageurl,
                            'address' => $rowhot->address,
                            'website' => $rowhot->website,
                            'phonenumber' => $rowhot->phonenumber
                        ); //print_r($jsonarray);
                    }
                    return $jsonarray1;
                }
            } else {
                return '';
            }
        }
    }

    function getId($locid, $loc) {
        $jsonarray = array();
        // $completdlevel = $this->db->select('levelid')->order_by('levelid', 'desc')->limit(1)->get('history')->row('levelid');
        $this->db->select('*');
        if ($loc == '1') {
            $this->db->from('pub');
        } else if ($loc == '2') {
            $this->db->from('hotel');
        } else {
            $this->db->from('restaurant');
        }

        $this->db->where('id', $locid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $rowhot1 = $query->result();
            foreach ($rowhot1 as $rowhot) {
                $jsonarray1 = array(
                    'id' => $rowhot->id,
                    'loc' => $loc,
                    'name' => $rowhot->name,
                    'lat' => $rowhot->lat,
                    'lon' => $rowhot->lon,
                    'description' => $rowhot->description,
                    'imageurl' => $rowhot->imageurl,
                    'address' => $rowhot->address,
                    'website' => $rowhot->website,
                    'phonenumber' => $rowhot->phonenumber
                ); //print_r($jsonarray);

                array_push($jsonarray, $jsonarray1);
            }
            return json_encode($jsonarray);
        }
    }

    function gethistory($userid) {
        $jsonarray = array();
        $this->db->select('*');
        $this->db->from('history');

        $this->db->where('userid', $userid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $row) {
                $this->db->select('*');
                if ($row->loc == '1') {
                    $this->db->from('pub');
                } else if ($row->loc == '2') {
                    $this->db->from('hotel');
                } else {
                    $this->db->from('restaurant');
                }

                $this->db->where('id', $row->locid);
                $query1 = $this->db->get();
                if ($query1->num_rows() > 0) {
                    $row2 = $query1->result();
                    foreach ($row2 as $row1) {
                        $isfav='0';
                        $this->db->select('*');
                        $this->db->from('faviorute');
                        $array = array('userid' => $userid, 'locid' => $row->id, 'loc' => $row->loc);
                        $this->db->where($array);
                        $query1 = $this->db->get();
                        if ($query1->num_rows() > 0) {
                            $isfav='1';
                        }
                        else{
                            $isfav='0';
                        }
                            $jsonarray1 = array(
                                'id' => $row1->id,
                                'loc' => $row->loc,
                                'timestamp' => $row->timestamp,
                                'name' => $row1->name,
                                'lat' => $row1->lat,
                                'lon' => $row1->lon,
                                'description' => $row1->description,
                                'imageurl' => $row1->imageurl,
                                'address' => $row1->address,
                                'isfav' => $isfav
                            ); //print_r($jsonarray);

                            array_push($jsonarray, $jsonarray1);
                        }
                    }
                }
                //  print_r($jsonarray);//$jsonarray;
                return json_encode($jsonarray);
            }
        }

        function get_faviorite($userid) {
            $jsonarray = array();
            $this->db->select('*');
            $this->db->from('faviorute');
            $array = array('userid' => $userid, 'fav' => '1');
            $this->db->where($array);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $result = $query->result();
                foreach ($result as $row) {
                    $this->db->select('*');
                    if ($row->loc == '1') {
                        $this->db->from('pub');
                    } else if ($row->loc == '2') {
                        $this->db->from('hotel');
                    } else {
                        $this->db->from('restaurant');
                    }

                    $this->db->where('id', $row->locid);
                    $query1 = $this->db->get();
                    if ($query1->num_rows() > 0) {
                        $row2 = $query1->result();
                        foreach ($row2 as $row1) {
                            $jsonarray1 = array(
                                'id' => $row1->id,
                                'loc' => $row->loc,
                                'name' => $row1->name,
                                'lat' => $row1->lat,
                                'lon' => $row1->lon,
                                'description' => $row1->description,
                                'imageurl' => $row1->imageurl,
                                'address' => $row1->address,
                                'isfav' => $row1->address
                            ); //print_r($jsonarray);

                            array_push($jsonarray, $jsonarray1);
                        }
                    }
                }
                return json_encode($jsonarray);
            }
        }

        function deletfave($locid, $loc) {
            $array = array('locid' => $locid, 'loc' => $loc);
            $this->db->where($array);
            if ($loc == '1') {
                $res = $this->db->delete('faviorute');
            } else if ($loc == '1') {
                $res = $this->db->delete('faviorute');
            } else {
                $res = $this->db->delete('faviorute');
            }
            return $res;
        }

        function get_completed($usesid) {
            $this->db->select('*');
            $this->db->order_by('levelid', 'asc');
            $this->db->from('history');
            $array = array('userid' => $usesid);
            $this->db->where($array);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $result = $query->result();
                return $result;
            }
            else{
                return NULL;
            }
        }
        
        function get_completed1($usesid) {
            $this->db->select('*')->limit(1);
            $this->db->order_by('levelid', 'desc');
            $this->db->from('history');
            $array = array('userid' => $usesid);
            $this->db->where($array);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $result = $query->result();
                return $result;
            }
            else{
                return NULL;
            }
        }

        function get_favById($locid, $loc) {
            $this->db->select('*');
            $this->db->from('faviorute');
            $array = array('locid' => $locid, 'loc' => $loc);
            $this->db->where($array);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $result = $query->row();
                return $result->fav;
            } else {
                return '0';
            }
        }
        
        
        function getClues($level) {
           
            $this->db->select('*');
            $this->db->from('gameflow');
            $array = array('id'=> $level);
            $this->db->where($array);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
        
       // function getHistoryCompleted
function get_CompletedLevelCount($userid){
     $completdlevel = $this->db->select('levelid')->where('userid',$userid)->order_by('levelid', 'desc')->limit(1)->get('history')->row('levelid');
     return $completdlevel +1;
}
    }
    
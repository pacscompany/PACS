<?php

class user extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function add($fname, $lname, $telno, $email, $pw, $imgurl) {
        $data = array(
            'first_name' => $fname,
            'last_name' => $lname,
            'telephone_number' => $telno,
            'email' => $email,
            'password' => $pw,
            'image_url' => $imgurl,
        );
        $result=$this->db->insert('user', $data);
        if($result == 1){
        $insertid = $this->db->insert_id();
        
        return json_encode($this->getById($insertid));
        }
 else {
            return NULL;
 }
    }

    function update($userid, $fname, $lname, $telno) {
        $data = array(
            'first_name' => $userid,
            'last_name' => $userid,
            'telephone_number' => $userid,
        );
        $this->db->where('user_id', $userid);
        $this->db->update('user', $data);
    }
    
    function updatesub($userid, $sub) {
        $data = array(
            'sub' => $sub
        );
        $this->db->where('user_id', $userid);
        $res=$this->db->update('user', $data);
        return $res;
    }
    
     
    function updatesession($userid, $sess) {
        $data = array(
            'session' => $sess
        );
        $this->db->where('user_id', $userid);
        $res=$this->db->update('user', $data);
        return $res;
    }
    
    
    function update_score($userid, $sub) {
        $exscore=0;
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $userid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $exscore = $query->row()->score;
           
        }
       
        $data = array(
            'score' => intval($exscore) + intval($sub)
        );
        $this->db->where('user_id', $userid);
        $res=$this->db->update('user', $data);
        return $res;
    }
    
    
    function update_points($userid, $sub,$minadd) {
        $expoints=0;
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $userid);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $expoints = $query->row()->points;
        }
        if($minadd == '+'){
        $data = array(
            'points' => intval($expoints) + intval($sub)
        );
        }
        else{
            $data = array(
            'points' => intval($expoints) - intval($sub)
        );
        }
        $this->db->where('user_id', $userid);
        $res=$this->db->update('user', $data);
        return $res;
    }
    
    function update_location($userid, $lat,$lon) {
        $data = array(
            'lat' => $lat,
            'lon'=>$lon
        );
        $this->db->where('user_id', $userid);
        $res=$this->db->update('user', $data);
        return $res;
    }

    function login($email) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function get($email) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
    }
    
    function getById($email) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
    }
    
    function get_leaderboard(){
        $this->db->select('*');
        $this->db->order_by('score', 'desc');
        $this->db->from('user');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
    }
    
     function get_gamescore($userid,$level){
         usleep(5000000);
        $this->db->select('*');
        $this->db->from('game');
        $array = array('level' => $level, 'userid' => $userid);
       $this->db->where($array);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->score;
        }
        else{
            return 'sfe';
        }
      //   echo $level + $userid;
//         $completdlevel = $this->db->select('level')->where('userid',$userid)->order_by('level', 'desc')->limit(1)->get('game')->row('score');
//     return $completdlevel ;
    }

    function add_game($level, $game, $score, $attempts, $userid) {
        $data = array(
            'level' => $level,
            'game' => $game,
            'score' => $score,
            'attempts' => $attempts,
            'userid' => $userid
        );
        $result = $this->db->insert('game', $data);
        if ($result == 1) {
            //$insertid = $this->db->insert_id();

            return $result;
        } else {
            return NULL;
        }
    }
    function add_gamehistory($score,$locid,$loc,$billid,$levelid,$star,$userid) {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('UTC'));
        $date->setTimezone(new DateTimeZone('Asia/Colombo'));
        $data = array(
            'score' => $score,
            'locid' => $locid,
            'loc' => $loc,
            'billid' => $billid,
            'levelid' => $levelid,
            'userid' => $userid,
            'star' => $star,
            'timestamp'=>date_timestamp_get($date)
        );
        $result = $this->db->insert('history', $data);
        if ($result == 1) {
            //$insertid = $this->db->insert_id();

            return $result;
        } else {
            return NULL;
        }
    }


}

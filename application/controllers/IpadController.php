<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author Pramod Shehan
 */
class IpadController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Hotel');
        $this->load->model('Bill');
        $this->load->model('Book');
        $this->load->model('Store');
        $this->load->database();
    }

    function index() {
        $offset= $this->uri->segment(3);
        $det=$this->User->getById('1');  
        $data['nowlat']= $det[0]->lat; 
        $data['nowlon']= $det[0]->lon; 
        $this->load->view('libraries');
        $this->load->view('ipad/map',$data);
    }
    
    function load_booking(){
        //$data['leader']=$this->user->get_leaderboard();
        $this->load->view('libraries_tem');
         $this->load->view('ipad/booking');
    }

    function booked_locations()
    {
        $data['history']=$this->Book->get_booked('1');
        $this->load->view('libraries');
       // print_r($data);
         $this->load->view('ipad/bookedlocations',$data);
    }
    
    function load_faviorite(){
         $data['fav']=$this->Hotel->get_faviorite('1');
         $this->load->view('libraries');
         //print_r($data);
         $this->load->view('ipad/favorite_locations',$data);
    }
    
    function visited_locations()
    {
        $data['history']=$this->Hotel->gethistory('1');
        $this->load->view('libraries');
         $this->load->view('ipad/visited_locations',$data);
    }
    
    function load_register() {
        $this->load->view('libraries');
        $this->load->view('ipad/register');
    }

    function load_login() {
        $this->load->view('libraries_tem');
        $this->load->view('ipad/login');
    }

    function load_gamelevel() {
        $data['completed']=  $this->Hotel->get_completed('1');
        $this->load->view('libraries');
        $this->load->view('ipad/level_selection',$data);
    }

    function load_map() {
        $offset= $this->uri->segment(3);
        $det=$this->User->getById('1');  
        $data['nowlat']= $det[0]->lat; 
        $data['nowlon']= $det[0]->lon; 
        
        $this->load->view('libraries');
         $this->load->view('ipad/map',$data);
    }
    
    function load_location() {
         $locid=  $this->input->get('locid');
        $loc=  $this->input->get('loc');
       
        $data['details']=  $this->Hotel->getId($locid,$loc);
        $data['loc']=  $loc;
        $data['fav']=  $this->Hotel->get_favById($locid,$loc);
        $this->load->view('libraries');
        $this->load->view('ipad/location',$data);
    }
    
    function load_gameplay() {
        $this->load->view('libraries');
        $data['gamelevel']=$this->Hotel->get_CompletedLevelCount('1');
         
        $this->load->view('ipad/game',$data);
    }
    
    function load_bill() {
        $this->load->view('libraries_tem');
         $data['result']=$this->Bill->get_bill('1475');
         $data['userdet']=$this->User->getById('1');
         $data['gamelevel']=$this->Hotel->get_CompletedLevelCount('1');
         $rr=$data['gamelevel'];
        // echo $rr;
          $rr1=($this->User->get_gamescore('1',$rr));//[0]->score;//400;
         // print_r($rr1);
//          $r='';
//          foreach($rr1 as $row){
//              $r=$row->score;
//          }
          $data['game']=$rr1;
       // $data['game']=$rr;//['score'];/
       // print_r($data);
         $this->load->view('ipad/bill',$data);
    }
    
    function load_leaderboard() {
        $this->load->view('libraries');
        $data['leader']=$this->User->get_leaderboard();
        $this->load->view('ipad/leaderboard', $data);
    }
    
    function load_howtoplay() {
        $this->load->view('libraries');
        $this->load->view('ipad/howtoplay');
    }
    
    function load_newsletter(){
         $this->load->view('libraries');
         $this->load->view('ipad/news_letters');
    }
    
    function load_userprofile(){
     
        $this->load->view('libraries');
        $ComLevelcount=$this->Hotel->get_completed1('1');
        $ComLevelcount1=$this->Hotel->get_completed('1');
      //print_r($ComLevelcount1);
        $data['presentage']=(intval($ComLevelcount[0]->score) /1000)*100;
        //echo intval($ComLevelcount);
        $data['completed']=sizeof($ComLevelcount1);
        $data['completed1']=sizeof($ComLevelcount[0]->levelid);
        $data['userdetails']=$ComLevelcount1;//$this->User->getById('1');
        $data['userprivate']=$this->User->getById('1');
        $this->load->view('/ipad/userprofile',$data);
    }
    
    function load_sample() {
        $this->load->view('libraries');
        $this->load->view('ipad/sample');
    }
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HotelController
 *
 * @author Pramod Shehan
 */
class HotelController extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('Hotel');
        $this->load->model('Book');
    }
    
    function get(){
        $id=$this->input->post('id');
        $res=$this->Hotel->get($id,'1');
        echo $res;
    }
    
    function getloc(){
        $locid=$this->input->post('locid');
        $loc=$this->input->post('loc');
        $res=$this->Hotel->getid($locid,$loc);
     /*   echo '<ul class="collapsible popout" data-collapsible="accordion"> <li> <div class="collapsible-header" style="padding: 0"> <div class="row" style="margin: 0"> <div class="col s4" style="padding: 0"> <img class="materialboxed" src="<?php echo IMG; ?>locations/machan.jpg" height="120" /> </div> <div class="col s8" style="padding: 0"> <div class="row" style="margin: 0; margin-top: -5px; margin-left: 20px;"> <div class="col s10" style="padding: 0"><i class="material-icons">local_bar</i> msg1[0].name </div> <div class="col s1" style="padding: 0; margin: 0"><i class="material-icons secondary-content">star_border</i></div> </div> <div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;"> <div class="col s10" style="padding: 0"> <span> <i class="material-icons">location_on</i> msg1[0].address </span> </div> </div> <div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;"> <div class="col s10" style="padding: 0"></div> </div> </div> </div> </div> <div class="collapsible-body"> <div class="container" style="margin: 0px 10px; width: auto; text-align:justify"> <div> msg1[0].description </div> </div> </div> </li> </ul>';
   */
      /*/*  echo '<ul class="collapsible popout" data-collapsible="accordion">  <li>  <div class="collapsible-header" style="padding: 0">  <div class="row" style="margin: 0">  <div class="col s4" style="padding: 0">  <img class="materialboxed" style="margin-left:-10px;" src="<?php echo IMG; ?>locations/machanjpg" height="120" />  </div>  <div class="col s8" style="padding: 0">  <div class="row" style="margin: 0; margin-top: -5px; margin-left: 20px;">  <div class="col s10" style="padding: 0"><i class="material-icons">local_bar</i>  msg1[0]name  </div>  <div class="col s1" style="padding: 0; margin: 0"><i id="star" class="material-icons secondary-content" onclick="add_favouirt(  msg1[0]id  ,  msg1[0]loc  ,1)">  star_border</i></div>  </div>  <div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;">  <div class="col s10" style="padding: 0">  <span> <i class="material-icons">location_on</i>  msg1[0]address  </span>  </div>  </div>  <div class="row" style="margin: 0; margin-top: -8px; margin-left: 20px;">  <div class="col s10" style="padding: 0"></div>  </div>  </div>  </div>  </div>  <div >  <div class="container" style="margin: 0px 10px; width: auto; text-align:justify">  <div>  msg1[0]description  </div>  <div class="row" style="margin: 0; margin-top: 5px">  <div class="col s12 center-align" style="padding: 0"><a onclick="bookNow( ew  )" style="margin-bottom: 10px;" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Book Now</a></div>  </div>  </div>  </div>  </li>  </ul>';
      */
      echo $res;
     }
    
    function addfav(){
        $locid=$this->input->post('locid');
        $loc=$this->input->post('loc');
        $userid=$this->input->post('userid');
        $res=$this->Hotel->add_fav($locid,$loc,$userid);
        echo $res;
    }
            
    function deletefav(){
        $locid=$this->input->post('locid');
        $loc=$this->input->post('loc');
        $res=$this->Hotel->deletfave($locid,$loc);
        echo $res;
    }
    
    function booking_loc(){
        $locid=$this->input->post('locid');
        $loc=$this->input->post('loc');
        $room=$this->input->post('room');
        $children=$this->input->post('children');
        $adults=$this->input->post('adults');
        $start=$this->input->post('start');
        $end=$this->input->post('end');
        $this->Book->save_bookedlocation($locid,$loc,$start,$end,'1',$room,$adults,$children);
      //  ($locid,$loc,$starttimestamp,$endtimestamp,$usedid,$room,$adults,$children){
    }
}

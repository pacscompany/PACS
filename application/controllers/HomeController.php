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
class HomeController extends CI_Controller {

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

        $det = $this->User->getById('1');
        // print_r($det);
        $data['subscribe'] = $det[0]->sub;
        $this->load->view('libraries');
        $this->load->view('home', $data);
    }

    function uptadeusersub() {
        $sub = $this->input->post('sub');
        $det = $this->User->updatesub(1, $sub);
        echo $det;
    }

    function uptade_location() {
        $lat = $this->input->post('lat');
        $lon = $this->input->post('lon');
        $det = $this->User->update_location(1, $lat, $lon);
        echo $det;
    }

    function saveserialize() {
        $multidimentional_array = array(
            array(
                array("beer", 2, 15),
                array("vine", 1, 25),
                array("chicken", 2, 7)
            )
        );
        $serialized_array = serialize($multidimentional_array);

        $this->Bill->add_bill('1475', '450', '1', '1', '14572222', '20', $serialized_array);
    }

    function load_cashierview() {

        $this->load->view('libraries');
        $this->load->view('cashierview');
    }

    function test() {
$data['completed']=  $this->Hotel->get_completed('1');
        $this->load->view('libraries');
        $this->load->view('slovedclue',$data);
    }

    function load_slovedclues() {
$data['completed']=  $this->Hotel->get_completed('1');
$data['count']=  sizeof($data['completed']);
        $this->load->view('libraries');
        $this->load->view('slovedclue',$data);
    }

    function load_userprofile() {

        $this->load->view('libraries');
        $ComLevelcount = $this->Hotel->get_completed1('1');
        $ComLevelcount1 = $this->Hotel->get_completed('1');
       // print_r($ComLevelcount[0]->score);
        if ($ComLevelcount != NULL) {
            $data['presentage'] = (intval($ComLevelcount[0]->score) / 1000) * 100;
        }
        else{
            $data['presentage']=NULL;
        }
        // echo intval($ComLevelcount);
        if ($ComLevelcount1 != NULL) {
            $data['completed'] = sizeof($ComLevelcount1);
        }
        else{
             $data['completed']=NULL;
        }
        if ($ComLevelcount != NULL) {
            $data['completed1'] = $ComLevelcount[0]->levelid;
        }
        else{
              $data['completed1'] =NULL;
        }
        if ($ComLevelcount1 != NULL) {
            $data['userdetails'] = $ComLevelcount; //$this->User->getById('1');
        }
         else{
              $data['userdetails']  =NULL;
        }
        $this->load->view('profilepage', $data);
    }

    function load_statistics() {

        $this->load->view('libraries');
        $this->load->view('statistics');
    }

    function load_store() {

        $data['producs'] = $this->Store->getProducts();
        $this->load->view('libraries');
        $this->load->view('store', $data);
    }

    function load_faviorite() {
        $data['fav'] = $this->Hotel->get_faviorite('1');
        $this->load->view('libraries');
        //print_r($data);
        $this->load->view('faviourite', $data);
    }

    function load_register() {
        //  $data['fav']=$this->hotel->get_faviorite('1');
        $this->load->view('libraries');
        //print_r($data);
        $this->load->view('register');
    }

    function load_login() {
        $data['image'] = $this->input->get('image');
        $data['email'] = $this->input->get('email');

        //$data['fav']=$this->hotel->get_faviorite('1');
        $this->load->view('libraries');
        //print_r($data);
        $this->load->view('login', $data);
    }

    function load_bill() {
        //$data['fav']=$this->hotel->get_faviorite('1');
        $this->load->view('libraries_tem');
        $data['result'] = $this->Bill->get_bill('1475');
        $data['userdet'] = $this->User->getById('1');
        $data['gamelevel'] = $this->Hotel->get_CompletedLevelCount('1');
        $rr = $data['gamelevel'];
        // echo $rr;
        $rr1 = ($this->User->get_gamescore('1', $rr)); //[0]->score;//400;
        // print_r($rr1);
//          $r='';
//          foreach($rr1 as $row){
//              $r=$row->score;
//          }
        $data['game'] = $rr1;
        // $data['game']=$rr;//['score'];/
        // print_r($data);
        $this->load->view('bill', $data);
    }

    function load_gamelevel() {
        $data['completed'] = $this->Hotel->get_completed('1');
        // print_r($data);
        $this->load->view('libraries');
        $this->load->view('game_levels', $data);
    }

    function load_finallevel() {
//        $data['completed']=  $this->Hotel->get_completed('1');
//    // print_r($data);
        $this->load->view('libraries');
        $this->load->view('final_level');
    }

    function load_howtoplay() {
        $this->load->view('libraries');
        $this->load->view('how_to_play');
    }

    function load_gameplay() {
        $this->load->view('libraries_tem');
        $data['gamelevel'] = $this->Hotel->get_CompletedLevelCount('1');
        $data['clues']=$this->Hotel->getClues($data['gamelevel'] );
        

        $this->load->view('game_play', $data);
    }

    function load_newsletter() {
        $this->load->view('libraries');
        $this->load->view('news_letters');
    }

    function visited_locations() {
        $data['history'] = $this->Hotel->gethistory('1');
        $this->load->view('libraries');
        $this->load->view('visited_locations', $data);
    }

    function booked_locations() {
        $data['history'] = $this->Book->get_booked('1');
        $this->load->view('libraries');
        // print_r($data);
        $this->load->view('bookedlocations', $data);
    }
    
    function load_webview() {
    //    $data['history'] = $this->Book->get_booked('1');
        $this->load->view('libraries_jmobile');
        // print_r($data);
        $this->load->view('webview');
    }

    function load_locationView() {
        $locid = $this->input->get('locid');
        $loc = $this->input->get('loc');

        $data['details'] = $this->Hotel->getId($locid, $loc);
        $data['loc'] = $loc;
        $data['fav'] = $this->Hotel->get_favById($locid, $loc);
        // print_r($data);
        $this->load->view('libraries');
        $this->load->view('locationview', $data);
    }

    function load_leaderboard() {
        $this->load->view('libraries');
        $data['leader'] = $this->User->get_leaderboard();
        $this->load->view('leaderboard', $data);
    }

    function load_map() {
        $offset = $this->uri->segment(3);
        $det = $this->User->getById('1');
        $data['nowlat'] = $det[0]->lat;
        $data['nowlon'] = $det[0]->lon;

        $this->load->view('libraries');
        $this->load->view('map', $data);
    }

    function load_booking() {
        //$data['leader']=$this->user->get_leaderboard();
        $this->load->view('libraries_tem');
        $this->load->view('booking');
    }

    function load_solvedpuzzles() {
        //$data['leader']=$this->user->get_leaderboard();
        $this->load->view('libraries');
        $this->load->view('solvedpuzzles');
    }

    function purchase() {

        $config['business'] = 'suharoxy44@gmail.com';
        $config['cpp_header_image'] = 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRU0da_zrxJR9eCw_Odo4q46Tex5jNytAjehusHQRkBZjoRz8U3'; //Image header url [750 pixels wide by 90 pixels high]
        // $config['return'] 				= 'http://localhost/PACS/index.php/StoreController/notify_payment';
        // $config['cancel_return'] 		= 'shopping.php';
        // $config['notify_url'] 			= 'process_payment.php'; //IPN Post
        $config['production'] = FALSE; //Its false by default and will use sandbox
//		$config['discount_rate_cart'] 	= 20; //This means 20% discount
//		$config["invoice"]				= random_string('numeric',0); //The invoice id

        $this->load->library('paypal', $config);

        #$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);

        $this->paypal->add('T-shirt', 2.99, 6); //First item
        $this->paypal->add('Pants', 40);    //Second item
        $this->paypal->add('Blowse', 10, 10, 'B-199-26'); //Third item with code

        $this->paypal->pay(); //Proccess the payment
    }

    function adduserwonngame() {
        $level = $this->input->post('level');
        $score = $this->input->post('score');
        $attempts = $this->input->post('attempts');
        $game = $this->input->post('game');
        $userid = '1'; //$this->input->post('level');
        $res = $this->User->add_game($level, $game, $score, $attempts, $userid);
        if ($attempts == 1) {
            $res = $this->User->update_points($userid, '50', '+');
        }
        echo $res;
    }

    function levelCompleted() {
        $score = $this->input->post('score');
        $locid = $this->input->post('locid');
        $loc = $this->input->post('loc');
        $biilid = $this->input->post('biilid');
        $levelid = $this->input->post('levelid');
        $star = $this->input->post('star');
        $amount = $this->input->post('amount');
        $userid = '1'; //$this->input->post('star');
        $res = $this->User->update_points($userid, $amount, '-');
        $res = $this->User->update_score($userid, $score);
        $res = $this->User->add_gamehistory($score, $locid, $loc, $biilid, $levelid, $star, $userid);
        echo $res;
    }

    function levelCompletedpaypal() {
        $score = $this->input->post('score');
        $locid = $this->input->post('locid');
        $loc = $this->input->post('loc');
        $biilid = $this->input->post('biilid');
        $levelid = $this->input->post('levelid');
        $star = $this->input->post('star');
        $amount = $this->input->post('amount');
        $userid = '1';
        $res1 = $this->User->add_gamehistory($score, $locid, $loc, $biilid, $levelid, $star, $userid);
        $res = $this->User->update_points($userid, '50', '+');
        echo $res;
    }

}

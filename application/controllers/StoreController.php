<?php

class StoreController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Store');
        $this->load->model('User');
        $this->load->database();
    }

    function load_store() {

        $data['producs1'] = $this->Store->getProducts();
        $data['cat'] = $this->Store->getCat();
        $data['purchase'] = $this->Store->getCartPro('1', '1');
        // print_r($data['purchase']);
        $this->load->view('libraries');
        $this->load->view('store', $data);
    }

    function getProductCount() {
         $data=$this->Store->getCartPro('0', '1');
         echo sizeof($data);
    }

    function payRedeeme() {
        $score = intval(($this->input->post('score') * 10) / 100);
        $this->Store->updateCart('1');
        $res = $this->User->update_points($userid, $score, '+');
        echo '1';
    }

    function load_cart() {
//        $data['completed']=  $this->Hotel->get_completed('1');
//    // print_r($data);
        $data['purchase'] = $this->Store->getCartPro('0', '1');
        // print_r($data['purchase']);
        $data['userdet'] = $this->User->getById('1');
        $this->load->view('libraries_tem');
        $this->load->view('cart', $data);
    }

    function addToCart() {
        $id = $this->input->post('id');
        $pur = $this->input->post('purchase');
        $res = $this->Store->addtoCart($id, $pur, 1, '1');
        echo $res;
    }

    function deletFromCart() {
        $id = $this->input->post('id');
        $res = $this->Store->deleteCart($id);
        echo $res;
    }

    public function purchase() {

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

    // public function notify_payment(){
    //     $received_data =print_r($this->input->post(),TRUE);
    //     echo "<pre>".$received_data."</pre>";
    // }
}

?>
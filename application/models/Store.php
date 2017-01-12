<?php

class Store extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function addProduct($product_name, $product_description, $product_type, $product_price, $imgurl) {
        $data = array(
            'item_name' => $product_name,
            'item_description	' => $product_description,
            'type' => $product_type,
            'productPrice' => $product_price,
            'image' => $imgurl,
        );
        $result = $this->db->insert('product', $data);
        return $result;
    }

    function updateCart($userid) {
        $data = array(
            'purchase' => '1',
        );
        $this->db->where('userid', $userid);
        $result = $this->db->update('cart', $data);
        return $result;
    }

    function deleteCart($userid) {
        $to = 0;
        $to1 = 0;
        $this->db->select('*');
        $array = array('cartid' => $userid);
        $this->db->where($array);
        $query = $this->db->get('cart');

        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $roww) {
                $to = $roww->productid;
                $this->db->select('*');
                $array1 = array('item_id' => $to);
                $this->db->where($array1);
                $query1 = $this->db->get('item');

                if ($query1->num_rows() > 0) {
                    $result1 = $query1->result();
                    foreach ($result1 as $roww1) {
                        $to1=$roww1->item_price;
                    }
                }
            }
        }
        
        $this->db->where('cartid', $userid);
        $res = $this->db->delete('cart');
        return $to1;
    }

    function getProducts() {
        $jsonarray = array();
        $this->db->select('*');
        $query = $this->db->get('item');

        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $rowres) {
                $this->db->select('*');
                $this->db->where('id', $rowres->type);
                $query1 = $this->db->get('category');
                $typee;
                if ($query1->num_rows() > 0) {
                    $result1 = $query1->result();
                    foreach ($result1 as $rowres1) {
                        $typee = $rowres1->name;
                    }
                }
                $jsonarray1 = array(
                    'item_id' => $rowres->item_id,
                    'item_name' => $rowres->item_name,
                    'item_description' => $rowres->item_description,
                    'item_price' => $rowres->item_price,
                    'type' => $rowres->type,
                    'image' => $rowres->image,
                    'typedes' => $typee
                ); //print_r($jsonarray);

                array_push($jsonarray, $jsonarray1);
            }
            return json_encode($jsonarray);
        } else {
            return NULL;
        }
    }

    function addtoCart($id, $name, $qty, $useris) {

        $data = array('productid' => $id, 'purchase' => $name, 'quantity' => $qty, 'userid' => $useris);
        $result = $this->db->insert('cart', $data);
        return $result;
    }

    function getCat() {

        $this->db->select('*');
        $query = $this->db->get('category');

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return NULL;
        }
    }

    function getCartPro($pur, $userid) {
        $jsonarray = array();
        $this->db->select('*');
        $array = array('purchase' => $pur, 'userid' => $userid);
        $this->db->where($array);
        $query = $this->db->get('cart');

        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as $row) {
                $this->db->select('*');
                $array1 = array('item_id' => $row->productid);
                $this->db->where($array1);
                $query1 = $this->db->get('item');

                if ($query1->num_rows() > 0) {
                    $result1 = $query1->result();
                    foreach ($result1 as $row1) {
                        $jsonarray1 = array(
                            'cartid' => $row->cartid,
                            'item_id' => $row1->item_id,
                            'item_name' => $row1->item_name,
                            'item_description' => $row1->item_description,
                            'item_price' => $row1->item_price,
                            'type' => $row1->type,
                            'image' => $row1->image,
                            'quantity' => $row->quantity
                        ); //print_r($jsonarray);

                        array_push($jsonarray, $jsonarray1);
                    }
                }
            }
            return json_encode($jsonarray);
        } else {
            return NULL;
        }
    }

    function getProductDetail($id) {

        $this->db->select('*');
        $this->db->where('productid', $id);
        // $query = $this->db->get('books');
        $q = $this->db->get('product');
        return $data = $q->result_array();
    }

//    function get($email) {
//        $this->db->select('*');
//        $this->db->from('user');
//        $this->db->where('email', $email);
//        $query = $this->db->get();
//        if ($query->num_rows() > 0) {
//            $result = $query->result();
//            return $result;
//        }
}

?>

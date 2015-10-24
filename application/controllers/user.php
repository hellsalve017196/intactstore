<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
    private $delivery_cost = 50;

    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $this->load->model("pagetransition");


        $slider = $this->pagetransition->sliders();
        $catagory = $this->pagetransition->catagory();
        $brand = $this->pagetransition->brand();
        $products = $this->pagetransition->products();
        $small_add = $this->pagetransition->small_add();

        $this->load->view("main/head");
        $this->load->view("main/top_menu");

        $this->load->view("main/slider",array("data"=>$slider));

        $this->load->view("main/side_menu",array("catagory"=>$catagory,"brand"=>$brand,"small_add"=>$small_add));

        $this->load->view("main/home",array("product"=>$products,"catagory"=>$catagory));
        $this->load->view("main/footer");
        $this->load->view("main/ending");
    }


    public function product_list($id = -1,$flag = '-1')
    {
        $this->load->model("pagetransition");

        $catagory = $this->pagetransition->catagory();
        $brand = $this->pagetransition->brand();
        $products = $this->pagetransition->products($id,$flag);
        $small_add = $this->pagetransition->small_add();
        
        $this->load->view("main/head");
        $this->load->view("main/top_menu");

        $this->load->view("main/side_menu",array("catagory"=>$catagory,"brand"=>$brand,"small_add"=>$small_add));

        $this->load->view("main/product_list",array("product"=>$products));
        $this->load->view("main/footer");
        $this->load->view("main/ending");
    }

    public function checkout()
    {
        $data = json_decode($this->input->cookie("key"),true);

        $this->load->view("main/head");
        $this->load->view("main/top_menu");


        $this->load->view("main/checkout",array("key"=>$data,"cost"=>$this->delivery_cost));
        $this->load->view("main/footer");
        $this->load->view("main/ending");
    }

    public function contact()
    {
        $this->load->view("main/head");
        $this->load->view("main/top_menu");


        $this->load->view("main/contact",array("error"=>""));
        $this->load->view("main/footer");
        $this->load->view("main/ending");
    }

    public function product_detail($id)
    {
        $this->load->model("pagetransition");

        $catagory = $this->pagetransition->catagory();
        $brand = $this->pagetransition->brand();
        $perticular_product = $this->pagetransition->single_product($id);
        $recomended_product = $this->pagetransition->recomended_product($id,$perticular_product['c_id']);
        $small_add = $this->pagetransition->small_add();


        $this->load->view("main/head");
        $this->load->view("main/top_menu");

        $this->load->view("main/side_menu",array("catagory"=>$catagory,"brand"=>$brand,"small_add"=>$small_add));

        $this->load->view("main/product_detail",array("single_product"=>$perticular_product,"other_product"=>$recomended_product));

        $this->load->view("main/footer");
        $this->load->view("main/another_ending");
    }

    //for transition

    public function add_to_cart($id,$amount = 1)
    {
        $this->load->model('takatransition');


        if($this->takatransition->duplicate($id))
        {
            $data = json_encode($this->takatransition->taka_calculate($id,$amount));

            $cookie = array(
                'name'   => $id,
                'value'  => $data,
                'expire' => '86400'
            );


            $this->input->set_cookie($cookie);


            if($this->input->cookie("key"))
            {
                $data = json_decode($this->input->cookie("key"),true);
                $index = sizeof($data);
                $data[$index] = $id;

                $this->input->set_cookie(array("name"=>"key","value"=>json_encode($data),"expire"=>"86400"));
            }
            else
            {
                $data = array();
                $data[0] = $id;

                $this->input->set_cookie(array("name"=>"key","value"=>json_encode($data),"expire"=>"86400"));
            }

        }

        header("location:".base_url().'user/cart_fetch#cart_items');
    }


    public function cart_delete($id)
    {
        $this->load->model("takatransition");
        $data = $this->takatransition->remove_key($id,json_decode($this->input->cookie('key'),true));

        delete_cookie("key");
        $this->input->set_cookie(array("name"=>"key","value"=>json_encode($data),"expire"=>"86400"));

        delete_cookie($id);
        header("location:".base_url().'user/cart_fetch#cart_items');
    }

    public function cart_fetch()
    {
        $data = json_decode($this->input->cookie("key"),true);

        $this->load->view("main/head");
        $this->load->view("main/top_menu");


        $this->load->view("main/cart",array("key"=>$data,"cost"=>$this->delivery_cost));
        $this->load->view("main/footer");
        $this->load->view("main/ending");
    }

    public function cart_product_add($id,$amount)
    {
        $this->load->model("takatransition");

        $this->takatransition->add_amount($id,$amount);

        header("location:".base_url().'user/cart_fetch#cart_items');
    }

    public function cart_product_subtract($id,$amount)
    {
        $this->load->model("takatransition");

        $this->takatransition->subtract_amount($id,$amount);

        header("location:".base_url().'user/cart_fetch#cart_items');
    }

    public function order()
    {
        if ($this->session->userdata("login") == NULL) {
            $this->load->library("form_validation");

            $this->form_validation->set_rules('name', 'username', 'required');
            $this->form_validation->set_rules('number', 'user phone number', 'required');
            $this->form_validation->set_rules('email', 'user email', 'required');
            $this->form_validation->set_rules('address', 'user address', 'required');
            $this->form_validation->set_rules('password', 'user password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->cart_fetch();
            } else {
                $name = $this->input->post('name');
                $phone = $this->input->post('number');
                $email = $this->input->post('email');
                $address = $this->input->post('address');
                $password = $this->input->post('password');

                $this->load->model('takatransition');

                $filename = $this->takatransition->order($name, $phone, $email, $address);

                $this->takatransition->sign_up(array("u_name"=>$name,"u_email"=>$email,"u_password"=>$password,"u_phone"=>$phone,"u_address"=>$address));

                $this->cashmemo($filename);
            }
        }
        else {
            $data = $this->session->userdata("login");

            $name = $data['u_name'];
            $phone = $data['u_phone'];
            $email = $data['u_email'];
            $address = $data['u_address'];

            $this->load->model('takatransition');

            $filename = $this->takatransition->order($name, $phone, $email, $address);

            $this->cashmemo($filename);
        }


    }

    public function cashmemo($filename = '')
    {
        if($filename != '')
        {
            $this->load->view("main/head");
            $this->load->view("main/top_menu");


            $this->load->view("main/success",array("filename"=>$filename));
            $this->load->view("main/footer");
            $this->load->view("main/ending");
        }
        else
        {
            $this->index();
        }

    }

    public function contact_go()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules('name', 'product name', 'required');
        $this->form_validation->set_rules('email', 'product catagory', 'required');
        $this->form_validation->set_rules('subject', 'product brand', 'required');
        $this->form_validation->set_rules('message', 'product des', 'required');

        $msg = '';
        if($this->form_validation->run() == TRUE)
        {
            $this->load->model('pagetransition');
            $msg = $this->pagetransition->contact($this->input->post('name'),$this->input->post('email'),$this->input->post('subject'),$this->input->post('message'));
        }
        else
        {
            $msg = "please fill out the form properly";
        }

        $this->load->view("main/head");
        $this->load->view("main/top_menu");


        $this->load->view("main/contact",array("error"=>$msg));
        $this->load->view("main/footer");
        $this->load->view("main/ending");
    }


    public function user_login()
    {
        $this->load->model('takatransition','t');

        $data = json_decode($this->input->post('login'),true);

        if($this->t->login($data))
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function log_out()
    {
        $this->session->unset_userdata("login");
        $this->index();
        redirect(base_url(),'refresh');
    }
}

?>

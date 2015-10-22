<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
    public function index()
    {
        $this->login_form();
    }

    /*login*/
    public function login_form()
    {
        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_login",array("title"=>"login with valid username and password"));
        $this->load->view("admin/admin_footer");
    }

    /*catagory*/

    public function add_catagory_form()
    {
        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_simple_form",array("title"=>" add new catagory","input"=>"catagory name:","name"=>"catagory","des"=>base_url()."admin/add_catagory","flag"=>""));
        $this->load->view("admin/admin_footer");
    }

    public function add_catagory()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules('catagory', 'catagory', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view("admin/admin_header");
            $this->load->view("admin/admin_menu");
            $this->load->view("admin/admin_simple_form",array("title"=>" add new catagory","input"=>"catagory name:","name"=>"catagory","des"=>base_url()."admin/add_catagory","flag"=>"please fill the form properly"));
            $this->load->view("admin/admin_footer");
        }
        else
        {
            $this->load->model('product');

            if($this->product->add_catagory($this->input->post("catagory")))
            {
                $this->load->view("admin/admin_header");
                $this->load->view("admin/admin_menu");
                $this->load->view("admin/admin_simple_form",array("title"=>" add new catagory","input"=>"catagory name:","name"=>"catagory","des"=>base_url()."admin/add_catagory","flag"=>"successfully added"));
                $this->load->view("admin/admin_footer");
            }
            else
            {
                $this->load->view("admin/admin_header");
                $this->load->view("admin/admin_menu");
                $this->load->view("admin/admin_simple_form",array("title"=>" add new catagory","input"=>"catagory name:","name"=>"catagory","des"=>base_url()."admin/add_catagory","flag"=>"error occured"));
                $this->load->view("admin/admin_footer");
            }

        }

    }

    public function update_catagory_form()
    {

        $this->load->model("product");
        $data = $this->product->catagory_list();


        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_sample_updater",array("title"=>" catagory list","topic"=>"catagory","flag"=>"please fill the form properly","des"=>base_url().'admin/update_catagory/',"after"=>base_url().'admin/update_catagory_form',"datas"=>$data,"delete"=>base_url().'admin/delete_catagory/',"hudai"=>true));
        $this->load->view("admin/admin_footer");
    }

    public function update_catagory($id,$name)
    {
        $this->load->model("product");
        $this->product->catagory_update($id,$name);
    }

    public function delete_catagory($id)
    {
        $this->load->model("product");

        $this->product->catagory_delete($id);

        $this->update_catagory_form();
    }
    /*catagory*/


    /*brand*/

    public function add_brand_form()
    {
        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_simple_form",array("title"=>" add new brand","input"=>"brand name:","name"=>"brand","des"=>base_url()."admin/add_brand","flag"=>""));
        $this->load->view("admin/admin_footer");
    }

    public function add_brand()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules('brand', 'brand', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view("admin/admin_header");
            $this->load->view("admin/admin_menu");
            $this->load->view("admin/admin_simple_form",array("title"=>" add new brand","input"=>"brand name:","name"=>"brand","des"=>base_url()."admin/add_brand","flag"=>"please fill the form properly","hudai"=>true));
            $this->load->view("admin/admin_footer");
        }
        else
        {
            $this->load->model('product');

            if($this->product->add_brand($this->input->post("brand")))
            {
                $this->load->view("admin/admin_header");
                $this->load->view("admin/admin_menu");
                $this->load->view("admin/admin_simple_form",array("title"=>" add new brand","input"=>"brand name:","name"=>"brand","des"=>base_url()."admin/add_brand","flag"=>"successfully added","hudai"=>true));
                $this->load->view("admin/admin_footer");
            }
            else
            {
                $this->load->view("admin/admin_header");
                $this->load->view("admin/admin_menu");
                $this->load->view("admin/admin_simple_form",array("title"=>" add new brand","input"=>"brand name:","name"=>"brand","des"=>base_url()."admin/add_brand","flag"=>"error occured","hudai"=>true));
                $this->load->view("admin/admin_footer");
            }

        }

    }

    public function update_brand_form()
    {

        $this->load->model("product");
        $data = $this->product->brand_list();


        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_sample_updater",array("title"=>"brand list","topic"=>"brand","flag"=>"please fill the form properly","des"=>base_url().'admin/update_brand/',"after"=>base_url().'admin/update_brand_form',"datas"=>$data,"delete"=>base_url().'admin/delete_brand/',"hudai"=>true));
        $this->load->view("admin/admin_footer");
    }

    public function update_brand($id,$name)
    {
        $this->load->model("product");
        $this->product->brand_update($id,$name);
    }

    public function delete_brand($id)
    {
        $this->load->model("product");

        $this->product->brand_delete($id);

        $this->update_brand_form();
    }
    /*catagory*/

    /*product*/
    public function add_product_form()
    {
        $this->load->model("product");
        $brand = $this->product->brand_list();
        $catagory = $this->product->catagory_list();


        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_add_product",array("title"=>" add product","flag"=>"","brand"=>$brand,"catagory"=>$catagory));
        $this->load->view("admin/admin_footer");
    }

    public function add_product()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules('p_n', 'product name', 'required');
        $this->form_validation->set_rules('p_c', 'product catagory', 'required');
        $this->form_validation->set_rules('p_b', 'product brand', 'required');
        $this->form_validation->set_rules('p_d', 'product des', 'required');
        $this->form_validation->set_rules('p_p', 'product price', 'required');

        $this->load->model("product");
        $brand = $this->product->brand_list();
        $catagory = $this->product->catagory_list();

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view("admin/admin_header");
            $this->load->view("admin/admin_menu");
            $this->load->view("admin/admin_add_product",array("title"=>" add product","flag"=>"please fill the form properly","brand"=>$brand,"catagory"=>$catagory));
            $this->load->view("admin/admin_footer");
        }
        else{
            $p_n = $this->input->post("p_n");
            $p_c = $this->input->post("p_c");
            $p_b = $this->input->post("p_b");
            $p_d = $this->input->post("p_d");
            $p_p = $this->input->post("p_p");


            $config["upload_path"] = "./product/";
            $config["allowed_types"] = "*";
            $config['encrypt_name'] = TRUE;

            $this->load->library("upload",$config);

            if($this->upload->do_upload())
            {
                $file = $this->upload->data();
                $filename = $file['file_name'];

                $this->load->model("simpleimage");
                $this->simpleimage->load("product/".$filename);
                $this->simpleimage->resize(1024,768);
                $this->simpleimage->save("product/".$filename);


                if($this->product->add_product($p_n,$p_c,$p_b,$p_d,$p_p,$filename))
                {
                    $this->load->view("admin/admin_header");
                    $this->load->view("admin/admin_menu");
                    $this->load->view("admin/admin_add_product",array("title"=>" add product","flag"=>"successfully added","brand"=>$brand,"catagory"=>$catagory));
                    $this->load->view("admin/admin_footer");
                }
                else
                {
                    $this->load->view("admin/admin_header");
                    $this->load->view("admin/admin_menu");
                    $this->load->view("admin/admin_add_product",array("title"=>" add product","flag"=>"something went wrong","brand"=>$brand,"catagory"=>$catagory));
                    $this->load->view("admin/admin_footer");
                }
            }
        }
    }

    public function update_product_form()
    {

        $this->load->model("product");
        $data = $this->product->product_list();


        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_sample_updater",array("title"=>"product list","topic"=>"product name","flag"=>"please fill the form properly","des"=>base_url().'admin/update_brand/',"after"=>base_url().'admin/update_brand_form',"datas"=>$data,"delete"=>base_url().'admin/delete_product/',"hudai"=>false));
        $this->load->view("admin/admin_footer");
    }

    public function delete_product($id)
    {
        $this->load->model("product");

        $this->product->product_delete($id);

        $this->update_product_form();
    }

    public function update_product_detail_form($id)
    {
        $this->load->model("product");
        $brand = $this->product->brand_list();
        $catagory = $this->product->catagory_list();

        $product = $this->product->single_product($id);


        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_product_update_form",array("title"=>" update product","flag"=>"","brand"=>$brand,"catagory"=>$catagory,"row"=>$product));
        $this->load->view("admin/admin_footer");

    }

    public function update_product()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules('p_n', 'product name', 'required');
        $this->form_validation->set_rules('p_c', 'product catagory', 'required');
        $this->form_validation->set_rules('p_b', 'product brand', 'required');
        $this->form_validation->set_rules('p_d', 'product des', 'required');
        $this->form_validation->set_rules('p_p', 'product price', 'required');

        if($this->form_validation->run() == FALSE)
        {
           $this->update_product_detail_form($this->input->post('p_id'));
        }
        else
        {
            $p_n = $this->input->post("p_n");
            $p_c = $this->input->post("p_c");
            $p_b = $this->input->post("p_b");
            $p_d = $this->input->post("p_d");
            $p_p = $this->input->post("p_p");

            $this->load->model("product");
            if($this->product->update_product($this->input->post('p_id'),$p_n,$p_c,$p_b,$p_d,$p_p))
            {
                $this->update_product_form();
            }

        }

    }
    /*product*/


    /*advertize */

    public function add_advertize_form()
    {
        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_add_advertize",array("title"=>"add new advertize","flag"=>""));
        $this->load->view("admin/admin_footer");
    }

    public function add_advertize()
    {
        try
        {
            $config["upload_path"] = "./advertize/";
            $config["allowed_types"] = "*";
            $config['encrypt_name'] = TRUE;

            $this->load->library("upload",$config);

            if($this->upload->do_upload())
            {
                $file = $this->upload->data();
                $filename = $file['file_name'];

                $this->load->model("simpleimage");
                $this->simpleimage->load("advertize/".$filename);
                $this->simpleimage->resize(1150,441);
                $this->simpleimage->save("advertize/".$filename);


                $this->load->model('product');

                if($this->product->add_advertize($filename))
                {
                    $this->load->view("admin/admin_header");
                    $this->load->view("admin/admin_menu");
                    $this->load->view("admin/admin_add_advertize",array("title"=>"add new advertize","flag"=>"successfully added"));
                    $this->load->view("admin/admin_footer");
                }

            }
        }
        catch(Exception $e)
        {
            $this->add_advertize_form();
        }

    }

    public function advertize_list()
    {
        $this->load->model("product");

        $data = $this->product->advertize_list();


        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_advertize_list",array("title"=>"advertize list","data"=>$data));
        $this->load->view("admin/admin_footer");
    }

    public function delete_advertize($id,$filename)
    {
        $this->load->model("product");

        if($this->product->delete_advertize($id,$filename))
        {
            $this->advertize_list();
        }
    }

    public function logout()
    {
        $this->index();
    }

    /*order*/
    public function orders()
    {
        $this->load->model("product");
        $data = $this->product->order_list();

        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_order_list",array("title"=>"Order list","data"=>$data));
        $this->load->view("admin/admin_footer");
    }

    public function delete_order($key)
    {

        $this->load->model("product");

        $this->product->delete_order($key);

        header("location:".base_url().'admin/orders');
    }

    /*small advertize*/
    public function add_small_advertize_form()
    {
        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_add_small_advertize",array("title"=>"add new small advertize","flag"=>""));
        $this->load->view("admin/admin_footer");
    }

    public function add_small_advertize()
    {
        try
        {
            $config["upload_path"] = "./small-add/";
            $config["allowed_types"] = "*";
            $config['encrypt_name'] = TRUE;

            $this->load->library("upload",$config);

            if($this->upload->do_upload())
            {
                $file = $this->upload->data();
                $filename = $file['file_name'];

                $this->load->model("simpleimage");
                $this->simpleimage->load("small-add/".$filename);
                $this->simpleimage->resize(270,329);
                $this->simpleimage->save("small-add/".$filename);


                $this->load->model('product');

                if($this->product->add_small_advertize($filename))
                {
                    $this->load->view("admin/admin_header");
                    $this->load->view("admin/admin_menu");
                    $this->load->view("admin/admin_add_small_advertize",array("title"=>"add new advertize","flag"=>"successfully added"));
                    $this->load->view("admin/admin_footer");
                }

            }
        }
        catch(Exception $e)
        {
            $this->add_small_advertize();
        }
    }

    public function small_advertize_list()
    {
        $this->load->model("product");

        $data = $this->product->small_advertize_list();


        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_menu");
        $this->load->view("admin/admin_small_advertize",array("title"=>"small advertize list","data"=>$data));
        $this->load->view("admin/admin_footer");
    }

    public function delete_small_advertize($id,$filename)
    {
        $this->load->model("product");

        if($this->product->delete_small_advertize($id,$filename))
        {
            $this->small_advertize_list();
        }
    }
}

?>

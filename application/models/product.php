<?php

class product extends CI_Model
{

    /*catagory*/

    public function add_catagory($name)
    {
        $flag = false;

        if($this->db->query("INSERT INTO catagory VALUES(NULL,'".$name."')"))
        {
            $flag = true;
        }

        return $flag;
    }

    public function catagory_list()
    {
        $query = $this->db->query("SELECT c_id AS id,c_name AS name FROM catagory ORDER BY c_id DESC");
        $data = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result_array() as $r)
            {
                $data[] = $r;
            }
        }

        return $data;
    }

    public function catagory_delete($id)
    {
        $flag = false;

        if($this->db->query("DELETE FROM catagory WHERE c_id = ".$id))
        {
            $query = $this->db->query("SELECT p_id,p_img FROM product WHERE c_id= '".$id."' ");

            if($query->num_rows() > 0)
            {
                foreach($query->result_array() as $r)
                {
                    unlink('product/'.$r['p_img']);

                    $this->db->query("DELETE FROM product WHERE p_id = ".$r['p_id']);
                }
            }

            $flag = true;
        }

        return $flag;
    }

    public function catagory_update($id,$name)
    {
        $query = $this->db->query("UPDATE catagory SET c_name = '".$name."' WHERE c_id = ".$id);
    }


    /*brand*/

    public function add_brand($name)
    {
        $flag = false;

        if($this->db->query("INSERT INTO brand VALUES(NULL,'".$name."')"))
        {
            $flag = true;
        }

        return $flag;
    }

    public function brand_list()
    {
        $query = $this->db->query("SELECT b_id AS id,b_name AS name FROM brand ORDER BY b_id DESC");
        $data = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result_array() as $r)
            {
                $data[] = $r;
            }
        }

        return $data;
    }

    public function brand_delete($id)
    {
        $flag = false;

        if($this->db->query("DELETE FROM brand WHERE b_id = ".$id))
        {
            $flag = true;
        }

        return $flag;
    }

    public function brand_update($id,$name)
    {
        $query = $this->db->query("UPDATE brand SET b_name = '".$name."' WHERE b_id = ".$id);
    }


    /*product*/
    public function add_product($p_n,$p_c,$p_b,$p_d,$p_p,$p_q,$p_img)
    {
        $flag = false;

        if($this->db->insert('product',array("c_id"=>$p_c,"b_id"=>$p_b,"p_name"=>$p_n,"p_des"=>$p_d,"p_img"=>$p_img,"p_price"=>$p_p,"p_rate"=>0,"p_count"=>$p_q)))
        {
            $flag = true;
        }

        return $flag;
    }

    public function product_list()
    {
        $query = $this->db->query("SELECT p_id AS id,p_count,p_name AS name FROM product ORDER BY b_id DESC");
        $data = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result_array() as $r)
            {
                $data[] = $r;
            }
        }

        return $data;
    }

    public function product_delete($id)
    {
        $flag = false;


        $query = $this->db->query("SELECT p_id,p_img FROM product WHERE p_id= '".$id."' ");

        if($query->num_rows() > 0)
        {
           foreach($query->result_array() as $r)
           {
                    unlink('product/'.$r['p_img']);

                    $this->db->query("DELETE FROM product WHERE p_id = ".$r['p_id']);
           }
        }

            $flag = true;


        return $flag;
    }

    public function single_product($id)
    {
        $data = array();

        $query = $this->db->query("SELECT product.p_id AS p_id,product.p_count AS p_count,product.c_id AS c_id,product.b_id AS b_id,product.p_name AS p_name,product.p_des AS p_des,product.p_img AS p_img,product.p_price AS p_price,catagory.c_name AS c_name,brand.b_name AS b_name
FROM product JOIN catagory ON product.c_id = catagory.c_id JOIN brand ON product.b_id = brand.b_id AND product.p_id =".$id);

        if($query->num_rows() > 0)
        {
            $data = $query->row_array();
        }

        return $data;
    }

    public function update_product($p_id,$p_n,$p_c,$p_b,$p_d,$p_p,$p_q)
    {
        $flag = false;

        if($this->db->query("UPDATE product SET c_id = ".$p_c.",b_id = ".$p_b.",p_name = '".$p_n."',p_des = '".$p_d."',p_price = '".$p_p."',p_count = ".$p_q." WHERE p_id = ".$p_id))
        {
            $flag = true;
        }

        return $flag;
    }

    public function add_advertize($filename)
    {
        $flag = false;

        if($this->db->query("INSERT INTO advertize VALUES(NULL,'".$filename."')"))
        {
            $flag = true;
        }

        return $flag;
    }

    public function advertize_list()
    {
        $data = array();

        $query = $this->db->query("SELECT a_id,a_img FROM advertize ORDER BY a_id DESC");

        if($query->num_rows() > 0)
        {
            foreach($query->result_array() as $r)
            {
                $data[] = $r;
            }
        }

        return $data;
    }

    public function delete_advertize($id,$filename)
    {
        $flag = false;

        if(unlink('advertize/'.$filename))
        {
            $this->db->query("DELETE FROM advertize WHERE a_id = ".$id);

            $flag = true;
        }

        return $flag;
    }

    public function add_small_advertize($filename)
    {
        $flag = false;

        if($this->db->query("INSERT INTO small_add VALUES(NULL,'".$filename."')"))
        {
            $flag = true;
        }

        return $flag;
    }

    public function small_advertize_list()
    {
        $data = array();

        $query = $this->db->query("SELECT s_id,s_dir FROM small_add ORDER BY s_id DESC");

        if($query->num_rows() > 0)
        {
            foreach($query->result_array() as $r)
            {
                $data[] = $r;
            }
        }

        return $data;
    }

    public function delete_small_advertize($id,$filename)
    {
        $flag = false;

        if(unlink('small-add/'.$filename))
        {
            $this->db->query("DELETE FROM small_add WHERE s_id = ".$id);

            $flag = true;
        }

        return $flag;
    }

    public function order_list()
    {
        $files = array();
        $path = 'orders';

        if(count(scandir($path)) != 2)
        {
            $handle = opendir($path);

            while($read = readdir($handle))
            {
                if(($read != '.') and ($read != '..'))
                {
                    $files[] = $read;
                }
            }
        }

        sort($files,SORT_NATURAL);

        return $files;
    }

    public function delete_order($file)
    {
        $path = "orders/".$file;
        $flag = false;

        if(unlink($path))
        {
            $file = true;
        }

        return $flag;
    }
}

?>
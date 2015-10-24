<?php
    class pagetransition extends CI_Model
    {
        public function sliders()
        {
            $data = array();
            $query = $this->db->query("SELECT a_img FROM advertize ORDER BY a_id DESC LIMIT 4");

            if($query->num_rows() > 0)
            {
                foreach($query->result_array() as $r)
                {
                    $data[] = $r;
                }
            }

            return $data;
        }

        public function products($id = -1,$flag = '-1')
        {
            $data = array();
            if($id == -1)
            {
                $query = $this->db->query("SELECT product.p_id AS p_id,product.p_count AS p_count,product.c_id AS c_id,product.b_id AS b_id,product.p_name AS p_name,product.p_des AS p_des,product.p_img AS p_img,product.p_price AS p_price,catagory.c_name AS c_name,brand.b_name AS b_name
                FROM product JOIN catagory ON product.c_id = catagory.c_id JOIN brand ON product.b_id = brand.b_id ORDER BY product.p_id DESC");
            }
            else
            {
                if($flag == 'c_id')
                {
                    $query = $this->db->query("SELECT product.p_id AS p_id,product.c_id AS c_id,product.p_count AS p_count,product.b_id AS b_id,product.p_name AS p_name,product.p_des AS p_des,product.p_img AS p_img,product.p_price AS p_price,catagory.c_name AS c_name,brand.b_name AS b_name
                FROM product JOIN catagory ON product.c_id = catagory.c_id JOIN brand ON product.b_id = brand.b_id AND product.c_id = ".$id." ORDER BY product.p_id DESC");

                }
                else if($flag == 'b_id')
                {

                    $query = $this->db->query("SELECT product.p_id AS p_id,product.p_count AS p_count,product.c_id AS c_id,product.b_id AS b_id,product.p_name AS p_name,product.p_des AS p_des,product.p_img AS p_img,product.p_price AS p_price,catagory.c_name AS c_name,brand.b_name AS b_name
                FROM product JOIN catagory ON product.c_id = catagory.c_id JOIN brand ON product.b_id = brand.b_id AND product.b_id = ".$id." ORDER BY product.p_id DESC");

                }
                else if($flag == 's_id')
                {
                    $query = $this->db->query("SELECT product.p_id AS p_id,product.p_count AS p_count,product.c_id AS c_id,product.b_id AS b_id,product.p_name AS p_name,product.p_des AS p_des,product.p_img AS p_img,product.p_price AS p_price,catagory.c_name AS c_name,brand.b_name AS b_name
                FROM product JOIN catagory ON product.c_id = catagory.c_id JOIN brand ON product.b_id = brand.b_id WHERE product.p_name LIKE '%".$id."%' ORDER BY product.p_id DESC");
                }
            }

            if($query->num_rows() > 0)
            {
                foreach($query->result_array() as $r)
                {
                    $data[] = $r;
                }
            }

            return $data;
        }

        public function brand()
        {
            $data = array();
            $query = $this->db->query("SELECT product.b_id,COUNT(product.p_id) AS num_of_items,brand.b_name FROM product JOIN brand ON product.b_id = brand.b_id GROUP BY product.b_id ORDER BY product.p_id DESC");

            if($query->num_rows() > 0)
            {
                foreach($query->result_array() as $r)
                {
                    $data[] = $r;
                }
            }

            return $data;
        }


        public function catagory()
        {
            $data = array();
            $query = $this->db->query("SELECT product.c_id,COUNT(product.p_id) AS num_of_items,catagory.c_name FROM product JOIN catagory ON product.c_id = catagory.c_id GROUP BY product.c_id ORDER BY product.p_id DESC");

            if($query->num_rows() > 0)
            {
                foreach($query->result_array() as $r)
                {
                    $data[] = $r;
                }
            }

            return $data;
        }

        public function single_product($id)
        {
            $data = array();

            $query = $this->db->query("SELECT product.p_id AS p_id,product.c_id AS c_id,product.b_id AS b_id,product.p_name AS p_name,product.p_des AS p_des,product.p_img AS p_img,product.p_price AS p_price,catagory.c_name AS c_name,brand.b_name AS b_name
FROM product JOIN catagory ON product.c_id = catagory.c_id JOIN brand ON product.b_id = brand.b_id AND product.p_id = ".$id."");

            if($query->num_rows() > 0)
            {
                $data = $query->row_array();
            }

            return $data;
        }

        public function recomended_product($id,$c_id)
        {
            $data = array();
            $query = $this->db->query("SELECT p_id,p_count,p_name,p_img,p_price FROM product WHERE p_id <> ".$id." AND c_id = '".$c_id."' ORDER BY p_id DESC LIMIT 9");

            if($query->num_rows() > 0)
            {
                foreach($query->result_array() as $r)
                {
                    $data[] = $r;
                }
            }

            return $data;
        }

        public function small_add()
        {
            $data = array();
            $query = $this->db->query("SELECT s_dir FROM small_add ORDER BY s_id DESC LIMIT 5");

            if($query->num_rows() > 0)
            {
                foreach($query->result_array() as $r)
                {
                    $data[] = $r;
                }
            }

            return $data;
        }

        public function contact($name,$email,$subject,$message)
        {
            return 'success';
        }
    }
?>
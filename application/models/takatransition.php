<?php
class takatransition extends CI_Model
{
    private $charge = 100;
    private $mail = "em5_11@hotmail.com";

    public function taka_calculate($id,$amount)
    {
        $query = $this->db->query("SELECT p_id,p_name,p_price,p_img FROM product WHERE p_id = ".$id);
        $data = array();

        if($query->num_rows() > 0)
        {
            $data = $query->row_array();
        }

        $data['p_amount'] = $amount;

        return $data;
    }

    public function duplicate($id)
    {
        $data = json_decode($this->input->cookie("key"),true);
        $flag = true;

        if(sizeof($data) > 0)
        {
            if(($key = array_search($id,$data))!==false)
            {
                $flag = false;
            }
        }

        return $flag;
    }

    public function remove_key($id,$data)
    {
        $local = (array)$data;

        if(($key = array_search($id,$data))!==false)
        {
            unset($local[$key]);
        }

        return $local;
    }

    public function add_amount($id,$amount)
    {
        $data = json_decode(get_cookie($id),true);

        $flag = $amount + 1;

        if($flag > 0)
        {
            $data['p_amount'] = $flag;
        }
        delete_cookie($id);

        $data = json_encode($data);

        $cookie = array(
            'name'   => $id,
            'value'  => $data,
            'expire' => '86400'
        );

        $this->input->set_cookie($cookie);
    }

    public function subtract_amount($id,$amount)
    {
        $data = json_decode(get_cookie($id),true);

        $flag = $amount - 1;

        if($flag > 0)
        {
            $data['p_amount'] = $flag;
        }
        delete_cookie($id);

        $data = json_encode($data);

        $cookie = array(
            'name'   => $id,
            'value'  => $data,
            'expire' => '86400'
        );

        $this->input->set_cookie($cookie);
    }

    public function sign_up($data)
    {
        $flag = false;

        if($this->db->insert("user",$data))
        {
            $this->session->set_userdata('login',$data);
            $flag = true;
        }

        return $flag;
    }

    public function order($name,$number,$email,$address)
    {
        date_default_timezone_set("Asia/Dacca");

        $key = json_decode(get_cookie("key"),true);
        $filename = date('d-m-Y~h-iA').'.html';

        $str = '<html>
	<head></head>
	<body>
	       <div align="center">
			<h1>KroyKorun.com</h1>
		</div>

		<table align="center" border="1" cellpadding="5">
			<tr>
				<td>Name:</td>
				<td>'.$name.'</td>
			</tr>
			<tr>
				<td>Phone:</td>
				<td>'.$number.'</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>'.$email.'</td>
			</tr>
			<tr>
				<td>Address:</td>
				<td>'.$address.'</td>
			</tr>
			<tr>
				<td>Time:</td>
				<td>'.date('d-m-Y h:i:s A').'</td>
			</tr>
		</table>
		<br><table align="center" border="1" cellpadding="5">
			<tr>
				<td>Product id</td>
				<td>Product Name</td>
				<td>Product Price</td>
				<td>Quantity</td>
				<td>Total</td>
			</tr>';

        if(sizeof($key) > 0)
        {
            $product = 0;
            foreach($key as $k)
            {
                $data = json_decode(get_cookie($k),true);
                $p = $data['p_price']*$data['p_amount'];
                $str = $str .'<tr><td>'.$data['p_id'].'</td><td>'.$data['p_name'].'</td><td>'.$data['p_price'].' taka</td><td>'.$data['p_amount'].'</td><td>'.$data['p_price']*$data['p_amount'].' taka</td></tr>';
                $product = $p + $product;

                $this->dec_stock_product($data['p_id'],$data['p_amount']);

                delete_cookie($data['p_id']);
            }

            $product = $product + 50;

            $str = $str . '<tr>
				<td colspan="4">Sub Total:</td>
				<td colspan="1">'.$product.' taka</td>
			</tr>
			<tr>
				<td colspan="4">Delivery Charge:</td>
				<td colspan="1">'.$this->charge.' taka</td>
			</tr>
			<tr>
				<td colspan="4">Total:</td>
				<td colspan="1">'.$product.' taka</td>
			</tr>
		</table>
	</body>
</html>';
            $handle = fopen('orders/'.$filename,"w");
            fwrite($handle,$str);
            fclose($handle);
        }

        delete_cookie("key");

        $this->send_to_mail($str,$filename,$email);
        return $filename;
    }

    public function send_to_mail($str,$file,$customer)
    {
        $str = $str.'<a href="'.base_url().'/orders/'.$file.'"><h1>Print</h1></a>';
        $to = $this->mail.','.$customer;
        $sub = "KroyKorun Invoice ".date('d-m-Y h:i:s A');
        $msg = $str;

        /*important lines for html mails*/
        $header = "MIME-Version:1.0"."\r\n";
        $header = $header."Content-type:text/html;charset=utf-8"."\r\n";
        /*important lines for html mails*/

        $header = $header."From:"."kroykorun.com Receipt"." <"."kroykorun@info.com".">"."\r\n";
        $header = $header.'Cc: '."kroykorun.com".'' . "\r\n";
        $header = $header.'Bcc: '."kroykorun.com".'' . "\r\n";

        mail($to,$sub,$msg,$header);
    }

    private function dec_stock_product($p_id,$p_amount)
    {
        $query = $this->db->get_where("product",array("p_id"=>$p_id));

        if($query->num_rows() > 0)
        {
            $p_array = $query->row_array();
            $current = $p_array['p_count'];
            $current = $current - $p_amount;

            if($current < 0)
            {
                $current = 0;
            }
            else if($current <= 5)
            {
                $this->count_notification($p_id);
            }

            $this->db->update("product",array("p_count"=>$current),array("p_id"=>$p_id));
        }
    }

    public function count_notification($id)
    {
        $to = $this->mail;
        $sub = "Out of Stock Notification";
        $msg = "Product Id : ".$id . " is currently less than 5 in the inventory,Stock up quickly";

        /*important lines for html mails*/
        $header = "MIME-Version:1.0"."\r\n";
        $header = $header."Content-type:text/html;charset=utf-8"."\r\n";
        /*important lines for html mails*/

        $header = $header."From:"."The Server"." <"."kroykorun.com".">"."\r\n";
        $header = $header.'Cc: '."kroykorun.com".'' . "\r\n";
        $header = $header.'Bcc: '."kroykorun.com".'' . "\r\n";

        mail($to,$sub,$msg,$header);
    }

    public function login($data)
    {
        $flag = false;
        $query = $this->db->get_where('user',$data);

        if($query->num_rows() == 1)
        {
            $data = $query->row_array();

            $this->session->set_userdata('login',$data);

            $flag = true;
        }

        return $flag;
    }

    public function update_profile($data,$u_id)
    {
        $flag = false;

        if($this->db->update('user',$data,array('u_id'=>$u_id)))
        {
            $this->session->unset_userdata("login");

            $data['u_id'] = $u_id;

            $this->session->set_userdata('login',$data);
            $flag = true;
        }

        return $flag;
    }

    public function user_email_exist($email)
    {
        $flag = false;

        $query = $this->db->get_where('user',$email);

        if($query->num_rows() > 0)
        {
            $data = $query->row_array();

            $to = $email['u_email'];
            $sub = "Password Notification";
            $msg = "Your password is : ".$data['u_password'];

            /*important lines for html mails*/
            $header = "MIME-Version:1.0"."\r\n";
            $header = $header."Content-type:text/html;charset=utf-8"."\r\n";
            /*important lines for html mails*/

            $header = $header."From:"."The Server"." <"."kroykorun.com".">"."\r\n";
            $header = $header.'Cc: '."kroykorun.com".'' . "\r\n";
            $header = $header.'Bcc: '."kroykorun.com".'' . "\r\n";

            mail($to,$sub,$msg,$header);

            $flag = true;
        }

        return $flag;
    }

}
?>
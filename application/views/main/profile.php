<div id="contact-page" class="container">
    <div class="bg">

        <div class="row" id="first">
            <div class="col-sm-6">
                <div class="shopper-info">
                    <p>Edit Profile</p>

                    <p style="color:red" id="res"></p>

                    <form id="edit_profile" method="post" action="<? echo base_url() . 'user/order' ?>">
                        <p>Full Name:</p>
                        <input required="required" type="text" name="u_name" value="<? echo $login['u_name'] ?>" placeholder="Enter name">

                        <p>Mobile Number:</p>
                        <input required="required" type="text" name="u_phone" value="<? echo $login['u_phone'] ?>" placeholder="Enter mobile number">

                        <p>Email Address:</p>
                        <input required="required" type="email" name="u_email" value="<? echo $login['u_email'] ?>" placeholder="Enter email address">

                        <p>Password:</p>
                        <input required="required" value="<? echo $login['u_password'] ?>" type="password" name="u_password"
                               placeholder="Enter password to login">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="order-message">
                    <p>Shopper's Address</p>
                    <textarea required="required" name="u_address"
                              placeholder="Write down address for delivery" rows="16"><? echo $login['u_address'] ?></textarea>
                    <label><input type="submit" class="btn btn-primary" value="Edit Profile"></label>
                </div>
                </form>
            </div>
        </div>

    </div>
</div><!--/#contact-page-->

<script type="application/javascript">
    $("#edit_profile").on('submit',function(e) {

        data = $(this).serializeArray();
        target = {};

        for(i=0;i<data.length;i++)
        {
            target[data[i]['name']] = data[i]['value'];
        }


       $.post('<? echo base_url().'user/edit_profile/' ?>',{'login':JSON.stringify(target)},function(data) {

           if(data == '1')
           {
               window.location = '<? echo base_url().'user/edit_profile_view' ?>'
           }
           else
           {
               alert("error occured");
           }

        });

        e.preventDefault();
    });
</script>
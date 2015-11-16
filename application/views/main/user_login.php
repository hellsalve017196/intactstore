<div id="contact-page" class="container">
    <div class="bg">
        <!--
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Contact <strong>Us</strong></h2>
                <div id="gmap" class="contact-map">
                </div>
            </div>
        </div>
        -->

        <div class="row" id="second">
            <div class="col-sm-12">
                <div class="shopper-info">
                    <p>Log In</p>

                    <p id="out" style="color:red"></p>

                    <form method="post" id="login" action="<? echo base_url() . 'user/order' ?>">
                        <p>Email address</p>
                        <input required="required" type="email" id="email" name="email"
                               placeholder="Enter email address">

                        <p>Password</p>
                        <input required="required" type="password" id="password" name="password"
                               placeholder="Enter password to login">
                        <br>
                        <input type="button" class="btn btn-primary" value="Login" onclick="zn()">
                        <input type="button" class="btn btn-primary" value="Forget password?" onclick="sam()">
                    </form>
                </div>
            </div>
        </div>

        <div class="row" id="third" style="display: none">
            <div class="col-sm-12">
                <div class="shopper-info">

                    <p id="not" style="color:red"></p>

                    <form method="post" id="login" action="<? echo base_url() . 'user/order' ?>">
                        <p>Email address</p>
                        <input required="required" type="email" id="u_email" name="email"
                               placeholder="Enter email address">

                        <br>
                        <input type="button" class="btn btn-primary" value="Send Password" onclick="reverse()">
                        <input type="button" class="btn btn-primary" value="Return To Login" onclick="jam()">
                    </form>
                </div>
            </div>
        </div>

    </div>
</div><!--/#contact-page-->
<script type="text/javascript">
    function sam()
    {
        $("#second").hide();
        $("#third").show();
    }

    function jam()
    {
        $("#second").show();
        $("#third").hide();
    }


    function zn() {
        email = $("#email").val();
        pass = $("#password").val();

        if (email != '' && pass != '') {
            $.ajax({
                url: '<? echo base_url().'user/user_login' ?>',
                method: 'POST',
                data: {login: JSON.stringify({u_email: email, u_password: pass})},
                success: function (data) {
                    console.log(data);
                    if (data == '1') {
                        window.location = '<? echo base_url().'user/' ?>'
                    }
                    else{
                        $("#out").html("Invalid Username or Password");
                    }
                }
            });
        }
        else {
            $("#out").html("fill form properly");
        }
    }

    function reverse() {
        email = $("#u_email").val();

        if (email != '') {
            $.ajax({
                url: '<? echo base_url().'user/password_retrive' ?>',
                method: 'POST',
                data: {login: JSON.stringify({u_email: email})},
                success: function (data) {
                   console.log(data);

                   /* if (data == '1') {
                        $("#not").html("Check Your emails including spam folder for password");
                    }
                    else{
                        $("#not").html("email address is not registered");
                    }*/
                }
            });
        }
        else {
            $("#not").html("fill form properly");
        }
    }
</script>
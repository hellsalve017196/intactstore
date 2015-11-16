<footer id="footer"><!--Footer-->


    <div class="footer-widget">
        <div class="container">
            <div class="row">

                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <p><strong>**SIGN UP MUST FOR PURCHASE**</strong></p>
                        <p><strong>(1)Cash on Delivery in Dhaka</strong></p>
                        <p><strong>(2)Delivery Cost 100 taka in Dhaka</strong></p>
                        <p><strong>(3)Call for Bkash </strong></p>
                        <p><strong>(4)Visa/Mastercard/AmericanExpress Coming Soon! </strong></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="single-widget" style="font-weight: bold">
                        <h2>Address</h2>
                        <p>Dhaka</p>
                        <p>Bangladesh</p>
                        <p>Contact: info@kroykorun.com</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © <? echo date('Y',time()); ?> KroyKorun.com. All rights reserved.</p>
            </div>
        </div>
    </div>

</footer>
<!--/Footer-->
<script>
    document.getElementById("search").addEventListener('keyup', function (e) {
        key = e.which;

        if(key == 13)
        {
            flag = e.target.value;


            if (flag != '') {
                window.location = "<? echo base_url() ?>user/product_list/" + flag + "/s_id#new";

                e.target.value = "";
            } else {
                alert("field is empty");
            }
        }
    },false)
</script>
	
<footer id="footer"><!--Footer-->


    <div class="footer-widget">
        <div class="container">
            <div class="row">

                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <p><strong>(1).Cash on Delivery in Dhaka</strong></p>
                        <p><strong>(2).Delivery Cost 50 taka in Dhaka</strong></p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="single-widget" style="font-weight: bold">
                        <h2>Address</h2>
                        <p>Shaymoli</p>
                        <p>dhaka-1207</p>
                        <p>phone: +8801670049472</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © <? echo date('Y',time()); ?> Intact-store. All rights reserved.</p>
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
	
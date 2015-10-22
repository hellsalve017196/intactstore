<script src="<? echo base_url()."res/static/js/jquery.js" ?>"></script>
<script src="<? echo base_url()."res/static/js/bootstrap.min.js" ?>"></script>
<script src="<? echo base_url()."res/static/js/jquery.scrollUp.min.js" ?>"></script>
<script src="<? echo base_url()."res/static/js/price-range.js" ?>"></script>
<script src="<? echo base_url()."res/static/js/jquery.prettyPhoto.js" ?>"></script>
<script src="<? echo base_url()."res/static/js/main.js" ?>"></script>

<script src="<? echo base_url().'res/static/product-details_files/jquery.zoom.js' ?>"></script>
<script>
    $(document).ready(function(){
        $('#ex1').zoom();

        $("#cart").on('click',function()
            {
                amount = parseInt($("#amount").val());
                id = $("#p_id").html();

                if(amount <= 0)
                {
                    alert("please add a valid number");
                }
                else
                {
                    window.location = "<? echo base_url().'user/add_to_cart/' ?>"+id+"/"+amount;
                }
            }
        );
    });
</script>

<a id="scrollUp" href="file:///home/zn/Desktop/Eshopper/index.html#top" style="display: none; position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up"></i></a>

</body>
</html>
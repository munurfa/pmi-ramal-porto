</div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<footer>
<div class="container">
<div class="row">
    <div class="col-md-12">
        &copy; 2017 Muhamad Nur Fasikhin | NIM : 13115043
    </div>
</div>
</div>
</footer>
<!-- FOOTER SECTION END-->
<!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!-- CORE JQUERY SCRIPTS -->
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
     
});
</script>
<script type="text/javascript">
    $(function() {
        $('.tgl').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy-mm-dd',
            onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });
    });
</script>
</body>
</html>
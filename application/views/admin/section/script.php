<script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 2500);
</script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>js/nifty.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>js/demo/tables-datatables.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>plugins/switchery/switchery.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>plugins/chosen/chosen.jquery.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>plugins/noUiSlider/nouislider.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/bootstrap/nifty/') ?>js/demo/form-component.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#pakets").show();
        $("#qty").hide();
        $("#hrg_paket").hide();
        $("#hrg_layanan").hide();
    });

    // function hitung(){
    //     var berat = $("#berat").val() == 0 ? 1:$("#berat").val();
    //     var price = $("#price").val();
        
    //     var result = parseInt(berat) * parseInt(price);
    //     if(!isNaN(result)){
    //         $("#jml_bayar").val(result);
    //     }
    // }

    // function hitung(){
    //     var berat = $("#qty_berat").val();
    //     var price = $("#qty_price").val();
        
    //     var result = parseInt(berat) * parseInt(price);
    //     $("#jml_bayar").val(result);
    //     // if(!isNaN(result)){
    //     //     $("#jml_bayar").val(result);
    //     // }
    // }
    
    $("#qty_berat,#qty_price,#qty_layanan").keyup(function() {
        var val1 = $('#qty_berat').val(); 
        var val2 = $('#qty_price').val(); 
        var val3 = $('#qty_layanan').val();
        var result = Number(val1) * Number(val2) + Number(val3);
        if ( val1 != "" && val2 != "" ) {
        $('#jml_bayar').val(result);
        }
    })

    function sum() {
        var berat = document.getElementById('berat').value;
        var price = document.getElementById('price').value;
        var result = parseFloat(berat) + parseFloat(price);
        if (!isNaN(result)) {
            document.getElementById('jml_bayar').value = result;
        }
    }

    $(function(){
        setTimeout(function(){
            $("#customer_id").change(function(){
                pilihPaket(this.value);
                console.log(pilihPaket(this.value));
            });
            $("#paket_id").change(function(){
                pilihKuota(this.value);
                console.log(pilihKuota(this.value));
                pilihHargaLaundry(this.value);
            });
            $("#layanan_id").change(function(){
                pilihHargaLayanan(this.value);
                console.log(pilihHargaLayanan(this.value));
            });

            // $('.sum').keyup(function () {
            //     var sum = 0;
            //     $('.sum').each(function() {
            //         sum += Number($(this).val());
            //     });
            //     $('#jml_bayar').val(sum);
            
            // });
        });
    });
    function pilihPaket(customer_id){
        if(customer_id!=""){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Admin/Pemesanan/get_paket", 
                data: {customer_id : customer_id}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){ 
                    console.log(response.data_paket);
                    console.log(response.ket);
                    // var customer_id = $("#customer_id").val();
                    // console.log(customer_id);
                    $("#pakets").show();
                    $("#paket_id").html(response.data_paket).show();
                    $("#paket_id").select2();
                    if(response.ket == 'Member'){
                        $("#qty").show();
                        $("#berat").hide();
                    }else{
                        $("#qty").hide();
                        $("#berat").show();
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                }
            }); 
        } else {
            $("#pakets").hide();
        }
    }

    function pilihKuota(paket_id){
        if(paket_id!=""){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Admin/Pemesanan/get_kuota", 
                data: {paket_id : paket_id}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){ 
                    console.log(response.data_kuota);
                    $("#kuota").html(response.data_kuota).show();
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                }
            }); 
        } else {
            $("#qty").hide();
        }
    }

    function pilihHargaLaundry(paket_id){
        if(paket_id!=""){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Admin/Pemesanan/get_harga_laundry", 
                data: {paket_id : paket_id, customer_id : $("#customer_id").val()}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){
                    $("#hrg_paket").show();
                    var price = $("#price").val();
                    console.log(price); 
                    console.log(response.data_harga);
                    $("#qty_price").html(response.data_harga).show();
                    if($("#qty_layanan").val() != null){
                        var total = parseFloat($("#qty_price").val()) + parseFloat($("#qty_layanan").val());
                    }else{
                        var total = parseFloat($("#qty_price").val());
                    }
                    $("#jml_bayar").val(total);
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                }
            }); 
        } else {
            $("#hrg_paket").hide();
        }
    }
    function pilihHargaLayanan(layanan_id){
        if(layanan_id!=""){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Admin/Pemesanan/get_harga_layanan", 
                data: {layanan_id : layanan_id}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){
                    $("#hrg_layanan").show();
                    console.log(response.data_layanan);
                    $("#qty_layanan").html(response.data_layanan).show();
                    if($("#qty_price").val() != null){
                        var total = parseFloat($("#qty_price").val()) + parseFloat($("#qty_layanan").val());
                    }else{
                        var total = parseFloat($("#qty_layanan").val());
                    }
                    $("#jml_bayar").val(total);
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                }
            }); 
        } else {
            $("#hrg_layanan").hide();
        }
    }
</script>
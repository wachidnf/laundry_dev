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
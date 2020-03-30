<!-- SUCCESS -->
<?php if($this->session->flashdata("success")!=""){?>
<div class="alert alert-success">
    <strong>Berhasil !</strong> <?=$this->session->flashdata("success")?>
</div>
<?php }?>
<!-- -->

<!-- FAILED -->
<?php if($this->session->flashdata("failed")!=""){?>
<div class="alert alert-danger">
    <strong>Gagal !</strong> <?=$this->session->flashdata("failed")?>
</div>
<?php }?>
<!-- -->
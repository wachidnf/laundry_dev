<!-- TAMBAH -->
<div class="modal fade" id="tambah" role="dialog" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <!--Modal body-->
            <form action="<?=site_url('Admin/Testimoni/create')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Customer</b></label>
                    <div class="col-sm-8">
                        <select name="customer_id" class="form-control demo-chosen-select" tabindex="2">
                            <option value="" selected disabled>-- Pilih --</option>
                            <?php foreach($customer as $c){?>
                            <option value="<?=$c->id?>"><?=$c->name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Pesan</b></label>
                    <div class="col-sm-8">
                        <textarea type="text" name="message" placeholder="Masukkan Pesan" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- -->

<!-- EDIT -->
<?php foreach($testimoni as $t):?>
<div class="modal fade" id="Edit<?=$t->id?>" role="dialog" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <!--Modal body-->
            <form action="<?=site_url('Admin/Testimoni/edit/').$t->id?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Customer</b></label>
                    <div class="col-sm-8">
                        <select name="customer_id" class="form-control demo-chosen-select" tabindex="2">
                            <option value="" selected disabled>-- Pilih --</option>
                            <?php foreach($customer as $c){?>
                            <option value="<?=$c->id?>" <?=$c->id==$t->customer_id?'selected':'';?>><?=$c->name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Pesan</b></label>
                    <div class="col-sm-8">
                        <textarea type="text" name="message" placeholder="Masukkan Pesan" class="form-control"><?=$t->message?> </textarea>
                    </div>
                </div>
            </div>
            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<!-- -->

<!-- HAPUS -->
<?php foreach($testimoni as $t):?>
<div class="modal fade" id="Hapus<?=$t->id?>" role="dialog" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Hapus Data</h4>
            </div>
            <!--Modal body-->
            <form action="<?=site_url('Admin/Testimoni/delete/').$t->id?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <center><h4>Apakah anda yakin untuk menghapus ?</h4></center>
            </div>
            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Tidak</button>
                <button class="btn btn-primary">Ya</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<!-- -->
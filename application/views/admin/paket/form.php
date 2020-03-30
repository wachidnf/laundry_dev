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
            <form action="<?=site_url('Admin/Paket/create')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Paket</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="name" placeholder="Masukkan Nama Paket" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Biaya per Kg</b></label>
                    <div class="col-sm-8">
                        <input type="number" name="price" placeholder="Masukkan Biaya per Kg" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Peruntukkan</b></label>
                    <div class="col-sm-8">
                        <select name="is_member" class="form-control demo-chosen-select" tabindex="2">
                            <option value="" selected disabled>-- Pilih --</option>
                            <option value="0">Non Member</option>
                            <option value="1">Member</option>
                        </select>
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
<?php foreach($paket as $p):?>
<div class="modal fade" id="Edit<?=$p->id?>" role="dialog" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <!--Modal body-->
            <form action="<?=site_url('Admin/Paket/edit/').$p->id?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Paket</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="name" placeholder="Masukkan Nama Paket" class="form-control" value="<?=$p->name?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Biaya per Kg</b></label>
                    <div class="col-sm-8">
                        <input type="number" name="price" placeholder="Masukkan Biaya per Kg" class="form-control" value="<?=$p->price?>">
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
<?php foreach($paket as $p):?>
<div class="modal fade" id="Hapus<?=$p->id?>" role="dialog" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Hapus Data</h4>
            </div>
            <!--Modal body-->
            <form action="<?=site_url('Admin/Paket/delete/').$p->id?>" class="form-horizontal" method="post" enctype="multipart/form-data">
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
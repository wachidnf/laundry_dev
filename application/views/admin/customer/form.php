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
            <form action="<?=site_url('Admin/Customer/create')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Customer</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="name" placeholder="Masukkan Nama Customer" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nomor Telepon</b></label>
                    <div class="col-sm-8">
                        <input type="number" name="phone" placeholder="Masukkan Nomor Telepon" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Username</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="username" placeholder="Masukkan Username" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Password</b></label>
                    <div class="col-sm-8">
                        <input type="password" name="password" placeholder="*******" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Email</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="email" placeholder="Masukkan Alamat Email" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Alamat</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="address" placeholder="Masukkan Alamat" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Jenis Kelamin</b></label>
                    <div class="col-sm-8">
                        <select name="gender" class="form-control demo-chosen-select" tabindex="2" required>
                            <option value="" selected disabled>-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Status Member</b></label>
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
<?php foreach($customer as $c):?>
<div class="modal fade" id="Edit<?=$c->id?>" role="dialog" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <!--Modal body-->
            <form action="<?=site_url('Admin/Customer/edit/').$c->id?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Customer</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="name" placeholder="Masukkan Nama Customer" class="form-control" value="<?=$c->name?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nomor Telepon</b></label>
                    <div class="col-sm-8">
                        <input type="number" name="phone" placeholder="Masukkan Nomor Telepon" class="form-control" value="<?=$c->phone?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Alamat</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="address" placeholder="Masukkan Alamat" class="form-control" value="<?=$c->address?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Jenis Kelamin</b></label>
                    <div class="col-sm-8">
                        <select name="gender" class="form-control demo-chosen-select" tabindex="2">
                            <option value="" selected disabled>-- Pilih --</option>
                            <option value="Laki-laki" <?='Laki-laki'==$c->gender?'selected':'';?>>Laki-laki</option>
                            <option value="Perempuan" <?='Perempuan'==$c->gender?'selected':'';?>>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Status Member</b></label>
                    <div class="col-sm-8">
                        <select name="is_member" class="form-control demo-chosen-select" tabindex="2">
                            <option value="" selected disabled>-- Pilih --</option>
                            <option value="0" <?='0'==$c->is_member?'selected':'';?>>Non Member</option>
                            <option value="1" <?='1'==$c->is_member?'selected':'';?>>Member</option>
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
<?php endforeach;?>
<!-- -->

<!-- HAPUS -->
<?php foreach($customer as $c):?>
<div class="modal fade" id="Hapus<?=$c->id?>" role="dialog" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Hapus Data</h4>
            </div>
            <!--Modal body-->
            <form action="<?=site_url('Admin/Customer/delete/').$c->id?>" class="form-horizontal" method="post" enctype="multipart/form-data">
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
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
            <form action="<?=site_url('SuperAdmin/Laundry/create')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Username</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Password</b></label>
                    <div class="col-sm-8">
                        <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Email</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="email" placeholder="Masukkan Email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Laundry</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="name" placeholder="Masukkan Nama Laundry" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>No Telp</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="phone" placeholder="Masukkan Nomor Telepon" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Alamat</b></label>
                    <div class="col-sm-8">
                        <textarea type="text" name="address" placeholder="Masukkan Alamat Laundry" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Pemilik</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="owner_name" placeholder="Masukkan Nama Pemilik" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>No. KTP</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="no_ktp" placeholder="Masukkan Nomor KTP" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Foto KTP</b></label>
                    <div class="col-sm-8">
                        <input type="file" name="foto_ktp" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Surat Izin Usaha Perdagangan</b></label>
                    <div class="col-sm-8">
                        <input type="file" name="dokumen_siup" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Surat Izin Tempat Usaha</b></label>
                    <div class="col-sm-8">
                        <input type="file" name="dokumen_situ" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Izin Mendirikan Bangunan</b></label>
                    <div class="col-sm-8">
                        <input type="file" name="dokumen_imb" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Logo</b></label>
                    <div class="col-sm-8">
                        <input type="file" name="logo" class="form-control">
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
<?php foreach($laundry as $l):?>
<div class="modal fade" id="Edit<?=$l->id?>" role="dialog" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <!--Modal body-->
            <form action="<?=site_url('SuperAdmin/Laundry/edit/').$l->id?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Laundry</b></label>
                    <div class="col-sm-8">
                        <input type="hidden" name="user_id" class="form-control" value="<?=$l->user_id?>">
                        <input type="text" name="name" placeholder="Masukkan Nama Paket" class="form-control" value="<?=$l->name?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>No. Telp</b></label>
                    <div class="col-sm-8">
                        <input type="text" maxlength="13" name="phone" placeholder="Masukkan No. Telp Laundry" class="form-control" value="<?=$l->phone?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Alamat</b></label>
                    <div class="col-sm-8">
                        <textarea type="text" name="address" placeholder="Masukkan Alamat Laundry" class="form-control" readonly><?=$l->address?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Pemilik</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="owner_name" placeholder="Masukkan Nama Pemilik" class="form-control" value="<?=$l->owner_name?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Status</b></label>
                    <div class="col-sm-8">
                        <select name="enabled" class="form-control demo-chosen-select" tabindex="2">
                            <option value="" selected disabled>-- Pilih --</option>
                            <option value="1" <?=1==$l->enabled?'selected':'';?>>Aktif</option>
                            <option value="0" <?=0==$l->enabled?'selected':'';?>>Nonaktif</option>
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
<?php foreach($laundry as $l):?>
<div class="modal fade" id="Hapus<?=$l->id?>" role="dialog" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Hapus Data</h4>
            </div>
            <!--Modal body-->
            <form action="<?=site_url('SuperAdmin/Laundry/delete/').$l->id?>" class="form-horizontal" method="post" enctype="multipart/form-data">
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
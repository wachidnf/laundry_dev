<!-- CREATE -->
<?php if($profile == null){?>
<form class="panel-body form-horizontal form-padding" enctype="multipart/form-data" method="post" action="<?=site_url('Admin/Profile/create')?>">
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Nama Laundry</label>
        <div class="col-md-9">
            <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Laundry">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Nomor Telepon</label>
        <div class="col-md-9">
            <input type="text" name="phone" class="form-control" placeholder="Masukkan Nomor Telepon">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Alamat</label>
        <div class="col-md-9">
            <textarea type="text" class="form-control" name="address" placeholder="Masukkan Alamat Laundry"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Nama Pemilik</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="owner_name" placeholder="Masukkan Nama Pemilik">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Nomor KTP</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="no_ktp" placeholder="Masukkan Nomor KTP">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Foto KTP</label>
        <div class="col-md-9">
            <input type="file" name="foto_ktp" class="form-control">
            <small>Kosongkan jika tidak ingin update gambar</small>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Dokumen Surat Izin Usaha Perdagangan</label>
        <div class="col-md-9">
            <input type="file" name="dokumen_siup" class="form-control">
            <small>Kosongkan jika tidak ingin update dokumen</small>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Dokumen Surat Izin Tempat Usaha</label>
        <div class="col-md-9">
            <input type="file" name="dokumen_situ" class="form-control">
            <small>Kosongkan jika tidak ingin update dokumen</small>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Dokumen Surat Izin Mendirikan Bangunan</label>
        <div class="col-md-9">
            <input type="file" name="dokumen_imb" class="form-control">
            <small>Kosongkan jika tidak ingin update dokumen</small>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Logo</label>
        <div class="col-md-9">
            <input type="file" name="logo" class="form-control">
            <small>Kosongkan jika tidak ingin update gambar</small>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-7 col-sm-offset-3">
            <button class="btn btn-mint" type="submit">Submit</button>
        </div>
    </div>
</form>
<?php }?>

<!-- EDIT -->
<?php if($profile != null){?>
<form class="panel-body form-horizontal form-padding" enctype="multipart/form-data" method="post" action="<?=site_url('Admin/Profile/edit/').$profile->id?>">
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Nama Laundry</label>
        <div class="col-md-9">
            <input type="text" name="name" class="form-control" value="<?=$profile->name?>" placeholder="Masukkan Nama Laundry">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Nomor Telepon</label>
        <div class="col-md-9">
            <input type="text" name="phone" class="form-control" value="<?=$profile->phone?>" placeholder="Masukkan Nomor Telepon">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Alamat</label>
        <div class="col-md-9">
            <textarea type="text" class="form-control" name="address" placeholder="Masukkan Alamat Laundry"><?=$profile->address?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Nama Pemilik</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="owner_name" value="<?=$profile->owner_name?>" placeholder="Masukkan Nama Pemilik">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Nomor KTP</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="no_ktp" value="<?=$profile->no_ktp?>" placeholder="Masukkan Nomor KTP">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Foto KTP</label>
        <div class="col-md-9">
            <img src="<?=get_ktp($profile->foto_ktp)?>" width="100" height="100"/>
            <input type="file" name="foto_ktp" class="form-control">
            <small>Kosongkan jika tidak ingin update gambar</small>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Dokumen Surat Izin Usaha Perdagangan</label>
        <div class="col-md-9">
            <img src="<?=get_siup($profile->dokumen_siup)?>" width="100" height="100"/>
            <input type="file" name="dokumen_siup" class="form-control">
            <small>Kosongkan jika tidak ingin update dokumen</small>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Dokumen Surat Izin Tempat Usaha</label>
        <div class="col-md-9">
            <img src="<?=get_situ($profile->dokumen_situ)?>" width="100" height="100"/>
            <input type="file" name="dokumen_situ" class="form-control">
            <small>Kosongkan jika tidak ingin update dokumen</small>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Dokumen Surat Izin Mendirikan Bangunan</label>
        <div class="col-md-9">
            <img src="<?=get_imb($profile->dokumen_imb)?>" width="100" height="100"/>
            <input type="file" name="dokumen_imb" class="form-control">
            <small>Kosongkan jika tidak ingin update dokumen</small>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="demo-text-input">Logo</label>
        <div class="col-md-9">
            <img src="<?=get_logo($profile->logo)?>" width="100" height="100"/>
            <input type="file" name="logo" class="form-control">
            <small>Kosongkan jika tidak ingin update gambar</small>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-7 col-sm-offset-3">
            <button class="btn btn-mint" type="submit">Submit</button>
        </div>
    </div>
</form>
<?php }?>
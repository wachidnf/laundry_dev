<div id="page-head">
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Pemesanan</h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="demo-pli-home"></i></a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data Pemesanan</li>
    </ol>
</div>
<div id="page-content">
    <div class="panel">
        <div class="panel-heading">
            <center><h4 class="panel-title">Tambah Pemesanan</h4></center>
        </div>
        <div class="panel-body">
            <form class="panel-body form-horizontal form-padding" enctype="multipart/form-data" method="post" action="<?=site_url('Admin/Pemesanan/create')?>">
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Customer</b></label>
                    <div class="col-sm-8">
                        <select name="customer_id" id="customer_id" class="form-control demo-chosen-select" tabindex="2">
                            <option value="" selected disabled>-- Pilih --</option>
                            <?php foreach($customer as $c){?>
                            <option value="<?=$c->id?>"><?=$c->name?></option>
                            <?php }?>
                        </select>
                        <small>Belum ada customer? <b><a href="<?=site_url('Admin/Customer')?>">Daftarkan</a></b></small>
                    </div>
                </div>
                <div class="form-group" id="pakets">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Paket Laundry</b></label>
                    <div class="col-sm-8">
                        <select name="paket_id" id="paket_id" class="form-control" tabindex="2">
                            <option value="" selected disabled>-- Pilih --</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Paket Layanan</b></label>
                    <div class="col-sm-8">
                        <select name="layanan_id" id="layanan_id" class="form-control demo-chosen-select" tabindex="2">
                            <option value="" selected disabled>-- Pilih --</option>
                            <?php foreach($layanan as $l):?>
                                <option value="<?=$l->id?>"><?=$l->name.' - '.$l->price?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Tanggal Mulai</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="tanggal_masuk" class="form-control" value="<?=date('d/m/Y')?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Tanggal Selesai</b></label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_selesai"  class="form-control">
                    </div>
                </div>
                <div class="form-group" id="berat">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Berat <small>(kg)</small></b></label>
                    <div class="col-sm-8">
                        <input type="number" name="berat" id="qty_berat" class="form-control">
                    </div>
                </div>
                <div class="form-group" id="qty">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Kuota</b></label>
                    <div class="col-sm-8">
                        <select name="kuota" class="form-control" id="kuota" readonly>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="hrg_paket">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Harga Paket Laundry</b></label>
                    <div class="col-sm-8">
                        <select name="price" class="form-control" id="qty_price" readonly>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="hrg_layanan">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Harga Paket Layanan</b></label>
                    <div class="col-sm-8">
                        <select class="form-control" id="qty_layanan" readonly>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Jumlah Bayar</b></label>
                    <div class="col-sm-8">
                        <input type="number" name="jml_bayar" id="jml_bayar" placeholder="Masukkan Biaya per Kg" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Status Bayar</b></label>
                    <div class="col-sm-8">
                        <select name="is_bayar" class="form-control demo-chosen-select" tabindex="2">
                            <option value="0" selected>Belum Lunas</option></option>
                            <option value="1">Lunas</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-7 col-sm-offset-3">
                        <button class="btn btn-mint" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Tanggal Masuk</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="tanggal_masuk" class="form-control" value="<?=date('d/m/Y')?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Tanggal Keluar</b></label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_selesai"  class="form-control">
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
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Berat <small>(kg)</small></b></label>
                    <div class="col-sm-8">
                        <input type="number" name="berat" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Harga Paket <small>(kg)</small></b></label>
                    <div class="col-sm-8">
                        <input type="number" name="berat" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Jumlah Bayar</b></label>
                    <div class="col-sm-8">
                        <input type="number" name="price" placeholder="Masukkan Biaya per Kg" class="form-control">
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

<!-- LIHAT -->
<?php foreach($pemesanan as $p):?>
<div class="modal fade" id="Lihat<?=$p->id?>" role="dialog" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Lihat Data</h4>
            </div>
            <!--Modal body-->
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Nama Customer</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="tanggal_masuk" class="form-control" value="<?=$p->customer_name?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Tanggal Masuk</b></label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_masuk" class="form-control" value="<?=$p->tanggal_masuk?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Tanggal Selesai</b></label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_selesai" class="form-control" value="<?=$p->tanggal_selesai?>" readonly>
                    </div>
                </div>
                <div class="form-group" id="pakets">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Paket Laundry</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="tanggal_selesai" class="form-control" value="<?=$p->paket_name?>" readonly>
                    </div>
                </div>
                <?php if($p->is_member == 0):?>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Berat <small>(kg)</small></b></label>
                    <div class="col-sm-8">
                        <input type="number" name="berat" class="form-control" value="<?=$p->berat?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Harga Paket Laundry</b></label>
                    <div class="col-sm-8">
                        <input type="number" name="berat" class="form-control" value="<?=$p->harga_non_member?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Harga Paket Layanan</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="berat" class="form-control" value="<?=$p->layanan_price!=null?$p->layanan_price:'-'?>" readonly>
                    </div>
                </div>
                <?php else:?>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Kuota <small>(kg)</small></b></label>
                    <div class="col-sm-8">
                        <input type="number" name="berat" class="form-control" value="<?=$p->kuota?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Harga Paket</b></label>
                    <div class="col-sm-8">
                        <input type="number" name="berat" class="form-control" value="<?=$p->harga_member?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Harga Paket Layanan</b></label>
                    <div class="col-sm-8">
                        <input type="text" name="berat" class="form-control" value="<?=$p->layanan_price!=null?$p->layanan_price:'-'?>" readonly>
                    </div>
                </div>
                <?php endif;?>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Jumlah Bayar</b></label>
                    <div class="col-sm-8">
                        <input type="number" name="price" placeholder="Masukkan Biaya per Kg" value="<?=$p->jml_bayar?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Barcode</b></label>
                    <div class="col-sm-8">
                        <img src="<?=get_barcode($p->bar_code)?>" width="209px" width="62px"/>
                    </div>
                </div>
            </div>
            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<!-- -->

<!-- EDIT -->
<?php foreach($pemesanan as $p):?>
<div class="modal fade" id="Edit<?=$p->id?>" role="dialog" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <!--Modal body-->
            <form class="form-horizontal" action="<?=site_url('Admin/Pemesanan/edit/').$p->id?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="demo-is-inputnormal" class="col-sm-3 control-label"><b>Status Bayar</b></label>
                    <div class="col-sm-8">
                        <select name="is_bayar" class="form-control demo-chosen-select" tabindex="2">
                            <option value="0" <?=0==$p->is_bayar?'selected':'';?>>Belum Lunas</option></option>
                            <option value="1" <?=1==$p->is_bayar?'selected':'';?>>Lunas</option>
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
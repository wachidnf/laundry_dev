<div id="page-head">
    <div class="pad-all text-center">
        <h3>Selamat Datang</h3>
        <!-- <p1>Scroll down to see quick links and overviews of your Server, To do list, Order status or get some Help using Nifty.</p> -->
    </div>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-warning panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                <i class="demo-pli-male icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
                <p class="text-2x mar-no text-semibold"><?=$total_customer?></p>
                <p class="mar-no">Jumlah Customer</p>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                <i class="demo-pli-add-cart icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
                <p class="text-2x mar-no text-semibold"><?=$total_pesanan?></p>
                <p class="mar-no">Jumlah Pemesanan</p>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-mint panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                <i class="demo-pli-like icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
                <p class="text-2x mar-no text-semibold"><?=$total_testimoni?></p>
                <p class="mar-no">Testimoni</p>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar Pemesanan</h3>
            </div>
            <div class="panel-body">
                <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Berat (kg)</th>
                        <th>Jumlah Bayar</th>
                        <th>Status Bayar</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        foreach($pemesanan as $p):?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$p->customer_name?></td>
                            <td><?=$p->tanggal_masuk!=null?date('d/m/Y H:i',strtotime($p->tanggal_masuk)):'-'?></td>
                            <td><?=$p->tanggal_selesai!=null?date('d/m/Y H:i',strtotime($p->tanggal_selesai)):'-'?></td>
                            <td><?=$p->berat?></td>
                            <td><?=$p->jml_bayar?></td>
                            <td><?=$p->is_bayar==1?'Lunas':'Belum Lunas'?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div> 
<div id="page-head">
    <div id="page-title">
        <h1 class="page-header text-overflow">Laporan Keuangan Bulanan</h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="demo-pli-home"></i></a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Laporan Keuangan Bulanan</li>
    </ol>
</div>
<div id="page-content">
    <div class="panel">
        <!-- <div class="panel-heading">
            <h3 class="panel-title">Basic Data Tables with responsive plugin</h3>
        </div> -->
        <div class="panel-body">
            <form role="form" class="form-inline">
                <div class="form-group">
                    <input type="email" placeholder="Nama Paket" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-mint btn-rounded" type="submit">Filter</button>
                </div>
            </form><br>
            <?php $this->load->view('admin/section/notification')?>
            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Laporan</th>
                        <th>Tanggal dibuat</th>
                        <th>Nama Customer</th>
                        <th>Paket</th>
                        <th>Layanan</th>
                        <th>Berat <small>(kg)</small></th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php //$this->load->view('admin/paket/form')?>
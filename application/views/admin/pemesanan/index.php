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
        <?php if(!empty($profile)):?>
        <div class="panel-body">
            <div class="col-sm">
                <div align="right">
                    <!-- <button class="btn btn-primary btn-rounded" type="button" data-toggle="modal" data-target="#tambah">
                        Tambah Data
                    </button> -->
                    <a href="<?=site_url('Admin/Pemesanan/form_create')?>">
                        <button class="btn btn-primary btn-rounded" type="button">
                            Tambah Data
                        </button>
                    </a>
                </div>
            </div><br>
            <?php $this->load->view('admin/section/notification')?>
            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Selesai</th>
                    <th>Jumlah Bayar</th>
                    <th>Status Bayar</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach($pemesanan as $p):?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$p->customer_name?></td>
                        <td><?=$p->tanggal_masuk!=null?date('d/m/Y',strtotime($p->tanggal_masuk)):'-'?></td>
                        <td><?=$p->tanggal_selesai!=null?date('d/m/Y',strtotime($p->tanggal_selesai)):'-'?></td>
                        <td><?=$p->jml_bayar?></td>
                        <td><?=$p->is_bayar==1?'Lunas':'Belum Lunas'?></td>
                        <td><?=$p->is_member == 1 ?'Member':'Non Member'?></td>
                        <td>
                            <button title="Lihat" class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#Lihat<?=$p->id?>">Lihat</button>
                            <button title="Edit" class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#Edit<?=$p->id?>">
                                <i class="demo-psi-pencil icon-lg"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?php else:?>
        <div class="panel-body">
            <p class="list-group-item list-group-item-danger">Anda belum melengkapi profil anda. Harap untuk dilengkapi terlebih dahulu pada menu <a href="<?=site_url('Admin/Profile')?>" style="color:black;font-weight:bold;font-style:italic">Profile</a></p>
        </div>
        <?php endif;?>
    </div>
</div>
<?php $this->load->view('admin/pemesanan/form')?>
<div id="page-head">
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Layanan</h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="demo-pli-home"></i></a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data Layanan</li>
    </ol>
</div>
<div id="page-content">
    <div class="panel">
        <?php if(!empty($profile)):?>
        <div class="panel-body">
            <div class="col-sm">
                <div align="right">
                    <button class="btn btn-primary btn-rounded" type="button" data-toggle="modal" data-target="#tambah">
                        Tambah Data
                    </button>
                </div>
            </div><br>
            <?php $this->load->view('admin/section/notification')?>
            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                    foreach($layanan as $l):?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$l->name?></td>
                            <td><?=$l->price?></td>
                            <td>
                                <button title="Edit" class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#Edit<?=$l->id?>">
                                    <i class="demo-psi-pencil icon-lg"></i>
                                </button>

                                <button title="Hapus" class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#Hapus<?=$l->id?>">
                                    <i class="demo-psi-trash icon-lg"></i>
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
<?php $this->load->view('admin/layanan/form')?>
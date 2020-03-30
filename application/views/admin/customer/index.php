<div id="page-head">
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Customer</h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="demo-pli-home"></i></a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data Customer</li>
    </ol>
</div>
<div id="page-content">
    <div class="panel">
        <?php if(!empty($profile)):?>
        <div class="panel-body">
            <form role="form" class="form-inline">
                <div class="form-group">
                    <input type="email" placeholder="Jenis Kelamin" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Status Customer" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-mint btn-rounded" type="submit">Filter</button>
                </div>
                <div class="col-sm">
                    <div align="right">
                        <button class="btn btn-primary btn-rounded" type="button" data-toggle="modal" data-target="#tambah">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </form><br>
            <?php $this->load->view('admin/section/notification')?>
            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Customer</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1; 
                    foreach($customer as $c):?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$c->name?></td>
                        <td><?=$c->phone?></td>
                        <td><?=$c->address?></td>
                        <td><?=$c->gender?></td>
                        <?php if($c->is_member == 0):?>
                        <td>Non Member</td>
                        <?php elseif($c->is_member == 1):?>
                        <td>Member</td>
                        <?php endif;?>
                        <td>
                            <button title="Edit" class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#Edit<?=$c->id?>">
                                <i class="demo-psi-pencil icon-lg"></i>
                            </button>

                            <button title="Hapus" class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#Hapus<?=$c->id?>">
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
        <?php endif; ?>
    </div>
</div>
<?php $this->load->view('admin/customer/form')?>
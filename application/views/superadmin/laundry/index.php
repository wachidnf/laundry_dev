<div id="page-head">
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Laundry</h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="demo-pli-home"></i></a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data Laundry</li>
    </ol>
</div>
<div id="page-content">
    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-inline">
                <div class="form-group">
                    <input type="email" placeholder="Nama Laundry" class="form-control">
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
            <?php $this->load->view('superadmin/section/notification')?>
            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Laundry</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Pemilik</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                    foreach($laundry as $l):
                    ?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$l->name?></td>
                        <td><?=$l->phone?></td>
                        <td><?=$l->address?></td>
                        <td><?=$l->owner_name?></td>
                        <td><?=$l->enabled==1?'Aktif':'Nonaktif'?></td>
                        <td>
                            <button title="Edit" class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#Edit<?=$l->id?>">
                                <i class="demo-psi-pencil icon-lg"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
              </table>
        </div>
    </div>
</div>
<?php $this->load->view('superadmin/laundry/form')?>
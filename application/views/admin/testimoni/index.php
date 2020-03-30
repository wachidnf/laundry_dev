<div id="page-head">
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Testimoni</h1>
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="demo-pli-home"></i></a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data Testimoni</li>
    </ol>
</div>
<div id="page-content">
    <div class="panel">
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
                    <th>Nama Customer</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                    foreach($testimoni as $t):?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$t->customer_name?></td>
                        <td><?=$t->message?></td>
                        <td>
                            <button title="Edit" class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#Edit<?=$t->id?>">
                                <i class="demo-psi-pencil icon-lg"></i>
                            </button>

                            <button title="Hapus" class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#Hapus<?=$t->id?>">
                                <i class="demo-psi-trash icon-lg"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
              </table>
        </div>
    </div>
</div>
<?php $this->load->view('admin/testimoni/form')?>
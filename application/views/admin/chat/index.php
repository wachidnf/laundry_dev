
<div id="page-head"></div>
<!--Fixedbar-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="page-fixedbar-container">
    <div class="page-fixedbar-content">
        <div class="nano">
            <div class="nano-content">
                <div class="pad-all bord-btm">
                    <input type="text" placeholder="Search or start new chat" class="form-control">
                </div>

                <div class="chat-user-list">
                    <?php foreach($chat as $c){?>
                    <a href="<?=site_url('Admin/Chat/detail/').$c->pengirim?>" class="chat-<?=$c->status == 0?'unread':'read';?>">
                        <div class="media-left">
                            <img class="img-circle img-xs" src="<?=$logo?>" alt="Profile Picture">
                            <?php if($c->status == 0){?>
                            <i class="badge badge-success badge-stat badge-icon pull-left"></i>
                            <?php }?>
                        </div>
                        <div class="media-body">
                            <span class="chat-info">
                                <span class="text-xs">11:39</span>
                                <!-- <span class="badge badge-success">9</span> -->
                            </span>
                            <div class="chat-text">
                                <p class="chat-username"><?=$c->customer_pengirim?></p>
                                <p><?=$c->pesan?></p>
                            </div>
                        </div>
                    </a>
                    <?php }?>
                    <!-- <a href="#">
                        <div class="media-left">
                            <img class="img-circle img-xs" src="<?=$logo?>" alt="Profile Picture">
                            <i class="badge badge-danger badge-stat badge-icon pull-left"></i>
                        </div>
                        <div class="media-body">
                            <span class="chat-info pull-right">
                                <span class="text-xs">11:09</span>
                            </span>
                            <div class="chat-text">
                                <p class="chat-username">Donald Brown</p>
                                <p>I hear the buzz of the little world among the stalks</p>
                            </div>
                        </div>
                    </a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--End Fixedbar-->
<?php $this->load->view('admin/chat/detail')?>

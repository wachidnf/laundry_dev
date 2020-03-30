<div id="page-content" <?=$open?>>
    <div class="panel">
        <div class="media-block pad-all bord-btm">
            <div class="media-left">
                <img class="img-circle img-xs" src="<?=$logo?>" alt="Profile Picture">
            </div>
            <div class="media-body">
                <p class="mar-no text-main text-bold text-lg"><?=$customer?></p>
            </div>
        </div>
        <div class="nano" style="height: 60vh">
            <div class="nano-content">
                <div class="panel-body chat-body media-block">
                <?php foreach($detail_chat as $dc):?>
                    <?php if($dc->pengirim != $this->session->userdata('user_id')){?>
                    <div class="chat-user">
                        <div class="media-left">
                            <img src="<?=$logo?>" class="img-circle img-sm" alt="Profile Picture">
                        </div>
                        <div class="media-body">
                            <div>
                                <p><?=$dc->pesan?><small><?=date('Y-m-d H:i',strtotime($dc->waktu))?></small></p>
                            </div>
                        </div>
                    </div>
                    <?php }else{?>
                    <div class="chat-me">
                        <div class="media-left">
                            <img src="<?=$logo?>" class="img-circle img-sm" alt="Profile Picture">
                        </div>
                        <div class="media-body">
                            <div>
                                <p><?=$dc->pesan?><small><?=date('Y-m-d H:i',strtotime($dc->waktu))?></small></p>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        
        <div class="pad-all">
        <form method="post" action="<?=site_url('Admin/Chat/send/').$customer_id?>">
            <div class="input-group">
                <input type="text" placeholder="Type your message" name="pesan" class="form-control form-control-trans">
                <span class="input-group-btn">
                    <!-- <button class="btn btn-icon add-tooltip" data-original-title="Add file" type="button"><i class="demo-psi-paperclip icon-lg"></i></button>
                    <button class="btn btn-icon add-tooltip" data-original-title="Emoticons" type="button"><i class="demo-pli-smile icon-lg"></i></button> -->
                    <button class="btn btn-icon add-tooltip" data-original-title="Send" type="submit"><i class="demo-pli-paper-plane icon-lg"></i></button>
                </span>
            </div>
        </form>
        </div>
    </div>
</div>
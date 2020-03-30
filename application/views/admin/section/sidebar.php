<nav id="mainnav-container">
    <div id="mainnav">
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img class="img-circle img-md" src="<?=$logo?>" alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <span class="pull-right dropdown-toggle">
                                    <i class="dropdown-caret"></i>
                                </span>
                                <p class="mnp-name"><?=$akun?></p>
                                <span class="mnp-desc"><?=$address?></span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="<?=site_url('Admin/Profile')?>" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                            </a>
                            <a href="<?=site_url('Home/logout')?>" class="list-group-item">
                                <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                            </a>
                        </div>
                    </div>

                    <!--Shortcut buttons-->
                    <div id="mainnav-shortcut" class="hidden">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3" data-content="My Profile">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                    <i class="demo-pli-male"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                    <i class="demo-pli-speech-bubble-3"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                    <i class="demo-pli-thunder"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                    <i class="demo-pli-lock-2"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--End shortcut buttons-->


                    <ul id="mainnav-menu" class="list-group">
                        <li class="<?=($menu == 'Dashboard')?'active-link':''?>">
                            <a href="<?=site_url('Dashboard')?>">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="<?=($menu == 'Customer')?'active-link':''?>">
                            <a href="<?=site_url('Admin/Customer')?>">
                                <i class="demo-pli-find-user"></i>
                                <span class="menu-title">Data Customer</span>
                            </a>
                        </li>
                        <!-- <li class="<?=($menu == 'Paket')?'active-link':''?>">
                            <a href="<?=site_url('Admin/Paket')?>">
                                <i class="demo-pli-receipt-4"></i>
                                <span class="menu-title">Data Paket</span>
                            </a>
                        </li> -->
                        <li class="<?=($menu == 'Layanan')?'active-link':''?>">
                            <a href="<?=site_url('Admin/Layanan')?>">
                                <i class="demo-pli-receipt-4"></i>
                                <span class="menu-title">Data Layanan</span>
                            </a>
                        </li>
                        <li class="<?=($menu == 'PaketMember' || $menu == 'PaketNonMember')?'active-sub':''?>">
                            <a href="#">
                                <i class="demo-pli-receipt-4"></i>
                                <span class="menu-title">Data Paket</span>
                                <i class="arrow"></i>
                            </a>
            
                            <!--Submenu-->
                            <ul class="<?=($menu == 'PaketMember' || $menu == 'PaketNonMember')?'collapse in':'';?>">
                                <li class="<?=($menu == 'PaketMember')?'active-link':''?>"><a href="<?=site_url('Admin/PaketMember')?>">Paket Member</a></li>
                                <li class="<?=($menu == 'PaketNonMember')?'active-link':''?>"><a href="<?=site_url('Admin/PaketNonMember')?>">Paket Non Member</a></li>
                            </ul>
                        </li>
                        <li class="<?=($menu == 'Pemesanan')?'active-link':''?>">
                            <a href="<?=site_url('Admin/Pemesanan')?>">
                                <i class="demo-pli-receipt-4"></i>
                                <span class="menu-title">Data Pemesanan</span>
                            </a>
                        </li>
                        <li class="<?=($menu == 'Testimoni')?'active-link':''?>">
                            <a href="<?=site_url('Admin/Testimoni')?>">
                                <i class="demo-pli-happy"></i>
                                <span class="menu-title">Testimoni</span>
                            </a>
                        </li>
                        <li class="<?=($menu == 'Laporan')?'active-link':''?>">
                            <a href="<?=site_url('Admin/Laporan')?>">
                                <i class="demo-pli-coin"></i>
                                <span class="menu-title">Laporan</span>
                            </a>
                        </li>
                        <li class="<?=($menu == 'Chat')?'active-link':''?>">
                            <a href="<?=site_url('Admin/Chat')?>">
                                <i class="demo-pli-speech-bubble-5"></i>
                                <span class="menu-title">Chat</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
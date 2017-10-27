<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <?php if (($this->session->hak == 'admin') || ($this->session->hak == 'root')): ?>
                        <li><a  href="<?php echo site_url('masuk/master') ?>">STOK MASUK</a></li>
                        <li><a href="<?php echo site_url('keluar/master') ?>">STOK KELUAR</a></li>
                        <li><a href="<?php echo site_url('musnah/master') ?>">PEMUSNAHAN</a></li>
                        <li> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PERAMALAN <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('ramal/masuk') ?>" style="color: black">STOK MASUK</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo site_url('ramal/keluar') ?>" style="color: black">STOK KELUAR</a></li>
                        </ul>
                    </li>
                
                
                <li><a href="<?php echo site_url('auth/logout') ?>">LOGOUT</a></li>
                <?php endif ?>
                <?php if (($this->session->hak == '') ): ?>
                <li><a  href="<?php echo site_url('masramal/masuk') ?>">STOK MASUK</a></li>
                <li><a href="<?php echo site_url('masramal/keluar') ?>">STOK KELUAR</a></li>
                <li><a href="<?php echo site_url('masramal/musnah') ?>">PEMUSNAHAN</a></li>
                <li><a href="<?php echo site_url('masramal/butuh') ?>">KEBUTUHAN DARAH</a></li>
                
                <li><a href="<?php echo site_url('login') ?>">LOGIN</a></li>
                    
                <?php endif ?>
               
                
            </ul>
        </div>
    </div>
</div>
</div>
</section>
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line"><?php echo $title ?></h4>
    </div>
</div>

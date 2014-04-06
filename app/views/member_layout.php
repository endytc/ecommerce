<html>
    <head>
        <?php include 'app/views/head.php'; ?>
    </head>
    <body>
        <div id="header">
            <div class="login-holder">
                <div class="options">
                    <a href="<?php echo app_base_url('pagemember/edit_profile') ?>">My Profile</a>||<a href="<?php echo app_base_url() . '/pagemember/login/logout' ?>">Logout</a>
                </div>
            </div>
            <div id="logo">
                <h1><a href="<?php echo app_base_url() . '/' ?>#">PAGE MEMBER - ECOMMERCE</a></h1>
                <div id="flags-holder">
                </div>
            </div>
            <div id="menu">
                <ul>
                    <li class=""><a href="<?php echo app_base_url('pagemember/index')?>" accesskey="1" title="">Home</a></li>
                    <li><a href="<?php echo app_base_url('pagemember/produk')?>#" accesskey="2" title="">Produk</a></li>
                    <li><a href="<?php echo app_base_url('pagemember/berita')?>#" accesskey="4" title="">Berita</a></li>
                    <li><a href="<?php echo app_base_url('pagemember/order')?>#" accesskey="4" title="">Order</a></li>
                    <li><a href="<?php echo app_base_url('pagemember/laporan')?>#" accesskey="4" title="">Laporan</a></li>
                    <li><a href="<?php echo app_base_url('pagemember/pemasok')?>#" accesskey="4" title="">Pemasok</a></li>

                </ul>
            </div>
        </div><!--end header-->
        <?php
                                    if(isset($_SESSION['success'])){
                                        $message="$_SESSION[success]";
                                        unset($_SESSION['success']);
                                        $class="fb4";
                                    }
                                    if(isset($_SESSION['failed'])){
                                        $message= "$_SESSION[failed]";
                                        unset($_SESSION['failed']);
                                        $class="fb5";
                                    }else{
                                        $message="";
                                        $class="";
                                    }
                                    
                                    ?>
                            <div class="<?php echo $class ?>" style="width: 800;margin: 0 auto;
padding: 20px 0;">
                                <?php echo $message?>
                            </div>
                            <?php if($message!="") echo "<br><br>";?>
<?php echo $_content?>
        <script href="<?php echo app_base_url() ?>/assets/js/fancybox/jquery.fancybox.js"></script>
        <script src="<?php echo app_base_url() ?>/assets/js/tambahan/dialog.js"></script>    
    </body>
</html>
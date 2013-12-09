<html>
    <head>
        <?php include 'app/views/head.php'; ?>
    </head>
    <body>
        <div id="header">
            <div class="login-holder">
                <div class="options">
                    <a href="<?php echo app_base_url('pageadmin/user/profile') ?>">My Profile</a>||<a href="<?php echo app_base_url() . '/' ?>">Logout</a>
                </div>
            </div>
            <div id="logo">
                <h1><a href="<?php echo app_base_url() . '/' ?>#">PAGE ADMIN - ECOMMERCE</a></h1>
                <div id="flags-holder">
                </div>
            </div>
            <div id="menu">
                <ul>
                    <li class=""><a href="<?php echo app_base_url() . '/' ?>index" accesskey="1" title="">Home</a></li>
                    <li>
                        <a href="<?php echo app_base_url('pageadmin/produk')?>#" rel="dropMenu1"accesskey="2" title="">Produk</a>
                    </li>
                    <li>
                        <dl class="dropdown">
                            <dt id="two-ddheader" onmouseover="ddMenu('two', 1)" onmouseout="ddMenu('two', -1)"><a href="<?php echo app_base_url() . '/' ?>#" rel="dropMenu2"accesskey="3" title="">Shop</a></dt>
                            <dd id="two-ddcontent" onmouseover="cancelHide('two')" onmouseout="ddMenu('two', -1)">
                                <ul>
                                    <li><a href="<?php echo app_base_url() . '/' ?>HalamanBuy"" class="underline">Buy</a></li>
                                    <li><a href="<?php echo app_base_url() . '/' ?>#" class="underline">Chart</a></li>
                                    <li><a href="<?php echo app_base_url() . '/' ?>#" class="underline">Best Seller</a></li>
                                    <li><a href="<?php echo app_base_url() . '/' ?>#" class="underline">New Arrival</a></li>

                                </ul>
                            </dd>
                        </dl>
                    </li>
                    <li><a href="<?php echo app_base_url() . '/' ?>#" accesskey="4" title="">About</a></li>
                    <li>
                        <dl class="dropdown">
                            <dt id="three-ddheader" onmouseover="ddMenu('three', 1)" onmouseout="ddMenu('three', -1)"><a href="<?php echo app_base_url() . '/' ?>#" rel="dropMenu3"accesskey="5" title="">Contact</a></dt>
                            <dd id="three-ddcontent" onmouseover="cancelHide('three')" onmouseout="ddMenu('three', -1)">
                                <ul>
                                    <li><a target="_blank" href=http://www.facebook.com><span><img border="0" src="<?php echo app_base_url() . '/assets/' ?>images/facebook.jpg" width="30" height="30" alt="" title=""></span></a></li>
                                    <li><a target="_blank" href=http://www.twitter.com><span><img border="0" src="<?php echo app_base_url() . '/assets/' ?>images/twitter.jpg" width="30" height="30" alt="" title=""></span></a></li>
                                    <li><a target="_blank" href=http://www.blogspot.com><span><img border="0" src="<?php echo app_base_url() . '/assets/' ?>images/blog.jpg" width="30" height="30" alt="" title=""></span></a></li>
                                    <li><a target="_blank" href=http://www.google.com/talk/><span><img border="0" src="<?php echo app_base_url() . '/assets/' ?>images/gtalk.gif" width="30" height="30" alt="" title=""></span></a></li>
                                </ul>
                            </dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div><!--end header-->
<?php echo $_content?>
        <script href="<?php echo app_base_url() ?>/assets/js/fancybox/jquery.fancybox.js"></script>
        <script src="<?php echo app_base_url() ?>/assets/js/tambahan/dialog.js"></script>    
    </body>
</html>
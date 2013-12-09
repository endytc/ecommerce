<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include 'app/views/head.php';?>
    </head>
    <body>
        <!-- start header -->
        <div id="header">
            <div class="login-holder">
                <form name="login" enctype="" action="salam" method="post">
                    <label class="email-holder">
                        <input name="email" placeholder="Email" type="text">
                    </label>
                    <input name="password" placeholder="Password" type="password">
                        <!-- <div class="login ">-->
                        <input value="Login" type="submit">
                            <!--</div>-->
                            </form>
                            <div class="options">
                                <a href="<?php echo app_base_url('FormMember') ?>">Daftar Member</a>||<a href="<?php echo app_base_url() . '/' ?>" target="_blank">Lupa Password</a>
                            </div>
                            </div>
                            <div id="logo">
                                <h1><a href="<?php echo app_base_url() . '/' ?>#">E-COMMERCE PENJUALAN PRODUK </a></h1>
                                <div id="flags-holder">
                                </div>
                            </div>
                            <div class="search-holder">
                                <input type="text" /> <button>Search</button>
                            </div>
                            <div id="menu">
                                <ul>
                                    <li class=""><a href="<?php echo app_base_url() . '/' ?>index" accesskey="1" title="">Home</a></li>
                                    <li>
                                        <!--                        <a href="<?php echo app_base_url() . '/' ?>#" rel="dropMenu1"accesskey="2" title="">Produk</a>-->
                                        <dl class="dropdown">
                                            <dt id="one-ddheader" onmouseover="ddMenu('one', 1)" onmouseout="ddMenu('one', -1)"><a href="<?php echo app_base_url() . '/' ?>#" rel="dropMenu1"accesskey="2" title="">Product</a></dt>
                                            <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one', -1)">
                                                <ul>
                                                    <li><a href="<?php echo app_base_url() . '/' ?>HalamanFashion" class="underline">Fashion</a></li>
                                                    <li><a href="<?php echo app_base_url() . '/' ?>HalamanElektronik" class="underline">Electronic</a></li>
                                                    <li><a href="<?php echo app_base_url() . '/' ?>HalamanProperti" class="underline">Properti</a></li>
                                                    <li><a href="<?php echo app_base_url() . '/' ?>#" class="underline">Garage Sale</a></li>

                                                </ul>
                                            </dd>
                                        </dl>

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
                            </div>
                                                <!-- end header -->
<?php echo $_content?>                                                
                                                <div style="clear: both; height: 30px">&nbsp;</div>
                                                <!-- end page -->
                                                <div id="footer">
                                                    <p>&copy;2007 All Rights Reserved. &nbsp;&bull;&nbsp; Designed by <a href="<?php echo app_base_url().'/'?>http://www.freecsstemplates.org/">Free CSS Templates</a></p>
                                                </div>
                                                <div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>

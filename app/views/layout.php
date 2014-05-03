<?php
$kategoriList=_select_arr("select * from kategori");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include 'app/views/head.php';?>
    </head>
    <body>
        <!-- start header -->
        <div id="header">
            <div class="login-holder">
                <form name="login" enctype="" action='<?php echo app_base_url('login_proses') ?>' method="post">
                    <label class="email-holder">
                        <input name="username" placeholder="Username" type="text">
                    </label>
                    <input name="password" placeholder="Password" type="password">
                        <!-- <div class="login ">-->
                        <input value="Login" type="submit">
                            <!--</div>-->
                            </form>
                            <div class="options">
                                <a href="<?php echo app_base_url('daftar_member') ?>">Daftar Member</a>
                            </div>
                            </div>
                            <div id="logo">
                                <h1><a href="<?php echo app_base_url() . '/' ?>#"> </a></h1>
                                <div id="flags-holder">
                                </div>
                            </div>
                            <div class="search-holder">
                                <form action="<?php echo app_base_url('cari')?>">
                                    <input type="text" name="key"> <button>Search</button>
                                </form>
                            </div>
                            <div id="menu">
                                <ul>
                                    <li class=""><a href="<?php echo app_base_url() . '/' ?>index" accesskey="1" title="">Beranda</a></li>
                                    <li>
                                        <!--                        <a href="<?php echo app_base_url() . '/' ?>#" rel="dropMenu1"accesskey="2" title="">Produk</a>-->
                                        <dl class="dropdown">
                                            <dt id="one-ddheader" onmouseover="ddMenu('one', 1)" onmouseout="ddMenu('one', -1)"><a href="<?php echo app_base_url() . '/' ?>#" rel="dropMenu1"accesskey="2" title="">Produk</a></dt>
                                            <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one', -1)">
                                                <ul>
                                                    <?php
                                                    foreach($kategoriList as $kategori){
                                                        ?><li><a href="<?php echo app_base_url('productKategori?id='.$kategori['idKategori']) ?>" class="underline"><?php echo $kategori['namaKategori']?></a></li><?php
                                                    }
                                                    ?>
                                                </ul>
                                            </dd>
                                        </dl>

                                    </li>

                                    <li>
                                        <dl class="dropdown">
                                            <dt id="two-ddheader" onmouseover="ddMenu('two', 1)" onmouseout="ddMenu('two', -1)"><a href="<?php echo app_base_url() . '/best_seller' ?>#" accesskey="4" title="">Produk Terlaris</a></dt>
                                            <dd id="two-ddcontent" onmouseover="cancelHide('two')" onmouseout="ddMenu('two', -1)">
                                                <ul>
                                                   <a href="<?php echo app_base_url().'/new_arrival'?>#" accesskey="'4" title="">Produk Terbaru</a>
                                                </ul>

                                            </dd>
                                        </dl>

                                    </li>
                                   
                                    <li><a href="<?php echo app_base_url() . '/berita?id=2' ?>#" accesskey="4" title="">Tentang</a></li>
                                    <?php if(isset($_SESSION['chart']) && count($_SESSION['chart'])>0):?>
                                        <li><a href="<?php echo app_base_url() . '/chart' ?>" accesskey="4" title="">Chart (<?php echo count($_SESSION['chart'])?>)</a></li>
                                    <?php endif;?>
                                    <li>
                                        <dl class="dropdown">
                                            <dt id="three-ddheader" onmouseover="ddMenu('three', 1)" onmouseout="ddMenu('three', -1)"><a href="<?php echo app_base_url() . '/' ?>#" rel="dropMenu3"accesskey="5" title="">Kontak</a></dt>
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
                                                <!-- end header -->
<?php echo $_content?>
                                                <div style="clear: both; height: 30px">&nbsp;</div>
                                                <!-- end page -->
                                                <div id="footer">
                                                    <p>&copy;2007 All Rights Reserved. &nbsp;&bull;&nbsp; Designed by <a href="//<?php echo app_base_url().'/'?>http://www.freecsstemplates.org/">Free CSS Templates</a></p>
                                                </div>
                                                <div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>

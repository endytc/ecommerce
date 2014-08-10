<?php
$beritaList = _select_arr("select * from berita where idBerita='$_GET[id]' order by berita.idBerita desc");
?>
<div id="page">
    <!-- start content -->
    <div id="content">
        <?php foreach($beritaList as $berita):?>
            <div class="post">
                <h1 class="title"><a href="<?php echo app_base_url() . '/berita?id='.$berita['idBerita'] ?>"><?php echo $berita['judul']?></a></h1>
                <p class="byline">
                    <small>Diposting <?php echo parse_datetime($berita['waktu'])?> by <a href="<?php echo app_base_url() . '/' ?>#">admin</a></small>
                </p>
                <div class="entry">
                    <p><?php echo $berita['isi']?></p>
                </div>
                <p class="meta"><a href="<?php echo app_base_url() . '/berita?id='.$berita['idBerita'] ?>#" class="more">Read More</a> &nbsp;&nbsp;&nbsp;
                    <a href="<?php echo app_base_url() . '/' ?>#" class="comments"></a></p>
            </div>
        <?php endforeach;?>
    </div>
    <!-- end content -->
    <?php echo include "app/actions/_sidebar.php"?>
</div>
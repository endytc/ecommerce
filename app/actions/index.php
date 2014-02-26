<?php
$gambarList = _select_arr("select * from galeri_produk
  join produk on produk.idProduk=galeri_produk.idProduk
  where galeri_produk.format='gambar' limit 5");
$beritaList = _select_arr("select * from berita order by berita.idBerita desc");
?>

<div id="gallery">
    <div id="slideshow">
        <?php foreach ($gambarList as $data) {
            $b64Src = "data:" . $data['type'] . ";base64," . base64_encode($data["file"]);
            echo '<img src="' . $b64Src . '" alt="Slideshow Image 1" class="active" width="830" height="300"/>';
        }?>
    </div>
    <!-- <div id="top-photo">
         <p><a href="<?php echo app_base_url() . '/' ?>#"><img src="<?php echo app_base_url() . '/assets/' ?>../slide/slide" alt="" width="830" height="300" /></a></p>
     </div>-->
</div>
<div id="page">
    <!-- start content -->
    <div id="content">
        <?php foreach($beritaList as $berita):?>
        <div class="post">
            <h1 class="title"><a href="<?php echo app_base_url() . '/berita?id='.$berita['idBerita'] ?>"><?php echo $berita['judul']?></a></h1>
            <p class="byline">
                <small>Diposting <?php echo parse_datetime($berita['waktu'])?> by <a href="<?php echo app_base_url() . '/' ?>#">admin</a> | <a
                        href="<?php echo app_base_url() . '/' ?>#">Edit</a></small>
            </p>
            <div class="entry">
                <p><?php echo $berita['isi']?></p>
            </div>
            <p class="meta"><a href="<?php echo app_base_url() . '/berita?id='.$berita['idBerita'] ?>#" class="more">Read More</a> &nbsp;&nbsp;&nbsp;
                <a href="<?php echo app_base_url() . '/' ?>#" class="comments">Comments (33)</a></p>
        </div>
        <?php endforeach;?>
    </div>
    <!-- end content -->
    <?php echo include "app/actions/_sidebar.php"?>
</div>
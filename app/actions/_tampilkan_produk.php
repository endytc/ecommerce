<div id="content fashion" class="container_12 baju">
    <?php foreach ($productList as $product):
        $gambar = _select_unique_result("select * from galeri_produk
                        where idProduk='$product[idProduk]' and format='gambar'");
        $b64Src = "data:" . $gambar['type'] . ";base64," . base64_encode($gambar["file"]);
        ?>
    <div class="grid_3 produk" style="padding-bottom: 20px">
            <img style="width:200px;height: 150px" src="<?php echo $b64Src ?>" class="katalog"
                 alt="no image for <?php echo $product['namaProduk'] ?>"/>

            <div class="fb3" style="text-align: center;"><?php echo $product['namaProduk'] ?>
           <br>
                Stok: <?php echo $product['stok'] ?>; <?php echo rupiah($product['harga']) ?>
                <?php echo ($product['luas_tanah']=='' || $product['luas_tanah']<=0 || $product['luas_tanah']==null )?'':'; '.$product['luas_tanah'].' m2' ?>

            </div>
            <div style='width: 100%;text-align: center;'>
                <a href="<?php echo app_base_url('viewProduct?id=' . $product['idProduk']) ?>" type="button"
                   class="uibutton confirm" style="width: 90%;">View</a>
            </div>
        </div>
    <?php endforeach; ?>

    <?php
    include_once 'pagnation.php';
//        $result = getdata($tabel, "idHunian", $_REQUEST['id']);

    if (isset($_POST['keyword'])) {
                $condition = "where produk like '%" . $_POST['keyword'] . "%'";
            } else {
                $condition = null;
            }
            $server = "_tampilkan_produk.php?page=";
            if (isset($_REQUEST['page'])) {
                $batas = ($_REQUEST['page'] - 1) * 12;
            } else {
                $batas = 0;
            }

        $query = "select * from produk". $condition . " limit " . $batas . ",12";

        $result = mysql_query($query);
        if (mysql_num_rows($result)) {
            while ($res = mysql_fetch_array($result)) {
            }}
                ?>

</div>
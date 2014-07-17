<div id="content fashion" class="container_12 baju">
    <?php foreach ($productList as $product):
        $gambar = _select_unique_result("select * from galeri_produk
                        where idProduk='$product[idProduk]' and format='gambar'");
        $b64Src = "data:" . $gambar['type'] . ";base64," . base64_encode($gambar["file"]);
        ?>
    <div class="grid_3 " style="padding-bottom: 20px">
            <img style="width:200px;height: 150px" src="<?php echo $b64Src ?>" class="katalog"
                 alt="no image for <?php echo $product['namaProduk'] ?>"/>

            <div class="" style="text-align: center;"><?php echo $product['namaProduk'] ?></div>
            <div>
                Stok: <?php echo $product['stok'] ?>
                <a href="<?php echo app_base_url('viewProduct?id=' . $product['idProduk']) ?>" type="button"
                   class="uibutton confirm">View</a>
            </div>
        </div>
    <?php endforeach; ?>

   

</div>
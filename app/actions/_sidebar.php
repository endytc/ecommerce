<?php
$productDiscount=_select_arr("select * from produk where discount is not null and discount>0");
$kategoriList = _select_arr("select * from kategori");
?>
<div id="sidebar">
    <ul>
        <li>
            <h2>Categories</h2>
            <ul>
                <?php
                foreach ($kategoriList as $kategori){
                    ?>
                    <li><a
                        href="<?php echo app_base_url('productKategori?id=' . $kategori['idKategori']) ?>"><?php echo $kategori['namaKategori'] ?></a>
                    </li><?php
                }
                ?>
            </ul>

        </li>
        <li>
            <h2>Diskon</h2>
            <ul>
                <?php
                foreach ($productDiscount as $product){
                    ?>
                    <li><a
                        href="<?php echo app_base_url('viewProduct?id=' . $product['idProduk']) ?>"><?php echo $product['namaProduk']." ($product[discount] %)" ?></a>
                    </li><?php
                }
                ?>
            </ul>

        </li>
    </ul>
</div>
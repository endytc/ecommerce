<?php
    $page=  array_value($_GET, 'pages',1)*  getPerPage()-  getPerPage();
    $produk=  _select_unique_result("select * from produk where idProduk=$_GET[id]");
    $galeri_produk=  _select_arr("select * from galeri_produk p
        where idProduk=$_GET[id]
        limit $page,".  getPerPage());
    $pagging= pagination("select * from galeri_produk", getPerPage());
?>
<?php require_once 'app/actions/pagemember/produk/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Galery Produk <?php echo $produk['namaProduk']?></h1>
            <a href="<? echo app_base_url('pagemember/produk/galeri_add?id='.$produk['idProduk'])?>">Tambah</a>
            <div class="entry">
    <table class="myOtherTable">
    <thead>
        <tr>
            <th style="width: 10%">No</th>
            <th>Galleri</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = $page + 1;
        foreach ($galeri_produk as $data) {
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td colspan="2">
                    <?php
                    if($data['format']=='video'):
                        play_video($data['file'], $data['keterangan'],$data['idGaleri']);
                    else:
                        $b64Src = "data:".$data['type'].";base64," . base64_encode($data["file"]);
                        echo '<img src="'.$b64Src.'" alt="" width="100px"/>';
                    endif;?>
                </td>
                <!--<td><?php echo $data['keterangan'] ?></td>-->
                <td class="button">
                    <a href="<?php echo app_base_url("pagemember/produk/galeri_delete?idGaleri=$data[idGaleri]&id=$_GET[id]") ?>" onclick="return window.confirm('<?php echo "Apakah anda yakin akan menghapus galeri produk ini?" ?>')"class="hapus">hapus</a>
                </td>
            </tr>
        </tbody>
        <?php
    }
    ?>
                </table>
                <?php echo $pagging ?>
            </div>
        </div>
    </div>
</div>

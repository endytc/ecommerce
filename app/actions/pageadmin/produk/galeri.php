<?php
    $page=  array_value($_GET, 'pages',1)*  getPerPage()-  getPerPage();
    $produk=  _select_unique_result("select * from produk where idProduk=$_GET[id]");
    $galeri_produk=  _select_arr("select * from galeri_produk p
     
        limit $page,".  getPerPage());
    $pagging= pagination("select * from galeri_produk", getPerPage());
?>
<?php require_once 'app/actions/pageadmin/produk/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Galery <?php echo $produk['namaProduk']?></h1>
            <div class="entry">
                <a href="<?php echo app_base_url('pageadmin/produk/galeri_add?id='.$_GET['id'])?>">Tambah</a>
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
            $b64Src = "data:".$data['type'].";base64," . base64_encode($data["file"]);

            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td>
                    <?php 
                    if($data['format']=='video'):
//                        echo app_base_url()."/$data[file]";
                        ?>
                    <embed src="<?php echo app_base_url()."/$data[file]";?>" height="">
                    <video width="320" height="240" controls>
                        <source src="<?php echo app_base_url()."/$data[file]"?>" type="<?php echo ($data['type'])?>">
                    </video>
                        <?php
                    else:
                        echo '<img src="'.$b64Src.'" alt="" width="100px"/>';
                    endif;?>
                </td>
                <td><?php echo $data['keterangan'] ?></td>
                <td class="button">
                    <a href="<?php echo app_base_url("pageadmin/produk/galeri_delete?idGaleri=$data[idGaleri]&id=$_GET[id]") ?>" onclick="return window.confirm('<?php echo "Apakah anda yakin akan menghapus galeri_produk $data[nama]?" ?>')"class="hapus">hapus</a>
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

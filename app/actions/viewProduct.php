<style type="text/css">
.error{
    font-size:small;
}
</style>
<?php
$product=_select_unique_result("select * from produk
    left join member on produk.idMember=member.idMember
    where idProduk=$_GET[id]");
$productGallery=_select_arr("select * from galeri_produk where idProduk=$_GET[id]");
if(count($productGallery)>0){
    $g=array();
    foreach($productGallery as $gallery){
        if($gallery['format']=='gambar'){
            $g=$gallery;
            break;
        }
    }
    $b64Src = "data:".$g['type'].";base64," . base64_encode($g["file"]);
}else
    $b64Src="";
?>
<div id="page">
    <h1><?php echo  $product['namaProduk']?></h1>
    <hr><br>
<div class="grid_6">
    <img style="width:400" src="<?php echo $b64Src?>" id="displayGambar" class="" alt="no image for <?php echo $product['namaProduk']?>"/>
</div>
<div class="grid_10">
    <form action="<?php echo app_base_url('addProduct')?>" id='formbeli'>
    <table>
        <tr>
            <td>Harga</td>
            <td><?php echo $product['harga']?></td>
        </tr>
        <tr>
            <td>Disc</td>
            <td><?php echo $product['discount']?></td>
        </tr>
        <tr>
            <td>Pilihan Warna</td>
            <td><?php echo $product['warna']?></td>
        </tr>
        <tr>
            <td>Ukuran</td>
            <td><?php echo $product['size']?></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><?php echo $product['stok']?></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td style="max-width: 90px;"><?php echo $product['deskripsi']?></td>
        </tr>
        <tr>
            <td>Penjual</td>
            <td><?php echo $product['nama']?></td>
        </tr>
        <tr>
            <td>Kontak</td>
            <td><?php echo $product['telepon']?></td>
        </tr>
        <tr>
            <td>Beli</td>
            <td>
                    <input type="hidden" name="id" value="<?php echo $product['idProduk']?>">
                    <input type="text" name="jumlah" value="<?php ?>" placeholder="jumlah pemesanan" max='<?php echo $product['stok']?>' min='1' class="required">
                
            </td>
        </tr>
        <tr>
            <td colspan='2' style='text-align:right'>
                <button class="uibutton facebook" onclick=''>+ Pesan</button>
            </td>
        </tr>
    </table>
    </form>
</div>
<div class="clear"></div>
    <br>
    <br>
    <br>
    <div class="grid_16">
        <div id="content fashion" class="container_12 baju">
            <?php
            $videoList=array();
            foreach ($productGallery as $data):
                if($data['format']=='video'):
//                    play_video($data['file'], $data['keterangan'],$data['idGaleri']);
                    $videoList[]=$data;
                    continue;
                endif;
                ?>
                <div class="grid_4 ">
                    <?php
                        $b64Src = "data:".$data['type'].";base64," . base64_encode($data["file"]);
                        echo '<img src="'.$b64Src.'" alt="" width="300px" style="cursor: hand" class="galery"/>';
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="clear"></div>
    <br><br><br><br>
    <div class="grid_16" style="text-align: center;">
        <? //playlist($videoList);?>
        <?
        if(isset($videoList[0])){
            $data=$videoList[0];
            play_video($data['file'], $data['keterangan'],$data['idGaleri']);
        }
        ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.galery').click(function(){
           $('#displayGambar').attr('src',$(this).attr('src'));
        });
        $('#formbeli').validate();
    })
</script>

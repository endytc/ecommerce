<?php
if($_POST){
    $type=$_FILES["file"]["type"];
    $_FILES["file"]["name"]=  date('dmY').'_'.time().'_'.$_FILES["file"]["name"];
    $filePath='upload/'.$_FILES["file"]['name'];
    //success
    move_uploaded_file($_FILES["file"]["tmp_name"], $filePath);
    
    $blob = fopen($filePath,'r');
    $sql = "INSERT INTO galeri_produk (idProduk,file,keterangan,type,format) VALUES(:idProduk,:file,:keterangan,:type,:format)";
    try {
        $conn = getPDOInstance();
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':idProduk', $_GET['id']);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':format', $_POST['format']);
        $stmt->bindParam(':keterangan', $_POST['keterangan']);
        if($_POST['format']=='video')
            $stmt->bindParam(':file', $filePath);
        else
            $stmt->bindParam(':file', $blob, PDO::PARAM_LOB);
        $is_success = $stmt->execute();
    } catch (Exception $pe) {
        die($pe->getMessage());
    }
    if($is_success){
        $_SESSION['success']="Data galeri berhasil ditambahkan";
    }else{
        $_SESSION['failed']="Data galeri gagal ditambahkan";
    }
    if(!$_POST['format']=='video')
        unlink($filePath);
    redirect('pagemember/produk/galeri?id='.$_GET['id']);
}
?>
<?php require_once 'app/actions/pagemember/produk/left_menu.php';?>
<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Tambah Galeri</h1>
            <div class="entry">
                <form action="<?php echo app_base_url('pagemember/produk/galeri_add?id='.$_GET['id']) ?>" method="POST" enctype="multipart/form-data">
                    <table class="myOtherTable formTable">
                        <tr>
                            <td class="title">File</td>
                            <td><input type="file" name="file" value=""/></td>
                        </tr>
                        <tr>
                            <td class="title">Format</td>
                            <td>
                                <input type="radio" name="format" value="gambar"/> Gambar<br>
                                <input type="radio" name="format" value="video"/> Video
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Keterangan</td>
                            <td>
                                <textarea name="keterangan"></textarea>
                            </td>
                        </tr>
                    </table>
                    <div class="buttonpane">
                        <span class="ButtonInput">
                            <span><input type="submit" class=""value="Simpan"/></span>
                        </span>
                        <a href="<?php echo app_base_url('produk/index') ?>" class="Button"><span>Batal</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

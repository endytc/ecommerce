<?php
$user=get_user_login();
$productList=_select_arr("select * from produk where idMember='$user[id]'")
?>
<div id="page">
    <h1>Laporan Penjualan</h1>
    <hr>
    <table>
        <tr>
            <td>Produk</td>
            <td>
                <select id="product">
                    <option value="">- Semua -</option>
                    <?php
                    foreach($productList as $p){
                        ?><option value="<?php echo $p['idProduk']?>"><?php echo $p['namaProduk']?></option><?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>
                <input type="text" name="tanggal_mulai" class="tanggal"> s.d
                <input type="text" name="tanggal_akhir" class="tanggal">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right">
                <input type="button" value="Cetak" id="cetak">
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.tanggal').datepicker({
            dateFormat:"yy-mm-dd",
            changeMonth:true,
            changeYear:true
        });
        $('#cetak').click(function(){
            var wind=window.open("<?php echo app_base_url('pagemember/laporan_range_tanggal')?>?"+
                "start="+$('input[name=tanggal_mulai]').attr('value')+"&end="+$('input[name=tanggal_akhir]').attr('value')+
                "&idProduk="+$('#product').val(),
                'mywindow','width=500,height‌​=350,toolbar=no,resizable=yes,menubar=yes');
        });
    });
</script>
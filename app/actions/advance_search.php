<div id="page">
    <div id="content fashion">
        <div class="post">
            <h1 class="title">Advance Search</h1>
            <div class="entry">
				<form action="<?php echo app_base_url('cari')?>">
					<input type='hidden' name='type' value='advance'>
					<table>
						<tr>
							<td>Nama Produk</td>
							<td>
								<input type="text" name="key" placeholder="Nama produk" title="nama produk" value="<?php echo (isset($_GET['key'])?$_GET['key']:"")?>" style="width:110px"> 
							</td>
						</tr>
						<tr>
							<td>Harga</td>
							<td>
								<input type="text" name="harga_minimum" placeholder="Harga minimum" title="harga minimum" value="<?php echo (isset($_GET['harga_minimum'])?$_GET['harga_minimum']:"")?>" style="width:110px"> s.d 
								<input type="text" name="harga_maksimum" placeholder="Harga maximum" title="harga maximum" value="<?php echo (isset($_GET['harga_maksimum'])?$_GET['harga_maksimum']:"")?>" style="width:110px">
					    	</td>
						</tr>
						<tr>
							<td>Luas Tanah</td>
							<td>
								<input type="text" name="luas_tanah" placeholder="Luas tanah" title="luas tanah (khusus property)" value="<?php echo (isset($_GET['luas_tanah'])?$_GET['luas_tanah']:"")?>" style="width:110px">
								<br> <i style="font-size: 11;">*) Hanya untuk property</i>
							</td>
						</tr>
					</table>
				    <button>Search</button>
				</form>
			</div>
        </div>
    </div>
</div>

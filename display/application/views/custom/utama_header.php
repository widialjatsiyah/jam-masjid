<div class="fixed-top rgba-black-strong">
	<div class="container-fluid">
		<div class="row">
			<!-- <div class="kiri col-md-3 col-lg-3 col-xl-3 text-center">
		    	<span class="hari" id="day"></span>
		    	<span class="tanggal_masehi" id="date_masehi"></span> <br>
		    	<span class="tanggal_hijriah" id="date_hijriah"></span>
		    </div> -->

			<div class="tengah col-md-8 col-lg-8 col-xl-8 padding-0" style="
    font-family: 'Digital', sans-serif;">
				<div style="margin-left: 20px;">
					<span class="nama"><?php echo app_masjid()->masjid_nama; ?></span><br>
					<span class="alamat" dir="alamat">
						<?php echo app_masjid()->masjid_alamat; ?>
					</span>
				</div>
			</div>

			<div class="kanan col-md-4 col-lg-4 col-xl-4" style="padding: 2px;">
				<div style="
        color: #fff;
        background: linear-gradient(to right, #000000, #b87f23);
        letter-spacing: 1px; line-height: 1; text-align : center; padding: 5px 10px;">
		
					<span class="hari" id="day"></span>
					<span class="tanggal_masehi" id="date_masehi"></span> &nbsp;&nbsp;
					<span class="jam align-middle " id="time"></span><br>
					<span class="tanggal_hijriah" id="date_hijriah"></span>

				</div>
				<!-- <p class="jam align-middle float-right" id="down"></p> -->
			</div>
		</div>
	</div>
</div>
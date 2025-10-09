<div class="content-data owl-carousel mt-5" id="owl-hari-besar">
    <?php if (!empty($hari_besar_list)) : ?>
        <?php foreach ($hari_besar_list as $key => $value) : ?>
            <?php 
                // Hitung selisih hari
                $tanggal_masehi = new DateTime($value['tanggal_masehi']);
                $sekarang = new DateTime();
                $selisih = $sekarang->diff($tanggal_masehi)->days;
                $hari_text = ($selisih == 1) ? "hari" : "hari";
            ?>
            <div class="slide" 
                 style="height: 100vh;
                        width: 100vw;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        position: relative;
                        background-color: #000000;">
                <div class="content-text" style="text-align: center; background: rgba(0,0,0,0.5); padding: 20px; border-radius: 10px; color: white; max-width: 80%;">
                    <?php if (!empty($value['nama_arab'])) : ?>
                        <h1 style="font-size: 3rem;"><?php echo $value['nama_arab']; ?></h1>
                    <?php endif; ?>
                    <h2 style="font-size: 2.5rem; margin: 20px 0;"><?php echo $value['nama']; ?></h2>
                    <p style="font-size: 2rem;">
                        <?php echo $selisih . " " . $hari_text . " lagi menjelang hari " . $value['nama']; ?>
                    </p>
                    <?php if (!empty($value['keterangan'])) : ?>
                        <p style="font-size: 1.5rem; margin-top: 20px;"><?php echo $value['keterangan']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="slide" 
             style="height: 100vh;
                    width: 100vw;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    position: relative;
                    background-color: #000000;">
            <div class="content-text" style="text-align: center; background: rgba(0,0,0,0.5); padding: 20px; border-radius: 10px; color: white; max-width: 80%;">
                <h2>Tidak ada hari besar dalam 90 hari ke depan</h2>
            </div>
        </div>
    <?php endif; ?>
</div>
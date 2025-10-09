<div class="row">
    <div class="col-md-2 col-lg-2 col-xl-2 padding-0 bg-dark">
        <div class="waktu-shalat-b">
            <div class="waktu-shalat  z-depth-1 text-center">
                <h2>Terbit</h2>
                <h1 style="color: white;"><?php echo substr(jadwal_shalat()['terbit'], 0, 5); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-lg-2 col-xl-2 padding-0 bg-dark">

        <div class="waktu-shalat-b">
            <div class="waktu-shalat  darken-3 unique z-depth-1 text-center">
                <h2>Subuh</h2>
                <h1 style="color: white;"><?php echo substr(jadwal_shalat()['subuh'], 0, 5); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-lg-2 col-xl-2 padding-0 bg-dark">

        <div class="waktu-shalat-b">
            <div class="waktu-shalat  darken-1 z-depth-1 text-center">
                <h2>Dzuhur</h2>
                <h1 style="color: white;"><?php echo substr(jadwal_shalat()['dzuhur'], 0, 5); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-lg-2 col-xl-2 padding-0 bg-dark">

        <div class="waktu-shalat-b">
            <div class="waktu-shalat darken-3 z-depth-1 text-center">
                <h2>Ashar</h2>
                <h1 style="color: white;"><?php echo substr(jadwal_shalat()['ashar'], 0, 5); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-lg-2 col-xl-2 padding-0 bg-dark">

        <div class="waktu-shalat-b">
            <div class="waktu-shalat  darken-3 z-depth-1 text-center">
                <h2>Maghrib</h2>
                <h1 style="color: white;"><?php echo substr(jadwal_shalat()['maghrib'], 0, 5); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-lg-2 col-xl-2 padding-0  bg-dark">

        <div class="waktu-shalat-b">
            <div class="waktu-shalat  darken-3 z-depth-1 text-center">
                <h2>Isya</h2>
                <h1 style="color: white;"><?php echo substr(jadwal_shalat()['isya'], 0, 5); ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="running-text row ">
    <div class="col-md-12 col-lg-12 col-xl-12  padding-0">
        <marquee>
            <?php echo (get_running_text()['status']) ? get_running_text()['data'] : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua"; ?>
        </marquee>
    </div>
</div>

<script>
    $(function() {
        $('.fs-general').hide();
        $('.fs-jumat').hide();

        var hari = moment().format('dddd');
        // console.log(hari);

        if (hari == "Rabu" || hari == "Kamis" || hari == "Jumat") {
            localStorage.setItem("tipe", "jumat");
            localStorage.setItem("time", moment().unix() + 60);
            setInterval(check_storage, 1000);
            fs_jumat();
            hari_jumat();
            $('.fs-jumat').slideDown('slow');
        } else {
            fs_general();
            imam_hari_ini();
            $('.fs-jumat').slideUp('slow');
        }

        function check_storage() {

            var tipe = localStorage.getItem("tipe");
            var time = localStorage.getItem("time");


            var now = moment().unix();

            if (tipe == "jumat" && now > time) {
                localStorage.setItem("tipe", "imam");
                var newtime = moment().unix() + 60;
                localStorage.setItem("time", newtime);

                // console.log('panggil imam')
                // console.log(tipe)
                // console.log(time)
                imam_hari_ini();
                fs_general();
            } else if (tipe == "imam" && now > time) {
                localStorage.setItem("tipe", "jumat");
                var newtime = moment().unix() + 60;
                localStorage.setItem("time", newtime);

                // console.log('panggil jumat')
                // console.log(tipe)
                // console.log(time)
                hari_jumat();
                fs_jumat();
            } else {
                // console.log(tipe)
                // console.log(time)
                // console.log(now)
            }
        }


        function hari_jumat() {

            var fs_general = $('.fs-general');
            var fs_jumat = $('.fs-jumat');

            fs_general.slideUp('slow');
            fs_jumat.slideDown('slow');

            var fsJumatTs = $('.fs-jumat-ts');
            var fsJumatTf = $('.fs-jumat-tf');
            var fsJumatTsSec = $('.fs-jumat-ts-sec');
            var fsJumatTfSec = $('.fs-jumat-tf-sec');

            var fsJumatMuadzinI = $('.fs-jumat-muadzin-i');
            var fsJumatMuadzinII = $('.fs-jumat-muadzin-ii');
            var fsJumatMuadzinISec = $('.fs-jumat-muadzin-i-sec');
            var fsJumatMuadzinIISec = $('.fs-jumat-muadzin-ii-sec');

            var fsJumatMuadzinIName = $('.fs-jumat-muadzin-i-name');
            var fsJumatMuadzinIiName = $('.fs-jumat-muadzin-ii-name');
            var fsJumatMuadzinINameSec = $('.fs-jumat-muadzin-i-name-sec');
            var fsJumatMuadzinIiNameSec = $('.fs-jumat-muadzin-ii-name-sec');

            var fsJumatKhatib = $('.fs-jumat-khatib');
            var fsJumatKhatibName = $('.fs-jumat-khatib-name');
            var fsJumatKhatibSec = $('.fs-jumat-khatib-sec');
            var fsJumatKhatibNameSec = $('.fs-jumat-khatib-name-sec');

            var fsJumatImam = $('.fs-jumat-imam');
            var fsJumatImamName = $('.fs-jumat-imam-name');
            var fsJumatImamSec = $('.fs-jumat-imam-sec');
            var fsJumatImamNameSec = $('.fs-jumat-imam-name-sec');

            $.ajax({
                    url: '<?php echo base_url(); ?>service/get_petugas_jumat',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        hari: hari
                    }
                })
                .done(function(res) {
                    fsJumatTs.html(res.petugas1.ts);
                    fsJumatTf.html(moment(res.petugas1.tf).format('D MMM YYYY'));
                    fsJumatMuadzinIName.html(res.petugas1.muadzin_1);

                    if (res.petugas1.muadzin_2 == null) {
                        fsJumatMuadzinI.html('Muazin');
                        fsJumatMuadzinII.html('Khatib');
                        fsJumatKhatib.html('Imam');
                        fsJumatImam.html('&nbsp;');
                        fsJumatMuadzinIiName.html(res.petugas1.khatib);
                        fsJumatKhatibName.html(res.petugas1.imam);
                    } else {
                        fsJumatMuadzinIiName.html(res.petugas1.muadzin_2);
                        fsJumatKhatibName.html(res.petugas1.khatib);
                        fsJumatImamName.html(res.petugas1.imam);
                    }

                    fsJumatTsSec.html(res.petugas2.ts);
                    fsJumatTfSec.html(moment(res.petugas2.tf).format('D MMM YYYY'));
                    fsJumatMuadzinINameSec.html(res.petugas2.muadzin_1);

                    if (res.petugas2.muadzin_2 == null) {
                        fsJumatMuadzinISec.html('Muazin');
                        fsJumatMuadzinIISec.html('Khatib');
                        fsJumatKhatibSec.html('Imam');
                        fsJumatImamSec.html('&nbsp;');
                        fsJumatMuadzinIiNameSec.html(res.petugas2.khatib);
                        fsJumatKhatibNameSec.html(res.petugas2.imam);
                    } else {
                        fsJumatMuadzinIiNameSec.html(res.petugas2.muadzin_2);
                        fsJumatKhatibNameSec.html(res.petugas2.khatib);
                        fsJumatImamNameSec.html(res.petugas2.imam);
                    }

                    /*fsJumatMuadzinIiNameSec.html(res.petugas2.muadzin_2);
                    fsJumatKhatibNameSec.html(res.petugas2.khatib);
                    fsJumatImamNameSec.html(res.petugas2.imam);*/

                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {});
        }


        function imam_hari_ini() {
            var fs_general = $('.fs-general');
            var fs_jumat = $('.fs-jumat');
            fs_general.slideDown('slow');
            fs_jumat.slideUp('slow');

            var _today_imam_head = $('.today-imam-head');
            var _today_subuh = $('.today-waktu-subuh');
            var _today_dzuhur = $('.today-waktu-dzuhur');
            var _today_ashar = $('.today-waktu-ashar');
            var _today_maghrib = $('.today-waktu-maghrib');
            var _today_isya = $('.today-waktu-isya');

            var _tomorrow_imam_head = $('.tomorrow-imam-head');
            var _tomorrow_subuh = $('.tomorrow-waktu-subuh');
            var _tomorrow_dzuhur = $('.tomorrow-waktu-dzuhur');
            var _tomorrow_ashar = $('.tomorrow-waktu-ashar');
            var _tomorrow_maghrib = $('.tomorrow-waktu-maghrib');
            var _tomorrow_isya = $('.tomorrow-waktu-isya');

            var today = moment().format('dddd');
            var tomorrow = moment().add(1, 'days').format('dddd');

            $.ajax({
                    url: '<?php echo base_url(); ?>service/get_jadwal_imam',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        today: today,
                        tomorrow: tomorrow
                    }
                })
                .done(function(res) {
                    _today_imam_head.html('Imam ' + res.today.jadwalimam_hari);
                    _today_subuh.html(res.today.jadwalimam_subuh);
                    _today_dzuhur.html(res.today.jadwalimam_dzuhur);
                    _today_ashar.html(res.today.jadwalimam_ashar);
                    _today_maghrib.html(res.today.jadwalimam_maghrib);
                    _today_isya.html(res.today.jadwalimam_isya);

                    _tomorrow_imam_head.html('Imam ' + res.tomorrow.jadwalimam_hari);
                    _tomorrow_subuh.html(res.tomorrow.jadwalimam_subuh);
                    _tomorrow_dzuhur.html(res.tomorrow.jadwalimam_dzuhur);
                    _tomorrow_ashar.html(res.tomorrow.jadwalimam_ashar);
                    _tomorrow_maghrib.html(res.tomorrow.jadwalimam_maghrib);
                    _tomorrow_isya.html(res.tomorrow.jadwalimam_isya);

                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {});

        }

        function fs_jumat() {
            $(".fs-jumat").owlCarousel({
                animateOut: 'slideOutUp',
                animateIn: 'flipInX',
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 15000,
            });
        }

        function fs_general() {
            $(".fs-general").owlCarousel({
                animateOut: 'slideOutUp',
                animateIn: 'flipInX',
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 15000,
            });
        }

    });
</script>
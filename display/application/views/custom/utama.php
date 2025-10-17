<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
	<meta charset="utf-8">
	<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 18 Feb 1991 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />

	<title>Walproject - Jadwal Shalat & Informasi</title>

	<!-- <link href="https://fonts.googleapis.com/css?family=Scheherazade" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Khand" rel="stylesheet"> -->

	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css?v=1" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/mdb.min.css?v=1" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/custom.css?v=3" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/1920-1080.css?v=2" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/1366-768.css?v=2" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/1280-720.css?v=2" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/980-430.css?v=2" rel="stylesheet">

	<link href="<?php echo base_url(); ?>assets/plugins/sweet-alert/dist/sweetalert.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>assets/plugins/owlcarousel/css/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/owlcarousel/css/owl.theme.default.min.css" rel="stylesheet">


	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bigvideo/css/style.css"> -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bigvideo/bower_components/BigVideo/css/bigvideo.css">


	<!-- <link href="https://fonts.googleapis.com/css?family=Scheherazade:400,700&amp;subset=arabic" rel="stylesheet"> -->
	<style type="text/css">
		@font-face {
			font-family: 'Digital';
			src: url('<?php echo str_replace('display/', '', base_url());  ?>public/uploads/fonts/DS-DIGI.ttf') format('truetype');
			font-weight: bolder;
			font-style: normal;
		}

		@font-face {
			src: url('<?php echo str_replace('display/', '', base_url());  ?>public/uploads/fonts/<?php echo app_get_font()->font_src; ?>');
			font-family: '<?php echo app_get_font()->font_family; ?>';
			font-style: <?php echo strtolower(app_get_font()->font_style); ?>;
			font-weight: <?php echo app_get_font()->font_weight; ?>;
		}

		body {
			font-family: '<?php echo app_get_font()->font_family; ?>';
			background-color: #000000;
		}
	</style>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

</head>

<body class="fullBackground">

	<div class="wrapper">
		<div class="header">
			<?php echo $_utama_header; ?>
		</div>

		<div class="flex-centerx white-text">
			<div class="content">
				<?php echo $_utama_content; ?>
			</div>
		</div>

		<div class="footer container-fluid rgba-black-strong" style="z-index: 1000; ">
			<div class="row" style="color: #ffffffff; max-height:95px; background : linear-gradient(to right, #000000e1, #146669c7);">
				<div class="col-md-3">
					<div class="waktu-shalat-b">
						<div class=" darken-3 z-depth-1 text-center" style="line-height: 2.5rem; font-weight: 700;  letter-spacing: 0.5rem; background:linear-gradient(to right, #0000009a, #c99646ff);">
							<span style="font-size : 2rem; color : #ffffffff;">Imsak</span><br>
							<span style="color: white; font-size: 2.7rem;"><?php echo substr(jadwal_shalat()['imsak'], 0, 5); ?></span>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="content-data owl-carousel" id="owl-hari-besar" style="padding: 0px !important;">
						<?php
						if (!empty($hari_besar_data)) :
							foreach ($hari_besar_data as $value) :
								// Hitung selisih hari
								$tanggal_masehi = new DateTime($value['tanggal_masehi']);
								$sekarang = new DateTime();
								$selisih = $sekarang->diff($tanggal_masehi)->days;
								$hari_text = ($selisih == 1) ? "hari" : "hari";
						?>
								<div class="slideHbesar" style="display: flex;
					                    align-items: center;
					                    justify-content: center;
					                    position: relative;line-height: 1.3; padding: 5px;">
									<div class="content-text" style="text-align: center;">
										<span style="font-size: 1.7rem; font-weight: bolder; font-style: uppercase;"><?php echo $value['nama']; ?></span>
										<p style="font-size: 1.2rem;">
											<?php echo $selisih . " " . $hari_text . " lagi menjelang hari " . $value['nama'] . ' ' . $value['tahun_hijriah'] . ' | ' . date_format(date_create($value['tanggal_masehi']), 'd M Y'); ?>
										</p>
									</div>
								</div>
							<?php
							endforeach;
						else :
							?>
							<div class="slideHbesar"
								style="
					                    display: flex;
					                    align-items: center;
					                    justify-content: center;
					                    position: relative;">
								<div class="content-text" style="text-align: center; background: rgba(0,0,0,0.5); border-radius: 10px; color: white; max-width: 100%;">
									<h2>Tidak ada hari besar dalam 90 hari ke depan</h2>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-3">
					<div class="fs-kajian owl-carousel text-center" style="padding: 0px !important; max-height: 70%;">
						<?php
						if (!empty($kajian)) :
							foreach ($kajian as $k) :
						?>
								<div class="slideHbesar" style="padding:5px;line-height: 1.2;">
									<div class="content-text" style="text-align: center;">
										<span style="font-size: 1.6rem; color : #f5dd72ff; margin-bottom : 0px; font-weight: bolder; font-style: uppercase;"><?php echo $k['kajian_materi']; ?></span><br>
										<?php if (!empty($k['kajian_pemateri'])): ?>
											<span style="font-size: 1.2rem;"><?php echo $k['kajian_pemateri']; ?></span> <br>
										<?php endif; ?>
										<span style="font-size: 1.3rem;"><?php echo app_date_value($k['kajian_tanggal'], 'd M Y'); ?> - <?php echo $k['kajian_waktu']; ?></span>
									</div>
								</div>
							<?php
							endforeach;
						else :
							?>
							<div class="slideHbesar">
								<div class="content-text">
									<h5>Tidak ada Kajian</h5>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-3">
					<div class="fs-kajian owl-carousel text-center" style="padding: 0px !important; background-color : rgba(31, 78, 34, 0.5)">
						<?php
						if (!empty($petugas_jumat)) :
							foreach ($petugas_jumat as $pj) :
						?>
								<?php if ($pj['khatib']): ?>
									<div class="slideHbesar" style="padding:5px;line-height: 1;">
										<div class="content-text" style="text-align: center;">
											<span style="font-size: 1.5rem; margin: 20px 0; color : #f5dd72ff; margin-bottom : 0px">Khatib</span><br>
											<span class="kaj-ket-materi"><?php echo $pj['khatib']; ?></span> <br>
											<span class="kaj-ket-waktu"><?php echo app_date_value($pj['petugasshalatjumat_tanggal'], 'd M Y'); ?></span>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($pj['imam']): ?>
									<div class="slideHbesar" style="padding:5px;line-height: 1;">
										<div class="content-text" style="text-align: center;">
											<span style="font-size: 1.5rem; margin: 20px 0; color : #f5dd72ff;  margin-bottom : 0px">Imam</span><br>
											<span class="kaj-ket-materi"><?php echo $pj['imam']; ?></span> <br>
											<span class="kaj-ket-waktu"><?php echo app_date_value($pj['petugasshalatjumat_tanggal'], 'd M Y'); ?></span>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($pj['muadzin_1']): ?>
									<div class="slideHbesar" style="padding:5px;line-height: 1;">
										<div class="content-text" style="text-align: center;">
											<span style="font-size: 1.5rem; margin: 20px 0; color : #f5dd72ff;  margin-bottom : 0px">Muadzin 1</span><br>
											<span class="kaj-ket-materi"><?php echo $pj['muadzin_1']; ?></span> <br>
											<span class="kaj-ket-waktu"><?php echo app_date_value($pj['petugasshalatjumat_tanggal'], 'd M Y'); ?></span>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($pj['muadzin_2']): ?>
									<div class="slideHbesar" style="padding:5px;line-height: 1;">
										<div class="content-text" style="text-align: center;">
											<span style="font-size: 1.5rem; margin: 20px 0; color : #f5dd72ff; margin-bottom : 0px">Muadzin 2</span><br>
											<span class="kaj-ket-materi"><?php echo $pj['muadzin_2']; ?></span> <br>
											<span class="kaj-ket-waktu"><?php echo app_date_value($pj['petugasshalatjumat_tanggal'], 'd M Y'); ?></span>
										</div>
									</div>
						<?php endif;
							endforeach;
						endif; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php echo $_utama_footer; ?>
				</div>
			</div>
		</div>

		<input type="hidden" id="subuh" value="<?php echo date('Y-m-d') . ' ' . substr(jadwal_shalat()['subuh'], 0, 5) . ":00"; ?>">
		<input type="hidden" id="dzuhur" value="<?php echo date('Y-m-d') . ' ' . substr(jadwal_shalat()['dzuhur'], 0, 5) . ":00"; ?>">
		<input type="hidden" id="ashar" value="<?php echo date('Y-m-d') . ' ' . substr(jadwal_shalat()['ashar'], 0, 5) . ":00"; ?>">
		<input type="hidden" id="maghrib" value="<?php echo date('Y-m-d') . ' ' . substr(jadwal_shalat()['maghrib'], 0, 5) . ":00"; ?>">
		<input type="hidden" id="isya" value="<?php echo date('Y-m-d') . ' ' . substr(jadwal_shalat()['isya'], 0, 5) . ":00"; ?>">
		<input type="hidden" id="selanjutnya">
		<input type="hidden" id="1menit">
	</div>

	<a id="direct" href="http://digitalbee.id">load</a>

	<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/circularcountdown.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/popper.min.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/owlcarousel/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bigvideo/js/video.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bigvideo/bower_components/BigVideo/lib/bigvideo.js"></script>
	<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/moment.min.js'></script>
	<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/moment-with-locales.js'></script>
	<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/moment-hijri.js'></script>
	<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/id.js'></script>
	<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/fullclip.min.js'></script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    selanjutnya();

    function selanjutnya() {
        var subuh = document.getElementById('subuh').value;
        var dzuhur = document.getElementById('dzuhur').value;
        var ashar = document.getElementById('ashar').value;
        var maghrib = document.getElementById('maghrib').value;
        var isya = document.getElementById('isya').value;

        var now = moment().unix();

        var x_subuh = ((moment(subuh).unix() - now) < 0) ? 10000000 : moment(subuh).unix() - now;
        var x_dzuhur = ((moment(dzuhur).unix() - now) < 0) ? 10000000 : moment(dzuhur).unix() - now;
        var x_ashar = ((moment(ashar).unix() - now) < 0) ? 10000000 : moment(ashar).unix() - now;
        var x_maghrib = ((moment(maghrib).unix() - now) < 0) ? 10000000 : moment(maghrib).unix() - now;
        var x_isya = ((moment(isya).unix() - now) < 0) ? 10000000 : moment(isya).unix() - now;

        var min = Math.min(x_subuh, x_dzuhur, x_ashar, x_maghrib, x_isya);
        var myArray = {
            subuh: x_subuh,
            dzuhur: x_dzuhur,
            ashar: x_ashar,
            maghrib: x_maghrib,
            isya: x_isya
        };

        for (var key in myArray) {
            if (myArray.hasOwnProperty(key) && myArray[key] == min) {
                document.getElementById('selanjutnya').value = key;
                var directLink = document.getElementById('direct');
                if (directLink) {
                    directLink.setAttribute('href', "<?php echo base_url(); ?>adzan/getdata/" + document.getElementById('selanjutnya').value);
                }
                break;
            }
        }

        // Check if jQuery is loaded (for compatibility)
        if (typeof jQuery === "undefined") {
            console.log("jQuery tidak terload!");
        }

        // AJAX call for hijri date
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url(); ?>service/get_hijri', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var res = JSON.parse(xhr.responseText);
                        document.getElementById('date_hijriah').innerHTML = res.hijri;
                    } catch (e) {
                        console.log('Error parsing JSON:', e);
                    }
                } else {
                    console.log('Request failed:', xhr.status);
                }
            }
        };
        xhr.send('maghrib=' + encodeURIComponent(maghrib));
    }

    var CS = setInterval(countdown_shalat, 1000);

    function countdown_shalat() {
        var _next = document.getElementById('selanjutnya').value;
        var nextElement = document.getElementById(_next);
        if (!nextElement) return;
        
        var next = nextElement.value;
        var sekarang = moment().unix();
        var WZ_1MNT = moment(next).subtract(1, 'minute').unix();
        var WZ = moment(next).unix();
        var WZ_3SCD = moment(next).add(3, 'seconds').unix();
        var iqomah_time = (moment(next).add(2, 'minute').unix() - WZ_3SCD) + WZ_3SCD;
        var WZ_sleep = moment(next).add(5, 'minute').unix();

        var directLink = document.getElementById('direct');
        var directHref = directLink ? directLink.getAttribute('href') : '';

        if (WZ_1MNT <= sekarang && WZ >= sekarang) {
            window.location.href = directHref;
            clearInterval(CS);
        }
        // Other conditions can be handled here as needed
    }

    setInterval(moment_header, 1000);

    function moment_header() {
        var dayElement = document.getElementById('day');
        var timeElement = document.getElementById('time');
        var dateMasehiElement = document.getElementById('date_masehi');
        
        if (dayElement) dayElement.innerHTML = moment().format('dddd') + ", ";
        if (timeElement) timeElement.innerHTML = moment().format('HH:mm:ss');
        if (dateMasehiElement) dateMasehiElement.innerHTML = moment().format('D MMMM YYYY');
    }

    setInterval(cek_reload, 20000);

    function cek_reload() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo base_url(); ?>service/reload', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var res = JSON.parse(xhr.responseText);
                    if (res.status) {
                        reset_reload();
                    }
                } catch (e) {
                    console.log('Error parsing JSON:', e);
                }
            }
        };
        xhr.send();
    }

    function reset_reload() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo base_url(); ?>service/reset_reload', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var res = JSON.parse(xhr.responseText);
                    if (res.status) {
                        // Show success message (you might need to implement sweetalert equivalent)
                        console.log('Perubahan data disimpan.');
                        setTimeout(reload_page, 3500);
                    } else {
                        console.log('Terjadi kesalahan sistem!');
                    }
                } catch (e) {
                    console.log('Error parsing JSON:', e);
                }
            }
        };
        xhr.send();
    }

    function reload_page(url) {
        if (!url) {
            url = "<?php echo base_url(); ?>";
        }
        window.location.href = url;
    }

    function ajaxify(e, el) {
        e.preventDefault();
        var url = el.getAttribute("href");
        var pageContentBody = document.querySelector('.content');

        // History management
        if (url) {
            history.pushState(null, null, url);
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (pageContentBody) {
                    pageContentBody.innerHTML = xhr.responseText;
                }
            }
        };
        xhr.send('status_link=ajax');
    }

    // Event delegation for links
    document.addEventListener('click', function(e) {
        if (e.target.matches('.flex-center a.utama') || e.target.matches('.flex-center a.konten')) {
            ajaxify(e, e.target);
        }
    });

    /* set general */
    var hari = moment().format('dddd');
    var is_videos = ['Selasa', 'Kamis', 'Jumat'];

    var is_background = "<?php echo pengaturan_general()['Background']; ?>";
    var is_blackscreen = "<?php echo pengaturan_general()['Black Screen']; ?>";

    if (is_background == '1') {
        set_bg_videos();
    } else {
        set_bg_images();
    }

    if (is_blackscreen == '1') {
        var url = "<?php echo base_url(); ?>blackscreen";
        reload_page(url);
    }

    function set_bg_videos() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url(); ?>service/get_background', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var res = JSON.parse(xhr.responseText);
                    // Note: BigVideo functionality would need separate vanilla JS implementation
                    console.log('Video backgrounds loaded:', res);
                } catch (e) {
                    console.log('Error parsing JSON:', e);
                }
            }
        };
        xhr.send('tipe=video');
    }

    function set_bg_images() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url(); ?>service/get_background', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    var res = JSON.parse(xhr.responseText);
                    // Note: fullClip functionality would need separate vanilla JS implementation
                    console.log('Image backgrounds loaded:', res);
                } catch (e) {
                    console.log('Error parsing JSON:', e);
                }
            }
        };
        xhr.send('tipe=picture');
    }

    // Load kajian content
    var kajianXhr = new XMLHttpRequest();
    kajianXhr.open('POST', '<?php echo base_url(); ?>kajian', true);
    kajianXhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    kajianXhr.onreadystatechange = function() {
        if (kajianXhr.readyState === 4 && kajianXhr.status === 200) {
            var kajianElement = document.querySelector('.kajian');
            if (kajianElement) {
                kajianElement.innerHTML = kajianXhr.responseText;
            }
        }
    };
    kajianXhr.send('param1=value1');

    // Note: Owl Carousel would need to be replaced with a vanilla JS alternative
    // or keep the jQuery version if Owl Carousel requires jQuery
});
</script>

	<script type="text/javascript">
		
		$(function() {
		

			// var ajaxify = function(e, el) {
			// 	e.preventDefault();

			// 	var ajaxify = [null, null, null];
			// 	var url = $(el).attr("href");
			// 	var pageContentBody = $('.content');

			// 	if (url != ajaxify[2]) {
			// 		ajaxify.push(url);
			// 		history.pushState(null, null, url);
			// 	}
			// 	ajaxify = ajaxify.slice(-3, 5);

			// 	$.ajax({
			// 			url: url,
			// 			cache: false,
			// 			type: 'POST',
			// 			dataType: 'html',
			// 			data: {
			// 				status_link: 'ajax'
			// 			},
			// 		})
			// 		.done(function(res) {
			// 			pageContentBody.html(res);
			// 		})
			// 		.fail(function(res) {})
			// 		.always(function() {});
			// }

			// $('.flex-center').on('click', 'a.utama', function(e) {
			// 	var el = $(this);
			// 	ajaxify(e, el);
			// });


			// $('.flex-center').on('click', 'a.konten', function(e) {
			// 	var el = $(this);
			// 	ajaxify(e, el);
			// });


			// /* set general */
			// var hari = moment().format('dddd');
			// var is_videos = ['Selasa', 'Kamis', 'Jumat'];

			// var is_background = "<?php echo pengaturan_general()['Background']; ?>";
			// var is_blackscreen = "<?php echo pengaturan_general()['Black Screen']; ?>";

			// if (is_background == '1') {
			// 	// if (jQuery.inArray(hari, is_videos) != -1) {
			// 	set_bg_videos();
			// } else {
			// 	set_bg_images();
			// }

			// if (is_blackscreen == '1') {
			// 	var url = "<?php echo base_url(); ?>blackscreen"
			// 	reload_page(url);
			// }

			// /* end set general */

			// function set_bg_videos() {
			// 	// var ko = moment.duration(duration - interval).format("mm:ss");
			// 	$.ajax({
			// 			url: '<?php echo base_url(); ?>service/get_background',
			// 			type: 'POST',
			// 			dataType: 'json',
			// 			data: {
			// 				tipe: 'video'
			// 			}
			// 		})
			// 		.done(function(res) {
			// 			var BV = new $.BigVideo();
			// 			var vids = res;
			// 			vids.sort(function() {
			// 				return 0.5 - Math.random()
			// 			}); // random order on load
			// 			BV.init();
			// 			BV.showPlaylist(vids, {
			// 				ambient: false
			// 			});
			// 		})
			// 		.fail(function(res) {
			// 			console.log(res);
			// 		})
			// 		.always(function() {});
			// }

			function set_bg_images() {
				$.ajax({
						url: '<?php echo base_url(); ?>service/get_background',
						type: 'POST',
						dataType: 'json',
						data: {
							tipe: 'picture'
						}
					})
					.done(function(res) {
						$('body').fullClip({
							images: res,
							transitionTime: 500,
							wait: 30000
						});
					})
					.fail(function(res) {
						console.log(res);
					})
					.always(function() {});


			}

			// $.post('<?php echo base_url(); ?>kajian', {
			// 	param1: 'value1'
			// }, function(data, textStatus, xhr) {
			// 	$('.kajian').html(data);

			// });

			// Inisialisasi carousel untuk hari besar
			$("#owl-hari-besar").owlCarousel({
				items: 1,
				loop: true,
				autoplay: true,
				autoplayTimeout: 10000,
				margin: 0,
			});


			$(".fs-kajian").owlCarousel({
				items: 1,
				loop: true,
				autoplay: true,
				autoplayTimeout: 10000,
				margin: 0,
			});

		});
	</script>

</body>

</html>
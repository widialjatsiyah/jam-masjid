<div class="content-data owl-carousel" id="owl-conten">
    <?php foreach ($data as $key => $value) { ?>
        <div class="slide" 
             <?php if (!empty($value['konten_banner'])): ?>
             style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo str_replace("display/", "", base_url()) . 'public/uploads/images/' . $value['konten_banner']; ?>');
                    background-size: contain;
                    background-repeat: no-repeat;
                    background-position: center;
                    height: 60vh; text-align: center; display: flex; align-items: center; justify-content: center;"
             <?php else : ?>
                style="height: 60vh; text-align: center; display: flex; align-items: center; justify-content: center; background-color : rgba(0, 0, 0, 0.5)"
            <?php endif; ?>
        >
            <?php if ($value['konten_arab'] != "") : ?>
                <h1 ><?php echo $value['konten_arab']; ?></h1>
            <?php endif; ?>
            <p><?php echo $value['konten_teks']; ?></p>
        </div>
    <?php } ?>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('div.flex-center').css({
            // 'background-color': '#000',
            // 'opacity': '0.4',
            'position': 'fixed',
            'bottom': '0',
            'min-width': '100',
            'min-height': '100'
        });
        
		$("#owl-conten").owlCarousel({
			items: 1,
			loop: true,
			autoplay: true,
			autoplayTimeout: 10000,
			margin: 0,
		});
	});
</script>
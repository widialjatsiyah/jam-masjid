<div class="content-data">
    <?php foreach ($data as $key => $value) { ?>
        <div class="slide" 
             <?php if (!empty($value['konten_banner'])): ?>
             style="background-image: url('<?php echo base_url('public/uploads/images/' . $value['konten_banner']); ?>'); 
                    background-size: cover; 
                    background-position: center;
                    height: 100vh;
                    width: 100vw;
                    display: flex;
                    align-items: center;
                    justify-content: center;"
             <?php else: ?>
             style="height: 100vh;
                    width: 100vw;
                    display: flex;
                    align-items: center;
                    justify-content: center;"
             <?php endif; ?>
        >
            <div class="content-text" style="text-align: center; background: rgba(0,0,0,0.5); padding: 20px; border-radius: 10px; color: white; max-width: 80%;">
                <?php if ($value['konten_arab'] != "") : ?>
                    <h1><?php echo $value['konten_arab']; ?></h1>
                <?php endif; ?>
                <p><?php echo $value['konten_teks']; ?></p>
            </div>
        </div>
    <?php } ?>
</div>

<script type="text/javascript">
    $(function() {
        $('div.flex-center').css({
            'position': 'fixed',
            'bottom': '0',
            'min-width': '100',
            'min-height': '100'
        });
        

        var speed = 500; // Fade Speed
        var autoswitch = true; // Auto Slider Option
        var autoswitch_speed = 5000 // Auto Slider Speed

        // Add Initial Active Class
        $('.slide').first().addClass('active');

        var de = $('div.slide > div').first().attr('delay'); // belum nemu caranya delay per content

        // Hide  All Slides
        $('.slide').hide();

        // Show First Slide
        $('.active').show();

        // Auto Slider Handler
        if(autoswitch == true){
            setInterval(nextSlide, autoswitch_speed);
        }

        // Switch To Next Slide
        function nextSlide(){
            $('.active').removeClass('active').addClass('oldActive');
            if($('.oldActive').is(':last-child')){
                $('.slide').first().addClass('active');
                var de = $('div.slide > div').first().attr('delay');
            } else {
                $('.oldActive').next().addClass('active');
                var de = $('div.slide > div').first().attr('delay');
            }
            $('.oldActive').removeClass('oldActive');
            $('.slide').fadeOut('slow');
            $('.active').slideDown('fast');
        }
    });
</script>
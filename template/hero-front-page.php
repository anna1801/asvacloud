<?php
    $appearance = get_field('appearance');
    $heading = get_field('heading');
    $content = get_field('content');
    $cta = get_field('cta');
    $featured_image = get_field('featured_image');

    $background_color = get_field('background_color');
    $background_img_md = get_field('background_img_md');
    $background_img_sm = get_field('background_img_sm');
 
    if($background_color) {
        $bg_color = '--bg-color: '.$background_color.';';
    } else {
        $bg_color = '';
    }

    if($background_img_md) {
        $bg_md_class = 'bg-md-image';
        $bg_md_image = '--bg-md-image: url('.$background_img_md.');';
    } else {
        $bg_class = '';
        $bg_md_image = '';
    }

    if($background_img_sm) {
        $bg_sm_class = 'bg-sm-image';
        $bg_sm_image = '--bg-sm-image: url('.$background_img_sm.');';
    } else {
        $bg_sm_class = '';
        $bg_sm_image = '';
    }

    if($background_color || $background_img_md || $background_img_sm) {
        $style = 'style=" '. $bg_color . $bg_md_image . $bg_sm_image .' "';
    } else {
        $style = '';
    }
?>
<section class="hero-front-page <?php echo $appearance . ' ' . $bg_md_class . ' ' .$bg_sm_class; ?>" id="hero-front-page" <?php echo $style; ?>>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="content">
                    <?php
                        if($heading) : 
                            echo '<h1>'.$heading.'</h1>';
                        endif;
                        if($content) :
                            echo '<div class="text-editor"><p>'.$content.'</p></div>';
                        endif;
                        
                        if($cta) :
                            echo '<a hre="'.$cta['url'].'" target="'.$cta['target'].'" class="btn">'.$cta['title'].'</a>';
                        endif;
                    ?>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <?php
                    if($featured_image) :
                        echo '<div class="featured-img"><img src="'.$featured_image['url'].'" alt="'.$featured_image['alt'].'"></div>';
                    endif;
                ?>
            </div>
        </div>
    </div>
</section>
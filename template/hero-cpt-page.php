<?php
    if ( is_singular('expertises') ) {
        $tax = 'expertise-category';
    }
    elseif ( is_singular('post') ) {
        $tax = 'category';
    }
    else {
        $tax = '';
    }

    $terms = get_the_terms(get_the_ID(), $tax );
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $sub_title = $term->name; 
            // echo esc_url(get_term_link($term));
        }
    }
    else {
        $sub_title = '';
    }
    
    $appearance = get_field('appearance');
    $heading = get_the_title();
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
<section class="hero-inner-page <?php echo $appearance . ' ' . $bg_md_class . ' ' .$bg_sm_class; ?>" id="hero-front-page" <?php echo $style; ?>>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-10 col-md-12 col-sm-12">
                <div class="content">
                    <?php
                        if($sub_title) : 
                            echo '<h3>'.$sub_title.'</h3>';
                        endif;
                        if($heading) : 
                            echo '<h1>'.$heading.'</h1>';
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
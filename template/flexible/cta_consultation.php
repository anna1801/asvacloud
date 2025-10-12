<?php
    $cta_consultation_heading = get_field('cta_consultation_heading', 'option');
    $cta_consultation_content = get_field('cta_consultation_content', 'option');
    $cta_consultation_btn = get_field('cta_consultation_btn', 'option');
    $section_class = get_field('cta_consultation_section_class', 'option');
    $section_id = get_field('cta_consultation_section_id', 'option');
    $appearance = get_field('cta_consultation_appearance', 'option');
    $background_color = get_field('cta_consultation_background_color', 'option');
    $background_image = get_field('cta_consultation_background_image', 'option');

    if($section_id) {
        $id = 'id="' . $section_id .'"';
    } else {
        $id = '';
    }

    if($background_color) {
        $bg_color = '--bg-color: '.$background_color.';';
    } else {
        $bg_color = '';
    }

    if($background_image) {
        $bg_class = 'bg-image';
        $bg_image = '--bg-image: url('.$background_image.');';
    } else {
        $bg_class = '';
        $bg_image = '';
    }

    if($background_color || $background_image) {
        $style = 'style=" '. $bg_color . $bg_image .' "';
    } else {
        $style = '';
    }

    $class = $appearance . ' ' . $section_class . ' ' . $bg_class;

    $cta_consultation_show_hide = get_sub_field('cta_consultation_show_hide');
    if($cta_consultation_show_hide == true) :
?>
<section class="cta_consultation padding-tp-default padding-bt-default <?php echo $class; ?>" <?php echo $id; ?> <?php echo $style; ?>>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-12">
                <div class="content text-center">
                    <?php
                        if($cta_consultation_heading || $$cta_consultation_content || $cta_consultation_btn) :
                            echo '<div class="content">';
                                if($cta_consultation_heading) :
                                    echo '<h2>'.$cta_consultation_heading.'</h2>';
                                endif;
                                if($cta_consultation_content) :
                                    echo '<h3>'.$cta_consultation_content.'</h3>';
                                endif;
                                if($cta_consultation_btn) :
                                    echo '<a href="'.$cta_consultation_btn['url'].'" target="'.$cta_consultation_btn['target'].'" class="btn">'.$cta_consultation_btn['title'].'</a>';
                                endif;
                            echo '</div>';
                        endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
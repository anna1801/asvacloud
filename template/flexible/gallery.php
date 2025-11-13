<?php
/* General */
    $general = get_sub_field('general');
    $appearance = $general['appearance'];
    $section_class = $general['section_class'];
    $section_id = $general['section_id'];
    $padding_top = $general['padding_top'];
    $padding_bottom = $general['padding_bottom'];
    $content_width = $general['content_width'];
    $gallery_count_lg = $general['gallery_count_lg'];
    $gallery_count_md = $general['gallery_count_md'];
    $gallery_count_sm = $general['gallery_count_sm'];
    $gallery_type = $general['gallery_type'];
    $background_color = $general['background_color'];
    $background_image = $general['background_image'];

    if($gallery_count_lg) {
        $lg = '--count-lg: '.$gallery_count_lg.';';
    } else {
        $lg = '--count-lg: 3;';
    }

    if($gallery_count_md) {
        $md = '--count-md: '.$gallery_count_md.';';
    } else {
        $md = '--count-md: 3;';
    }

    if($gallery_count_sm) {
        $sm = '--count-sm: '.$gallery_count_sm.';';
    } else {
        $sm = '--count-sm: 1;';
    }

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

    $class = $appearance . ' ' . $padding_top . ' ' . $padding_bottom . ' ' . $section_class . ' ' . $bg_class;

    $count = 'style=" '. $lg . $md . $sm .' "';

/* Intro */
    $intro = get_sub_field('intro');
    $sub_title = $intro['sub_title'];
    $title = $intro['title'];

    $images = get_sub_field('gallery');

    if($images) :
?>
    <section class="gallery <?php echo $class; ?>" <?php echo $id; ?> <?php echo $style; ?>>
    <script>
        var gallery_count_lg = <?php echo !empty($gallery_count_lg) ? $gallery_count_lg : '3'; ?>;
        var gallery_count_md = <?php echo !empty($gallery_count_md) ? $gallery_count_md : '2'; ?>;
        var gallery_count_sm = <?php echo !empty($gallery_count_sm) ? $gallery_count_sm : '1'; ?>;
    </script>
        <div class="<?php echo $content_width; ?>">
            <?php
                if($sub_title || $title) :
                    echo '<div class="intro content">';
                        if($sub_title) :
                            echo '<h3>'.$sub_title.'</h3>';
                        endif;
                        if($title) :
                            echo '<h2>'.$title.'</h2>';
                        endif;
                    echo '</div>';
                endif; 
            ?>
            <div class="acf-gallery <?php echo $gallery_type; ?>" <?php echo $count; ?>>
                <?php foreach( $images as $image ): ?>
                    <div class="acf-gallery-item">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
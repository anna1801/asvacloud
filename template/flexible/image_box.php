<?php
/* General */
    $general = get_sub_field('general');
    $appearance = $general['appearance'];
    $section_class = $general['section_class'];
    $section_id = $general['section_id'];
    $padding_top = $general['padding_top'];
    $padding_bottom = $general['padding_bottom'];
    $content_width = $general['content_width'];
    $content_alignment = $general['content_alignment']; 
    $column_width_lg = $general['column_width_lg'];
    $column_width_md = $general['column_width_md'];
    $column_width_sm = $general['column_width_sm'];
    $type = $general['type'];
    $justify_content = $general['justify_content'];
    $background_color = $general['background_color'];
    $background_image = $general['background_image'];

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

/* Intro */
    $intro = get_sub_field('intro');
    $sub_title = $intro['sub_title'];
    $title = $intro['title'];
?>
<section class="image_box <?php echo $class; ?>" <?php echo $id; ?> <?php echo $style; ?>>
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

        <?php
            if( have_rows('icon_box') ): 
                echo '<div class="row type-'.$type.' '.$justify_content.'">';
                while( have_rows('icon_box') ): the_row();
                    $image = get_sub_field('image');
                    $heading = get_sub_field('heading');
                    $content = get_sub_field('content');
                    if($image || $heading || $content) :
                        echo '<div class="'.$column_width_lg.' '.$column_width_md.' '.$column_width_sm.' '.$content_alignment.'">';
                            if($type == 'default') {
                                echo '<div class="content">';
                                    if($image) :
                                        echo '<div class="image"><img src="'.$image['url'].'" alt="'.$image['alt'].'"></div>';
                                    endif;
                                    if($heading) :
                                        echo '<h3>'.$heading.'</h3>';
                                    endif;
                                    if($content) :
                                        echo '<div class="text-editor">'.$content.'</div>';
                                    endif;
                                echo '</div>';
                            } 
                            elseif($type == 'flipbox') {
                                echo '<div class="content flip-card">';
                                    echo '<div class="flip-card-inner">';
                                        echo '<div class="flip-card-front flip">';
                                            if($image) :
                                                echo '<div class="image"><img src="'.$image['url'].'" alt="'.$image['alt'].'" class="icon"></div>';
                                            endif;
                                            if($heading) :
                                                echo '<h3 class="value-title">'.$heading.'</h3>';
                                            endif;
                                        echo '</div>';
                                        echo '<div class="flip-card-back flip">';
                                            if($heading) :
                                                echo '<h3 class="value-title">'.$heading.'</h3>';
                                            endif;
                                            if($content) :
                                                echo '<div class="text-editor value-description">'.$content.'</div>';
                                            endif;
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        echo '</div>';
                    endif;
                endwhile;
                echo '</div>';
            endif;
        ?>

    </div>
</section>
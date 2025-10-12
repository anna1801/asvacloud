<?php
/* General */
    $general = get_sub_field('general');
    $section_class = $general['section_class'];
    $section_id = $general['section_id'];
    $padding_top = $general['padding_top'];
    $padding_bottom = $general['padding_bottom'];
    $content_width = $general['content_width'];
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

    $class = $padding_top . ' ' . $padding_bottom . ' ' . $section_class . ' ' . $bg_class;

/* Intro */
    $intro = get_sub_field('intro');
    $sub_title = $intro['sub_title'];
    $title = $intro['title'];
?>
<section class="appearance-default expertise <?php echo $class; ?>" <?php echo $id; ?> <?php echo $style; ?>>
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
            if( have_rows('column') ): 
                echo '<div class="row">';
                while( have_rows('column') ): the_row();
                    $column_width_lg = get_sub_field('column_width_lg');
                    $column_width_md = get_sub_field('column_width_md');
                    $column_width_sm = get_sub_field('column_width_sm');
                    $text_align = get_sub_field('text_align');
                    $content = get_sub_field('content');
                    $title = $content['title'];
                    $description = $content['description'];
                    if($title || $description) :
                        echo '<div class="'.$column_width_lg.' '.$column_width_md.' '.$column_width_sm. ' text-' .$text_align.'">';
                            echo '<div class="block">';
                                if($title) :
                                    echo '<h3>'.$title.'</h3>';
                                endif;
                                if($description) :
                                    echo '<div class="text-editor">'.$description.'</div>';
                                endif;
                            echo '</div>';
                        echo '</div>';
                    endif;
                endwhile;
                echo '</div>';
            endif;
        ?>

    </div>
</section>
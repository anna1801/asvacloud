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
<section class="team <?php echo $class; ?>" <?php echo $id; ?> <?php echo $style; ?>>
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
            if( have_rows('team_member') ): 
                echo '<div class="row justify-content-center">';
                while( have_rows('team_member') ): the_row();
                    $profile_picture = get_sub_field('profile_picture');
                    $name = get_sub_field('name');
                    $position = get_sub_field('position');
                    if($profile_picture || $name || $position) :
                        echo '<div class="'.$column_width_lg.' '.$column_width_md.' '.$column_width_sm.' '.$content_alignment.'">';
                            echo '<div class="team-member">';
                                if($profile_picture) :
                                    echo '<div class="image"><img src="'.$profile_picture.'" alt="'.$name.'"></div>';
                                endif;
                                echo '<div class="details">';
                                    if($name) :
                                        echo '<h3>'.$name.'</h3>';
                                    endif;
                                    if($position) :
                                        echo '<div class="text-editor">'.$position.'</div>';
                                    endif;
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    endif;
                endwhile;
                echo '</div>';
            endif;
        ?>

    </div>
</section>
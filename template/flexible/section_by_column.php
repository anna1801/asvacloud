<?php
    //general
    $general = get_sub_field('general');
    $section_class = $general['section_class'];
    $section_id = $general['section_id'];
    $padding_top = $general['padding_top'];
    $padding_bottom = $general['padding_bottom'];
    $content_width = $general['content_width'];
    $appearance = $general['appearance'];
    $justify_content = $general['justify_content'];
    $align_items = $general['align_items'];
    $gap_x = $general['gap_x'];
    $gap_y = $general['gap_y'];
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
?>

<section class="section_by_column <?php echo $class; ?>" <?php echo $id; ?> <?php echo $style; ?>>
    <div class="<?php echo $content_width; ?>">
        <div class="row row-layout <?php echo $justify_content . ' ' . $align_items. ' ' .$gap_x. ' ' .$gap_y ?>">
            <?php
                if( have_rows('column') ): 
                    while( have_rows('column') ): the_row();
                        $column_width_lg = get_sub_field('column_width_lg');
                        $column_width_md = get_sub_field('column_width_md');
                        $column_width_sm = get_sub_field('column_width_sm');
                        $section_id = get_sub_field('section_id');
                        $section_class = get_sub_field('section_class');
                        $text_align = get_sub_field('text_align');
                        $description_font_size = get_sub_field('description_font_size');
                        // Type
                        $column_type = get_sub_field('column_type');
                        $content = get_sub_field('content');
                        $image = get_sub_field('image');
                        $short_code = get_sub_field('short_code'); 

                        if($column_type == 'content') {
                            $align = $text_align;
                        } else {
                            $align = '';
                        }

                        if($description_font_size) {
                            $text_size = $description_font_size;
                        } else {
                            $text_size = '';
                        }

                        if($description_font_size == '--font-xl' || $description_font_size == '--font-2xl') {
                            $text_line_height = '150%';
                        } else {
                            $text_line_height = '';
                        }
                        
                        $font_style = 'style="--font-size: var('.$description_font_size.'); --line-height: '.$text_line_height.'; "';

                        if($section_id) {
                            $id = 'id="' . $section_id .'"';
                        } else {
                            $id = '';
                        }
                        $class = $column_width_lg.' '.$column_width_md.' '.$column_width_sm. ' '.$align ;

                        echo '<div class="'.$class.'">';
                            echo '<div class="'.$section_class.'" '.$id.'>';
                                if($column_type == 'content') {
                                    $sub_title = $content['sub_title'];
                                    $title = $content['title'];
                                    $description = $content['description'];
                                    $cta = $content['cta'];

                                    echo '<div class="content">';
                                        if($sub_title) : 
                                            echo '<h3>'.$sub_title.'</h3>';
                                        endif;
                                        if($title) :
                                            echo '<h2>'.$title.'</h2>';
                                        endif;
                                        if($description) :
                                            echo '<div class="text-editor" '.$font_style.'>'.$description.'</div>';
                                        endif;
                                        if ( !empty($content['icon_list']) && is_array($content['icon_list']) ):
                                            echo '<div class="icon-list">';
                                                foreach ( $content['icon_list'] as $item ):
                                                    $icon = $item['icon'] ?? '';
                                                    $text = $item['text'] ?? '';
                                                    echo '<div class="item">';
                                                        if($icon) :
                                                            echo '<div class="icon"><img src="'.$icon['url'].'" alt="'.$icon['alt'].'"></div>';
                                                        endif;
                                                        if($text) :
                                                            echo '<h4>'.$text.'</h4>';
                                                        endif;
                                                    echo '</div>';
                                                endforeach;
                                            echo '</div>';
                                        endif; 
                                        if($cta) :
                                            echo '<a href="'.$cta['url'].'" target="'.$cta['target'].'" class="btn">'.$cta['title'].'</a>';
                                        endif;
                                    echo '</div>';
                                }

                                elseif($column_type == 'image') {
                                    if($image) :
                                        echo'<div class="featured-image">
                                                <img src="'.$image['url'].'" alt="'.$image['alt'].'">
                                            </div>';
                                    endif;
                                }

                                elseif($column_type == 'shortcode') {
                                    if($short_code) :
                                        echo '<div class="shortcode">'.do_shortcode($short_code).'</div>';
                                    endif;
                                }
                            echo '</div>';
                        echo '</div>';
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>
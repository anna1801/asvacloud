<?php
/*
Template Name: Contact Page Template
*/
get_header();

    get_template_part('template/hero-inner-page');
?>

<?php
    $sub_title = get_field('sub_title');
    $title = get_field('title');
    $form_shortcode = get_field('form_shortcode');
    $description = get_field('description');
    $background_color = get_field('background_color');
    $background_image = get_field('background_image');

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
?>

<section class="contact_form padding-tp-default padding-bt-default <?php echo $bg_class; ?>" id="contact_form" <?php echo $style; ?>>
    <div class="container">
        <div class="row row-layout">
            <div class="col-lg-5 col-md-12 col-sm-12 appearance-theme">
                <div class="content">
                    <?php 
                        if($sub_title) :
                            echo '<h3>'.$sub_title.'</h3>';
                        endif;
                        if($title) :
                            echo '<h2>'.$title.'</h2>';
                        endif;
                        if($description) :
                            echo '<div class="text-editor">'.$description.'</div>';
                        endif;
                    ?>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 appearance-default">
                <?php
                    if($form_shortcode) :
                        echo '<div class="shortcode">'.do_shortcode($form_shortcode).'</div>';
                    endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php 
    if( have_rows('contact_information') ):
        echo '<section class="contact_information appearance-default padding-tp-none padding-bt-default" id="contact_information">';
            echo '<div class="container">';
                echo '<div class="row">';
                    while( have_rows('contact_information') ): the_row(); 
                        $icon = get_sub_field('icon');
                        $label = get_sub_field('label');
                        $details = get_sub_field('details');
                        echo '<div class="col-lg-4 col-md-6 col-sm-12 col">';
                            echo '<div class="col">';
                                echo '<div class="icon">';
                                    if($icon) :
                                        echo '<img src="'.$icon['url'].'" alt="'.$icon['alt'].'">';
                                    endif;
                                echo '</div>';
                                echo '<div class="details">';
                                    if($label) :
                                        echo '<h4>'.$label.'</h4>';
                                    endif;
                                    if($details) :
                                        echo '<h3>'.$details.'</h3>';
                                    endif;
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    endwhile;
                echo '</div>';
            echo '</div>';
        echo '</section>';
    endif; 
?>

<?php
    $iframe = get_field('iframe');
    if($iframe) :
        echo '<section class="map_iframe" id="map_iframe">';
            echo '<div class="edge-to-edge">';
                echo $iframe;
            echo '</div>';
        echo '</section>';
    endif;

?>

<?php
    get_template_part('template/cta_consultation');
    
get_footer(); 

?>
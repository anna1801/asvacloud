</main>
<?php wp_footer(); ?>
<?php
    $footer_bg_color = get_field('footer_bg_color', 'option'); 
    $footer_bg_image = get_field('footer_bg_image', 'option'); 
 
    if($footer_bg_color) {
        $bg_color = '--bg-color: '.$footer_bg_color.';';
    } else {
        $bg_color = '';
    }

    if($footer_bg_image) {
        $bg_class = 'class="footer-image"';
        $bg_image = '--bg-image: url('.$footer_bg_image.');';
    } else {
        $bg_class = '';
        $bg_image = '';
    }

    if($footer_bg_color || $footer_bg_image) {
        $style = 'style=" '. $bg_color . $bg_image .' "';
    } else {
        $style = '';
    }
?>
<footer id="site-footer" <?php echo $style . $bg_class; ?> >
    <div class="container d-grid footer-container">

        <?php
            if( have_rows('contact_details', 'option') ):
                echo '<div class="row contact_details">';
                    while( have_rows('contact_details', 'option') ): the_row(); 
                        $icon = get_sub_field('icon');
                        $heading = get_sub_field('heading');
                        $label = get_sub_field('label');
                        echo'<div class="col col-lg-4 col-md-6 col-12"> 
                                <div class="item d-flex">
                                    <div class="left"><img src="'.$icon['url'].'" alt="'.$icon['alt'].'"></div>
                                    <div class="right"><h4>'.$heading.'</h4><h6>'.$label.'</h6></div>
                                </div>
                            </div>';
                    endwhile;
                echo '</div>';
                echo'<div class="row">
                        <div class="col-12"><div class="divider"></div></div>
                    </div>';
            endif;
        ?>
        <div class="row about">
            <div class="col-lg-4 col-md-12 col-12">
                <?php
                    $footer_logo = get_field('footer_logo', 'option');
                    if($footer_logo) {
                        echo '<div class="footer-logo"> <img src="'.$footer_logo['url'].'" alt="'.$footer_logo['alt'].'"></div>';
                    }

                    $footer_about = get_field('footer_about', 'option');
                    if($footer_about) {
                        echo '<div class="footer-about">'.$footer_about.'</div>';
                    }

                    if( have_rows('social_links', 'option') ):
                        echo '<div class="social-links d-flex">';
                            while( have_rows('social_links', 'option') ): the_row();
                                $icon = get_sub_field('icon');
                                $link = get_sub_field('link');
                                echo'<div class="item">
                                        <a href="'.$link.'" target="_blank"><img src="'.$icon['url'].'" alt="'.$icon['alt'].'"></a>
                                    </div>';
                            endwhile;
                        echo '</div>';
                    endif;                    
                ?>
            </div>
            <div class="col-lg-8 col-md-12 col-12">
                <?php
                    if( have_rows('footer_menu', 'option') ):  
                        $total_menu = count( get_field('footer_menu', 'option') );
                        if( $total_menu == 1 ||  $total_menu == 3 ) {
                            $row_class = 'justify-content-end';
                        } elseif( $total_menu == 2 ) {
                            $row_class = 'justify-content-center';
                        } 
                        echo '<div class="row footer-menu '.$row_class.'">'; 
                            while( have_rows('footer_menu', 'option') ): the_row();
                                echo '<div class="col-lg-4 col-md-4 col-12">';
                                    $label = get_sub_field('label');
                                    $menu = get_sub_field('menu');
                                    if( $menu ) {
                                        echo'<div class="item">';
                                            echo '<h4>'.$label.'</h4>';
                                            wp_nav_menu([
                                                'theme_location' => $menu,
                                                'menu_class' => 'footer-menu-class',
                                            ]);
                                        echo '</div>';
                                    }
                                echo '</div>';
                            endwhile;
                        echo '</div>';
                    endif;
                ?>
            </div>
        </div>  
        <div class="row">
            <div class="col-12"><div class="divider"></div></div>
        </div>
        <div class="row copyright">
            <div class="col-12">
                <?php
                    $copyright_text = get_field('copyright_text', 'option');
                    if($copyright_text) {
                        echo '<p>'.$copyright_text.'</p>';
                    }
                ?>
            </div>
        </div>     
    </div>
</footer>
</body>
</html>
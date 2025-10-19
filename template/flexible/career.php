<?php
/* General */
    $general = get_sub_field('general');
    $appearance = $general['appearance'];
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

    $class = $appearance . ' ' . $padding_top . ' ' . $padding_bottom . ' ' . $section_class . ' ' . $bg_class;

/* Intro */
    $intro = get_sub_field('intro');
    $sub_title = $intro['sub_title'];
    $title = $intro['title'];

/* career list */
    $terms = get_terms(array(
        'taxonomy'   => 'career-category',
        'hide_empty' => true,
    ));
    if (!empty($terms) && !is_wp_error($terms)) :
?>
    <section class="career <?php echo $class; ?>" <?php echo $id; ?> <?php echo $style; ?> >
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
                    
                echo '<div class="career-container">';
                    foreach ($terms as $term) {
                        echo '<div class="career-category-block">';
                        echo '<h3 class="career-category-title">' . esc_html($term->name) . '<span> (' . intval($term->count) . ') </span></h3>';
                        $args = array(
                            'post_type'      => 'careers',
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'career-category',
                                    'field'    => 'slug',
                                    'terms'    => $term->slug,
                                ),
                            ),
                            'orderby' => 'date',
                            'order'   => 'DESC',
                        );
                        $career_query = new WP_Query($args);

                        if ($career_query->have_posts()) {
                            echo '<div class="career-list">';
                            while ($career_query->have_posts()) {
                                $career_query->the_post();
                                $title = get_the_title();
                                $location = get_field('location');
                                $date = get_the_date('d/m/Y');
                                $content = get_the_content();
                                if($content) {
                                    $content_class = 'has_content';
                                } else {
                                    $content_class = '';
                                }
                                echo '<div class="career-item '.$content_class.'">';
                                    echo '<div class="item-intro">';
                                        echo '<div class="left">';
                                            echo '<div class="count">';
                                            echo '</div>';
                                            echo '<div class="">';
                                                echo '<div class="title">'.$title.'</div>';
                                                if($location) :
                                                    echo '<h5>'.$location.'</h5>';
                                                endif;
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="right">';
                                            echo '<div class="date"><strong>Posted On: </strong>'.$date.'</div>';
                                            echo'<div class="apply-now" data-bs-toggle="modal" data-bs-target="#careerform" data-name="'.$title.'">
                                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <mask id="mask0_84_3568" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36">
                                                        <rect width="36" height="36" fill="#D9D9D9"/>
                                                        </mask>
                                                        <g mask="url(#mask0_84_3568)">
                                                        <path d="M24.2625 19.5002H7.5C7.075 19.5002 6.71875 19.3564 6.43125 19.0689C6.14375 18.7814 6 18.4252 6 18.0002C6 17.5752 6.14375 17.2189 6.43125 16.9314C6.71875 16.6439 7.075 16.5002 7.5 16.5002H24.2625L16.9125 9.15016C16.6125 8.85016 16.4688 8.50016 16.4813 8.10016C16.4938 7.70016 16.65 7.35016 16.95 7.05016C17.25 6.77516 17.6 6.63141 18 6.61891C18.4 6.60641 18.75 6.75016 19.05 7.05016L28.95 16.9502C29.1 17.1002 29.2062 17.2627 29.2687 17.4377C29.3312 17.6127 29.3625 17.8002 29.3625 18.0002C29.3625 18.2002 29.3312 18.3877 29.2687 18.5627C29.2062 18.7377 29.1 18.9002 28.95 19.0502L19.05 28.9502C18.775 29.2252 18.4312 29.3627 18.0187 29.3627C17.6062 29.3627 17.25 29.2252 16.95 28.9502C16.65 28.6502 16.5 28.2939 16.5 27.8814C16.5 27.4689 16.65 27.1127 16.95 26.8127L24.2625 19.5002Z" fill="#246BCB"/>
                                                        </g>
                                                    </svg>
                                                </div>';
                                        echo '</div>';
                                    echo '</div>';
                                    if($content) :
                                        echo '<div class="item-content" style="display: none;">';
                                            echo $content;
                                        echo '</div>';
                                    endif;
                                echo '</div>';
                            }
                            echo '</div>';
                        } else {
                            echo '<div>No vacancies found in this category.</div>';
                        }
                        wp_reset_postdata();
                        echo '</div>';
                    }
                echo '</div>';
            ?>
        </div>
    </section>

    







<!-- Popup -->
    <?php
        $career_form = get_sub_field('career_form');
        $title = $career_form['title'];
        $description = $career_form['description'];
        $form_shortcode = $career_form['form_shortcode'];
        $featured_image = $career_form['featured_image'];

        function details( $title = '', $description = '' ) {
            if($title || $description) :
                echo '<div class="details">';
                    if($title) :
                        echo '<h2>'.$title.'</h2>';
                    endif;
                    if($description) :
                        echo '<div class="description">'.$description.'</div>';
                    endif;
                echo '</div>';
            endif;
        }
    ?>
    <div class="modal fade" id="careerform" tabindex="-1" aria-labelledby="careerformLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="38.7929" height="38.7929" rx="19.3965" fill="#EDEDED"/>
                        <mask id="mask0_106_3096" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="6" y="6" width="27" height="27">
                        <rect x="6.4668" y="6.46533" width="25.8619" height="25.8619" fill="#D9D9D9"/>
                        </mask>
                        <g mask="url(#mask0_106_3096)">
                        <path d="M19.3967 20.9048L16.2717 24.0298C16.0742 24.2273 15.8228 24.3261 15.5174 24.3261C15.2121 24.3261 14.9607 24.2273 14.7631 24.0298C14.5656 23.8322 14.4668 23.5808 14.4668 23.2754C14.4668 22.9701 14.5656 22.7187 14.7631 22.5211L17.8881 19.3962L14.7631 16.2981C14.5656 16.1006 14.4668 15.8491 14.4668 15.5438C14.4668 15.2385 14.5656 14.9871 14.7631 14.7895C14.9607 14.5919 15.2121 14.4932 15.5174 14.4932C15.8228 14.4932 16.0742 14.5919 16.2717 14.7895L19.3967 17.9145L22.4948 14.7895C22.6923 14.5919 22.9438 14.4932 23.2491 14.4932C23.5544 14.4932 23.8058 14.5919 24.0034 14.7895C24.2189 15.005 24.3267 15.2609 24.3267 15.5573C24.3267 15.8536 24.2189 16.1006 24.0034 16.2981L20.8784 19.3962L24.0034 22.5211C24.2009 22.7187 24.2997 22.9701 24.2997 23.2754C24.2997 23.5808 24.2009 23.8322 24.0034 24.0298C23.7879 24.2453 23.5319 24.353 23.2356 24.353C22.9393 24.353 22.6923 24.2453 22.4948 24.0298L19.3967 20.9048Z" fill="#222222"/>
                        </g>
                    </svg>
                </button>
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12 left-column">
                        <div class="left">
                            <div class="featured-image">
                                <?php 
                                    if($featured_image) :
                                        echo '<img src="'.$featured_image['url'].'" alt="'.$featured_image['alt'].'">';
                                    endif;
                                    details($title, $description);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 right-column">
                        <?php 
                            echo '<div class="details-on-mob">';
                                details($title, $description);
                            echo '</div>';
                            if($form_shortcode) :
                                echo do_shortcode($form_shortcode); 
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Popup end -->





<?php endif; ?>
<?php get_header(); ?> 

    <?php get_template_part('template/hero-cpt-page'); ?>

    <?php
        $section_class = get_field('section_class', get_the_ID());
        $section_id = get_field('section_id', get_the_ID());
        $intro_content = get_field('intro_content', get_the_ID());
        
        if($section_id) {
            $id = 'id="' . $section_id .'"';
        } else {
            $id = '';
        }
    ?>
    <?php if($intro_content) : ?>
        <section class="intro_content padding-tp-default padding-bt-default <?php echo $section_class; ?>" <?php echo $id; ?>>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-12">
                        <div class="content text-center"><?php echo $intro_content; ?></div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
        $services_intro = get_field('services_intro');
        $services_section_class = $services_intro['section_class'];
        $services_section_id = $services_intro['section_id'];
        $services_column_width_lg = '';
        $services_column_width_md = '';
        $services_column_width_sm = 'col-sm-12';
        $services_sub_title = $services_intro['sub_title'];
        $services_heading = $services_intro['heading'];
        $services_content = $services_intro['content'];

        if($services_section_id) {
            $services_id = 'id="' . $services_section_id .'"';
        } else {
            $services_id = '';
        }
    ?>
    <?php if( have_rows('services') ): ?>
        <section class="services appearance-default padding-tp-default padding-bt-default <?php echo $services_section_class; ?>" <?php echo $services_id; ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-12">
                        <div class="content">
                            <?php
                                if($services_sub_title || $services_heading || $services_content) :
                                    echo '<div class="intro content">';
                                        if($services_sub_title) :
                                            echo '<h3>'.$services_sub_title.'</h3>';
                                        endif;
                                        if($services_heading) :
                                            echo '<h2>'.$services_heading.'</h2>';
                                        endif;
                                        if($services_content) :
                                            echo '<div class="text-editor">'.$services_content.'</div>';
                                        endif;
                                    echo '</div>';
                                endif; 
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                    echo '<div class="service-lists">';
                        $counter = 0;
                        $total = count(get_field('services'));
                        if($total == 2) {
                            $services_column_width_lg = 'col-lg-6';
                            $services_column_width_md = 'col-md-6';
                        } 
                        else if($total == 3) {
                            $services_column_width_lg = 'col-lg-4';
                            $services_column_width_md = 'col-md-4';
                        } 
                        else if($total >= 4) {
                            $services_column_width_lg = 'col-lg-3';
                            $services_column_width_md = 'col-md-6';
                        } 
                        while( have_rows('services') ): the_row();
                            $icon = get_sub_field('icon');
                            $heading = get_sub_field('heading');
                            $content = get_sub_field('content');
                            if($icon || $heading || $content):

                                if ($total % 2 == 0) {
                                    if($counter % 2 == 0):
                                        if($counter > 0) echo '</div>'; 
                                        $remaining = $total - $counter;
                                        if($remaining == 1) {
                                            $remaining_class = 'single-item';
                                        } else {
                                            $remaining_class = '';
                                        }
                                        echo '<div class="row justify-content-center '.$remaining_class.'">';
                                    endif;
                                } else {
                                    if($counter % 3 == 0):
                                        if($counter > 0) echo '</div>'; 
                                        $remaining = $total - $counter;
                                        if($remaining == 1) {
                                            $remaining_class = 'single-item';
                                        } else {
                                            $remaining_class = '';
                                        }
                                        echo '<div class="row justify-content-center '.$remaining_class.'">';
                                    endif;
                                }
                                
                                $row_class = $services_column_width_lg.' '.$services_column_width_md.' '.$services_column_width_sm;
                                echo '<div class="item '.$row_class.'">';
                                    echo '<div class="box">';
                                        if($icon):
                                            echo '<div class="image"><img src="'.$icon['url'].'" alt="'.$icon['alt'].'"></div>';
                                        endif;
                                        echo '<div class="details">';
                                            if($heading):
                                                echo '<h3>'.$heading.'</h3>';
                                            endif;
                                            if($content):
                                                echo '<div class="text-editor">'.$content.'</div>';
                                            endif;
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                $counter++; 
                            endif;
                        endwhile;
                    echo '</div>';
                ?>
            </div>
        </section>
    <?php endif; ?>

    <?php
        $expertise_services_intro = get_field('expertise_services_intro');
        $expertise_services_section_class = $expertise_services_intro['section_class'];
        $expertise_services_section_id = $expertise_services_intro['section_id'];
        $expertise_services_sub_title = $expertise_services_intro['sub_title'];
        $expertise_services_heading = $expertise_services_intro['heading'];
        $expertise_services_featured_image = $expertise_services_intro['featured_image'];

        if($expertise_services_section_id) {
            $expertise_services_id = 'id="' . $expertise_services_section_id .'"';
        } else {
            $expertise_services_id = '';
        }
    ?>
    <?php if( have_rows('expertise_services') ): ?>
        <section class="expertise_services appearance-theme padding-tp-default padding-bt-default <?php echo $expertise_services_section_class; ?>" <?php echo $expertise_services_id; ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="intro text-center">
                            <?php
                                if($expertise_services_sub_title || $expertise_services_heading) :
                                    echo '<div class="content">';
                                        if($expertise_services_sub_title) :
                                            echo '<h3>'.$expertise_services_sub_title.'</h3>';
                                        endif;
                                        if($expertise_services_heading) :
                                            echo '<h2>'.$expertise_services_heading.'</h2>';
                                        endif;
                                    echo '</div>';
                                endif; 
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                    echo '<div class="expertise_services_list">';
                        while( have_rows('expertise_services') ): the_row();
                            $section_id = get_sub_field('section_id');
                            $section_class = get_sub_field('section_class');
                            $heading = get_sub_field('heading');
                            $featured_image = get_sub_field('featured_image');
                            if($section_id) {
                                $id = 'id="' . $section_id .'"';
                            } else {
                                $id = '';
                            }
                            echo '<div class="row justify-content-between align-items-center expertise_services_row '.$section_class.'" '.$id.'>';
                                echo '<div class="col-lg-6 col-md-12 col-sm-12">';
                                    echo '<div class="content">';
                                        if($heading) :
                                            echo '<h3>'.$heading.'</h3>';
                                        endif;
                                        if( have_rows('features') ):
                                            echo '<div class="list">';
                                                while( have_rows('features') ): the_row();
                                                    $title = get_sub_field('title');
                                                    $content = get_sub_field('content');
                                                    if($title || $content) :
                                                        echo '<div class="block">';
                                                            if($title) :
                                                                echo '<div class="heading">'.$title.'</div>';
                                                            endif;
                                                            if($content) :
                                                                echo '<div>'.$content.'</div>';
                                                            endif;
                                                        echo '</div>';
                                                    endif;
                                                endwhile;
                                            echo '</div>';
                                        endif;
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="col-lg-6 col-md-12 col-sm-12">';
                                    echo '<div class="featured-image">';
                                        if($featured_image) :
                                            echo '<img src="'.$featured_image['url'].'" alt="'.$featured_image['alt'].'">';
                                        endif;
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        endwhile;
                    echo '</div>';
                ?>
            </div>
        </section>
    <?php endif; ?>
    <?php 
        if($expertise_services_featured_image) :
            echo'<section class="expertise_services_bg edge-to-edge" id="expertise_services_bg">
                    <div class="featured-image">
                        <img src="'.$expertise_services_featured_image['url'].'" alt="'.$expertise_services_featured_image['alt'].'">
                    </div>
                </section>';
        endif;
    ?>

    <?php
        $reviews_intro = get_field('reviews_intro');
        $reviews_section_class = $reviews_intro['section_class'];
        $reviews_section_id = $reviews_intro['section_id'];
        $reviews_sub_title = $reviews_intro['sub_title'];
        $reviews_heading = $reviews_intro['heading'];

        if($reviews_section_id) {
            $reviews_id = 'id="' . $reviews_section_id .'"';
        } else {
            $reviews_id = '';
        }
    ?>
    <?php if( have_rows('reviews') ): ?>
        <section class="reviews appearance-default padding-tp-default padding-bt-default <?php echo $reviews_section_class; ?>" <?php echo $reviews_id; ?>>
            <div class="container">
                <div class="row justify-content-between align-items-end">
                    <div class="col-md-9 col-12">
                        <div class="intro">
                            <?php
                                if($reviews_sub_title || $reviews_heading) :
                                    echo '<div class="content">';
                                        if($reviews_sub_title) :
                                            echo '<h3>'.$reviews_sub_title.'</h3>';
                                        endif;
                                        if($reviews_heading) :
                                            echo '<h2>'.$reviews_heading.'</h2>';
                                        endif;
                                    echo '</div>';
                                endif; 
                            ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 pagination reviews-pagination">
                        <?php echo do_shortcode('[pagination_arrow]'); ?>
                    </div>
                </div>
                <?php
                    echo '<div class="reviews_list">';
                        while( have_rows('reviews') ): the_row();
                            echo '<div class="item">';
                                echo '<div class="row justify-content-start">';
                                    $name = get_sub_field('name');
                                    $position = get_sub_field('position');
                                    $profile_picture = get_sub_field('profile_picture');
                                    $content = get_sub_field('content');
                                    if($profile_picture) {
                                        $col_1_class = 'col-lg-4 col-md-4 col-sm-12';
                                        $col_2_class = 'col-lg-7 col-md-8 col-sm-12';
                                    } else {
                                        $col_1_class = '';
                                        $col_2_class = 'col-lg-12 col-md-12 col-sm-12';
                                    }
                                    if($profile_picture) :
                                        echo '<div class="'.$col_1_class.'">';
                                            echo'<div class="featured-image">
                                                    <img src="'.$profile_picture['url'].'" alt="'.$profile_picture['alt'].'">
                                                </div>';
                                        echo '</div>';
                                    endif;
                                    echo '<div class="'.$col_2_class.'">';
                                        echo '<div class="content">';
                                            if($content) :
                                                echo '<div class="description">'.$content.'</div>';
                                            endif;
                                            echo '<div class="details">';
                                                if($name) :
                                                    echo '<h3>'.$name.'</h3>';
                                                endif;
                                                if($position) :
                                                    echo '<div class="position">'.$position.'</div>';
                                                endif;
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        endwhile;
                    echo '</div>';
                ?>
            </div>
        </section>
    <?php endif; ?>

    <?php 
        $resources_intro = get_field('resources_intro');
        $resources_section_class = $resources_intro['section_class'];
        $resources_section_id = $resources_intro['section_id'];
        $resources_sub_title = $resources_intro['sub_title'];
        $resources_heading = $resources_intro['heading'];
        $resources = get_field('resources');
        if($resources_section_id) {
            $resources_id = 'id="' . $resources_section_id .'"';
        } else {
            $resources_id = '';
        }
    ?>
    <?php if( $resources ): ?>
        <section class="resources appearance-default padding-tp-default padding-bt-default <?php echo $resources_section_class; ?>" <?php echo $resources_id; ?>>
            <div class="container">
                <div class="row justify-content-between align-items-end">
                    <div class="col-md-9 col-12">
                        <div class="intro">
                            <?php
                                if($resources_sub_title || $resources_heading) :
                                    echo '<div class="content">';
                                        if($resources_sub_title) :
                                            echo '<h3>'.$resources_sub_title.'</h3>';
                                        endif;
                                        if($resources_heading) :
                                            echo '<h2>'.$resources_heading.'</h2>';
                                        endif;
                                    echo '</div>';
                                endif; 
                            ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 pagination resources-pagination">
                        <?php echo do_shortcode('[pagination_arrow]'); ?>
                    </div>
                </div>
                <?php
                    echo '<div class="resources_list">';
                        foreach( $resources as $post ):
                            setup_postdata($post); 
                            $title = get_the_title();
                            $excerpt = get_the_excerpt();
                            $link = get_permalink();
                            $image = get_the_post_thumbnail_url($post->ID, 'full');
                            echo'<div class="item">';
                                echo'<div class="featured-image">';
                                    echo'<img src="'.$image.'" alt="'.$title.'">';
                                echo'</div>';
                                echo'<div class="details">';
                                    echo '<h3>'.$title.'</h3>';
                                    if($excerpt) :
                                        echo '<div class="excerpt">'.$excerpt.'</div>';
                                    endif;
                                    echo'<a href="'.$link.'" target="_self" class="permalink">
                                            Read Case Study<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.2625 13.5002H1.5C1.075 13.5002 0.71875 13.3564 0.43125 13.0689C0.14375 12.7814 0 12.4252 0 12.0002C0 11.5752 0.14375 11.2189 0.43125 10.9314C0.71875 10.6439 1.075 10.5002 1.5 10.5002H18.2625L10.9125 3.15016C10.6125 2.85016 10.4688 2.50016 10.4813 2.10016C10.4938 1.70016 10.65 1.35016 10.95 1.05016C11.25 0.775164 11.6 0.631414 12 0.618914C12.4 0.606414 12.75 0.750164 13.05 1.05016L22.95 10.9502C23.1 11.1002 23.2062 11.2627 23.2687 11.4377C23.3312 11.6127 23.3625 11.8002 23.3625 12.0002C23.3625 12.2002 23.3312 12.3877 23.2687 12.5627C23.2062 12.7377 23.1 12.9002 22.95 13.0502L13.05 22.9502C12.775 23.2252 12.4312 23.3627 12.0187 23.3627C11.6062 23.3627 11.25 23.2252 10.95 22.9502C10.65 22.6502 10.5 22.2939 10.5 21.8814C10.5 21.4689 10.65 21.1127 10.95 20.8127L18.2625 13.5002Z" fill="#246BCB"/>
                                            </svg>
                                        </a>';
                                echo'</div>';
                            echo'</div>';
                        endforeach;
                        wp_reset_postdata(); 
                    echo '</div>';
                ?>
            </div>
        </section>
    <?php endif; ?>

    <?php get_template_part('template/cta_consultation'); ?>

<?php get_footer(); ?>
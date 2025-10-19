<?php get_header(); ?>
<?php
    $term = get_queried_object();
    $appearance = get_field('appearance', $term );
    $heading = get_field('heading', $term );
    $content = get_field('content', $term );
    $background_color = get_field('background_color', $term );
    $background_img_md = get_field('background_img_md', $term );
    $background_img_sm = get_field('background_img_sm', $term );
 
    if($background_color) {
        $bg_color = '--bg-color: '.$background_color.';';
    } else {
        $bg_color = '';
    }

    if($background_img_md) {
        $bg_md_class = 'bg-md-image';
        $bg_md_image = '--bg-md-image: url('.$background_img_md.');';
    } else {
        $bg_class = '';
        $bg_md_image = '';
    }

    if($background_img_sm) {
        $bg_sm_class = 'bg-sm-image';
        $bg_sm_image = '--bg-sm-image: url('.$background_img_sm.');';
    } else {
        $bg_sm_class = '';
        $bg_sm_image = '';
    }

    if($background_color || $background_img_md || $background_img_sm) {
        $style = 'style=" '. $bg_color . $bg_md_image . $bg_sm_image .' "';
    } else {
        $style = '';
    }

    if($heading || $content) : 
?>
    <section class="hero-category-page <?php echo $appearance . ' ' . $bg_md_class . ' ' .$bg_sm_class; ?>" id="hero-category-page" <?php echo $style; ?>>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="content">
                        <?php
                            if($heading) : 
                                echo '<h1>'.$heading.'</h1>';
                            endif;
                            if($content) :
                                echo '<div class="text-editor"><p>'.$content.'</p></div>';
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
    echo '<div class="resources padding-tp-default padding-bt-default" id="resources">';
        echo '<div class="container">';

            $current_tax = $term->taxonomy;
            $terms = get_terms(array(
                'taxonomy' => $current_tax,
                'hide_empty' => false,
            ));
            if (!empty($terms) && !is_wp_error($terms)) :
                echo '<div class="taxonomy-term-list"><ul>';
                    foreach ($terms as $t) :
                        $active = ($term->term_id === $t->term_id) ? 'active' : '';
                        echo '<li class="'.esc_attr($active).'">';
                            echo '<a href="'.esc_url(get_term_link($t)).'">'.esc_html($t->name).'</a>';
                        echo '</li>';
                    endforeach; 
                echo '</ul></div>';
            endif;

            if (have_posts()) :
                echo '<div class="row">';
                    while (have_posts()) : the_post();
                        echo '<div class="col-lg-4 col-md-6 col-sm-12">';
                            $title = get_the_title();
                            $excerpt = get_the_excerpt();
                            $link = get_permalink();
                            $image = get_the_post_thumbnail_url($post->ID, 'full');
                            echo'<div class="item">';
                                echo'<div class="featured-image">';
                                    if($image) :
                                        echo'<img src="'.$image.'" alt="'.$title.'">';
                                    endif;
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
                        echo '</div>';
                    endwhile;
                echo '</div>';
            else :
                echo '<h3 class="text-center">No resources found under this category</h3>';
            endif;

        echo '</div>';
    echo '</div>';
?>

<?php get_footer(); ?>
<?php
/*
Template Name: Events Page Template
*/
get_header();

    get_template_part('template/hero-inner-page');

    $today = date('Y-m-d');

    $args = array(
        'post_type'      => 'events',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'meta_key'       => 'event_date',
        'orderby'        => 'meta_value',
        'order'          => 'ASC', 
        'meta_type'      => 'DATE'
    );
    
    $query = new WP_Query($args);
    
    $upcoming_events = [];
    $previous_events = [];
    $ongoing_events = [];
    
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $event_date = get_field('event_date');
            if (!$event_date) continue;
    
            $selected_date = new DateTime($event_date);
            $today_dt = new DateTime();
            $today_dt->setTime(0,0,0);
            $selected_date->setTime(0,0,0);
    
            if ($selected_date < $today_dt) {
                $previous_events[] = $post;
            } elseif ($selected_date > $today_dt) {
                $upcoming_events[] = $post;
            } else {
                $ongoing_events[] = $post;
            }
        endwhile;
        wp_reset_postdata();
    
        $all_events = array_merge($upcoming_events, $ongoing_events, array_reverse($previous_events));
    
        echo '<section class="event-list appearance-default padding-tp-default padding-bt-default" id="event-list">';
        echo '<section class="container"><div class="row">';
    
        foreach ($all_events as $post) : setup_postdata($post);
            $title = get_the_title();
            $event_date = get_field('event_date');
            $location = get_field('location');
            $link = get_permalink();
            $image = get_the_post_thumbnail_url($post->ID, 'full');
    
            $selected_date = new DateTime($event_date);
            $today_dt = new DateTime();
            $today_dt->setTime(0,0,0);
            $selected_date->setTime(0,0,0);
    
            if ($selected_date < $today_dt) {
                $tag = 'Previous Event';
                $tag_class = 'previous-event';
            } elseif ($selected_date > $today_dt) {
                $tag = 'Upcoming Event';
                $tag_class = 'upcoming-event';
            } else {
                $tag = 'Ongoing Event';
                $tag_class = 'ongoing-event';
                
            }

            if($location) {
                $address = $location;
            } else {
                $address = 'Online';
            }
    
            echo '<div class="col-lg-4 col-md-6 col-sm-12">';
                echo '<div class="item '.$tag_class.'">';
                    echo '<div class="featured-image">';
                        echo '<a href="'.$link.'">';
                            if ($image) echo '<img src="'.$image.'" alt="'.$title.'">';
                        echo '</a>';
                        echo '<h5>'.$tag.'</h5>';
                    echo '</div>';
                    echo '<div class="details">';
                        echo '<div class="head">';
                            echo '<h3>'.$title.'</h3>';
                            echo '<div class="event_date">'.$event_date.'</div>';
                        echo '</div>';
                        echo '<div class="location"><svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.0003 12.5C10.642 12.5 11.1913 12.2716 11.6482 11.8146C12.1052 11.3577 12.3337 10.8084 12.3337 10.1667C12.3337 9.52504 12.1052 8.97574 11.6482 8.51879C11.1913 8.06185 10.642 7.83337 10.0003 7.83337C9.35866 7.83337 8.80935 8.06185 8.35241 8.51879C7.89546 8.97574 7.66699 9.52504 7.66699 10.1667C7.66699 10.8084 7.89546 11.3577 8.35241 11.8146C8.80935 12.2716 9.35866 12.5 10.0003 12.5ZM10.0003 21.075C12.3725 18.8973 14.1323 16.9188 15.2795 15.1396C16.4267 13.3605 17.0003 11.7806 17.0003 10.4C17.0003 8.2806 16.3246 6.54518 14.9732 5.19379C13.6219 3.8424 11.9642 3.16671 10.0003 3.16671C8.03644 3.16671 6.3788 3.8424 5.02741 5.19379C3.67602 6.54518 3.00033 8.2806 3.00033 10.4C3.00033 11.7806 3.57394 13.3605 4.72116 15.1396C5.86838 16.9188 7.6281 18.8973 10.0003 21.075ZM10.0003 24.1667C6.86977 21.5028 4.53158 19.0285 2.98574 16.7438C1.43991 14.4591 0.666992 12.3445 0.666992 10.4C0.666992 7.48337 1.60519 5.15976 3.48158 3.42921C5.35796 1.69865 7.53088 0.833374 10.0003 0.833374C12.4698 0.833374 14.6427 1.69865 16.5191 3.42921C18.3955 5.15976 19.3337 7.48337 19.3337 10.4C19.3337 12.3445 18.5607 14.4591 17.0149 16.7438C15.4691 19.0285 13.1309 21.5028 10.0003 24.1667Z" fill="#575757"/>
                        </svg>'.$address.'</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
    
        endforeach;
    
        echo '</div></section></section>';
    
    else:
        echo '<h3 class="text-center">No Events</h3>';
    endif;
    
    wp_reset_postdata();

    get_template_part('template/cta_consultation');
    
get_footer(); 

?>
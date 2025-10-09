<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-5">
                <?php
                    $header_logo = get_field('header_logo', 'option');
                    if ($header_logo) {
                        echo '<div class="header-logo"><img src="' . esc_url($header_logo['url']) . '" alt="' . esc_attr($header_logo['alt']) . '"></div>';
                    } else {
                        echo get_bloginfo('name');
                    }
                ?>
            </div>
            <div class="col-md-6 col-5">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'header-menu',
                        'container'      => 'nav',       // wraps in <nav>
                        'container_class'=> 'main-nav',  // add custom class
                        'menu_class'     => 'menu',      // class for <ul>
                    ) );
                ?>
            </div>
            <div class="col-md-3 col-2">
                <?php
                    $header_cta = get_field('header_cta', 'option');
                    if ($header_cta) {
                        $url    = $header_cta['url'];
                        $title  = $header_cta['title'];
                        $target = $header_cta['target'] ? $header_cta['target'] : '_self';
                        echo '<div class="header-cta"><a href="' . esc_url($url) . '" target="' . esc_attr($target) . '">' . esc_html($title) . '</a></div>';
                    }
                ?>
            </div>
        </div>
    </div>
</header>
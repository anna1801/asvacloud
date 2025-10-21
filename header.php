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

<header id="site-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-2 col-lg-4 col-4">
                <?php
                    $header_logo = get_field('header_logo', 'option');
                    if ($header_logo) {
                        echo '<div class="header-logo"><a href="'.get_site_url().'"><img src="' . esc_url($header_logo['url']) . '" alt="' . esc_attr($header_logo['alt']) . '"></a></div>';
                    } else {
                        echo get_bloginfo('name');
                    }
                ?>
            </div>
            <div class="col-xl-8 col-lg-1 col-1">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'header-menu',
                        'container'      => 'nav',       // wraps in <nav>
                        'container_class'=> 'main-nav',  // add custom class
                        'menu_class'     => 'menu',      // class for <ul>
                        'walker'         => new Custom_Submenu_Walker(),
                    ) );
                ?>
            </div>
            <div class="col-xl-2 col-lg-7 col-7">
                <div class="header-right">
                    <?php
                        $header_cta = get_field('header_cta', 'option');
                        if ($header_cta) {
                            $url    = $header_cta['url'];
                            $title  = $header_cta['title'];
                            $target = $header_cta['target'] ? $header_cta['target'] : '_self';
                            echo '<div class="header-cta appearance-default"><a href="' . esc_url($url) . '" target="' . esc_attr($target) . '" class="btn">' . esc_html($title) . '</a></div>';
                        }
                    ?>
                    <div class="harmburger">
                        <button id="harmburger-toggle" class="harmburger-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle menu">
                            <div class="line-1"></div>
                            <div class="line-2"></div>
                            <div class="line-3"></div>
                        </button>
                        <nav id="mobile-navigation" class="mobile-navigation" role="navigation" aria-label="Primary menu">
                            <?php
                                wp_nav_menu([
                                'theme_location' => 'header-menu',
                                'menu_id'        => 'mobile-header-menu',
                                'container'      => false,
                                'fallback_cb'    => false,
                                ]);
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="menu-overlay" id="menu-overlay"></div>

<main>
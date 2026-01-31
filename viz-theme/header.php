<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('viz-landing'); ?>>
    <!-- Header -->
    <header class="header">
        <nav class="nav-container">
            <div class="logo">
                <span class="logo-icon">🏗️</span>
                <span class="logo-text">
                    <?php bloginfo('name'); ?>
                </span>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'nav-menu',
                'fallback_cb' => '__return_false',
            ));
            ?>
            <ul class="nav-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">На главную</a></li>
                <li><a href="#projects">Работы</a></li>
                <li><a href="https://t.me/nnsvt" class="nav-cta" target="_blank">Связаться в TG</a></li>
            </ul>
        </nav>
    </header>
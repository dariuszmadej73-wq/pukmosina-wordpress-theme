<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a class="skip-link" href="#main-content"><?php esc_html_e('Przejdź do treści', 'pukmosina'); ?></a>

<header class="site-header" role="banner">
    <div class="site-inner header-wrap">
        <div class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        </div>

        <nav class="main-nav" aria-label="<?php esc_attr_e('Menu główne', 'pukmosina'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => 'pukmosina_menu_fallback',
            ]);
            ?>
        </nav>
    </div>
</header>

<main id="main-content" class="site-main" tabindex="-1">

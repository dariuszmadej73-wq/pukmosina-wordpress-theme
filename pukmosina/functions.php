<?php
/**
 * Theme Name: Pukmosina
 * Theme URI: https://github.com/dariuszmadej73-wq/pukmosina-wordpress-theme
 * Author: Copilot
 * Description: Minimalistyczny motyw WordPress z komunikatami i statycznymi stronami, zoptymalizowany pod wysoką czytelność i dostępność.
 * Version: 1.0.0
 * Text Domain: pukmosina
 */

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');

    register_nav_menus([
        'primary' => __('Menu główne', 'pukmosina'),
    ]);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('pukmosina-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
});

add_action('init', function () {
    register_post_type('komunikat', [
        'labels' => [
            'name' => __('Komunikaty', 'pukmosina'),
            'singular_name' => __('Komunikat', 'pukmosina'),
            'add_new' => __('Dodaj komunikat', 'pukmosina'),
            'add_new_item' => __('Dodaj nowy komunikat', 'pukmosina'),
            'edit_item' => __('Edytuj komunikat', 'pukmosina'),
            'new_item' => __('Nowy komunikat', 'pukmosina'),
            'view_item' => __('Zobacz komunikat', 'pukmosina'),
            'search_items' => __('Szukaj komunikatów', 'pukmosina'),
            'not_found' => __('Brak komunikatów', 'pukmosina'),
            'not_found_in_trash' => __('Brak komunikatów w koszu', 'pukmosina'),
        ],
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'komunikat'],
    ]);
});

function pukmosina_default_pages() {
    $pages = [
        [
            'slug' => 'rozklad-jazdy',
            'title' => 'Rozkład jazdy',
            'content' => '<h2>Rozkład jazdy</h2>
<p>Strona służy do prezentacji aktualnych rozkładów jazdy oraz ważnych informacji związanych z transportem lokalnym.</p>
<p>W razie wątpliwości prosimy o kontakt z administracją lub jednostką prowadzącą obsługę komunikacji.</p>',
        ],
        [
            'slug' => 'harmonogram-odbioru-smieci',
            'title' => 'Harmonogram odbioru śmieci',
            'content' => '<h2>Harmonogram odbioru śmieci</h2>
<p>W tej sekcji publikujemy daty odbioru śmieci oraz informacje o zasadach segregacji odpadów.</p>
<p>Prosimy o sprawdzanie aktualizacji przed dniem odbioru.</p>',
        ],
        [
            'slug' => 'kontakt',
            'title' => 'Kontakt',
            'content' => '<h2>Kontakt</h2>
<p>Adres: Pukmosina</p>
<p>Telefon: +48 000 000 000</p>
<p>E-mail: kontakt@pukmosina.pl</p>
<p>Godziny kontaktu: Poniedziałek–Piątek, 8:00–16:00</p>',
        ],
    ];

    foreach ($pages as $page_data) {
        $page = get_page_by_path($page_data['slug']);

        if (!$page) {
            wp_insert_post([
                'post_type' => 'page',
                'post_title' => $page_data['title'],
                'post_name' => $page_data['slug'],
                'post_content' => $page_data['content'],
                'post_status' => 'publish',
            ]);
        }
    }
}

add_action('after_switch_theme', 'pukmosina_default_pages');

function pukmosina_menu_fallback() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Strona główna</a></li>';
    echo '<li><a href="' . esc_url(home_url('/rozklad-jazdy/')) . '">Rozkład jazdy</a></li>';
    echo '<li><a href="' . esc_url(home_url('/harmonogram-odbioru-smieci/')) . '">Harmonogram odbioru śmieci</a></li>';
    echo '<li><a href="' . esc_url(home_url('/kontakt/')) . '">Kontakt</a></li>';
    echo '</ul>';
}

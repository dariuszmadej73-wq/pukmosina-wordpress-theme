<?php get_header(); ?>

<div class="content-wrap">
    <section class="hero" aria-labelledby="home-heading">
        <h1 id="home-heading"><?php echo esc_html(get_bloginfo('name')); ?></h1>
        <p><?php esc_html_e('Strona główna z komunikatami, ważnymi informacjami, rozkładem jazdy oraz harmonogramem odbioru śmieci.', 'pukmosina'); ?></p>
    </section>

    <section class="notice-card" aria-labelledby="aktualnosci">
        <h2 id="aktualnosci"><?php esc_html_e('Aktualności', 'pukmosina'); ?></h2>
        <p><?php esc_html_e('Poniżej publikujemy najważniejsze komunikaty i informacje dla mieszkańców.', 'pukmosina'); ?></p>
    </section>

    <?php
    $komunikaty = new WP_Query([
        'post_type' => 'komunikat',
        'posts_per_page' => 10,
        'post_status' => 'publish',
    ]);

    if ($komunikaty->have_posts()) :
        ?>
        <ul class="post-list">
            <?php while ($komunikaty->have_posts()) : $komunikaty->the_post(); ?>
                <li>
                    <article>
                        <time class="meta" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                            <?php echo esc_html(get_the_date()); ?>
                        </time>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                    </article>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p><?php esc_html_e('Brak komunikatów.', 'pukmosina'); ?></p>
    <?php endif; ?>

    <div class="info-grid" aria-label="<?php esc_attr_e('Najważniejsze sekcje', 'pukmosina'); ?>">
        <?php
        $sekcje = [
            'rozklad-jazdy' => 'Rozkład jazdy',
            'harmonogram-odbioru-smieci' => 'Harmonogram odbioru śmieci',
            'kontakt' => 'Kontakt',
        ];

        foreach ($sekcje as $slug => $title) {
            $page = get_page_by_path($slug);

            if ($page) {
                ?>
                <article class="info-card">
                    <h3><a href="<?php echo esc_url(get_permalink($page)); ?>"><?php echo esc_html($title); ?></a></h3>
                    <p><?php echo esc_html(wp_trim_words(strip_tags($page->post_content), 20)); ?></p>
                </article>
                <?php
            }
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>

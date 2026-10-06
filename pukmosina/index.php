<?php get_header(); ?>

<div class="content-wrap">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="page-card">
                <header>
                    <h1><?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php esc_html_e('Brak treści.', 'pukmosina'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>

<?php get_header(); ?>

<div class="content-wrap">
    <?php while (have_posts()) : the_post(); ?>
        <article class="page-card">
            <header>
                <p class="meta">
                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                        <?php echo esc_html(get_the_date()); ?>
                    </time>
                </p>
                <h1><?php the_title(); ?></h1>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <figure>
                    <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                </figure>
            <?php endif; ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>

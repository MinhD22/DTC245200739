
<?php get_header(); ?>

<header class="site-header">
    <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>">
        🍃 Bếp Nhà Mình
    </a>
    <a href="<?php echo esc_url(home_url('/')); ?>">← Về trang chủ</a>
</header>

<main class="recipe-detail">
    <?php while (have_posts()) : the_post(); ?>
        <article>
            <p><a class="read-more" href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> / Công thức</p>

            <h1><?php the_title(); ?></h1>

            <p>Ngày đăng: <?php echo esc_html(get_the_date('d/m/Y')); ?></p>

            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>

            <div class="recipe-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<footer class="site-footer">
    <p>Bếp Nhà Mình — Chúc bạn nấu ăn ngon!</p>
</footer>

<?php get_footer(); ?>


<?php get_header(); ?>

<header class="site-header">
    <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>">
        🍃 Bếp Nhà Mình
    </a>
    <nav class="site-nav">
        <a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a>
    </nav>
</header>

<section class="hero">
    <h1>Mỗi món ăn, một niềm vui</h1>
    <p>Khám phá công thức ngon, dễ làm cho bữa cơm gia đình.</p>

    <form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input
            type="search"
            name="s"
            placeholder="Tìm Phở Bò, Thịt Kho Trứng..."
            value="<?php echo esc_attr(get_search_query()); ?>"
            aria-label="Tìm công thức"
        >
        <button type="submit">Tìm món</button>
    </form>
</section>

<main class="recipe-section">
    <h2>
        <?php echo is_search() ? 'Kết quả tìm kiếm' : 'Công thức dành cho bạn'; ?>
    </h2>

    <?php if (have_posts()) : ?>
        <div class="recipe-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article class="recipe-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('medium_large');
                        } else {
                            echo recipe_theme_placeholder(get_the_title());
                        }
                        ?>
                    </a>

                    <div class="recipe-card-body">
                        <h3>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <p>
                            <?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?>
                        </p>

                        <a class="read-more" href="<?php the_permalink(); ?>">
                            Xem công thức →
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="recipe-pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p>Chưa tìm thấy công thức phù hợp. Hãy thử tên món ăn khác nhé.</p>
    <?php endif; ?>
</main>

<footer class="site-footer">
    <p>© <?php echo esc_html(wp_date('Y')); ?> Bếp Nhà Mình — Chia sẻ món ngon mỗi ngày.</p>
</footer>

<?php get_footer(); ?>

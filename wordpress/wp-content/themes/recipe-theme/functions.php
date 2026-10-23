
<?php

// Khai báo các tính năng của giao diện.
function recipe_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'recipe_theme_setup');

// Nạp file CSS của giao diện.
function recipe_theme_styles() {
    wp_enqueue_style(
        'recipe-theme-style',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'recipe_theme_styles');

// Tạo ảnh minh họa dự phòng nếu bài viết chưa có ảnh đại diện.
function recipe_theme_placeholder($title) {
    $colors = array(
        'Phở Bò' => 'f3d8a6',
        'Thịt Kho Trứng' => 'e8c6a0',
        'Rau Muống Xào Tỏi' => 'b9d5a5',
        'Canh Rau Ngót Thịt Băm' => 'c6dfb5',
        'Nước Chanh' => 'f5e7a0',
        'Quả Dưa Hấu' => 'f3c2bd',
    );

    $color = isset($colors[$title]) ? $colors[$title] : 'eaf3e9';
    $safe_title = esc_html($title);

    return '<div class="recipe-placeholder" style="height:210px;display:flex;align-items:center;justify-content:center;background:#' . esc_attr($color) . ';font-size:54px" aria-label="' . esc_attr($title) . '">🍲</div>';
}

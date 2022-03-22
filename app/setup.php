<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

function get_hash() {
    return '20220309122740'; // Run at console -> date +%Y%m%d%H%M%S
}

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    $hash = get_hash();

    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, $hash);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), [], $hash, true);

    wp_dequeue_script( 'jquery');
    wp_deregister_script( 'jquery');

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);



/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');
    add_theme_support( 'custom-logo' );

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
//    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];
    register_sidebar([
            'name' => __('Primary', 'sage'),
            'id' => 'sidebar-primary'
        ] + $config);
    register_sidebar([
            'name' => __('Footer', 'sage'),
            'id' => 'sidebar-footer'
        ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});



add_action('acf/init', function () {

    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page();
    }

    if (function_exists('acf_register_block_type')) {
        $blocks = [
            [
                'name' => 'hero',
                'title' => __('Landing page | Hero'),
                'description' => __('A custom landing page Hero block.'),
                'category' => 'formatting',
                'icon' => [
                    'background' => '#474D6A',
                    'foreground' => '#FFF',
                    'src' => 'admin-comments'
                ]
            ],
            [
                'name' => 'our-story',
                'title' => __('Landing page | Our Story'),
                'description' => __('A custom landing page Our Story block.'),
                'category' => 'formatting',
                'icon' => [
                    'background' => '#474D6A',
                    'foreground' => '#FFF',
                    'src' => 'admin-comments'
                ]
            ],
            [
                'name' => 'services',
                'title' => __('Landing page | Services'),
                'description' => __('A custom landing page Services block.'),
                'category' => 'formatting',
                'icon' => [
                    'background' => '#474D6A',
                    'foreground' => '#FFF',
                    'src' => 'admin-comments'
                ]
            ],
            [
                'name' => 'industries',
                'title' => __('Landing page | Industries'),
                'description' => __('A custom landing page Industries block.'),
                'category' => 'formatting',
                'icon' => [
                    'background' => '#474D6A',
                    'foreground' => '#FFF',
                    'src' => 'admin-comments'
                ]
            ],
            [
                'name' => 'contact-us',
                'title' => __('Landing page | Contact us'),
                'description' => __('A custom landing page Contact us block.'),
                'category' => 'formatting',
                'icon' => [
                    'background' => '#474D6A',
                    'foreground' => '#FFF',
                    'src' => 'admin-comments'
                ]
            ],
            [
                'name' => 'capabilities',
                'title' => __('Landing page | Capabilities'),
                'description' => __('A custom landing page Capabilities block.'),
                'category' => 'formatting',
                'icon' => [
                    'background' => '#474D6A',
                    'foreground' => '#FFF',
                    'src' => 'admin-comments'
                ]
            ],
            [
                'name' => 'our-clients',
                'title' => __('Landing page | Our clients'),
                'description' => __('A custom landing page Our clients block.'),
                'category' => 'formatting',
                'icon' => [
                    'background' => '#474D6A',
                    'foreground' => '#FFF',
                    'src' => 'admin-comments'
                ]
            ],
        ];

        foreach ($blocks as $block) {
            acf_register_block_type([
                'name' => $block['name'],
                'title' => $block['title'],
                'description' => $block['description'] ?? null,
                'render_callback' => '\App\acf_block_render_callback',
                'category' => $block['category'] ?? 'formatting',
                'icon' => $block['icon'] ?? 'layout',
                'keywords' => $block['keywords'] ?? [],
                'supports' => array( 'anchor' => true )
            ]);
        }

    }
});


<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function getRomanianNumber($number) {
        switch ($number) {
            case 1:
                return 'I';
                break;
            case 2:
                return 'II';
                break;
            case 3:
                return 'III';
                break;
            case 4:
                return 'IV';
                break;
            case 5:
                return '&#8548;';
                break;
            case 6:
                return '&#8549;';
                break;
            case 7:
                return '&#8550;';
                break;
            case 8:
                return '&#8551;';
                break;
            case 9:
                return '&#8552;';
                break;
            default:
                return $number;
        }
    }

    public static function getPageType() {
        $pageType = get_field('page_type', 'options');
        if (!$pageType) {
            $pageType = 'merlean';
        }
        return 'site site--' . $pageType;
    }
}

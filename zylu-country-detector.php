<?php
/**
 * Plugin Name: Zylu Country-Based Body Class
 * Description: Adds country-specific body classes using Cloudflare IP geolocation and displays the country.
 * Version: 1.2
 * Author: Kumar
 */

add_filter('body_class', function($classes) {
    $country_code = strtolower($_SERVER['HTTP_CF_IPCOUNTRY'] ?? 'xx');

    if ($country_code === 'in') {
        $classes[] = 'visitor-india';
    } else {
        $classes[] = 'visitor-international';
    }

    $classes[] = 'visitor-country-' . $country_code;

    return $classes;
});

// Display visitor country code in the footer for debugging
add_action('wp_footer', function() {
    $country_code = $_SERVER['HTTP_CF_IPCOUNTRY'] ?? 'XX';
    echo '<div style="position:fixed;bottom:10px;right:10px;background:#eee;padding:8px;border:1px solid #ccc;z-index:9999;font-size:14px;">Country: ' . esc_html($country_code) . '</div>';
});

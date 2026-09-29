<?php
/**
 * Distilleria AfterBit Child Theme functions and definitions
 */

if (!defined('ABSPATH')) {
    exit;
}

// Carica stili del tema genitore e del child theme
add_action('wp_enqueue_scripts', 'distilleria_child_enqueue_styles');
function distilleria_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_uri(), ['parent-style'], wp_get_theme()->get('Version'));
}

// Personalizzazioni WooCommerce specifiche per la distilleria
add_filter('woocommerce_product_add_to_cart_text', 'distilleria_custom_cart_button_text');
function distilleria_custom_cart_button_text() {
    return __('Acquista Bottiglia', 'distilleria-child');
}

// Avviso di spedizione e gradazione alcolica nella scheda prodotto
add_action('woocommerce_single_product_summary', 'distilleria_alcohol_warning', 25);
function distilleria_alcohol_warning() {
    echo '<div class="distilleria-product-meta" style="background:#f9f8f5;padding:12px;border-left:3px solid #8b5a2b;margin:15px 0;font-size:0.9rem;color:#555;">';
    echo '<span>🛡️ <strong>Imballaggio protettivo:</strong> Spedizione in scatola antiurto brevettata per bottiglie in vetro. Consegna 24/48h.</span><br>';
    echo '<span style="font-size:0.8rem;color:#888;">⚠️ Vendita riservata esclusivamente a persone maggiorenni (18+). Bevi responsabilmente.</span>';
    echo '</div>';
}

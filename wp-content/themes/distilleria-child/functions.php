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
    wp_enqueue_style('child-style', get_stylesheet_uri(), array('parent-style'), '1.1.0');
}

// Shortcode Hero Slider [distilleria_hero_slider]
add_shortcode('distilleria_hero_slider', 'distilleria_render_hero_slider');
function distilleria_render_hero_slider() {
    $slides = array(
        array(
            'badge' => 'Tradizione & Artigianalità',
            'title' => 'Distilleria &amp; <span>Liquorificio Artigianale</span>',
            'desc'  => 'L'arte della distillazione italiana e la passione per gli infusi tradizionali. Amari, grappe, gin botanici e grandi classici 100% naturali.',
            'image' => 'https://images.unsplash.com/photo-1527061011665-3652c757a4d4?w=1600&q=80',
            'btn1_text' => 'Esplora i Nostri Liquori',
            'btn1_url'  => '/negozio/',
            'btn2_text' => 'La Nostra Storia',
            'btn2_url'  => '/chi-siamo/'
        ),
        array(
            'badge' => 'Macerazione Lenta a Freddo',
            'title' => 'Amari d'Erbe <span>Alpine &amp; Radici Selvagge</span>',
            'desc'  => 'Oltre 28 erbe alpine, genziana, rabarbaro e assenzio per un bouquet digestivo intenso, persistente e balsamico.',
            'image' => 'https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?w=1600&q=80',
            'btn1_text' => 'Scopri gli Amari',
            'btn1_url'  => '/categoria-prodotto/amari-digestivi/',
            'btn2_text' => 'Tutti i Prodotti',
            'btn2_url'  => '/negozio/'
        ),
        array(
            'badge' => 'Distillazione in Alambicco di Rame',
            'title' => 'Grappe Barricate <span>Invecchiate in Rovere</span>',
            'desc'  => 'Grappa monovitigno distillata a bagnomaria e affinata 5 anni in fusti di rovere francese con note calde di vaniglia e cacao.',
            'image' => 'https://images.unsplash.com/photo-1569529465841-dfecdab7503b?w=1600&q=80',
            'btn1_text' => 'Scopri le Grappe',
            'btn1_url'  => '/categoria-prodotto/grappe-distillati/',
            'btn2_text' => 'Acquista Online',
            'btn2_url'  => '/negozio/'
        ),
        array(
            'badge' => 'Esperienze & Visite Guidate',
            'title' => 'Percorsi di Degustazione <span>&amp; Visite in Bottega</span>',
            'desc'  => 'Prenota una visita esclusiva ai nostri alambicchi in rame e degusta i migliori distillati guidato dal nostro Mastro Distillatore.',
            'image' => 'https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=1600&q=80',
            'btn1_text' => 'Prenota Degustazione',
            'btn1_url'  => '/contatti/',
            'btn2_text' => 'Contattaci',
            'btn2_url'  => '/contatti/'
        )
    );

    ob_start();
    ?>
    <div class="distilleria-slider-container" id="distilleriaHeroSlider">
        <div class="distilleria-slides-wrapper">
            <?php foreach ($slides as $index => $slide): ?>
                <div class="distilleria-slide <?php echo $index === 0 ? 'active' : ''; ?>" 
                     style="background-image: url('<?php echo esc_url($slide['image']); ?>');"
                     data-slide="<?php echo $index; ?>">
                    <div class="distilleria-slide-overlay"></div>
                    <div class="distilleria-slide-content">
                        <?php if (!empty($slide['badge'])): ?>
                            <span class="distilleria-slide-badge"><?php echo esc_html($slide['badge']); ?></span>
                        <?php endif; ?>
                        <h2 class="distilleria-slide-title"><?php echo wp_kses_post($slide['title']); ?></h2>
                        <p class="distilleria-slide-desc"><?php echo esc_html($slide['desc']); ?></p>
                        <div class="distilleria-slide-buttons">
                            <a href="<?php echo esc_url($slide['btn1_url']); ?>" class="distilleria-btn distilleria-btn-primary">
                                <?php echo esc_html($slide['btn1_text']); ?>
                            </a>
                            <?php if (!empty($slide['btn2_text'])): ?>
                                <a href="<?php echo esc_url($slide['btn2_url']); ?>" class="distilleria-btn distilleria-btn-outline">
                                    <?php echo esc_html($slide['btn2_text']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="distilleria-slider-arrow distilleria-arrow-prev" id="sliderPrev" aria-label="Precedente">&#10094;</div>
        <div class="distilleria-slider-arrow distilleria-arrow-next" id="sliderNext" aria-label="Successivo">&#10095;</div>

        <div class="distilleria-slider-dots" id="sliderDots">
            <?php for ($i = 0; $i < count($slides); $i++): ?>
                <button class="distilleria-dot <?php echo $i === 0 ? 'active' : ''; ?>" 
                        data-slide="<?php echo $i; ?>" 
                        aria-label="Slide <?php echo $i + 1; ?>"></button>
            <?php endfor; ?>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('distilleriaHeroSlider');
        if (!container) return;

        const slides = container.querySelectorAll('.distilleria-slide');
        const dots = container.querySelectorAll('.distilleria-dot');
        const prevBtn = document.getElementById('sliderPrev');
        const nextBtn = document.getElementById('sliderNext');
        let currentIndex = 0;
        let slideInterval;
        const autoPlayDelay = 5500;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            currentIndex = index;
        }

        function nextSlide() {
            let next = (currentIndex + 1) % slides.length;
            showSlide(next);
        }

        function prevSlide() {
            let prev = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(prev);
        }

        function startAutoPlay() {
            stopAutoPlay();
            slideInterval = setInterval(nextSlide, autoPlayDelay);
        }

        function stopAutoPlay() {
            if (slideInterval) clearInterval(slideInterval);
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function() {
                nextSlide();
                startAutoPlay();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function() {
                prevSlide();
                startAutoPlay();
            });
        }

        dots.forEach(dot => {
            dot.addEventListener('click', function() {
                const target = parseInt(this.getAttribute('data-slide'));
                showSlide(target);
                startAutoPlay();
            });
        });

        container.addEventListener('mouseenter', stopAutoPlay);
        container.addEventListener('mouseleave', startAutoPlay);

        // Touch swipe support for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        container.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        container.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            if (touchStartX - touchEndX > 50) {
                nextSlide();
                startAutoPlay();
            } else if (touchEndX - touchStartX > 50) {
                prevSlide();
                startAutoPlay();
            }
        }, { passive: true });

        startAutoPlay();
    });
    </script>
    <?php
    return ob_get_clean();
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

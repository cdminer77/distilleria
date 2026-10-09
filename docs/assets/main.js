// Distilleria AfterBit - Interattività Static Demo
document.addEventListener('DOMContentLoaded', function() {
    // 1. HERO SLIDER
    const sliderContainer = document.getElementById('distilleriaHeroSlider');
    if (sliderContainer) {
        const slides = sliderContainer.querySelectorAll('.distilleria-slide');
        const dots = sliderContainer.querySelectorAll('.distilleria-dot');
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
            nextBtn.addEventListener('click', () => { nextSlide(); startAutoPlay(); });
        }
        if (prevBtn) {
            prevBtn.addEventListener('click', () => { prevSlide(); startAutoPlay(); });
        }

        dots.forEach(dot => {
            dot.addEventListener('click', function() {
                showSlide(parseInt(this.getAttribute('data-slide')));
                startAutoPlay();
            });
        });

        sliderContainer.addEventListener('mouseenter', stopAutoPlay);
        sliderContainer.addEventListener('mouseleave', startAutoPlay);

        // Touch swipe
        let touchStartX = 0;
        sliderContainer.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        sliderContainer.addEventListener('touchend', e => {
            let touchEndX = e.changedTouches[0].screenX;
            if (touchStartX - touchEndX > 50) { nextSlide(); startAutoPlay(); }
            else if (touchEndX - touchStartX > 50) { prevSlide(); startAutoPlay(); }
        }, { passive: true });

        startAutoPlay();
    }

    // 2. CATEGORY FILTER
    const filterButtons = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const targetCat = this.getAttribute('data-category');

            productCards.forEach(card => {
                if (targetCat === 'all' || card.getAttribute('data-category') === targetCat) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // 3. CART SYSTEM (DEMO INTERATTIVA)
    let cart = [];
    const cartCountEl = document.querySelector('.cart-count');
    const drawerOverlay = document.getElementById('cartDrawerOverlay');
    const drawer = document.getElementById('cartDrawer');
    const drawerClose = document.getElementById('cartDrawerClose');
    const drawerBody = document.getElementById('cartDrawerBody');
    const drawerTotal = document.getElementById('cartDrawerTotal');
    const cartBtnHeader = document.querySelector('.cart-button-header');
    const toast = document.getElementById('toastNotification');

    function updateCartUI() {
        const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
        if (cartCountEl) cartCountEl.textContent = totalItems;

        if (drawerBody) {
            if (cart.length === 0) {
                drawerBody.innerHTML = '<p style="color:#777;text-align:center;margin-top:40px;">Il tuo carrello è vuoto.</p>';
                if (drawerTotal) drawerTotal.textContent = '0,00 €';
            } else {
                let html = '';
                let total = 0;
                cart.forEach(item => {
                    total += item.price * item.qty;
                    html += `
                        <div class="cart-item">
                            <img src="${item.image}" alt="${item.name}">
                            <div class="cart-item-info">
                                <div class="cart-item-title">${item.name}</div>
                                <div class="cart-item-price">${item.qty} × ${item.price.toFixed(2).replace('.', ',')} €</div>
                            </div>
                        </div>
                    `;
                });
                drawerBody.innerHTML = html;
                if (drawerTotal) drawerTotal.textContent = total.toFixed(2).replace('.', ',') + ' €';
            }
        }
    }

    function showToast(msg) {
        if (!toast) return;
        toast.textContent = msg;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3000);
    }

    document.querySelectorAll('.btn-buy').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const price = parseFloat(this.getAttribute('data-price'));
            const image = this.getAttribute('data-image');

            const existing = cart.find(item => item.id === id);
            if (existing) {
                existing.qty++;
            } else {
                cart.push({ id, name, price, image, qty: 1 });
            }

            updateCartUI();
            showToast('✓ ' + name + ' aggiunto al carrello!');
            if (drawerOverlay && drawer) {
                drawerOverlay.classList.add('open');
                drawer.classList.add('open');
            }
        });
    });

    if (cartBtnHeader) {
        cartBtnHeader.addEventListener('click', () => {
            if (drawerOverlay && drawer) {
                drawerOverlay.classList.add('open');
                drawer.classList.add('open');
            }
        });
    }

    if (drawerClose && drawerOverlay && drawer) {
        drawerClose.addEventListener('click', () => {
            drawerOverlay.classList.remove('open');
            drawer.classList.remove('open');
        });
        drawerOverlay.addEventListener('click', () => {
            drawerOverlay.classList.remove('open');
            drawer.classList.remove('open');
        });
    }

    // 4. SCROLL TO TOP BUTTON
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    if (scrollTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTopBtn.style.display = 'flex';
            } else {
                scrollTopBtn.style.display = 'none';
            }
        });
        scrollTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
});

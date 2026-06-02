document.addEventListener('DOMContentLoaded', () => {

/* ===== HERO ENTRANCE ANIMATIONS ===== */
(function initHeroAnimations() {
    var heroEls = document.querySelectorAll('.hero-animate.from-below');
    heroEls.forEach(function(el, i) {
        setTimeout(function() {
            el.classList.remove('from-below');
        }, 200 + i * 160);
    });
})();

const menuButton = document.getElementById('menuButton');
const mobileMenu = document.getElementById('mobileMenu');

if (menuButton && mobileMenu) {
    menuButton.addEventListener('click', () => {
        const isOpen = !mobileMenu.classList.contains('hidden');
        mobileMenu.classList.toggle('hidden');
        menuButton.setAttribute('aria-expanded', String(!isOpen));
    });
}

/* ===== HERO CAROUSEL ===== */
(function initCarousel() {
    const track = document.querySelector('.hero-carousel-track');
    if (!track) return;

    const slides = track.querySelectorAll('.hero-carousel-slide');
    const dotsContainer = document.querySelector('.hero-carousel-dots');
    const prevBtn = document.querySelector('.hero-carousel-arrow.prev');
    const nextBtn = document.querySelector('.hero-carousel-arrow.next');
    const statusCurrent = document.querySelector('.hero-carousel-current');
    const statusLabel = document.querySelector('.hero-carousel-label');
    const progressBar = document.querySelector('.hero-carousel-progress span');
    if (!slides.length) return;

    let current = 0;
    let interval;
    let delay = 4500;
    let isAnimating = false;
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Create dots
    if (dotsContainer) {
        dotsContainer.innerHTML = '';
        slides.forEach((_, i) => {
            const dot = document.createElement('button');
            dot.className = 'hero-carousel-dot' + (i === 0 ? ' active' : '');
            dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
            dot.addEventListener('click', () => goTo(i));
            dotsContainer.appendChild(dot);
        });
    }

    const dots = dotsContainer ? dotsContainer.querySelectorAll('.hero-carousel-dot') : [];

    function updateSlideState(nextIndex) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('is-active', i === nextIndex);
            slide.setAttribute('aria-hidden', i === nextIndex ? 'false' : 'true');
        });

        if (dots.length) {
            dots.forEach((dot, i) => {
                const isActive = i === nextIndex;
                dot.classList.toggle('active', isActive);
                dot.setAttribute('aria-current', isActive ? 'true' : 'false');
            });
        }

        if (statusCurrent) {
            statusCurrent.textContent = slides[nextIndex].dataset.slideCode || String(nextIndex + 1).padStart(2, '0');
        }

        if (statusLabel) {
            statusLabel.textContent = slides[nextIndex].dataset.slideLabel || 'Slide ' + (nextIndex + 1);
        }

        if (progressBar) {
            progressBar.classList.remove('is-running');
            progressBar.style.transitionDuration = reducedMotion ? '1ms' : delay + 'ms';
            void progressBar.offsetWidth;
            progressBar.classList.add('is-running');
        }
    }

    function goTo(index, shouldResetTimer = true) {
        if (isAnimating && !reducedMotion) return;
        let nextIndex = index;
        if (nextIndex < 0) nextIndex = slides.length - 1;
        if (nextIndex >= slides.length) nextIndex = 0;
        if (nextIndex === current && shouldResetTimer) {
            resetTimer();
            return;
        }

        current = nextIndex;
        isAnimating = true;
        if (current < 0) current = slides.length - 1;
        if (current >= slides.length) current = 0;
        track.style.transform = 'translateX(-' + (current * 100) + '%)';
        updateSlideState(current);

        window.setTimeout(() => {
            isAnimating = false;
        }, reducedMotion ? 20 : 850);

        if (shouldResetTimer) resetTimer();
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    function resetTimer() {
        clearInterval(interval);
        interval = setInterval(next, delay);
    }

    if (prevBtn) prevBtn.addEventListener('click', prev);
    if (nextBtn) nextBtn.addEventListener('click', next);

    // Touch / swipe support
    let touchStartX = 0;
    let touchEndX = 0;
    const carousel = document.querySelector('.hero-carousel');
    if (carousel) {
        carousel.addEventListener('touchstart', function(e) { touchStartX = e.changedTouches[0].screenX; }, { passive: true });
        carousel.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            var diff = touchStartX - touchEndX;
            if (Math.abs(diff) > 50) {
                diff > 0 ? next() : prev();
            }
        }, { passive: true });

        // Pause on hover
        carousel.addEventListener('mouseenter', function() { clearInterval(interval); });
        carousel.addEventListener('mouseleave', resetTimer);

        // Keyboard navigation
        carousel.setAttribute('tabindex', '0');
        carousel.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') prev();
            if (e.key === 'ArrowRight') next();
        });
    }

    // Handle visibility change to pause when tab is hidden
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            clearInterval(interval);
        } else {
            resetTimer();
        }
    });

    updateSlideState(0);
    resetTimer();
})();

/* ===== COUNTER ANIMATION ===== */
(function initCounters() {
    var counters = document.querySelectorAll('[data-counter]');
    if (!counters.length) return;

    var animated = {};

    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var el = entry.target;
                if (animated[el]) return;
                animated[el] = true;

                var target = parseInt(el.dataset.counter, 10);
                var suffix = el.dataset.suffix || '';
                var duration = parseInt(el.dataset.duration, 10) || 2000;
                animateCounter(el, target, suffix, duration);
                observer.unobserve(el);
            }
        });
    }, { threshold: 0.3 });

    counters.forEach(function(c) { observer.observe(c); });

    function animateCounter(el, target, suffix, duration) {
        var startTime = null;
        function update(now) {
            if (!startTime) startTime = now;
            var elapsed = now - startTime;
            var progress = Math.min(elapsed / duration, 1);
            var ease = 1 - Math.pow(1 - progress, 3);
            var current = Math.floor(ease * target);
            el.textContent = current + suffix;
            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                el.textContent = target + suffix;
            }
        }
        requestAnimationFrame(update);
    }
})();

/* ===== SCROLL REVEAL ===== */
var revealItems = document.querySelectorAll('.reveal');

if ('IntersectionObserver' in window && revealItems.length) {
    var revealObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });

    revealItems.forEach(function(item) { revealObserver.observe(item); });
} else {
    for (var i = 0; i < revealItems.length; i++) {
        revealItems[i].classList.add('is-visible');
    }
}

/* ===== DYNAMIC SUBMENU POSITIONING ===== */
var navItems = document.querySelectorAll('.nav-item');
for (var i = 0; i < navItems.length; i++) {
    (function(item) {
        var submenu = item.querySelector('.nav-submenu');
        if (!submenu) return;

        item.addEventListener('mouseenter', function() {
            submenu.style.display = 'block';
            submenu.style.visibility = 'hidden';
            var rect = submenu.getBoundingClientRect();
            submenu.style.display = '';
            submenu.style.visibility = '';
            if (rect.right > window.innerWidth - 8) {
                submenu.classList.add('open-left');
            } else {
                submenu.classList.remove('open-left');
            }
        });

        item.addEventListener('mouseleave', function() {
            submenu.classList.remove('open-left');
        });
    })(navItems[i]);
}

}); // End DOMContentLoaded

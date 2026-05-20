<?php
require_once __DIR__ . '/includes/layout.php';
page_header('NDT Equipment, Service & Calibration', 'Tatva Marketing supplies and services ultrasonic testing, MPI and dye penetrant testing equipment for industrial NDT teams.');

function home_client_initials(string $name): string
{
    $cleanName = preg_replace('/[^A-Za-z0-9 ]/', ' ', $name);
    $words = preg_split('/\s+/', trim((string) $cleanName));
    $skipWords = ['and', 'the', 'pvt', 'ltd', 'private', 'limited', 'group', 'services'];
    $letters = [];

    foreach ($words as $word) {
        if ($word === '') {
            continue;
        }

        $lower = strtolower($word);
        if (in_array($lower, $skipWords, true)) {
            continue;
        }

        $letters[] = strtoupper($word[0]);
        if (count($letters) === 2) {
            break;
        }
    }

    return implode('', $letters) ?: strtoupper(substr($name, 0, 1));
}

function home_client_logo_key(string $value): string
{
    $value = strtolower(str_replace('&', ' and ', $value));
    return preg_replace('/[^a-z0-9]+/', '', $value) ?: '';
}

function home_client_logo_map(): array
{
    static $logos = null;

    if ($logos !== null) {
        return $logos;
    }

    $logos = [];
    $logoDir = __DIR__ . '/assets/images/clients';

    foreach (glob($logoDir . '/*.{avif,jpeg,jpg,png,svg,webp}', GLOB_BRACE) ?: [] as $file) {
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $filename = preg_replace('/\.(svg|png|jpg|jpeg|webp|avif)$/i', '', (string) $filename);
        $logos[home_client_logo_key($filename)] = 'assets/images/clients/' . basename($file);
    }

    return $logos;
}

function home_client_image(string $name): ?string
{
    $logos = home_client_logo_map();
    $aliases = [
        'larsenandtoubro' => 'larsenandtourbo',
    ];
    $key = home_client_logo_key($name);
    $candidateKeys = [$key];

    if (isset($aliases[$key])) {
        $candidateKeys[] = $aliases[$key];
    }

    foreach ($candidateKeys as $candidateKey) {
        if (isset($logos[$candidateKey])) {
            return $logos[$candidateKey];
        }
    }

    return null;
}
?>

<!-- ===== HERO CAROUSEL ===== -->
<section class="hero-carousel">
    <div class="hero-carousel-track h-full">
        <!-- Slide 1 -->
        <div class="hero-carousel-slide h-full" data-slide-label="Industrial NDT" data-slide-code="01">
            <div class="absolute inset-0">
                <img src="assets/images/banner/slider1.jpg" alt="NDT Equipment" class="h-full w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-900/85 via-slate-900/60 to-slate-900/30"></div>
            </div>
            <div class="relative mx-auto flex h-full max-w-7xl items-center px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <div class="hero-chip">Ultrasonic · MPI · PT</div>
                    <p class="hero-title text-sm font-bold uppercase tracking-widest text-brand-light">Established 1996</p>
                    <h1 class="hero-subtitle mt-4 text-4xl font-extrabold leading-tight text-white sm:text-5xl lg:text-6xl">Precision NDT Equipment for Industrial Excellence</h1>
                    <p class="hero-cta mt-6 text-lg leading-8 text-slate-200">Ultrasonic flaw detectors, MPI systems, and dye penetrant testing solutions backed by 28+ years of expertise.</p>
                    <div class="hero-cta mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="products.php" class="inline-flex justify-center rounded-full bg-brand px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-brand-dark/30 transition hover:bg-brand-dark hover:shadow-brand-dark/40">Explore Products</a>
                        <a href="contact-us.php" class="inline-flex justify-center rounded-full border border-white/30 bg-white/10 px-7 py-3.5 text-sm font-bold text-white backdrop-blur transition hover:bg-white/20">Request Quote</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="hero-carousel-slide h-full" data-slide-label="Rail Inspection" data-slide-code="02">
            <div class="absolute inset-0">
                <img src="assets/images/banner/slider2.jpg" alt="Ultrasonic Testing" class="h-full w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-900/85 via-slate-900/60 to-slate-900/30"></div>
            </div>
            <div class="relative mx-auto flex h-full max-w-7xl items-center px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <div class="hero-chip">Portable · Field Ready</div>
                    <p class="hero-title text-sm font-bold uppercase tracking-widest text-brand-light">Advanced Technology</p>
                    <h1 class="hero-subtitle mt-4 text-4xl font-extrabold leading-tight text-white sm:text-5xl lg:text-6xl">Ultrasonic Testing & Rail Inspection Systems</h1>
                    <p class="hero-cta mt-6 text-lg leading-8 text-slate-200">From portable flaw detectors to vehicular rail testers — equipment built for field reliability.</p>
                    <div class="hero-cta mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="products.php" class="inline-flex justify-center rounded-full bg-brand px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-brand-dark/30 transition hover:bg-brand-dark">View Range</a>
                        <a href="services.php" class="inline-flex justify-center rounded-full border border-white/30 bg-white/10 px-7 py-3.5 text-sm font-bold text-white backdrop-blur transition hover:bg-white/20">Our Services</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="hero-carousel-slide h-full" data-slide-label="Full Support" data-slide-code="03">
            <div class="absolute inset-0">
                <img src="assets/images/banner/slider3.jpg" alt="MPI Equipment" class="h-full w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-900/85 via-slate-900/60 to-slate-900/30"></div>
            </div>
            <div class="relative mx-auto flex h-full max-w-7xl items-center px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <div class="hero-chip">Equipment · Training · AMC</div>
                    <p class="hero-title text-sm font-bold uppercase tracking-widest text-brand-light">Complete Solutions</p>
                    <h1 class="hero-subtitle mt-4 text-4xl font-extrabold leading-tight text-white sm:text-5xl lg:text-6xl">MPI, Dye Penetrant & Full NDT Support</h1>
                    <p class="hero-cta mt-6 text-lg leading-8 text-slate-200">Equipment, consumables, training, and AMC — everything your inspection team needs.</p>
                    <div class="hero-cta mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="contact-us.php" class="inline-flex justify-center rounded-full bg-brand px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-brand-dark/30 transition hover:bg-brand-dark">Get In Touch</a>
                        <a href="clients.php" class="inline-flex justify-center rounded-full border border-white/30 bg-white/10 px-7 py-3.5 text-sm font-bold text-white backdrop-blur transition hover:bg-white/20">Our Clients</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Arrows -->
    <button class="hero-carousel-arrow prev" aria-label="Previous slide">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button class="hero-carousel-arrow next" aria-label="Next slide">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
    </button>

    <div class="hero-carousel-status" aria-hidden="true">
        <span class="hero-carousel-current">01</span>
        <span class="hero-carousel-rule"></span>
        <span class="hero-carousel-label">Industrial NDT</span>
    </div>
    <div class="hero-carousel-progress" aria-hidden="true">
        <span></span>
    </div>

    <!-- Dots -->
    <div class="hero-carousel-dots absolute bottom-6 left-0 right-0 z-20"></div>
</section>

<!-- ===== STATS BAR ===== -->
<section class="stats-section bg-white">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="stats-card reveal">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M4 11h16M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/></svg>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-ink">
                        <span data-counter="28" data-suffix="+" data-duration="2000">28+</span>
                    </div>
                    <p class="mt-1 text-sm font-semibold text-slate-600">Years in NDT</p>
                </div>
            </div>
            <div class="stats-card reveal reveal-delay-1">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-ink">
                        <span data-counter="50" data-suffix="+" data-duration="2000">50+</span>
                    </div>
                    <p class="mt-1 text-sm font-semibold text-slate-600">Product Models</p>
                </div>
            </div>
            <div class="stats-card reveal reveal-delay-2">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4m8-4a4 4 0 100-8 4 4 0 000 8zM9 10a4 4 0 100-8 4 4 0 000 8z"/></svg>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-ink">
                        <span data-counter="500" data-suffix="+" data-duration="2000">500+</span>
                    </div>
                    <p class="mt-1 text-sm font-semibold text-slate-600">Clients Served</p>
                </div>
            </div>
            <div class="stats-card reveal reveal-delay-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/></svg>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-ink">
                        <span data-counter="3" data-suffix="" data-duration="1500">3</span>
                    </div>
                    <p class="mt-1 text-sm font-semibold text-slate-600">NDT Methods</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== PRODUCT CATEGORIES ===== -->
<section class="product-lines-section py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-3xl">
                <?= section_eyebrow('Product Lines') ?>
                <h2 class="mt-4 text-3xl font-extrabold leading-tight text-ink sm:text-4xl lg:text-5xl">NDT equipment for field inspection, workshop testing and surface crack detection.</h2>
            </div>
            <p class="max-w-md text-base leading-7 text-slate-600">Explore practical instruments, MPI systems and penetrant testing materials selected for industrial inspection workflows.</p>
        </div>

        <div class="mt-12 grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
            <?php foreach ($productCategories as $index => $category): ?>
                <?php if ($index === 0): ?>
                    <a href="products.php" class="product-feature-card reveal group relative min-h-[460px] overflow-hidden rounded-3xl bg-ink text-white shadow-xl">
                        <img src="<?= e($category['image']) ?>" alt="<?= e($category['name']) ?>" class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-ink via-ink/55 to-transparent"></div>
                        <div class="relative flex h-full min-h-[460px] flex-col justify-end p-7 sm:p-9">
                            <span class="inline-flex w-fit rounded-full bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-wide text-brand-light backdrop-blur">Primary range</span>
                            <h3 class="mt-5 text-3xl font-extrabold leading-tight sm:text-4xl"><?= e($category['name']) ?></h3>
                            <p class="mt-4 max-w-xl text-base leading-7 text-slate-200"><?= e($category['summary']) ?></p>
                            <span class="mt-7 inline-flex w-fit items-center rounded-full bg-brand px-5 py-3 text-sm font-bold text-white transition group-hover:bg-brand-dark">
                                Explore range
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </span>
                        </div>
                    </a>
                    <div class="grid gap-6">
                <?php else: ?>
                    <a href="products.php" class="product-line-card reveal reveal-delay-<?= $index ?> group grid overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition sm:grid-cols-[0.92fr_1.08fr]">
                        <div class="min-h-56 overflow-hidden bg-slate-100">
                            <img src="<?= e($category['image']) ?>" alt="<?= e($category['name']) ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="flex flex-col justify-center p-6">
                            <span class="text-xs font-bold uppercase tracking-wide text-brand">Product line</span>
                            <h3 class="mt-3 text-2xl font-extrabold leading-tight text-ink"><?= e($category['name']) ?></h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600"><?= e($category['summary']) ?></p>
                            <span class="mt-5 inline-flex items-center text-sm font-bold text-brand transition group-hover:translate-x-1">
                                Explore range
                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </span>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ===== FEATURED PRODUCTS ===== -->
<section class="featured-products-section py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-start justify-between gap-6 lg:flex-row lg:items-end">
            <div class="max-w-2xl">
                <?= section_eyebrow('Featured') ?>
                <h2 class="mt-4 text-3xl font-extrabold leading-tight text-ink sm:text-4xl">Popular products inspectors ask for most.</h2>
                <p class="mt-4 text-lg leading-8 text-slate-600">A focused selection of high-demand instruments for ultrasonic testing, thickness measurement and MPI inspection.</p>
            </div>
            <a href="products.php" class="inline-flex items-center rounded-full bg-brand px-6 py-3 text-sm font-bold text-white transition hover:bg-brand-dark">
                View all products
                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <?php
        $featured = [
            ['name' => 'Einstein-II TFT', 'desc' => 'Digital ultrasonic flaw detector with colour display & PC connectivity.', 'img' => 'gifs/flaw-detector.jpg', 'link' => 'einstein-ii.php', 'tag' => 'Ultrasonic flaw detector'],
            ['name' => 'Arjun-20', 'desc' => 'Palmtop flaw detector with 10m test range & DGS/AVG software.', 'img' => 'gifs/main-instrument2.jpg', 'link' => 'arjun-20.php', 'tag' => 'Portable UT'],
            ['name' => 'Edison-1M', 'desc' => 'Ultrasonic thickness gauge with 2000-reading memory & PC link.', 'img' => 'gifs/ultrasonic-thickness-guage.jpg', 'link' => 'ultra-thickness.php', 'tag' => 'Thickness gauge'],
            ['name' => 'Y7 Yoke', 'desc' => 'Lightweight AC/DC electromagnetic yoke for MPI inspection.', 'img' => 'gifs/electromagnetic-Particls-Equipment.jpg', 'link' => 'yoke-mpi.php', 'tag' => 'MPI yoke'],
        ];
        $lead = $featured[0];
        ?>
        <div class="mt-12 grid gap-6 lg:grid-cols-[1.05fr_0.95fr]">
            <a href="<?= e($lead['link']) ?>" class="featured-main-card reveal group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition">
                <div class="grid h-full md:grid-cols-[1.05fr_0.95fr]">
                    <div class="flex flex-col justify-center p-7 sm:p-9">
                        <span class="text-xs font-bold uppercase tracking-wide text-brand"><?= e($lead['tag']) ?></span>
                        <h3 class="mt-4 text-3xl font-extrabold leading-tight text-ink sm:text-4xl"><?= e($lead['name']) ?></h3>
                        <p class="mt-4 text-base leading-7 text-slate-600"><?= e($lead['desc']) ?></p>
                        <span class="mt-7 inline-flex w-fit items-center rounded-full bg-ink px-5 py-3 text-sm font-bold text-white transition group-hover:bg-brand">
                            View product
                            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </span>
                    </div>
                    <div class="min-h-80 overflow-hidden bg-slate-100">
                        <img src="<?= e($lead['img']) ?>" alt="<?= e($lead['name']) ?>" class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
                    </div>
                </div>
            </a>

            <div class="grid gap-4">
                <?php foreach (array_slice($featured, 1) as $i => $item): ?>
                    <a href="<?= e($item['link']) ?>" class="featured-list-card reveal reveal-delay-<?= $i + 1 ?> group grid overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition sm:grid-cols-[150px_1fr]">
                        <div class="min-h-36 overflow-hidden bg-slate-100">
                            <img src="<?= e($item['img']) ?>" alt="<?= e($item['name']) ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="flex flex-col justify-center p-5">
                            <span class="text-xs font-bold uppercase tracking-wide text-brand"><?= e($item['tag']) ?></span>
                            <h3 class="mt-2 text-xl font-extrabold text-ink"><?= e($item['name']) ?></h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600"><?= e($item['desc']) ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ===== SERVICES ===== -->
<section class="service-section py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="service-shell grid overflow-hidden rounded-3xl bg-ink text-white lg:grid-cols-[0.9fr_1.1fr]">
            <div class="reveal flex flex-col justify-between gap-10 p-7 sm:p-10 lg:p-12">
                <p class="text-sm font-bold uppercase tracking-widest text-brand-light">Service Capability</p>
                <div>
                    <h2 class="text-3xl font-extrabold leading-tight sm:text-4xl lg:text-5xl">Support that keeps instruments working.</h2>
                    <p class="mt-5 text-base leading-8 text-slate-300">Tatva supports supplied equipment through servicing, AMC, recalibration, user training and NDT method consultancy.</p>
                </div>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="services.php" class="inline-flex items-center rounded-full bg-brand px-6 py-3 text-sm font-bold text-white transition hover:bg-brand-dark">View Services</a>
                    <a href="contact-us.php" class="inline-flex items-center rounded-full border border-white/20 bg-white/10 px-6 py-3 text-sm font-bold text-white transition hover:bg-white/15">Contact Us</a>
                </div>
            </div>
            <div class="bg-white p-4 sm:p-6 lg:p-8">
                <div class="grid gap-3">
                <?php
                $serviceIcons = [
                    '<svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
                    '<svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                    '<svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>',
                    '<svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
                    '<svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>',
                    '<svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>',
                ];
                foreach (array_slice($services, 0, 6) as $i => $service):
                ?>
                    <div class="service-row reveal <?= $i > 0 ? 'reveal-delay-' . $i : '' ?> grid gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-5 transition sm:grid-cols-[4rem_1fr] sm:items-center">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-brand text-sm font-extrabold text-white">
                            <?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?>
                        </div>
                        <p class="text-base font-bold leading-7 text-ink"><?= e($service) ?></p>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== WHY CHOOSE US ===== -->
<section class="bg-white py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <?= section_eyebrow('Why Tatva') ?>
            <h2 class="mt-4 text-3xl font-extrabold text-ink sm:text-4xl">Trusted by India's Leading Industries</h2>
        </div>
        <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <div class="reveal rounded-2xl bg-slate-50 p-8">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="mt-5 text-xl font-bold text-ink">Authorized Distribution</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">Authorized representatives of leading NDT manufacturers. Every product backed by genuine warranty and factory support.</p>
            </div>
            <div class="reveal reveal-delay-1 rounded-2xl bg-slate-50 p-8">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="mt-5 text-xl font-bold text-ink">After-Sales Support</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">In-house service engineers for repair, AMC, calibration and recertification. Minimize downtime with our responsive support.</p>
            </div>
            <div class="reveal reveal-delay-2 rounded-2xl bg-slate-50 p-8">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <h3 class="mt-5 text-xl font-bold text-ink">Training & Certification</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">NDT awareness programs and Level-I/II training in UT, MT and PT methods. Build capable inspection teams.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== CLIENTS ===== -->
<section class="partner-section py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-3xl">
                <?= section_eyebrow('Trusted Partners') ?>
                <h2 class="mt-4 text-3xl font-extrabold leading-tight text-ink sm:text-4xl">Industrial teams that trust Tatva.</h2>
                <p class="mt-5 text-base leading-7 text-slate-600">Public sector, rail, fabrication, cement and inspection companies rely on Tatva for practical NDT equipment support.</p>
            </div>
            <a href="clients.php" class="inline-flex w-fit rounded-full border border-brand/20 bg-white px-5 py-2.5 text-sm font-bold text-brand shadow-sm transition hover:border-brand hover:bg-brand hover:text-white">View all clients</a>
        </div>

        <div class="mt-12 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            <?php foreach (array_slice($clients, 0, 12) as $i => $client): ?>
                <?php $logo = home_client_image($client); ?>
                <article class="partner-card partner-logo-card reveal <?= $i % 5 > 0 ? 'reveal-delay-' . ($i % 5) : '' ?> overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition">
                    <div class="partner-logo-card__media">
                        <?php if ($logo): ?>
                            <img src="<?= e($logo) ?>" alt="<?= e($client) ?>">
                        <?php else: ?>
                            <span><?= e(home_client_initials($client)) ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="partner-logo-card__body">
                        <p class="text-xs font-bold uppercase tracking-wide text-brand">Selected customer</p>
                        <h3><?= e($client) ?></h3>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="cta-section bg-brand py-20 sm:py-24">
    <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl lg:text-5xl">Ready to upgrade your NDT capability?</h2>
        <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-brand-light">Talk to our team about equipment selection, service contracts, or training programs tailored to your inspection needs.</p>
        <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="contact-us.php" class="inline-flex items-center justify-center rounded-full bg-white px-8 py-4 text-base font-bold text-brand shadow-lg transition hover:bg-slate-100">Request a Quote</a>
            <a href="tel:+919560096820" class="inline-flex items-center justify-center rounded-full border border-white/30 bg-white/10 px-8 py-4 text-base font-bold text-white backdrop-blur transition hover:bg-white/20">Call +91 9560096820</a>
        </div>
    </div>
</section>

<?php page_footer(); ?>

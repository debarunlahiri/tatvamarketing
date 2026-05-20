<?php
require_once __DIR__ . '/includes/layout.php';
page_header('NDT Equipment, Service & Calibration', 'Tatva Marketing supplies and services ultrasonic testing, MPI and dye penetrant testing equipment for industrial NDT teams.');
?>
<section class="relative overflow-hidden bg-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:px-8 lg:py-20">
        <div class="flex flex-col justify-center">
            <?= section_eyebrow('Established 1996') ?>
            <h1 class="mt-5 max-w-4xl text-4xl font-extrabold leading-tight text-ink sm:text-5xl lg:text-6xl">NDT equipment supply, service and calibration without the clutter.</h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600">Tatva Marketing & Services Pvt. Ltd. supplies ultrasonic testing equipment, MPI systems, dye penetrant chemicals and accessories backed by trained service and calibration engineers.</p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="products.php" class="inline-flex justify-center rounded-full bg-brand px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-emerald-800">Explore products</a>
                <a href="contact-us.php" class="inline-flex justify-center rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-bold text-ink transition hover:border-brand hover:text-brand">Request quote</a>
            </div>
            <dl class="mt-10 grid max-w-2xl grid-cols-3 gap-4 border-t border-slate-200 pt-8">
                <div>
                    <dt class="text-3xl font-extrabold text-ink">28+</dt>
                    <dd class="mt-1 text-sm text-slate-600">Years in NDT</dd>
                </div>
                <div>
                    <dt class="text-3xl font-extrabold text-ink">UT</dt>
                    <dd class="mt-1 text-sm text-slate-600">Flaw detection</dd>
                </div>
                <div>
                    <dt class="text-3xl font-extrabold text-ink">MT/PT</dt>
                    <dd class="mt-1 text-sm text-slate-600">Inspection support</dd>
                </div>
            </dl>
        </div>
        <div class="relative min-h-[440px] overflow-hidden rounded-[2rem] bg-slate-900 shadow-2xl hero-media">
            <img src="assets/images/banner/slider1.jpg" alt="Industrial testing equipment" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 z-10 p-6 sm:p-8">
                <div class="max-w-md rounded-2xl bg-white/92 p-5 shadow-xl backdrop-blur">
                    <p class="text-sm font-bold uppercase tracking-wide text-brand">Core range</p>
                    <p class="mt-2 text-2xl font-extrabold text-ink">Ultrasonic testing, MPI equipment and dye penetrant products.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-slate-50 py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <?= section_eyebrow('Product lines') ?>
            <h2 class="mt-3 text-3xl font-extrabold text-ink sm:text-4xl">Focused NDT equipment for field and shop-floor inspection.</h2>
        </div>
        <div class="mt-10 grid gap-6 md:grid-cols-3">
            <?php foreach ($productCategories as $category): ?>
                <a href="products.php" class="product-card reveal overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="aspect-[4/3] overflow-hidden bg-slate-100">
                        <img src="<?= e($category['image']) ?>" alt="<?= e($category['name']) ?>" class="h-full w-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-extrabold text-ink"><?= e($category['name']) ?></h3>
                        <p class="mt-3 text-sm leading-6 text-slate-600"><?= e($category['summary']) ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="bg-white py-16 sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.8fr_1.2fr] lg:px-8">
        <div>
            <?= section_eyebrow('Service capability') ?>
            <h2 class="mt-3 text-3xl font-extrabold text-ink sm:text-4xl">Supply is only one part of the job.</h2>
            <p class="mt-5 text-base leading-7 text-slate-600">Tatva supports the instruments it supplies through servicing, AMC, recalibration, user training and NDT method consultancy.</p>
            <a href="services.php" class="mt-7 inline-flex rounded-full bg-ink px-6 py-3 text-sm font-bold text-white transition hover:bg-slate-700">View services</a>
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <?php foreach (array_slice($services, 0, 6) as $service): ?>
                <div class="reveal rounded-2xl border border-slate-200 bg-slate-50 p-5">
                    <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 text-brand">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-5 w-5"><path d="M20 6 9 17l-5-5"/></svg>
                    </div>
                    <p class="text-sm font-semibold leading-6 text-slate-800"><?= e($service) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="bg-ink py-16 text-white sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[0.7fr_1.3fr]">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-emerald-200">Trusted by</p>
                <h2 class="mt-3 text-3xl font-extrabold sm:text-4xl">Industrial, rail and manufacturing teams across India.</h2>
            </div>
            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4">
                <?php foreach (array_slice($clients, 0, 12) as $client): ?>
                    <div class="rounded-xl border border-white/10 bg-white/7 px-4 py-4 text-sm font-semibold text-slate-100"><?= e($client) ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php page_footer(); ?>

<?php
require_once __DIR__ . '/includes/layout.php';
page_header('Services', 'Servicing, AMC, recalibration, seminars, training and consultancy for UT, MT and PT NDT methods.');
?>
<section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <?= section_eyebrow('Services') ?>
            <h1 class="mt-4 text-4xl font-extrabold text-ink sm:text-5xl">Service, AMC, recalibration and NDT training.</h1>
            <p class="mt-5 text-lg leading-8 text-slate-600">Tatva provides servicing, AMC and recalibration for instruments supplied by the company, along with seminars, awareness programs and method-level training support.</p>
        </div>
        <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($services as $service): ?>
                <div class="reveal rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-full bg-emerald-100 text-brand">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-5 w-5"><path d="M12 2v20M2 12h20"/><circle cx="12" cy="12" r="8"/></svg>
                    </div>
                    <p class="font-semibold leading-7 text-slate-800"><?= e($service) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="bg-ink py-14 text-white">
    <div class="mx-auto flex max-w-7xl flex-col gap-6 px-4 sm:px-6 md:flex-row md:items-center md:justify-between lg:px-8">
        <div>
            <h2 class="text-2xl font-extrabold">Need support for an existing instrument?</h2>
            <p class="mt-2 text-sm text-slate-300">Share the model, issue and calibration requirement. Tatva will respond with the practical next step.</p>
        </div>
        <a href="contact-us.php" class="inline-flex justify-center rounded-full bg-white px-6 py-3 text-sm font-bold text-ink transition hover:bg-emerald-100">Contact service team</a>
    </div>
</section>
<?php page_footer(); ?>

<?php
require_once __DIR__ . '/includes/layout.php';
page_header('Clients', 'Representative clients served by Tatva Marketing across railways, manufacturing, cement, engineering and NDT services.');
?>
<section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <?= section_eyebrow('Clients') ?>
            <h1 class="mt-4 text-4xl font-extrabold text-ink sm:text-5xl">Trusted by inspection, manufacturing and infrastructure teams.</h1>
            <p class="mt-5 text-lg leading-8 text-slate-600">Tatva has supplied and supported NDT equipment for public sector, rail, engineering, cement, fabrication and inspection service organizations.</p>
        </div>
        <div class="mt-10 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($clients as $client): ?>
                <div class="rounded-xl border border-slate-200 bg-slate-50 px-4 py-4 text-sm font-semibold text-slate-800"><?= e($client) ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php page_footer(); ?>

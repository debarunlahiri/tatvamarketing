<?php
require_once __DIR__ . '/includes/layout.php';
page_header('Products', 'Ultrasonic testing equipment, MPI equipment, dye penetrant testing materials and NDT accessories supplied by Tatva Marketing.');
?>
<section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl">
            <?= section_eyebrow('Products') ?>
            <h1 class="mt-4 text-4xl font-extrabold leading-tight text-ink sm:text-5xl">Ultrasonic, MPI and dye penetrant testing products.</h1>
            <p class="mt-5 text-lg leading-8 text-slate-600">A focused range of ultrasonic flaw detectors, thickness gauges, rail testers, MPI equipment, electromagnetic crack detectors, accessories, consumables and penetrant chemicals supplied through reliable vendor partnerships.</p>
        </div>
        <div class="mt-8 flex flex-wrap gap-3">
            <?php foreach ($productCategories as $category): ?>
                <?php $anchor = strtolower(str_replace([' ', '&'], ['-', 'and'], $category['name'])); ?>
                <a href="#<?= e($anchor) ?>" class="rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-bold text-slate-700 transition hover:border-brand hover:text-brand"><?= e($category['name']) ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php foreach ($productCategories as $index => $category): ?>
    <?php $id = strtolower(str_replace([' ', '&'], ['-', 'and'], $category['name'])); ?>
    <section id="<?= e($id) ?>" class="<?= $index % 2 === 0 ? 'bg-slate-50' : 'bg-white' ?> py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="product-category-band">
                <div class="product-category-media overflow-hidden">
                    <img src="<?= e($category['image']) ?>" alt="<?= e($category['name']) ?>" class="h-full w-full object-cover">
                </div>
                <div class="product-category-copy">
                    <h2><?= e($category['name']) ?></h2>
                    <p><?= e($category['summary']) ?></p>
                </div>
            </div>
            <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($category['items'] as $item): ?>
                    <article class="product-card reveal overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                        <div class="aspect-[4/3] overflow-hidden bg-slate-100">
                            <img src="<?= e($item['image']) ?>" alt="<?= e($item['name']) ?>" class="h-full w-full object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-extrabold text-ink"><?= e($item['name']) ?></h3>
                            <p class="mt-3 min-h-20 text-sm leading-6 text-slate-600"><?= e($item['summary']) ?></p>
                            <a href="<?= e($item['href']) ?>" class="mt-5 inline-flex rounded-full border border-slate-300 px-4 py-2 text-sm font-bold text-slate-800 transition hover:border-brand hover:text-brand" <?= str_starts_with($item['href'], 'documents/') ? 'target="_blank" rel="noopener"' : '' ?>>View details</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endforeach; ?>

<?php page_footer(); ?>

<?php
require_once __DIR__ . '/includes/layout.php';
page_header('About Us', 'Established in 2007, Tatva Marketing supplies and services NDT equipment and accessories across India.');
?>
<section class="bg-white py-16 sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
        <div>
            <?= section_eyebrow('Company overview') ?>
            <h1 class="mt-4 text-4xl font-extrabold leading-tight text-ink sm:text-5xl">A practical NDT equipment partner since 2007.</h1>
            <p class="mt-6 text-lg leading-8 text-slate-600">Tatva Marketing & Services Pvt. Ltd. is engaged in supplying and servicing ultrasonic testing equipment and accessories, MPI equipment and accessories, dye penetrant chemicals and related NDT products.</p>
            <p class="mt-4 text-base leading-7 text-slate-600">The company works with reputed principals and supports clients through product selection, logistics, servicing, calibration and training.</p>
        </div>
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-100 shadow-sm">
            <img src="assets/images/img-1.jpg" alt="Tatva Marketing office and equipment support" class="h-full min-h-[360px] w-full object-cover">
        </div>
    </div>
</section>

<section class="bg-slate-50 py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-3">
            <article class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                <h2 class="text-xl font-extrabold text-ink">Our Team</h2>
                <p class="mt-4 text-sm leading-7 text-slate-600">Tatva has professional engineers, technicians and marketing professionals. Its servicing and calibration engineers are trained at manufacturer facilities to understand client requirements and maintain equipment performance.</p>
            </article>
            <article class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                <h2 class="text-xl font-extrabold text-ink">Client Focus</h2>
                <p class="mt-4 text-sm leading-7 text-slate-600">The company supplies products in varied technical specifications and supports customers with timely delivery, responsive logistics and after-sales service.</p>
            </article>
            <article class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                <h2 class="text-xl font-extrabold text-ink">Core People</h2>
                <ul class="mt-4 space-y-3 text-sm font-semibold text-slate-700">
                    <li>Engineers</li>
                    <li>Marketing professionals</li>
                    <li>Sales associates</li>
                    <li>Technicians</li>
                </ul>
            </article>
        </div>
    </div>
</section>
<?php page_footer(); ?>

<?php
require_once __DIR__ . '/includes/layout.php';
page_header('Contact Us', 'Contact Tatva Marketing for NDT equipment supply, service, AMC, calibration and quote requests.');
?>
<section class="bg-white py-16 sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:px-8">
        <div>
            <?= section_eyebrow('Contact') ?>
            <h1 class="mt-4 text-4xl font-extrabold text-ink sm:text-5xl">Talk to Tatva about equipment, service or calibration.</h1>
            <div class="mt-8 space-y-5 text-slate-700">
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-sm font-bold uppercase tracking-wide text-brand">Address</p>
                    <p class="mt-2 leading-7"><?= e($company['address']) ?></p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-sm font-bold uppercase tracking-wide text-brand">Phone</p>
                    <p class="mt-2 font-semibold"><?= e($company['phone']) ?></p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-sm font-bold uppercase tracking-wide text-brand">Email</p>
                    <p class="mt-2 font-semibold"><?= e($company['email']) ?></p>
                    <p class="mt-1 font-semibold"><?= e($company['alt_email']) ?></p>
                </div>
            </div>
        </div>
        <form class="rounded-3xl border border-slate-200 bg-slate-50 p-6 shadow-sm sm:p-8" action="mailto:tatva@tatvamarketing.com" method="post" enctype="text/plain">
            <div class="grid gap-5">
                <label class="grid gap-2">
                    <span class="text-sm font-semibold text-slate-700">Name</span>
                    <input class="field" name="name" type="text" required>
                </label>
                <label class="grid gap-2">
                    <span class="text-sm font-semibold text-slate-700">Email</span>
                    <input class="field" name="email" type="email" required>
                </label>
                <label class="grid gap-2">
                    <span class="text-sm font-semibold text-slate-700">Phone</span>
                    <input class="field" name="phone" type="tel">
                </label>
                <label class="grid gap-2">
                    <span class="text-sm font-semibold text-slate-700">Requirement</span>
                    <textarea class="field min-h-36" name="message" required></textarea>
                </label>
                <button class="rounded-full bg-brand px-6 py-3 text-sm font-bold text-white transition hover:bg-emerald-800" type="submit">Send enquiry</button>
            </div>
        </form>
    </div>
</section>
<?php page_footer(); ?>

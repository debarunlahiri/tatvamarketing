<?php
require_once __DIR__ . '/includes/layout.php';
page_header('About Us', 'Tatva Marketing & Services Private Limited supplies NDT equipment, instruments and accessories across India.');

$proofStats = [
    ['value' => '2007', 'label' => 'Established'],
    ['value' => 'Ghaziabad', 'label' => 'Uttar Pradesh'],
    ['value' => '3', 'label' => 'Core methods'],
    ['value' => 'India', 'label' => 'Nationwide supply'],
];

$capabilities = [
    [
        'title' => 'Qualitative NDT Product Range',
        'copy' => 'Distribution and supply of ultrasonic thickness gauges, ultrasonic accessories, ultrasonic rail testers, MPI equipment, electromagnetic crack detectors and horizontal stationery MPI systems.',
        'image' => 'gifs/EINSTEIN-II-DGS.jpg',
    ],
    [
        'title' => 'Reliable Vendor Base',
        'copy' => 'Associated vendors manufacture products using high grade components and cutting-edge technology in compliance with global quality standards.',
        'image' => 'gifs/arjun_30.png',
    ],
    [
        'title' => 'Warehousing & Logistics',
        'copy' => 'A well-equipped warehousing base and logistics support help keep products stored safely and delivered on time across India.',
        'image' => 'gifs/edisson1.png',
    ],
];

$supportAreas = [
    ['icon' => 'fa-search', 'title' => 'Equipment Selection', 'copy' => 'Guidance for choosing UT, MT and PT instruments based on inspection method, site condition and required specification.'],
    ['icon' => 'fa-cogs', 'title' => 'Application Support', 'copy' => 'Help for teams using flaw detectors, thickness gauges, MPI systems, yokes, UV lamps and accessories in routine inspection work.'],
    ['icon' => 'fa-truck', 'title' => 'Supply Coordination', 'copy' => 'Product availability, quotation, dispatch and after-sales coordination for customers across India.'],
];

$buyerChecklist = [
    'UT flaw detectors and thickness gauges',
    'MPI bench, prod and yoke systems',
    'UV black lights, gauss meters and accessories',
    'Dye penetrant materials and consumables',
    'Servicing, AMC and recalibration support',
];
?>

<section class="hero-carousel about-page-carousel">
    <div class="hero-carousel-track h-full">
        <div class="hero-carousel-slide h-full" data-slide-label="About Tatva" data-slide-code="01">
            <div class="absolute inset-0 about-carousel-bg" aria-hidden="true"></div>
            <div class="relative mx-auto flex h-full max-w-7xl items-center px-4 sm:px-6 lg:px-8">
                <div class="max-w-5xl">
                    <div class="hero-chip">Tatva Marketing & Services Private Limited</div>
                    <h1 class="hero-subtitle mt-6 text-5xl font-extrabold leading-tight text-white sm:text-6xl lg:text-7xl">Supplier of ultrasonic and magnetic particle testing equipment</h1>
                    <p class="hero-cta mt-8 max-w-4xl text-xl leading-9 text-slate-200">Tatva Marketing & Services Pvt. Ltd. distributes NDT instruments, rail testing systems, MPI equipment, accessories and dye penetrant materials for industrial customers across India.</p>
                    <div class="hero-cta mt-10 flex flex-col gap-4 sm:flex-row">
                        <a href="products.php" class="inline-flex justify-center rounded-full bg-brand px-8 py-4 text-base font-bold text-white shadow-lg shadow-brand-dark/30 transition hover:bg-brand-dark">Explore Products</a>
                        <a href="contact-us.php" class="inline-flex justify-center rounded-full border border-white/30 bg-white/10 px-8 py-4 text-base font-bold text-white backdrop-blur transition hover:bg-white/20">Talk to Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-proof">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="about-proof__grid">
            <?php foreach ($proofStats as $index => $stat): ?>
                <article class="about-stat reveal <?= $index > 0 ? 'reveal-delay-' . $index : '' ?>">
                    <strong><?= e($stat['value']) ?></strong>
                    <span><?= e($stat['label']) ?></span>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="about-story-section">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[0.82fr_1.18fr] lg:px-8">
        <div class="about-section-heading reveal">
            <?= section_eyebrow('Company Overview') ?>
            <h2>Tatva Marketing & Services Private Limited</h2>
        </div>
        <div class="about-story reveal reveal-delay-1">
            <p>Established in the year 2007 at Ghaziabad, Uttar Pradesh, India, Tatva Marketing & Services Pvt. Ltd. is occupied in distributing and supplying a qualitative assortment of ultrasonic thickness gauges, ultrasonic accessories, ultrasonic rail testers, MPI equipment, electromagnetic crack detectors and MPI equipment horizontal stationeries.</p>
            <p>These products are manufactured at vendors' advanced manufacturing units using high grade components and innovative technology as per global quality norms. Owing to attributes such as high efficiency, robust design, hassle-free functionality and reliability, these products are demanded across the nation.</p>
            <p>Clients can avail products in various technical specifications at affordable prices. Some reputed clients include A.M. Steel Castings Pvt. Ltd., A.R. Inspection Services, ABG Shipyard Ltd, Alstom Projects India Ltd and Automotive Stampings & Assemblies Ltd.</p>
            <p>Tatva is associated with reliable vendors of the market. The vendor selection process is handled by procuring agents based on production base, delivery schedule, market credibility, production techniques, product quality and track record.</p>
        </div>
    </div>
</section>

<section class="about-capabilities">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="about-section-heading about-section-heading--wide reveal">
            <?= section_eyebrow('Capabilities') ?>
            <h2>Vendor-backed NDT instruments supplied for industrial inspection needs.</h2>
        </div>
        <div class="about-capability-grid">
            <?php foreach ($capabilities as $index => $item): ?>
                <article class="about-capability reveal <?= $index > 0 ? 'reveal-delay-' . $index : '' ?>">
                    <div class="about-capability__image">
                        <img src="<?= e($item['image']) ?>" alt="<?= e($item['title']) ?>">
                    </div>
                    <div class="about-capability__body">
                        <h3><?= e($item['title']) ?></h3>
                        <p><?= e($item['copy']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="about-timeline-section">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:px-8">
        <div class="about-team-card reveal">
            <div>
                <?= section_eyebrow('Our Team') ?>
                <h2>Professional teams focused on inspection, testing and measuring instruments.</h2>
                <p>We have expert and professional engineers, technicians, quality analysts, marketing professionals and other team members who understand client requirements and are dedicated to supplying quality instruments as per customer needs.</p>
            </div>
            <div class="about-team-tags">
                <span>Technicians</span>
                <span>Designers</span>
                <span>Quality controllers</span>
                <span>Administrative personnel</span>
                <span>Sales associates</span>
            </div>
        </div>

        <div class="about-support-panel reveal reveal-delay-2">
            <div class="about-support-panel__heading">
                <?= section_eyebrow('How We Help') ?>
                <h2>Support for buying, using and maintaining NDT equipment.</h2>
            </div>

            <div class="about-support-grid">
                <?php foreach ($supportAreas as $index => $item): ?>
                    <article class="about-support-card <?= $index > 0 ? 'reveal-delay-' . $index : '' ?>">
                        <span><i class="fa <?= e($item['icon']) ?>" aria-hidden="true"></i></span>
                        <div>
                            <h3><?= e($item['title']) ?></h3>
                            <p><?= e($item['copy']) ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="about-buyer-checklist">
                <?php foreach ($buyerChecklist as $item): ?>
                    <span><i class="fa fa-check" aria-hidden="true"></i><?= e($item) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="about-cta">
    <div class="about-cta__inner reveal">
        <div>
            <p>Need help choosing or servicing NDT equipment?</p>
            <h2>Talk to our customer support team for product and service.</h2>
        </div>
        <a href="contact-us.php">Request a Quote</a>
    </div>
</section>

<?php page_footer(); ?>

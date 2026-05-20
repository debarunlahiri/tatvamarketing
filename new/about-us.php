<?php
require_once __DIR__ . '/includes/layout.php';
page_header('About Us', 'Established in 1996, Tatva Marketing supplies and services NDT equipment and accessories across India.');

$proofStats = [
    ['value' => '1996', 'label' => 'Established'],
    ['value' => '28+', 'label' => 'Years in NDT'],
    ['value' => '3', 'label' => 'Core methods'],
    ['value' => '500+', 'label' => 'Clients served'],
];

$capabilities = [
    [
        'title' => 'Equipment Selection',
        'copy' => 'Practical product guidance across ultrasonic testing, magnetic particle testing and dye penetrant testing applications.',
        'image' => 'gifs/ultrasonic-equipment.jpg',
    ],
    [
        'title' => 'Service & Calibration',
        'copy' => 'Responsive servicing, AMC, recalibration and technical support for inspection instruments and accessories.',
        'image' => 'gifs/flaw-detector.jpg',
    ],
    [
        'title' => 'Training Support',
        'copy' => 'Awareness programs, operator training and NDT method support for teams working in demanding industrial environments.',
        'image' => 'gifs/main-instrument2.jpg',
    ],
];

$timeline = [
    ['year' => '1996', 'title' => 'Foundation', 'copy' => 'Tatva began as a focused supplier for practical industrial NDT equipment needs.'],
    ['year' => 'Today', 'title' => 'National Support', 'copy' => 'The team supports inspection teams across product selection, delivery, service, calibration and training.'],
    ['year' => 'Next', 'title' => 'Reliable Growth', 'copy' => 'Continued focus on dependable instruments, responsive service and long-term customer relationships.'],
];
?>

<section class="about-hero">
    <div class="about-hero__media" aria-hidden="true">
        <img src="assets/images/img-1.jpg" alt="">
    </div>
    <div class="about-hero__inner">
        <div class="about-hero__copy reveal">
            <span class="about-kicker">Tatva Marketing & Services Pvt. Ltd.</span>
            <h1>A practical NDT equipment partner since 1996.</h1>
            <p>Tatva Marketing supplies and services ultrasonic testing equipment, MPI equipment, dye penetrant chemicals and related accessories for industrial inspection teams across India.</p>
            <div class="about-hero__actions">
                <a href="products.php" class="about-primary-link">Explore Products</a>
                <a href="contact-us.php" class="about-secondary-link">Talk to Support</a>
            </div>
        </div>
        <div class="about-hero__panel reveal reveal-delay-2">
            <p class="about-panel__eyebrow">What we handle</p>
            <div class="about-panel__list">
                <span>Product selection</span>
                <span>Logistics coordination</span>
                <span>Servicing & AMC</span>
                <span>Calibration support</span>
                <span>Training & consultancy</span>
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
            <?= section_eyebrow('Company overview') ?>
            <h2>Built around field realities, not catalog pages.</h2>
        </div>
        <div class="about-story reveal reveal-delay-1">
            <p>Tatva works with reputed principals and supports customers through product selection, logistics, servicing, calibration and training. The focus is straightforward: help inspection teams choose the right equipment, keep it working and get support when it matters.</p>
            <p>The company has professional engineers, technicians, marketing professionals and sales associates. Its servicing and calibration engineers are trained at manufacturer facilities to understand client requirements and maintain equipment performance.</p>
        </div>
    </div>
</section>

<section class="about-capabilities">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="about-section-heading about-section-heading--wide reveal">
            <?= section_eyebrow('Capabilities') ?>
            <h2>Support across the full NDT equipment lifecycle.</h2>
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
                <?= section_eyebrow('People') ?>
                <h2>Engineers, technicians and commercial support in one loop.</h2>
                <p>Tatva combines technical and customer-facing teams so product enquiries, service calls and delivery needs move through one coordinated workflow.</p>
            </div>
            <div class="about-team-tags">
                <span>Engineers</span>
                <span>Technicians</span>
                <span>Marketing professionals</span>
                <span>Sales associates</span>
            </div>
        </div>

        <div class="about-timeline reveal reveal-delay-2">
            <?php foreach ($timeline as $item): ?>
                <article class="about-timeline__item">
                    <span><?= e($item['year']) ?></span>
                    <div>
                        <h3><?= e($item['title']) ?></h3>
                        <p><?= e($item['copy']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="about-cta">
    <div class="about-cta__inner reveal">
        <div>
            <p>Need help choosing or servicing NDT equipment?</p>
            <h2>Talk to Tatva for practical product and service support.</h2>
        </div>
        <a href="contact-us.php">Request a Quote</a>
    </div>
</section>

<?php page_footer(); ?>

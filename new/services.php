<?php
require_once __DIR__ . '/includes/layout.php';
page_header('Services', 'Servicing, AMC, recalibration, seminars, training and consultancy for UT, MT and PT NDT methods.');

$serviceCards = [
    ['icon' => 'fa-stethoscope', 'label' => 'Instrument care', 'title' => 'Servicing, AMC and recalibration of ultrasonic flaw detectors', 'copy' => 'Diagnosis, preventive maintenance and calibration support for field and workshop UT instruments.'],
    ['icon' => 'fa-tachometer', 'label' => 'Measurement', 'title' => 'Servicing, AMC and recalibration of ultrasonic thickness gauges', 'copy' => 'Support for thickness gauges used in routine inspection, maintenance and material measurement workflows.'],
    ['icon' => 'fa-magnet', 'label' => 'MPI systems', 'title' => 'MPI equipment service for bench type, prod type and AC/DC yoke systems', 'copy' => 'Service support for magnetic crack detectors, yokes, power sources and shop-floor MPI systems.'],
    ['icon' => 'fa-lightbulb-o', 'label' => 'Accessories', 'title' => 'Gauss meter, residual magnetic field indicator and UV black light support', 'copy' => 'Accessory checks and support for the instruments that keep MT and PT inspection dependable.'],
    ['icon' => 'fa-bullhorn', 'label' => 'Awareness', 'title' => 'Seminars and awareness programs in UT, MT and PT methods', 'copy' => 'Practical method awareness sessions for teams choosing or operating NDT equipment.'],
    ['icon' => 'fa-graduation-cap', 'label' => 'Training', 'title' => 'Training, certification and consultancy for Level-I/II UT, MT and PT', 'copy' => 'Method-level training and consultancy support for inspection teams building capability.'],
];

$processSteps = [
    ['step' => '01', 'title' => 'Share the issue', 'copy' => 'Send the model, serial number, current issue and required calibration or service scope.'],
    ['step' => '02', 'title' => 'Technical review', 'copy' => 'Tatva reviews the instrument category, likely cause and practical next step.'],
    ['step' => '03', 'title' => 'Service action', 'copy' => 'The team coordinates service, AMC, recalibration, training or method support as required.'],
];

$coverage = [
    'Ultrasonic flaw detectors',
    'Ultrasonic thickness gauges',
    'Bench type MPI equipment',
    'Prod type MPI equipment',
    'AC/DC yoke systems',
    'Gauss meters and UV black lights',
    'UT, MT and PT awareness programs',
    'Level-I/II training support',
];
?>

<section class="services-hero">
    <div class="services-hero__media" aria-hidden="true">
        <img src="gifs/flaw-detector.jpg" alt="">
    </div>
    <div class="services-hero__inner">
        <div class="services-hero__copy reveal">
            <span class="services-kicker">Service · AMC · Calibration · Training</span>
            <h1>Support that keeps NDT instruments working.</h1>
            <p>Tatva provides servicing, AMC, recalibration, seminars, awareness programs and method-level support for UT, MT and PT.</p>
            <div class="services-hero__actions">
                <a href="contact-us.php" class="services-primary-link">Request Service</a>
                <a href="#service-catalog" class="services-secondary-link">View Coverage</a>
            </div>
        </div>

        <div class="services-hero__panel reveal reveal-delay-2">
            <span>Service desk</span>
            <strong>Share the model, issue and calibration requirement.</strong>
            <p>Tatva will respond with the practical next step for repair, AMC or recalibration.</p>
        </div>
    </div>
</section>

<section class="services-proof">
    <div class="services-proof__inner">
        <article class="reveal">
            <strong>UT</strong>
            <span>Flaw detectors, thickness gauges and accessories</span>
        </article>
        <article class="reveal reveal-delay-1">
            <strong>MT</strong>
            <span>MPI systems, Bench Type, Prod Type, Yokes, Accessories & Consumables</span>
        </article>
        <article class="reveal reveal-delay-2">
            <strong>PT</strong>
            <span>Dye Penetrant Chemicals, (Fluorescent, Non Fluorescent) & accessories conforming to international and national standards</span>
        </article>
        <article class="reveal reveal-delay-3">
            <strong>AMC</strong>
            <span>Preventive Maintenance Support</span>
        </article>
    </div>
</section>

<section id="service-catalog" class="services-catalog">
    <div class="services-container">
        <div class="services-section-heading reveal">
            <?= section_eyebrow('Service Coverage') ?>
            <h2>Practical support for inspection instruments and NDT teams.</h2>
            <p>Choose the service area that matches your equipment or team requirement.</p>
        </div>

        <div class="services-card-grid">
            <?php foreach ($serviceCards as $index => $item): ?>
                <article class="services-card reveal <?= $index > 0 ? 'reveal-delay-' . min($index, 5) : '' ?>">
                    <div class="services-card__icon">
                        <i class="fa <?= e($item['icon']) ?>" aria-hidden="true"></i>
                    </div>
                    <span><?= e($item['label']) ?></span>
                    <h3><?= e($item['title']) ?></h3>
                    <p><?= e($item['copy']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="services-process">
    <div class="services-container services-process__grid">
        <div class="services-section-heading reveal">
            <?= section_eyebrow('How It Works') ?>
            <h2>A clear path from issue to action.</h2>
        </div>
        <div class="services-process__steps">
            <?php foreach ($processSteps as $index => $step): ?>
                <article class="services-process-step reveal <?= $index > 0 ? 'reveal-delay-' . $index : '' ?>">
                    <span><?= e($step['step']) ?></span>
                    <div>
                        <h3><?= e($step['title']) ?></h3>
                        <p><?= e($step['copy']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="services-coverage">
    <div class="services-container services-coverage__inner">
        <div class="services-coverage__copy reveal">
            <?= section_eyebrow('Equipment & Methods') ?>
            <h2>Coverage across UT, MT and PT workflows.</h2>
            <p>From instrument support to user awareness, Tatva helps teams keep inspection work moving with fewer interruptions.</p>
        </div>
        <div class="services-coverage__list reveal reveal-delay-2">
            <?php foreach ($coverage as $item): ?>
                <span><i class="fa fa-check" aria-hidden="true"></i><?= e($item) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="services-cta">
    <div class="services-cta__inner reveal">
        <div>
            <p>Need support for an existing instrument?</p>
            <h2>Send the model, issue and calibration requirement.</h2>
        </div>
        <a href="contact-us.php">Contact Service Team</a>
    </div>
</section>

<?php page_footer(); ?>

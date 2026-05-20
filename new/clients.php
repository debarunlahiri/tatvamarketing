<?php
require_once __DIR__ . '/includes/layout.php';
page_header('Clients', 'Representative clients served by Tatva Marketing across railways, manufacturing, cement, engineering and NDT services.');

function client_initials(string $name): string
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

function client_slug(string $name): string
{
    $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $name));
    return trim((string) $slug, '-');
}

function client_logo_key(string $value): string
{
    $value = strtolower(str_replace('&', ' and ', $value));
    return preg_replace('/[^a-z0-9]+/', '', $value) ?: '';
}

function client_logo_map(): array
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
        $logos[client_logo_key($filename)] = 'assets/images/clients/' . basename($file);
    }

    return $logos;
}

function client_image(string $name): ?string
{
    $logos = client_logo_map();
    $aliases = [
        'larsenandtoubro' => 'larsenandtourbo',
    ];
    $key = client_logo_key($name);
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

$clientGroups = [
    [
        'label' => 'Railways & public sector',
        'summary' => 'High-reliability supply and service support for infrastructure and public sector inspection teams.',
        'clients' => [
            'Indian Railways',
            'BHEL',
            'NPCIL',
        ],
    ],
    [
        'label' => 'Engineering & manufacturing',
        'summary' => 'Inspection equipment for fabrication, heavy engineering, wire, components and industrial production teams.',
        'clients' => [
            'ISGEC',
            'DCM Shriram Group',
            'Dee Development Engineers',
            'Star Wires',
            'Larsen & Toubro',
            'Good Luck Engineering',
            'Sharu Industries',
        ],
    ],
    [
        'label' => 'Cement & process plants',
        'summary' => 'NDT products and service support for maintenance-heavy plant environments.',
        'clients' => [
            'Ultratech Cements',
            'Shree Cements',
        ],
    ],
    [
        'label' => 'Inspection & NDT service providers',
        'summary' => 'Reliable instruments and accessories for teams delivering inspection services across industries.',
        'clients' => [
            'A.R. Inspection Services',
            'Industrial Radiographic Services Pvt. Ltd.',
            'IRC Engineering Services (I) Pvt. Ltd.',
            'RUMP Inspection & Engineering Services (P) Ltd.',
            'Unique NDT Services',
            'Material Evaluation Services (Mumbai) Pvt. Ltd.',
            'Radiographic Inspection Services',
            'Quality Evaluation Services',
        ],
    ],
];

$featuredClients = [
    'Indian Railways',
    'BHEL',
    'NPCIL',
    'Larsen & Toubro',
    'Ultratech Cements',
    'Shree Cements',
];
?>
<section class="clients-hero">
    <div class="clients-hero__inner">
        <div class="clients-hero__copy reveal">
            <?= section_eyebrow('Clients') ?>
            <h1>Trusted by inspection, rail, manufacturing and NDT service teams.</h1>
            <p>Tatva supplies and supports ultrasonic testing, magnetic particle testing and dye penetrant inspection products for public sector, plant, fabrication and inspection organizations across India.</p>
            <div class="clients-hero__actions">
                <a href="contact-us.php" class="clients-button clients-button--primary">Request support</a>
                <a href="products.php" class="clients-button clients-button--secondary">View products</a>
            </div>
        </div>

        <div class="clients-hero__visual reveal reveal-delay-2">
            <img src="gifs/double-rail-tester2.jpg" alt="Rail ultrasonic testing equipment supplied by Tatva">
            <div class="clients-hero__badge">
                <span>Industrial NDT support</span>
                <strong>Equipment, service, calibration and training</strong>
            </div>
        </div>
    </div>

    <div class="clients-proof reveal reveal-delay-3">
        <div class="clients-proof__item">
            <span class="clients-proof__value" data-counter="<?= count($clients) ?>" data-suffix="+">0+</span>
            <span class="clients-proof__label">representative clients</span>
        </div>
        <div class="clients-proof__item">
            <span class="clients-proof__value" data-counter="<?= count($clientGroups) ?>">0</span>
            <span class="clients-proof__label">industry clusters</span>
        </div>
        <div class="clients-proof__item">
            <span class="clients-proof__value" data-counter="3">0</span>
            <span class="clients-proof__label">core NDT methods</span>
        </div>
        <div class="clients-proof__item">
            <span class="clients-proof__value">1996</span>
            <span class="clients-proof__label">established</span>
        </div>
    </div>
</section>

<section class="clients-featured">
    <div class="clients-container">
        <div class="clients-section-heading reveal">
            <?= section_eyebrow('Selected customers') ?>
            <h2>Names buyers recognize.</h2>
            <p>Representative customers include public sector teams, industrial manufacturers, cement plants and inspection service providers.</p>
        </div>

        <div class="clients-featured__grid">
            <?php foreach ($featuredClients as $i => $client): ?>
                <?php $image = client_image($client); ?>
                <article class="featured-client reveal <?= $i > 0 ? 'reveal-delay-' . min($i, 5) : '' ?>">
                    <div class="featured-client__media">
                        <?php if ($image): ?>
                            <img src="<?= e($image) ?>" alt="<?= e($client) ?>">
                        <?php else: ?>
                            <span class="featured-client__fallback"><?= e(client_initials($client)) ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="featured-client__body">
                        <span>Selected customer</span>
                        <h3><?= e($client) ?></h3>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="clients-directory">
    <div class="clients-container">
        <div class="clients-section-heading clients-section-heading--wide reveal">
            <?= section_eyebrow('Client directory') ?>
            <h2>Representative clients by sector.</h2>
            <p>The list is organized around the buying teams Tatva most frequently supports: infrastructure, public sector, manufacturing, cement and NDT service organizations.</p>
        </div>

        <div class="clients-groups">
            <?php foreach ($clientGroups as $groupIndex => $group): ?>
                <section class="client-group reveal <?= $groupIndex > 0 ? 'reveal-delay-' . min($groupIndex, 4) : '' ?>" aria-labelledby="client-group-<?= $groupIndex ?>">
                    <div class="client-group__header">
                        <span class="client-group__count"><?= count($group['clients']) ?> clients</span>
                        <h3 id="client-group-<?= $groupIndex ?>"><?= e($group['label']) ?></h3>
                        <p><?= e($group['summary']) ?></p>
                    </div>

                    <div class="client-group__list">
                        <?php foreach ($group['clients'] as $client): ?>
                            <?php $image = client_image($client); ?>
                            <article class="client-card">
                                <div class="client-card__media">
                                    <?php if ($image): ?>
                                        <img src="<?= e($image) ?>" alt="<?= e($client) ?>">
                                    <?php else: ?>
                                        <span class="client-card__fallback"><?= e(client_initials($client)) ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="client-card__body">
                                    <h4><?= e($client) ?></h4>
                                    <p><?= e($group['label']) ?></p>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="clients-cta">
    <div class="clients-cta__inner reveal">
        <div>
            <?= section_eyebrow('Work with Tatva') ?>
            <h2>Need equipment support for an inspection program?</h2>
            <p>Talk to Tatva about product selection, calibration, service contracts or training for UT, MT and PT workflows.</p>
        </div>
        <a href="contact-us.php" class="clients-button clients-button--light">Contact the team</a>
    </div>
</section>
<?php page_footer(); ?>

<?php
require_once __DIR__ . '/includes/layout.php';
page_header('Clients', 'Reputed customers served by Tatva Marketing.');

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

?>
<section class="clients-simple">
    <div class="clients-container">
        <div class="clients-simple__heading reveal">
            <h1>Our reputed customer</h1>
        </div>

        <div class="clients-logo-grid">
            <?php foreach ($clients as $i => $client): ?>
                <?php $image = client_image($client); ?>
                <article class="client-logo-card reveal <?= $i > 0 ? 'reveal-delay-' . min($i % 6, 5) : '' ?>">
                    <div class="client-logo-card__media">
                        <?php if ($image): ?>
                            <img src="<?= e($image) ?>" alt="<?= e($client) ?>">
                        <?php else: ?>
                            <span class="client-logo-card__fallback"><?= e(client_initials($client)) ?></span>
                        <?php endif; ?>
                    </div>
                    <h2><?= e($client) ?></h2>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php page_footer(); ?>

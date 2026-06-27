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

?>
<section class="clients-simple">
    <div class="clients-container">
        <div class="clients-simple__heading reveal">
            <h1>Our reputed customers</h1>
        </div>

        <div class="clients-logo-grid">
            <?php foreach ($clients as $i => $client): ?>
                <?php
                $name = $client['name'];
                $image = $client['image'];
                ?>
                <article class="client-logo-card reveal <?= $i > 0 ? 'reveal-delay-' . min($i % 6, 5) : '' ?>">
                    <div class="client-logo-card__media">
                        <?php if ($image): ?>
                            <img src="<?= e($image) ?>" alt="<?= e($name) ?>">
                        <?php else: ?>
                            <span class="client-logo-card__fallback"><?= e(client_initials($name)) ?></span>
                        <?php endif; ?>
                    </div>
                    <h2><?= e($name) ?></h2>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php page_footer(); ?>

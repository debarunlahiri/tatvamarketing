<?php
require_once __DIR__ . '/site-data.php';

function current_page(): string
{
    return basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function page_header(string $title, string $description = ''): void
{
    global $company, $nav, $productMenu;
    $page = current_page();
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title) ?> | <?= e($company['name']) ?></title>
    <meta name="description" content="<?= e($description ?: 'Supplier and service partner for NDT equipment, ultrasonic testing, MPI equipment and dye penetrant testing products.') ?>">
    <link rel="icon" href="assets/images/favicons/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink: '#101828',
                        steel: '#334155',
                        line: '#e2e8f0',
                        brand: '#167247',
                        accent: '#0f766e'
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif']
                    }
                }
            }
        };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/modern.css">
</head>
<body class="bg-slate-50 text-ink antialiased">
    <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="index.php" class="flex items-center gap-3" aria-label="<?= e($company['short']) ?> home">
                <img src="assets/images/logo.png" alt="<?= e($company['short']) ?>" class="h-12 w-auto max-w-[190px] object-contain">
            </a>
            <nav class="hidden items-center gap-1 lg:flex" aria-label="Primary navigation">
                <?php foreach ($nav as $item): ?>
                    <?php if ($item['label'] === 'Products'): ?>
                        <div class="nav-product">
                            <a href="<?= e($item['href']) ?>" class="nav-top-link <?= $page === $item['href'] ? 'bg-emerald-50 text-brand' : 'text-slate-700' ?>">
                                <span><?= e($item['label']) ?></span>
                                <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.168l3.71-3.938a.75.75 0 1 1 1.08 1.04l-4.25 4.5a.75.75 0 0 1-1.08 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z" clip-rule="evenodd"/></svg>
                            </a>
                            <div class="nav-menu">
                                <?php foreach ($productMenu as $category): ?>
                                    <div class="nav-item">
                                        <a href="<?= e($category['href']) ?>" class="nav-menu-link">
                                            <span><?= e($category['label']) ?></span>
                                            <?php if (!empty($category['children'])): ?>
                                                <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4"><path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 0 1 .02-1.06L11.168 10 7.23 6.29a.75.75 0 1 1 1.04-1.08l4.5 4.25a.75.75 0 0 1 0 1.08l-4.5 4.25a.75.75 0 0 1-1.06-.02Z" clip-rule="evenodd"/></svg>
                                            <?php endif; ?>
                                        </a>
                                        <?php if (!empty($category['children'])): ?>
                                            <div class="nav-submenu">
                                                <?php foreach ($category['children'] as $child): ?>
                                                    <div class="nav-item">
                                                        <a href="<?= e($child['href']) ?>" class="nav-menu-link">
                                                            <span><?= e($child['label']) ?></span>
                                                            <?php if (!empty($child['children'])): ?>
                                                                <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4"><path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 0 1 .02-1.06L11.168 10 7.23 6.29a.75.75 0 1 1 1.04-1.08l4.5 4.25a.75.75 0 0 1 0 1.08l-4.5 4.25a.75.75 0 0 1-1.06-.02Z" clip-rule="evenodd"/></svg>
                                                            <?php endif; ?>
                                                        </a>
                                                        <?php if (!empty($child['children'])): ?>
                                                            <div class="nav-submenu nav-third-menu">
                                                                <?php foreach ($child['children'] as $grandchild): ?>
                                                                    <a href="<?= e($grandchild['href']) ?>" class="nav-menu-link"><?= e($grandchild['label']) ?></a>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?= e($item['href']) ?>" class="rounded-full px-4 py-2 text-sm font-semibold transition <?= $page === $item['href'] ? 'bg-emerald-50 text-brand' : 'text-slate-700 hover:bg-slate-100 hover:text-ink' ?>"><?= e($item['label']) ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>
            <div class="hidden items-center gap-3 lg:flex">
                <a href="tel:+919560096820" class="text-sm font-semibold text-slate-700 hover:text-brand"><?= e($company['phone']) ?></a>
                <a href="contact-us.php" class="rounded-full bg-brand px-5 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-emerald-800">Request quote</a>
            </div>
            <button id="menuButton" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-300 text-slate-800 lg:hidden" aria-label="Open menu" aria-expanded="false">
                <span class="hamburger"></span>
            </button>
        </div>
        <div id="mobileMenu" class="hidden border-t border-slate-200 bg-white px-4 py-4 lg:hidden">
            <nav class="mx-auto grid max-w-7xl gap-2" aria-label="Mobile navigation">
                <?php foreach ($nav as $item): ?>
                    <?php if ($item['label'] === 'Products'): ?>
                        <details class="rounded-xl bg-slate-50">
                            <summary class="cursor-pointer px-4 py-3 text-sm font-bold text-slate-800">Products</summary>
                            <div class="grid gap-1 px-3 pb-3">
                                <a href="products.php" class="rounded-lg px-3 py-2 text-sm font-semibold text-slate-700">All products</a>
                                <?php foreach ($productMenu as $category): ?>
                                    <?php if (!empty($category['children'])): ?>
                                        <details class="rounded-lg bg-white">
                                            <summary class="cursor-pointer px-3 py-2 text-sm font-bold text-slate-800"><?= e($category['label']) ?></summary>
                                            <div class="grid gap-1 px-3 pb-3">
                                                <?php foreach ($category['children'] as $child): ?>
                                                    <?php if (!empty($child['children'])): ?>
                                                        <details class="rounded-lg bg-slate-50">
                                                            <summary class="cursor-pointer px-3 py-2 text-sm font-semibold text-slate-700"><?= e($child['label']) ?></summary>
                                                            <div class="grid gap-1 px-3 pb-3">
                                                                <?php foreach ($child['children'] as $grandchild): ?>
                                                                    <a href="<?= e($grandchild['href']) ?>" class="rounded-lg px-3 py-2 text-sm text-slate-600"><?= e($grandchild['label']) ?></a>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </details>
                                                    <?php else: ?>
                                                        <a href="<?= e($child['href']) ?>" class="rounded-lg px-3 py-2 text-sm text-slate-600"><?= e($child['label']) ?></a>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </details>
                                    <?php else: ?>
                                        <a href="<?= e($category['href']) ?>" class="rounded-lg bg-white px-3 py-2 text-sm font-bold text-slate-800"><?= e($category['label']) ?></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </details>
                    <?php else: ?>
                        <a href="<?= e($item['href']) ?>" class="rounded-xl px-4 py-3 text-sm font-semibold <?= $page === $item['href'] ? 'bg-emerald-50 text-brand' : 'text-slate-700 hover:bg-slate-100' ?>"><?= e($item['label']) ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>
        </div>
    </header>
    <main>
    <?php
}

function page_footer(): void
{
    global $company, $productCategories;
    ?>
    </main>
    <footer class="border-t border-slate-200 bg-white">
        <section class="bg-ink text-white">
            <div class="mx-auto grid max-w-7xl gap-6 px-4 py-8 sm:px-6 md:grid-cols-3 lg:px-8">
                <div>
                    <p class="text-sm font-semibold text-emerald-200">Call</p>
                    <p class="mt-1 font-bold"><?= e($company['phone']) ?></p>
                    <p class="mt-1 text-sm text-slate-300"><?= e($company['hours']) ?></p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-emerald-200">Email</p>
                    <p class="mt-1 font-bold"><?= e($company['email']) ?></p>
                    <p class="mt-1 text-sm text-slate-300"><?= e($company['alt_email']) ?></p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-emerald-200">Location</p>
                    <p class="mt-1 text-sm leading-6 text-slate-200"><?= e($company['address']) ?></p>
                </div>
            </div>
        </section>
        <section class="mx-auto grid max-w-7xl gap-10 px-4 py-12 sm:px-6 md:grid-cols-[1.4fr_1fr_1fr] lg:px-8">
            <div>
                <img src="assets/images/logo.png" alt="<?= e($company['short']) ?>" class="h-12 w-auto">
                <p class="mt-5 max-w-xl text-sm leading-7 text-slate-600">Established in 1996, Tatva Marketing supplies and services ultrasonic testing equipment, MPI equipment, dye penetrant chemicals and NDT accessories for industrial clients across India.</p>
            </div>
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wide text-slate-900">Products</h3>
                <ul class="mt-4 space-y-2 text-sm text-slate-600">
                    <?php foreach ($productCategories as $category): ?>
                        <li><a href="products.php" class="hover:text-brand"><?= e($category['name']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wide text-slate-900">Company</h3>
                <ul class="mt-4 space-y-2 text-sm text-slate-600">
                    <li><a href="about-us.php" class="hover:text-brand">About Tatva</a></li>
                    <li><a href="services.php" class="hover:text-brand">Service & AMC</a></li>
                    <li><a href="clients.php" class="hover:text-brand">Clients</a></li>
                    <li><a href="contact-us.php" class="hover:text-brand">Contact</a></li>
                </ul>
            </div>
        </section>
        <div class="border-t border-slate-200 px-4 py-5 text-center text-xs text-slate-500">
            Copyright &copy; <?= date('Y') ?> <?= e($company['name']) ?> All rights reserved.
        </div>
    </footer>
    <script src="assets/js/modern.js"></script>
</body>
</html>
    <?php
}

function section_eyebrow(string $text): string
{
    return '<p class="text-sm font-bold uppercase tracking-[0.18em] text-brand">' . e($text) . '</p>';
}
?>

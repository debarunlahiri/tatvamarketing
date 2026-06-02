<?php
require_once __DIR__ . '/includes/layout.php';

$formMessage = '';
$formError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['resume'])) {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $phone    = trim($_POST['phone'] ?? '');
    $position = trim($_POST['position'] ?? '');
    $cover    = trim($_POST['cover'] ?? '');
    $file     = $_FILES['resume'];

    if ($name === '' || $email === '' || $file['error'] !== UPLOAD_ERR_OK) {
        $formError = 'Please fill in your name, email and attach a resume.';
    } elseif ($file['size'] > 5 * 1024 * 1024) {
        $formError = 'Resume file must be under 5 MB.';
    } else {
        $allowed = ['pdf' => 'application/pdf', 'doc' => 'application/msword', 'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!array_key_exists($ext, $allowed)) {
            $formError = 'Only PDF, DOC and DOCX files are accepted.';
        } else {
            $to      = $company['email'];
            $subject = 'Resume submission: ' . $name . ($position ? ' for ' . $position : '');
            $fileContent = chunk_split(base64_encode(file_get_contents($file['tmp_name'])));
            $boundary    = md5(time());
            $headers  = "From: " . $email . "\r\n";
            $headers .= "Reply-To: " . $email . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n";
            $body  = "--" . $boundary . "\r\n";
            $body .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
            $body .= "New resume submission from the Tatva Marketing website.\r\n\r\n";
            $body .= "Name: " . $name . "\r\n";
            $body .= "Email: " . $email . "\r\n";
            $body .= "Phone: " . $phone . "\r\n";
            $body .= "Position Applied: " . ($position ?: 'Not specified') . "\r\n";
            if ($cover !== '') { $body .= "Cover Note:\r\n" . $cover . "\r\n"; }
            $body .= "\r\n--" . $boundary . "\r\n";
            $body .= "Content-Type: " . $allowed[$ext] . "; name=\"" . $file['name'] . "\"\r\n";
            $body .= "Content-Disposition: attachment; filename=\"" . $file['name'] . "\"\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
            $body .= $fileContent . "\r\n";
            $body .= "--" . $boundary . "--";
            if (mail($to, $subject, $body, $headers)) {
                $formMessage = 'Thank you, ' . htmlspecialchars($name) . '! Your resume has been sent. We will get back to you shortly.';
            } else {
                $formError = 'Unable to send your resume at this moment. Please email it directly to ' . $company['email'];
            }
        }
    }
}

$openings = [
    [
        'title'   => 'NDT Level II Technician',
        'dept'    => 'Inspection Services',
        'type'    => 'Full-time',
        'location'=> 'Ghaziabad / Site Deputation',
        'exp'     => '2+ Years',
        'desc'    => 'Perform ultrasonic, magnetic particle and dye penetrant testing at client sites. Must hold valid ASNT/ISNT Level II certification in UT, MT and PT methods with minimum 2 years of field experience.',
        'reqs'    => ['ASNT/ISNT Level II (UT, MT, PT)', '2+ years field experience', 'Willingness to travel'],
    ],
    [
        'title'   => 'Sales Engineer - NDT Equipment',
        'dept'    => 'Sales & Marketing',
        'type'    => 'Full-time',
        'location'=> 'Ghaziabad',
        'exp'     => '1-3 Years',
        'desc'    => 'Drive sales of ultrasonic flaw detectors, MPI equipment and NDT consumables across North India. Build customer relationships, prepare quotations and coordinate product demonstrations.',
        'reqs'    => ['B.Tech / Diploma in Mechanical or Electrical', '1-3 years sales experience', 'Good communication skills'],
    ],
    [
        'title'   => 'Service Engineer - UT Equipment',
        'dept'    => 'Technical Services',
        'type'    => 'Full-time',
        'location'=> 'Ghaziabad / Travelling',
        'exp'     => '1-4 Years',
        'desc'    => 'Provide installation, calibration, AMC support and repair services for ultrasonic flaw detectors and thickness gauges. Diploma/Degree in Electronics or Instrumentation preferred.',
        'reqs'    => ['Diploma/Degree in Electronics / Instrumentation', 'Knowledge of ultrasonic testing', 'Problem-solving aptitude'],
    ],
    [
        'title'   => 'Office Administrator',
        'dept'    => 'Administration',
        'type'    => 'Full-time',
        'location'=> 'Ghaziabad',
        'exp'     => '1-3 Years',
        'desc'    => 'Handle day-to-day office operations, coordinate with clients and service teams, manage documentation and support sales activities. Graduate with 1-3 years experience.',
        'reqs'    => ['Graduate in any discipline', 'Proficiency in MS Office', 'Organized and detail-oriented'],
    ],
];

page_header('Work With Us', 'Explore career opportunities at Tatva Marketing.');
?>

<div class="work-page">
    <section class="work-hero">
        <div class="work-container work-hero__inner">
            <div class="work-hero__copy reveal">
                <span class="work-kicker">Careers at Tatva</span>
                <h1>Work With Us</h1>
                <p>Build your career with one of India's most trusted NDT equipment and services companies. Engineers, technicians and sales professionals are welcome.</p>
                <a href="#openings" class="work-button work-button--primary">View openings <i class="fa fa-angle-down" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>

    <section class="work-stats">
        <div class="work-container work-stats__grid">
            <div class="work-stat">
                <strong>28+</strong>
                <span>Years in NDT</span>
            </div>
            <div class="work-stat">
                <strong>6</strong>
                <span>Product lines</span>
            </div>
            <div class="work-stat">
                <strong>500+</strong>
                <span>Clients served</span>
            </div>
            <div class="work-stat">
                <strong>Ghaziabad</strong>
                <span>Head office</span>
            </div>
        </div>
    </section>

    <section class="work-section">
        <div class="work-container">
            <div class="work-section-heading work-section-heading--center reveal">
                <?= section_eyebrow('Why Tatva') ?>
                <h2>Grow with a trusted name</h2>
                <p>We invest in our people. Whether you are a field technician or a sales professional, you will work on practical projects that support India's industrial inspection teams.</p>
            </div>

            <div class="work-benefits">
                <article class="work-card reveal">
                    <span class="work-icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>
                    <h3>Modern NDT technology</h3>
                    <p>Work hands-on with ultrasonic flaw detectors, MPI systems and rail testing equipment from established manufacturers.</p>
                </article>
                <article class="work-card reveal reveal-delay-1">
                    <span class="work-icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                    <h3>Continuous learning</h3>
                    <p>Access NDT training, certification support and workshops in UT, MT and PT methods to keep your skills sharp.</p>
                </article>
                <article class="work-card reveal reveal-delay-2">
                    <span class="work-icon"><i class="fa fa-map-o" aria-hidden="true"></i></span>
                    <h3>Pan-India exposure</h3>
                    <p>Engage with industrial customers including Indian Railways, BHEL, NPCIL, L&amp;T, Ultratech and more.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="work-section work-section--soft" id="openings">
        <div class="work-container">
            <div class="work-section-heading work-section-heading--split reveal">
                <div>
                    <?= section_eyebrow('Join Our Team') ?>
                    <h2>Current openings</h2>
                    <p>Explore the roles below and apply by uploading your resume. We are always interested in hearing from skilled professionals.</p>
                </div>
                <a href="#apply-form" class="work-button work-button--primary">Submit resume <i class="fa fa-file-text-o" aria-hidden="true"></i></a>
            </div>

            <div class="work-jobs">
                <?php foreach ($openings as $i => $job): ?>
                    <article class="work-job-card reveal <?= $i > 0 ? 'reveal-delay-' . min($i, 3) : '' ?>">
                        <div class="work-job-card__tags">
                            <span><?= e($job['type']) ?></span>
                            <span><?= e($job['dept']) ?></span>
                        </div>
                        <h3><?= e($job['title']) ?></h3>
                        <div class="work-job-card__meta">
                            <span><i class="fa fa-map-marker" aria-hidden="true"></i><?= e($job['location']) ?></span>
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i><?= e($job['exp']) ?></span>
                        </div>
                        <p><?= e($job['desc']) ?></p>
                        <div class="work-requirements">
                            <?php foreach ($job['reqs'] as $req): ?>
                                <span><i class="fa fa-check" aria-hidden="true"></i><?= e($req) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <a href="#apply-form" class="apply-trigger work-apply-link" data-position="<?= e($job['title']) ?>">Apply for this role <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="work-section" id="apply-form">
        <div class="work-form-container">
            <div class="work-section-heading work-section-heading--center reveal">
                <?= section_eyebrow('Apply Now') ?>
                <h2>Submit your resume</h2>
                <p>Fill in your details and upload your resume. We will review it and get back to you within 5 business days.</p>
            </div>

        <?php if ($formMessage !== ''): ?>
            <div class="mt-10 rounded-2xl p-8 text-center" style="background-color: #f0fdf4; border: 1px solid #bbf7d0;">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full" style="background-color: #dcfce7;">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color: #510400;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="mt-4 text-lg font-bold" style="color: #14532d;"><?= $formMessage ?></p>
                <p class="mt-2 text-sm" style="color: #166534;">Your application has been emailed to our HR team.</p>
                <a href="work-with-us.php" class="mt-5 inline-flex items-center gap-2 rounded-full bg-white px-5 py-2.5 text-sm font-bold shadow-sm transition" style="color: #510400;">Submit another application</a>
            </div>
        <?php else: ?>
            <?php if ($formError !== ''): ?>
                <div class="mt-8 rounded-xl p-4 text-center" style="background-color: #fef2f2; border: 1px solid #fecaca;">
                    <p class="text-sm font-semibold" style="color: #991b1b;"><?= e($formError) ?></p>
                </div>
            <?php endif; ?>

            <form class="work-form" method="post" enctype="multipart/form-data">
                <div class="work-form__grid">
                    <label class="work-field">
                        <span>Full Name <em>*</em></span>
                        <input class="field" name="name" type="text" required value="<?= isset($_POST['name']) ? e($_POST['name']) : '' ?>">
                    </label>
                    <label class="work-field">
                        <span>Email <em>*</em></span>
                        <input class="field" name="email" type="email" required value="<?= isset($_POST['email']) ? e($_POST['email']) : '' ?>">
                    </label>
                    <label class="work-field">
                        <span>Phone</span>
                        <input class="field" name="phone" type="tel" value="<?= isset($_POST['phone']) ? e($_POST['phone']) : '' ?>">
                    </label>
                    <label class="work-field">
                        <span>Position Applied For</span>
                        <select class="field" name="position" id="position-select">
                            <option value="">Select a position</option>
                            <?php foreach ($openings as $job): ?>
                                <option value="<?= e($job['title']) ?>" <?= (isset($_POST['position']) && $_POST['position'] === $job['title']) ? 'selected' : '' ?>><?= e($job['title']) ?></option>
                            <?php endforeach; ?>
                            <option value="Other" <?= (isset($_POST['position']) && $_POST['position'] === 'Other') ? 'selected' : '' ?>>Other / General</option>
                        </select>
                    </label>
                </div>
                <label class="work-field work-field--full">
                    <span>Cover Note</span>
                    <textarea class="field" style="min-height: 7rem;" name="cover" placeholder="Tell us briefly about your experience and why you'd like to join Tatva."><?= isset($_POST['cover']) ? e($_POST['cover']) : '' ?></textarea>
                </label>
                <label class="work-field work-field--full">
                    <span>Upload Resume <em>*</em></span>
                    <div class="work-dropzone" id="dropzone">
                        <i class="fa fa-cloud-upload" aria-hidden="true" id="dropzone-icon"></i>
                        <p id="dropzone-text">Drag and drop your resume or click to browse</p>
                        <small>PDF, DOC or DOCX (max 5 MB)</small>
                        <input name="resume" type="file" accept=".pdf,.doc,.docx" required id="resume-input">
                    </div>
                </label>
                <button class="work-button work-button--submit" type="submit">Submit application</button>
            </form>
        <?php endif; ?>
    </div>
</section>
</div>

<script>
document.querySelectorAll('.apply-trigger').forEach(function(link) {
    link.addEventListener('click', function(e) {
        var select = document.getElementById('position-select');
        if (select) {
            select.value = this.dataset.position;
            select.scrollIntoView({ behavior: 'smooth', block: 'center' });
            select.focus();
        }
    });
});

(function() {
    var dropzone = document.getElementById('dropzone');
    var input    = document.getElementById('resume-input');
    var icon     = document.getElementById('dropzone-icon');
    var text     = document.getElementById('dropzone-text');
    if (!dropzone || !input) return;

    function showFile(name) {
        if (icon) icon.style.display = 'none';
        if (text) text.innerHTML = '<span style="color:#510400; font-weight:700;">' + name + '</span> selected';
        dropzone.style.borderColor = '#510400';
        dropzone.style.backgroundColor = '#f8e9e7';
    }

    input.addEventListener('change', function() {
        if (this.files && this.files[0]) showFile(this.files[0].name);
    });

    dropzone.addEventListener('dragover', function(e) { e.preventDefault(); this.style.borderColor = '#510400'; });
    dropzone.addEventListener('dragleave', function() { if (!input.files || !input.files[0]) this.style.borderColor = '#cbd5e1'; });
    dropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        if (e.dataTransfer.files && e.dataTransfer.files[0]) {
            input.files = e.dataTransfer.files;
            showFile(e.dataTransfer.files[0].name);
        }
    });
})();
</script>

<?php page_footer(); ?>

<?php
$company = [
    'name' => 'Tatva Marketing & Services Pvt. Ltd.',
    'short' => 'Tatva Marketing',
    'phone' => '0120 411 6638',
    'phone_href' => '+911204116638',
    'phones' => [
        ['label' => '0120 411 6638', 'href' => '+911204116638'],
    ],
    'email' => 'tatva@tatvamarketing.com',
    'alt_email' => 'sachin@tatvamarketing.com',
    'address' => 'Ist Floor, SBC Plaza, Plot 6, Sector 15, Vasundhara, Ghaziabad, Uttar Pradesh 201012',
    'map_url' => 'https://maps.google.com/?cid=1841605036182984860',
    'map_embed_url' => 'https://maps.google.com/maps?cid=1841605036182984860&output=embed',
    'hours' => '09:00 AM to 05:30 PM. Weekly off Sunday & all Gazetted Holidays',
];

$nav = [
    ['label' => 'Home', 'href' => 'index.php'],
    ['label' => 'About', 'href' => 'about-us.php'],
    ['label' => 'Products', 'href' => 'products.php'],
    ['label' => 'Services', 'href' => 'services.php'],
    ['label' => 'Clients', 'href' => 'clients.php'],
    ['label' => 'Work With Us', 'href' => 'work-with-us.php'],
];

$productMenu = [
    [
        'label' => 'Ultrasonic Testing',
        'href' => 'products.php#ultrasonic-testing',
        'children' => [
            [
                'label' => 'Ultrasonic Flaw Detectors',
                'href' => 'products.php#ultrasonic-testing',
                'children' => [
                    ['label' => 'Einstein-II TFT', 'href' => 'einstein-ii.php'],
                    ['label' => 'Einstein-II DGS', 'href' => 'einstein-ii-dgs.php'],
                    ['label' => 'Arjun-10', 'href' => 'arjun-10.php'],
                    ['label' => 'Arjun-20', 'href' => 'arjun-20.php'],
                    ['label' => 'Arjun-30', 'href' => 'arjun-30.php'],
                    // ['label' => 'da Vinci Delta', 'href' => 'da-vinci.php'],
                ],
            ],
            ['label' => 'Ultrasonic Rail Testers', 'href' => 'ultra-rail-testers.php'],
            ['label' => 'Ultrasonic Thickness Gauges', 'href' => 'ultra-thickness.php'],
            ['label' => 'Ultrasonic Velocity Meters', 'href' => 'ultra-velocity-meter.php'],
            ['label' => 'Ultrasonic Accessories', 'href' => 'ultra-accessories.php'],
        ],
    ],
    [
        'label' => 'Magnetic Particle Testing',
        'href' => 'products.php#magnetic-particle-testing',
        'children' => [
            ['label' => 'Bench Type MPI Equipment', 'href' => 'bench-mpi.php'],
            ['label' => 'Prod Type MPI Equipment', 'href' => 'prod-mpi.php'],
            ['label' => 'Yoke Type MPI Equipment', 'href' => 'yoke-mpi.php'],
            ['label' => 'UV Equipment and Accessories', 'href' => 'uv-equipment.php'],
            ['label' => 'MPI Accessories', 'href' => 'mpi-accessories.php'],
            ['label' => 'MPI Consumables', 'href' => 'mpi-consumables.php'],
        ],
    ],
    [
        'label' => 'Dye Penetrant Testing',
        'href' => 'dye-penetrant.php',
        'children' => [],
    ],
];

$productCategories = [
    [
        'name' => 'Ultrasonic Testing',
        'summary' => 'Flaw detectors, rail testers, thickness gauges, velocity meters, probes and accessories for industrial inspection.',
        'image' => 'gifs/ultrasonic-equipment.jpg',
        'items' => [
            [
                'name' => 'Einstein-II TFT',
                'href' => 'einstein-ii.php',
                'image' => 'gifs/flaw-detector.jpg',
                'summary' => 'Digital ultrasonic flaw detector with colour display, auto DAC plotting, digital measurements and PC connectivity.',
            ],
            [
                'name' => 'Einstein-II DGS',
                'href' => 'einstein-ii-dgs.php',
                'image' => 'assets/images/products/modsonic/einstein-ii-dgs.jpg',
                'summary' => 'Advanced ultrasonic flaw detector for accurate defect evaluation and field inspection workflows.',
            ],
            [
                'name' => 'Arjun Series',
                'href' => 'arjun-20.php',
                'image' => 'assets/images/products/modsonic/arjun-20.jpg',
                'summary' => 'Portable ultrasonic flaw detector range for site inspection and maintenance applications.',
            ],
            [
                'name' => 'da Vinci Delta',
                'href' => 'da-vinci.php',
                'image' => 'assets/images/products/modsonic/da-vinci-delta.jpg',
                'summary' => 'High performance ultrasonic testing instrument for demanding industrial inspection.',
            ],
            [
                'name' => 'Ultrasonic Rail Testers',
                'href' => 'ultra-rail-testers.php',
                'image' => 'assets/images/products/modsonic/railscan-200w.png',
                'summary' => 'Single, double and vehicular rail testing solutions for railway inspection programs.',
            ],
            [
                'name' => 'Thickness & Velocity Meters',
                'href' => 'ultra-thickness.php',
                'image' => 'assets/images/products/modsonic/edison-1m.png',
                'summary' => 'Thickness gauges and velocity meters for reliable material measurement.',
            ],
            [
                'name' => 'Ultrasonic Accessories',
                'href' => 'ultra-accessories.php',
                'image' => 'gifs/ULTRASONIC-ACCESSORIES.jpg',
                'summary' => 'Probes, transducers and accessories for ultrasonic flaw detector systems.',
            ],
        ],
    ],
    [
        'name' => 'Magnetic Particle Testing',
        'summary' => 'MPI equipment, yokes, prod units, UV lights, accessories and consumables for surface defect detection.',
        'image' => 'gifs/MPI-Portable-Power-Source1.jpg',
        'items' => [
            [
                'name' => 'Bench Type MPI Equipment',
                'href' => 'bench-mpi.php',
                'image' => 'gifs/mpi-equepment-horizontal-stationery2.jpg',
                'summary' => 'Current and coil type magnetic crack detectors for ferromagnetic components.',
            ],
            [
                'name' => 'Portable MPI Equipment',
                'href' => 'prod-mpi.php',
                'image' => 'gifs/mpi-equepments-portable-mobiles2.jpg',
                'summary' => 'Portable and mobile MPI power sources for shop-floor and field inspection.',
            ],
            [
                'name' => 'Yoke Type MPI Equipment',
                'href' => 'yoke-mpi.php',
                'image' => 'gifs/electromagnetic-Particls-Equipment.jpg',
                'summary' => 'Electromagnetic yokes for fast magnetic particle inspection of welds and components.',
            ],
            [
                'name' => 'MPI Accessories',
                'href' => 'mpi-accessories.php',
                'image' => 'gifs/accessories-for-MPI.jpg',
                'summary' => 'Gauss meters, field indicators, Ketos rings and supporting inspection accessories.',
            ],
            [
                'name' => 'MPI Consumables',
                'href' => 'mpi-consumables.php',
                'image' => 'gifs/MPI-Consumables.jpg',
                'summary' => 'Magnetic particles, carriers and related consumables for MT inspection.',
            ],
        ],
    ],
    [
        'name' => 'Dye Penetrant Testing',
        'summary' => 'Visible and fluorescent penetrant materials for surface crack detection.',
        'image' => 'gifs/dye-penetrant-chemicals.jpg',
        'items' => [
            [
                'name' => 'Dye Penetrant Chemicals',
                'href' => 'dye-penetrant.php',
                'image' => 'gifs/dye-penetrant-chemicals.jpg',
                'summary' => 'Red dye and fluorescent penetrant chemicals including solvent removable and water washable types.',
            ],
        ],
    ],
];

$services = [
    'Servicing, AMC and recalibration of ultrasonic flaw detectors',
    'Servicing, AMC and recalibration of ultrasonic thickness gauges',
    'MPI equipment service for bench type, prod type and AC/DC yoke systems',
    'Gauss meter, residual magnetic field indicator and UV black light support',
    'Seminars and awareness programs in UT, MT and PT methods',
];

$clients = [
    ['name' => 'Indian Railways', 'image' => 'assets/images/clients/indian_railways.svg'],
    ['name' => 'BHEL', 'image' => 'assets/images/clients/bhel.svg.png'],
    ['name' => 'NPCIL', 'image' => 'assets/images/clients/npcil.svg.png'],
    ['name' => 'ISGEC', 'image' => 'assets/images/clients/isgec.png'],
    ['name' => 'DCM Shriram Group', 'image' => 'assets/images/clients/dcm_shriram_group.png'],
    ['name' => 'Dee Development Engineers', 'image' => 'assets/images/clients/dee_development_engineers.jpg'],
    ['name' => 'Star Wires', 'image' => 'assets/images/clients/star_wires.png'],
    ['name' => 'Larsen & Toubro', 'image' => 'assets/images/clients/larsen_and_tourbo.svg.png'],
    ['name' => 'Ultratech Cements', 'image' => 'assets/images/clients/ultratech_cements.png'],
    ['name' => 'Shree Cements', 'image' => 'assets/images/clients/shree_cements.jpeg'],
    ['name' => 'Maruti', 'image' => 'assets/images/clients/maruti.jpg'],
    ['name' => 'Good Luck Engineering', 'image' => 'assets/images/clients/good_luck_engineering.avif'],
    ['name' => 'Sharu Industries', 'image' => 'assets/images/clients/sharu_industries.png'],
    ['name' => 'A.R. Inspection Services', 'image' => 'assets/images/clients/a_r_inspection_services.jpeg'],
    ['name' => 'Industrial Radiographic Services Pvt. Ltd.', 'image' => null],
    ['name' => 'IRC Engineering Services (I) Pvt. Ltd.', 'image' => 'assets/images/clients/irc_engineering_services_i_pvt_ltd.jpeg'],
    ['name' => 'RUMP Inspection & Engineering Services (P) Ltd.', 'image' => 'assets/images/clients/rump_inspection_and_engineering_services_p_ltd.jpeg'],
    ['name' => 'Unique NDT Services', 'image' => 'assets/images/clients/unique_ndt_services.png'],
    ['name' => 'Material Evaluation Services (Mumbai) Pvt. Ltd.', 'image' => null],
    ['name' => 'Radiographic Inspection Services', 'image' => null],
    ['name' => 'Quality Evaluation Services', 'image' => 'assets/images/clients/quality_evaluation_services.jpeg'],
];
?>

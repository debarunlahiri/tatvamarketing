<?php
$company = [
    'name' => 'Tatva Marketing & Services Pvt. Ltd.',
    'short' => 'Tatva Marketing',
    'phone' => '+91 9560096820 / +91 8920610856',
    'phones' => [
        ['label' => '+91 9560096820', 'href' => '+919560096820'],
        ['label' => '+91 8920610856', 'href' => '+918920610856'],
    ],
    'email' => 'tatva@tatvamarketing.com',
    'alt_email' => 'sachin@tatvamarketing.com',
    'address' => '1st Floor, SBC Plaza, Plot No. 6, Near HDFC Bank, Sector 15, Vasundhara, Ghaziabad-201012, Uttar Pradesh, India',
    'hours' => '09:00 AM to 05:30 PM',
];

$nav = [
    ['label' => 'Home', 'href' => 'index.php'],
    ['label' => 'About', 'href' => 'about-us.php'],
    ['label' => 'Products', 'href' => 'products.php'],
    ['label' => 'Services', 'href' => 'services.php'],
    ['label' => 'Clients', 'href' => 'clients.php'],
    ['label' => 'Contact', 'href' => 'contact-us.php'],
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
                    ['label' => 'da Vinci Delta', 'href' => 'da-vinci.php'],
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
                'image' => 'gifs/ultrasonic-flaw-detector2.jpg',
                'summary' => 'Advanced ultrasonic flaw detector for accurate defect evaluation and field inspection workflows.',
            ],
            [
                'name' => 'Arjun Series',
                'href' => 'arjun-20.php',
                'image' => 'gifs/main-instrument2.jpg',
                'summary' => 'Portable ultrasonic flaw detector range for site inspection and maintenance applications.',
            ],
            [
                'name' => 'da Vinci Delta',
                'href' => 'da-vinci.php',
                'image' => 'gifs/ultrasonic-phased.jpg',
                'summary' => 'High performance ultrasonic testing instrument for demanding industrial inspection.',
            ],
            [
                'name' => 'Ultrasonic Rail Testers',
                'href' => 'ultra-rail-testers.php',
                'image' => 'gifs/double-rail-tester2.jpg',
                'summary' => 'Single, double and vehicular rail testing solutions for railway inspection programs.',
            ],
            [
                'name' => 'Thickness & Velocity Meters',
                'href' => 'ultra-thickness.php',
                'image' => 'gifs/Ultrasonic-Thickness.jpg',
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
    'Training, certification and consultancy for Level-I/II UT, MT and PT',
];

$clients = [
    'Indian Railways',
    'BHEL',
    'NPCIL',
    'ISGEC',
    'DCM Shriram Group',
    'Dee Development Engineers',
    'Star Wires',
    'Larsen & Toubro',
    'Ultratech Cements',
    'Shree Cements',
    'Good Luck Engineering',
    'Sharu Industries',
    'A.R. Inspection Services',
    'Industrial Radiographic Services Pvt. Ltd.',
    'IRC Engineering Services (I) Pvt. Ltd.',
    'RUMP Inspection & Engineering Services (P) Ltd.',
    'Unique NDT Services',
    'Material Evaluation Services (Mumbai) Pvt. Ltd.',
    'Radiographic Inspection Services',
    'Quality Evaluation Services',
];
?>

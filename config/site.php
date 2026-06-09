<?php

return [
    'name' => env('SITE_NAME', 'MAJU MAPAN'),
    'tagline' => 'Solusi Sensor Pintar untuk Pertanian & Peternakan',
    'whatsapp' => env('WHATSAPP_NUMBER', '6285713306317'),
    'instagram' => env('SITE_INSTAGRAM', 'https://instagram.com/agrosense.id'),
    'tiktok' => env('SITE_TIKTOK', 'https://tiktok.com/@agrosense.id'),
    'email' => env('SITE_EMAIL', 'majumapan@gmail.com'),
    'phone' => env('SITE_PHONE', '+62 857-1330-6317'),
    // 'address' => env('SITE_ADDRESS', 'Kabupaten Bojonegoro, Jawa Timur, Indonesia'),
    'hours' => env('SITE_HOURS', 'Senin - Sabtu: 08.00 - 17.00 WIB'),

    'headers' => [
        'products' => env('HEADER_PRODUCTS', 'images/headers/1.png'),
        'about' => env('HEADER_ABOUT', 'images/headers/2.png'),
        'contact' => env('HEADER_CONTACT', 'images/headers/5.png'),
    ],

    'banners' => [
        [
            'image' => env('BANNER_1_IMAGE', 'images/banners/banner.png'),
            'title' => 'Solusi Sensor Pintar untuk Pertanian & Peternakan',
            'subtitle' => 'Membantu memantau suhu, kelembapan, dan kondisi kandang secara realtime dengan mudah.',
            'cta_text' => 'Lihat Produk',
            'cta_url' => '/produk',
            'cta_secondary_text' => 'Hubungi WhatsApp',
            'cta_secondary_whatsapp' => 'Halo, saya ingin konsultasi produk sensor pertanian.',
        ],
        [
            'image' => env('BANNER_2_IMAGE', 'images/banners/banner2.png'),
            'title' => 'Smart Farming untuk Petani Indonesia',
            'subtitle' => 'Teknologi IoT mudah dipasang, pantau dari smartphone kapan saja.',
            'cta_text' => 'Lihat Produk',
            'cta_url' => '/produk',
            'cta_secondary_text' => 'Hubungi WhatsApp',
            'cta_secondary_whatsapp' => 'Halo, saya tertarik dengan produk smart farming.',
        ],
        [
            'image' => env('BANNER_3_IMAGE', 'images/banners/banner3.png'),
            'title' => 'Monitoring Kandang & Kolam Terintegrasi',
            'subtitle' => 'Cegah kerugian dengan peringatan dini suhu dan kelembapan ekstrem.',
            'cta_text' => 'Lihat Produk',
            'cta_url' => '/produk',
            'cta_secondary_text' => 'Hubungi WhatsApp',
            'cta_secondary_whatsapp' => 'Halo, saya ingin info paket monitoring.',
        ],
    ],

    'team' => [
        [
            'name' => 'MUHAMMAD ZULFIKAR ALI ZAM ZAMI',
            'role' => 'CEO',
            'photo' => 'images/team/abid.jpeg',
        ],
        [
            'name' => 'MIFTAKHUL KHOIR',
            'role' => 'COO',
            'photo' => 'images/team/abid.jpeg',
        ],
        [
            'name' => 'CANDRA LUKITA A,F',
            'role' => 'WEB DEVELOPER',
            'photo' => 'images/team/abid.jpeg',
        ],
        [
            'name' => 'M IQBAL MAULANA',
            'role' => 'WEB DEVELOPER',
            'photo' => 'images/team/dewi.jpg',
        ],
            [
            'name' => 'ACH ROBBA SYA`RONI',
            'role' => 'PRODUSEN',
            'photo' => 'images/team/dewi.jpg',
        ],
            [
            'name' => 'M YAZIDUN NI`AM',
            'role' => 'ASISTEN PRODUSEN',
            'photo' => 'images/team/dewi.jpg',
        ],
            [
            'name' => 'AHMAD DAVA SYAHPUTRA',
            'role' => 'DESAIN GRAFIK MARKETING',
            'photo' => 'images/team/dewi.jpg',
        ],
            [
            'name' => 'M ATHO`URROHMAN ANNAWAS',
            'role' => 'MARKETING',
            'photo' => 'images/team/dewi.jpg',
        ],
            [
            'name' => 'AKHFA FADIN NUHA',
            'role' => 'BENDAHARA',
            'photo' => 'images/team/dewi.jpg',
        ],
            [
            'name' => 'M NAFIS FIKRUL UMAM',
            'role' => 'HUMAS',
            'photo' => 'images/team/dewi.jpg',
        ],
            [
            'name' => 'ABID MAULANA HAQIQI',
            'role' => 'LAPANGAN',
            'photo' => 'images/team/dewi.jpg',
        ],
    ],
];

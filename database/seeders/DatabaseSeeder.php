<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@agrosense.id'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );

        $categories = [
            ['name' => 'Sensor Suhu', 'icon' => 'temperature'],
            ['name' => 'Sensor Kelembapan', 'icon' => 'humidity'],
            ['name' => 'Sensor pH', 'icon' => 'ph'],
            ['name' => 'Monitoring Kandang', 'icon' => 'barn'],
            ['name' => 'Monitoring Kolam', 'icon' => 'pond'],
            ['name' => 'Otomatisasi Pompa', 'icon' => 'pump'],
        ];

        $categoryModels = collect($categories)->map(function (array $cat) {
            return Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'icon' => $cat['icon'],
            ]);
        });

        $products = [
            [
                'name' => 'Sensor Suhu Digital DS18B20',
                'price' => 185000,
                'category' => 'Sensor Suhu',
                'featured' => true,
                'short' => 'Sensor suhu presisi untuk greenhouse dan kandang ternak.',
                'photo' => 'images/products/p01.jpg',
            ],
            [
                'name' => 'Sensor Kelembapan DHT22 Pro',
                'price' => 225000,
                'category' => 'Sensor Kelembapan',
                'featured' => true,
                'short' => 'Pantau kelembapan udara dan tanah secara realtime.',
                'photo' => 'images/products/p02.jpg',
            ],
            [
                'name' => 'Sensor pH Tanah Wireless',
                'price' => 450000,
                'category' => 'Sensor pH',
                'featured' => true,
                'short' => 'Ukur tingkat keasaman tanah untuk hasil panen optimal.',
                'photo' => 'images/products/p03.jpg',
            ],
            [
                'name' => 'Paket Monitoring Kandang Ayam',
                'price' => 1250000,
                'category' => 'Monitoring Kandang',
                'featured' => true,
                'short' => 'Sistem lengkap pantau suhu, kelembapan, dan ventilasi kandang.',
                'photo' => 'images/products/p04.jpg',
            ],
            [
                'name' => 'Sensor Monitoring Kolam Ikan',
                'price' => 890000,
                'category' => 'Monitoring Kolam',
                'featured' => true,
                'short' => 'Pantau suhu air, pH, dan oksigen terlarut di kolam.',
                'photo' => 'images/products/p05.jpg',
            ],
            [
                'name' => 'Kontroler Pompa Otomatis IoT',
                'price' => 650000,
                'category' => 'Otomatisasi Pompa',
                'featured' => true,
                'short' => 'Otomatisasi irigasi dan pompa air berbasis sensor.',
                'photo' => 'images/products/p06.jpg',
            ],
            [
                'name' => 'Sensor Suhu Tanah NTC',
                'price' => 145000,
                'category' => 'Sensor Suhu',
                'featured' => false,
                'short' => 'Sensor suhu tanah tahan air untuk pertanian.',
                'photo' => 'images/products/p07.jpg',
            ],
            [
                'name' => 'Sensor Kelembapan Tanah Capacitive',
                'price' => 175000,
                'category' => 'Sensor Kelembapan',
                'featured' => false,
                'short' => 'Deteksi kelembapan tanah tanpa korosi elektroda.',
                'photo' => 'images/products/p08.jpg',
            ],
            [
                'name' => 'Sensor pH Air Digital',
                'price' => 520000,
                'category' => 'Sensor pH',
                'featured' => false,
                'short' => 'Ukur pH air irigasi dan kolam budidaya.',
                'photo' => 'images/products/p09.jpg',
            ],
            [
                'name' => 'Gateway IoT Smart Farming',
                'price' => 980000,
                'category' => 'Monitoring Kandang',
                'featured' => false,
                'short' => 'Hubungkan semua sensor ke aplikasi smartphone.',
                'photo' => 'images/products/p10.jpg',
            ],
            [
                'name' => 'Sensor Level Air Kolam',
                'price' => 380000,
                'category' => 'Monitoring Kolam',
                'featured' => false,
                'short' => 'Pantau ketinggian air kolam secara otomatis.',
                'photo' => 'images/products/p11.jpg',
            ],
            [
                'name' => 'Timer Pompa Digital 220V',
                'price' => 295000,
                'category' => 'Otomatisasi Pompa',
                'featured' => false,
                'short' => 'Atur jadwal pompa air dengan mudah.',
                'photo' => 'images/products/p12.jpg',
            ],
        ];

        foreach ($products as $item) {
            $category = $categoryModels->firstWhere('name', $item['category']);

            Product::create([
                'category_id' => $category->id,
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'price' => $item['price'],
                'short_description' => $item['short'],
                'description' => "Produk {$item['name']} dirancang khusus untuk kebutuhan petani dan peternak Indonesia. Mudah dipasang, tahan cuaca, dan dapat dipantau melalui smartphone.\n\n" .
                    "Dengan teknologi IoT terkini, Anda dapat memantau kondisi lahan atau kandang secara realtime tanpa harus datang ke lokasi setiap saat.\n\n" .
                    'Tim kami siap membantu instalasi dan panduan penggunaan hingga produk berjalan optimal.',
                'specification' => "• Material: ABS tahan UV\n• Tegangan: 5V DC / 220V (tergantung model)\n• Komunikasi: WiFi / LoRa\n• Range suhu: -40°C hingga 85°C\n• Akurasi: ±0.5°C\n• Garansi: 1 tahun",
                'benefits' => "• Hemat waktu pemantauan manual\n• Mencegah kerugian akibat suhu/kelembapan ekstrem\n• Mudah digunakan tanpa keahlian teknis\n• Dukungan WhatsApp 7 hari seminggu",
                'thumbnail' => $item['photo'],
                'is_featured' => $item['featured'],
            ]);
        }
    }
}

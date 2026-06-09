<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
public function edit(): View
{
    
    $company = json_decode(Setting::get('company', '[]'), true);
    if (empty($company)) {
        $company = [
            'photo' => 'images/hero-farming.svg',
            'profil' => config('site.name') . ' didirikan dengan misi membantu petani dan peternak Indonesia memanfaatkan teknologi sensor IoT secara praktis dan terjangkau. Kami memahami bahwa tidak semua pengguna familiar dengan teknologi, oleh karena itu setiap produk dirancang mudah dipasang dan didukung layanan WhatsApp yang responsif.',
            'visi'  => 'Menjadi penyedia solusi sensor pertanian dan peternakan terdepan yang mudah diakses seluruh lapisan masyarakat Indonesia.',
            'misi'  => "• Menyediakan produk berkualitas dengan harga terjangkau\n• Memberikan edukasi dan dukungan berkelanjutan\n• Meningkatkan produktivitas petani melalui teknologi",
        ];
    }

    $team = json_decode(Setting::get('team', '[]'), true);
    if (empty($team)) {
        $team = config('site.team');
    }

    $journey = json_decode(Setting::get('journey', '[]'), true);
    if (empty($journey)) {
        $journey = [
            ['year' => '2020', 'title' => 'Berdiri', 'desc' => 'Memulai sebagai distributor sensor pertanian lokal.'],
            ['year' => '2022', 'title' => 'Ekspansi Peternakan', 'desc' => 'Meluncurkan lini produk monitoring kandang.'],
            ['year' => '2024', 'title' => 'Platform IoT', 'desc' => 'Integrasi aplikasi mobile untuk semua produk.'],
            ['year' => '2026', 'title' => 'Nasional', 'desc' => 'Melayani ribuan petani di seluruh Indonesia.'],
        ];
    }

$smartfarming = json_decode(Setting::get('smartfarming', '[]'), true);
if (empty($smartfarming)) {
    $smartfarming = [
        'title' => 'Apa itu Smart Farming?',
        'desc'  => 'Smart farming adalah pendekatan pertanian modern yang memanfaatkan sensor IoT untuk memantau kondisi lingkungan secara realtime. Dengan data suhu, kelembapan, dan pH, petani dapat mengambil keputusan lebih cepat dan mengurangi risiko gagal panen.',
    ];
}

return view('admin.site.edit', compact('company', 'team', 'journey', 'smartfarming'));
}

public function update(Request $request): RedirectResponse
{
    $company = [
        'photo' => $request->input('company.photo', ''),
        'profil' => $request->input('company.profil', ''),
        'visi'  => $request->input('company.visi', ''),
        'misi'  => $request->input('company.misi', ''),
    ];
    Setting::set('company', json_encode($company));

    $team = [];
    foreach ($request->input('team', []) as $member) {
        if (empty($member['name'])) continue;
        $team[] = [
            'name'  => $member['name'],
            'role'  => $member['role'] ?? '',
            'photo' => $member['photo'] ?? '',
        ];
    }
    Setting::set('team', json_encode($team));

    $journey = [];
    foreach ($request->input('journey', []) as $item) {
        if (empty($item['title'])) continue;
        $journey[] = [
            'year'  => $item['year'] ?? '',
            'title' => $item['title'],
            'desc'  => $item['desc'] ?? '',
        ];
    }
    Setting::set('journey', json_encode($journey));
    
    $smartfarming = [
        'title' => $request->input('smartfarming.title', ''),
        'desc'  => $request->input('smartfarming.desc', ''),
    ];
    Setting::set('smartfarming', json_encode($smartfarming));

    return redirect()->route('admin.site.edit')
        ->with('success', 'Data perusahaan berhasil diperbarui.');
}
}
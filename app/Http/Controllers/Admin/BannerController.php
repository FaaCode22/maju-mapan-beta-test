<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BannerController extends Controller
{
    public function edit(): View
    {
        $banners = json_decode(Setting::get('banners', '[]'), true);
        if (empty($banners)) {
            $banners = config('site.banners');
        }

        $headers = json_decode(Setting::get('headers', '[]'), true);
        if (empty($headers)) {
            $headers = config('site.headers');
        }

        return view('admin.banners.edit', compact('banners', 'headers'));
    }

    public function update(Request $request): RedirectResponse
    {
        // Simpan banners
        $banners = [];
        foreach ($request->input('banners', []) as $banner) {
            $banners[] = [
                'image'                  => $banner['image'] ?? '',
                'title'                  => $banner['title'] ?? '',
                'subtitle'               => $banner['subtitle'] ?? '',
                'cta_text'               => $banner['cta_text'] ?? '',
                'cta_url'                => $banner['cta_url'] ?? '',
                'cta_secondary_text'     => $banner['cta_secondary_text'] ?? '',
                'cta_secondary_whatsapp' => $banner['cta_secondary_whatsapp'] ?? '',
            ];
        }
        Setting::set('banners', json_encode($banners));

        // Simpan headers
        $headers = $request->input('headers', []);
        Setting::set('headers', json_encode($headers));

        return redirect()->route('admin.banners.edit')
            ->with('success', 'Banner & Header berhasil diperbarui.');
    }
}
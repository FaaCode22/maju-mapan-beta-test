<?php

namespace App\Support;

class WhatsappHelper
{
    public static function url(?string $message = null): string
    {
        $number = preg_replace('/\D/', '', config('site.whatsapp'));
        $url = "https://wa.me/{$number}";

        if ($message) {
            $url .= '?text=' . rawurlencode($message);
        }

        return $url;
    }

    public static function orderMessage(string $productName): string
    {
        return "Halo admin, saya ingin membeli {$productName}";
    }
}

<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class LocaleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();
        $locale = $session->get('lang') ?? Services::request()->getLocale();
        
        // Ensure the locale is supported
        $supportedLocales = config('App')->supportedLocales;
        if (!in_array($locale, $supportedLocales)) {
            $locale = config('App')->defaultLocale;
        }

        Services::language()->setLocale($locale);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}

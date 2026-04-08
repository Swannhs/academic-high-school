<?php

namespace App\Controllers;

class LangController extends BaseController
{
    public function index($locale)
    {
        $session = session();
        $supportedLocales = config('App')->supportedLocales;

        if (in_array($locale, $supportedLocales)) {
            $session->set('lang', $locale);
        }

        return redirect()->back();
    }
}

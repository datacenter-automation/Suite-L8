<?php

namespace App\Http\Controllers;

use App;
use App\General\SupportedLocales;
use App\Traits\LocaleCookie;
use Illuminate\Http\RedirectResponse;

class LanguagePreferenceController extends Controller
{

    use LocaleCookie;

    /**
     * Set Language for Translation.
     *
     * @param string $lang
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setLanguage(string $lang): RedirectResponse
    {
        App::setLocale($this->getLocale($lang));

        return back();
    }

    /**
     *  Get Locale for Translation.
     *
     * @param string $lang
     *
     * @return string
     */
    private function getLocale(string $lang): string
    {
        if (in_array($lang, SupportedLocales::Locales)) {
            LocaleCookie::setLanguageCookie($lang);

            return $lang;
        } else {
            return SupportedLocales::Default;
        }
    }
}

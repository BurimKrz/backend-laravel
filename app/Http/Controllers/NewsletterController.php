<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Http\Requests\SendNewsletterRequest;
use App\Services\NewsletterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NewsletterController extends Controller
{

    private NewsletterService $newsletterService;

    public function __construct(NewsletterService $newsletterService, ){
        $this->newsletterService = $newsletterService;
    }
    public function addNewsletter(NewsletterRequest $newsletterRequest, $language)
    {
        $locale = config('app.available_locales');
        App::setLocale($locale[$language]);
        return response()->json($this->newsletterService->newsletter($newsletterRequest, $language), 200);
    }

    public function sendNewsletter(SendNewsletterRequest $newsletter, $language)
    {
        $locale = config('app.available_locales');
        App::setLocale($locale[$language]);
        return response()->json($this->newsletterService->newsletterSent($newsletter, $language), 200);
    }
}

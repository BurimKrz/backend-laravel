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
    public function addNewsletter(NewsletterRequest $newsletterRequest, $languageId)
    {
        return response()->json($this->newsletterService->newsletter($newsletterRequest, $languageId), 200);
    }

    public function sendNewsletter(SendNewsletterRequest $newsletter, $languageId)
    {
        return response()->json($this->newsletterService->newsletterSent($newsletter, $languageId), 200);
    }
}

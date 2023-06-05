<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Services\NewsletterService;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    private NewsletterService $newsletterService;

    public function __construct(NewsletterService $newsletterService){
        $this->newsletterService = $newsletterService;
    }
    public function addNewsletter(NewsletterRequest $newsletterRequest)
    {
        return response()->json($this->newsletterService->newsletter($newsletterRequest), 200);
    }

    public function sendNewsletter(Request $request)
    {
        return response()->json($this->newsletterService->newsletterSent($request), 200);
    }
}

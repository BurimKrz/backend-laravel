<?php
namespace App\Services;

use App\Http\Requests\NewsletterRequest;
use App\Http\Requests\SendNewsletterRequest;
use App\Models\Newsletters;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Jobs\NewsletterJob;

class NewsletterService
{

    public function newsletter(NewsletterRequest $newsletterRequest)
    {
        $count = Newsletters::where('email', $newsletterRequest->email)->count();

        if ($count === 1) {
            return response()->json(['error' => 'Email already exists'], 400);
        } else {
            try {
                $newsletter = Newsletters::create([
                    'email' => $newsletterRequest->email,
                ]);

                return response()->json(['newsletter' => $newsletter], 201);
            } catch (QueryException $e) {
                return response()->json(['error' => 'Something went wrong'], 500);
            }
        }
    }

    public function newsletterSent(SendNewsletterRequest $newsletter){
        {
            dispatch(new NewsletterJob($newsletter->subject, $newsletter->message));

            return response()->json(['message' => 'Newsletter sent successfully'], 200);
        }
    }
}

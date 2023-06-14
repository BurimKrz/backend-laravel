<?php
namespace App\Services;

use App\Http\Requests\NewsletterRequest;
use App\Http\Requests\SendNewsletterRequest;
use App\Models\Newsletters;
use Illuminate\Database\QueryException;
use App\Jobs\NewsletterJob;

class NewsletterService
{

    public function newsletter(NewsletterRequest $newsletterRequest, $language)
    {
        $count = Newsletters::where('email', $newsletterRequest->email)->count();

        if ($count === 1) {
            return response()->json(['error' => __('messages.emailExist')], 400);
        } else {
            try {
                $newsletter = Newsletters::create([
                    'email' => $newsletterRequest->email,
                ]);

                return response()->json(['newsletter' => $newsletter], 201);
            } catch (QueryException $e) {
                return response()->json(['error' => __('messages.emailWrong')], 500);
            }
        }
    }

    public function newsletterSent(SendNewsletterRequest $newsletter, $language){
        {
            dispatch(new NewsletterJob($newsletter->subject, $newsletter->message));

            return response()->json(['message' =>  __('messages.newsletter')], 200);
        }
    }
}

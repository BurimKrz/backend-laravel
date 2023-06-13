<?php
namespace App\Implementations;
use App\Http\Requests\SuccessStoriesRequest;
use App\Interfaces\SuccessStoriesInterface;
use App\Models\SuccessStories;

class SuccessStoriesImplementation implements SuccessStoriesInterface
{

    public function successStory(SuccessStoriesRequest $successStories)
    {
       return SuccessStories::create([
            'company_id'     => $successStories->company_id,
            'topic'          => $successStories->topic,
            'representative' => $successStories->representative,
            'message'        => $successStories->message,
            'image_URL'      => $successStories->image_URL,
        ]);
    }
}

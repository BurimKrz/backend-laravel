<?php
namespace App\Services;

use App\Models\SuccessStories;

class SuccessStoriesService{

    public function sucessStory(){
        return SuccessStories::join('company', 'company.id', 'success_stories.id')
        ->select(['company.name', 'success_stories.topic', 'success_stories.representative', 'success_stories.message', 'success_stories.image_URL'])
        ->paginate(10);
    }
}
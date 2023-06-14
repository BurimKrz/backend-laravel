<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SuccessStoriesRequest;
use App\Interfaces\SuccessStoriesInterface;
use App\Services\SuccessStoriesService;

class SuccessStoriesController extends Controller
{
    private SuccessStoriesInterface $successStoriesInterface;
    private SuccessStoriesService $successStoriesService;

    public function __construct(SuccessStoriesInterface $successStoriesInterface, SuccessStoriesService $successStoriesService){
        $this->successStoriesInterface = $successStoriesInterface;
        $this->successStoriesService = $successStoriesService;
    }

    public function addSucessStories(SuccessStoriesRequest $successStories){

        return response()->json($this->successStoriesInterface->successStory($successStories), 200);
    }

   public function successStories(){

        return response()->json($this->successStoriesService->sucessStory(), 200);
   }
}

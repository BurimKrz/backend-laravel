<?php

namespace App\Interfaces;
use App\Http\Requests\SuccessStoriesRequest;

interface SuccessStoriesInterface{

    public function successStory(SuccessStoriesRequest $sussessStrories);
}
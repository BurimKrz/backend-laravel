<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\company;
class CompanyListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id' => $this->id,
        'name' => $this->name,
        'keywords' => $this->keywords,
        'country' => $this->country,
        'web_address'=> $this->web_address,
        'more_info'=> $this->more_info,
        'budged'=> $this->budged,
        'type'=> $this->type,
        'taxpayer_office'=> $this->taxpayer_office,
        'TIN'=> $this->TIN,
        'category_id' => $this->category_id,
        'subcategory_id' => $this->subcategory_id,
        'profile_picture' => $this -> profile_picture,
        'membership' => $this -> membership
        ];
    }
}
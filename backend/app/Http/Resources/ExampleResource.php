<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExampleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // ah nis default vea jg brer ah ng kor ban
        // return parent::toArray($request);

        // or yg arch customize klun eng for data dae yg jg return tv oy frontend
        // ah nis kron jea example
        return [
            'field_name' => $this->field_name_in_model,
        ];


    }
}
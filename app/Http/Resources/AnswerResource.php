<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'user' => $this->user,
            'classroom' => $this->question->classroom,
            'question' => $this->question,
            'answer' => $request->answer,
            'visibility' => $request->visibility,
        ];
    }
}

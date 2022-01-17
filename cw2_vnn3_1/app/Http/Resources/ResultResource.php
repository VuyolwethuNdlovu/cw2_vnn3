<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'questions_id'=>$this->questions_id,
            'option_id'=>$this->option_id,
            'count'=>$this->count,
        ];
    }
}

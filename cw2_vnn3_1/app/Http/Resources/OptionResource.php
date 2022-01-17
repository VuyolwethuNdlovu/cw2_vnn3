<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'option_id'=>$this->option_id,
            'questions_id'=>$this->questions_id,
            'option_text'=>$this->option_text,
        ];
    }

}

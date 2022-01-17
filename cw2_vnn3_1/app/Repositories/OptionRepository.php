<?php


namespace App\Repositories;


use App\Models\Option;
use App\Repositories\Interfaces\OptionReposiotoryInterface;

class OptionRepository implements OptionReposiotoryInterface
{
    protected $model;

    public function __construct(Option $model)
    {
        $this->model = $model;
    }

    public function getOptionsForQuestion($question_id)
    {
        return $this->model
            ->join('questions', 'questions.questions_id', '=', 'options.questions_id')
            ->select('questions.questions_id', 'questions.question_text', 'options.option_id','options.option_text')
            ->where('options.questions_id','=',$question_id)
            ->get();


//        return $this
//            ->model
//            ->select('option_id','option_text')
//            ->where('questions_id', $question_id)
//            ->get();
    }
}

<?php


namespace App\Repositories;


use App\Models\Result;
use App\Repositories\Interfaces\ResultRepositoryInterface;

class ResultRepository implements ResultRepositoryInterface
{
    protected $model;

    public function __construct(Result $model)
    {
        $this->model = $model;
    }

    public function createAnswerResult($user_id, $questions_id, $option_id)
    {
        return $this->model->create([
            'user_id'=> $user_id,
            'questions_id'=>$questions_id,
            'chosen_option_id' => $option_id,
        ]);
    }

    public function isQuestionAnswered($questions_id, $user_id)
    {
        return $this->model
            ->where('questions_id',$questions_id)
            ->where('user_id',$user_id)
            ->first();
    }

    public function getQuestionResult($questions_id)
    {

         //select Question, option id, count with how many user have it
        return $this->model
            ->select('questions_id','chosen_option_id')
            ->where('questions_id',$questions_id)
            ->selectRaw('count(*) as count')
            ->groupBy('questions_id','chosen_option_id')
            ->get();

    }

}

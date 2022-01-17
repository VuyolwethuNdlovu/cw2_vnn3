<?php


namespace App\Repositories\Interfaces;


interface ResultRepositoryInterface
{
    public function createAnswerResult($user_id, $questions_id, $option_id);

}

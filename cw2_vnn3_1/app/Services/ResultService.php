<?php


namespace App\Services;


use App\Repositories\ResultRepository;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class ResultService
{
    protected $resultRepo;

    public function __construct(ResultRepository $resultRepo)
    {
        $this->resultRepo = $resultRepo;
    }

    public function saveAnswerResult($user_id, $questions_id, $option_id)
    {
        return $this->resultRepo->createAnswerResult($user_id,$questions_id,$option_id);
    }

    public function checkIfQuestionAnswered($questions_id, $user_id)
    {
        $notAnswered =  $this->resultRepo->isQuestionAnswered($questions_id,$user_id);
        Log::alert($notAnswered);
        if (empty($notAnswered)){
            return 'true';
        } else{
            return 'false';
        }

    }

    public function showQuestionResult($questions_id)
    {
        return $this->resultRepo->getQuestionResult($questions_id);
    }

}

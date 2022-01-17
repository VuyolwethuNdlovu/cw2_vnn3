<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\User;
use App\Services\ResultService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    protected $resultService;

    public function __construct(ResultService $resultService)
    {
        $this->resultService = $resultService;
    }
    public function index()
    {
        //
    }

    public function saveAnswer(Request $request)
    {
        Log::error($request->input('questionId'));
        Log::error($request->input('optionId'));

        $questions_id = $request->input('questionId');
        $option_id = $request->input('optionId');
        $user_id = $request->input('userId');

        $store  = $this->resultService->saveAnswerResult($user_id,$questions_id,$option_id);
        Log::alert($store);
        return $store;
    }

    public function showResult($questions_id)
    {
        $result =  $this->resultService->showQuestionResult($questions_id);
        return Collection::make($result)->toArray();
    }

    public function checkUserAnswered($questions_id, $user_id ): string
    {

        return $this->resultService->checkIfQuestionAnswered($questions_id,$user_id);

    }




}

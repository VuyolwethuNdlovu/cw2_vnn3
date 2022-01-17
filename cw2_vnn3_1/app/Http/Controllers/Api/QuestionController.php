<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Services\QuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

//    protected $questionService;
//
//    public function __construct(QuestionService $questionService)
//    {
//        $this->questionService = $questionService;
//    }

    public function index()
    {
        return QuestionResource::collection(Question::all());
    }

    public function create()
    {
        //
    }




    public function edit(Question $question)
    {
        //
    }

    public function update(Request $request, Question $question)
    {
        //
    }


    public function destroy(Question $question)
    {
        //
    }
}

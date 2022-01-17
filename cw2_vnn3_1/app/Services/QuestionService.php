<?php


namespace App\Services;


use App\Models\Question;
use App\Repositories\QuestionRepository;

class QuestionService
{
    protected $questionRepo;

    public function __construct(QuestionRepository $questionRepo)
    {
        $this->questionRepo = $questionRepo;
    }

}


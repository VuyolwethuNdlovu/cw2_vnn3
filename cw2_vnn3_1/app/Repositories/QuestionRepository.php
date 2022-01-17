<?php


namespace App\Repositories;


use App\Models\Question;
use App\Repositories\Interfaces\QuestionRepositoryInterface;

class QuestionRepository implements QuestionRepositoryInterface
{
    protected $model;

    public function __construct(Question $model)
    {
        $this->model = $model;
    }

    public function getAllQuestions()
    {
        // TODO: Implement getAllQuestions() method.
    }

    public function getQuestionById(int $id)
    {
        // TODO: Implement getQuestionById() method.
        return $this->model->where('questions_id', $id)->first();
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}

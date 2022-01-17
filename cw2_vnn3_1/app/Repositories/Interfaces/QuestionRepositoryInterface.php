<?php


namespace App\Repositories\Interfaces;


interface QuestionRepositoryInterface
{
    public function getAllQuestions();
    public function getQuestionById(int $id);
    public function create();
    public function edit();
    public function delete();


}

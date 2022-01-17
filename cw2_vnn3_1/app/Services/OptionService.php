<?php


namespace App\Services;


use App\Models\Question;
use App\Repositories\OptionRepository;
use App\Repositories\QuestionRepository;

class OptionService
{
    protected $optionRepo;

    public function __construct(OptionRepository $optionRepo)
    {
        $this->optionRepo = $optionRepo;
    }
    public function getOptionsForQuestion($question_id)
    {
        $options = $this->optionRepo->getOptionsForQuestion($question_id);


        return $options;



    }

}

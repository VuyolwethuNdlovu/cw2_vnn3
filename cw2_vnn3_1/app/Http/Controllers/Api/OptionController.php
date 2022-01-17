<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OptionResource;
use App\Models\Option;
use App\Models\Question;
use App\Services\OptionService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    protected $optionService;

    public function __construct(OptionService $optionService)
    {
        $this->optionService = $optionService;
    }

//    public function index()
//    {
//        return OptionResource::collection(Option::all());
//    }

    public function getOptionsForQuestion($id)
    {
        $options= $this->optionService->getOptionsForQuestion($id);

        return Collection::make($options)->toArray();

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function edit(Option $option)
    {
        //
    }


    public function update(Request $request, Option $option)
    {
        //
    }


    public function destroy(Option $option)
    {
        //
    }
}

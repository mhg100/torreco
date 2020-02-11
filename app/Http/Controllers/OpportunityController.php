<?php


namespace App\Http\Controllers;


use App\Http\services\APIService;

class OpportunityController extends Controller
{
    private $apiService;

    /**
     * ProfileController constructor.
     * @param $apiService
     */
    public function __construct(APIService $apiService)
    {
        $this->apiService = $apiService;
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function show($id)
    {
        $opportunity = $this->apiService->getOpportunity($id);
        return view('opportunity')
            ->with('opportunity', $opportunity);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\services\APIService;

class PeopleController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $results = $this->apiService->getPeople();
        return view('people')
            ->with('results', $results);
    }
}

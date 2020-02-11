<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\services\APIService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
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
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        try {
            $profile = $this->apiService->getProfile();
            $persons = $this->apiService->getNetwork();
            return view('profile.edit')
                ->with('profile', $profile)
                ->with('persons', $persons);
        } catch (\Exception $e) {
            Log::error('Exception', ['exception' => $e]);
            return view(500);
        }
    }


    public function show($name)
    {
        try {
            $profile = $this->apiService->getProfile($name);
            $persons = $this->apiService->getNetwork($name);
            return view('profile.edit')
                ->with('profile', $profile)
                ->with('persons', $persons);
        } catch (\Exception $e) {
            Log::error('Exception', ['exception' => $e]);
            return view(500);
        }
    }

    /**
     * Update the profile
     *
     * @param \App\Http\Requests\ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param \App\Http\Requests\PasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }
}

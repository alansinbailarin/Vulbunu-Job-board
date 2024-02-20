<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class AdminController extends Controller
{
    public function dashboard()
    {
        // if (auth()->user()->userRoles->first()->role_id !== 1 || auth()->user()->email !== 'agpsalgado@gmail.com') {
        //     return abort(Response::HTTP_UNAUTHORIZED);
        // }

        if (auth()->user()->email !== 'agpsalgado@gmail.com') {
            return abort(Response::HTTP_UNAUTHORIZED);
        }

        return inertia('Admin/Dashboard', []);
    }

    public function locations()
    {
        // Paginate countries
        $countries = Country::paginate(20);
        $states = State::paginate(2000);
        $cities = City::paginate(20);

        // if (auth()->user()->userRoles->first()->role_id !== 1) {
        //     return abort(Response::HTTP_UNAUTHORIZED);
        // }

        if (auth()->user()->email !== 'agpsalgado@gmail.com') {
            return abort(Response::HTTP_UNAUTHORIZED);
        }

        return inertia('Admin/Locations', [
            'countries' => $countries,
            'states' => $states,
            'cities' => $cities
        ]);
    }

    public function addCountry(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Country::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Country added');
    }

    public function addState(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'country_id' => 'required|integer|exists:countries,id'
        ]);

        State::create([
            'name' => $request->name,
            'country_id' => $request->country_id
        ]);

        return redirect()->back()->with('success', 'State added');
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserLocation extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $validateData = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required_with:country_id',
            'city_id' => 'nullable',
        ]);

        $user->country_id = $validateData['country_id'];
        $user->state_id = $validateData['state_id'];
        $user->city_id = $validateData['city_id'];

        $user->save();

        return redirect()->back()->with('success', 'Location updated');
    }
}

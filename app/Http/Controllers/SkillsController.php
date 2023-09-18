<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\SkillUser;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $validateData = $request->validate([
            'skill_id' => 'required|exists:skills,id'
        ]);

        $skillsId = $request->input('skill_id', []);

        try {

            $skillsCount = $user->skill()->count();

            if ($skillsCount <= 10) {
                if ($user)

                    DB::beginTransaction();

                foreach ($skillsId as $skillId) {
                    // Verifica si la skill ya está asociada al usuario
                    $existingSkill = SkillUser::where('user_id', $user->id)
                        ->where('skill_id', $skillId)
                        ->exists();

                    // Si la skill no está asociada, crea un nuevo registro
                    if (!$existingSkill) {
                        SkillUser::create([
                            'user_id' => $user->id,
                            'skill_id' => $skillId
                        ]);
                    }
                }

                DB::commit();

                return redirect()->back()->with('success', 'Skills updated');
            } else {
                return redirect()->back()->with('success', 'Max count of skills is 10, you have: ' . $skillsCount);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('success', 'Error updating skills');
        }
    }

    public function deleteSkill(Request $request)
    {
        $user = Auth::user();
        $skillId = $request->input('skill_id');

        // Verifica si la habilidad está asociada al usuario y elimínala
        $user->skill()->detach($skillId);

        return redirect()->back()->with('success', 'Skill deleted');
    }
}

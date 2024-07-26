<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;
use Illuminate\Support\Facades\Validator;
class FishController extends Controller
{
    public function index()
    {
        return response()->json(Fish::all());
    }
    public function detail(Fish $fish)
    {
        return response()->json($fish);
    }
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|integer',
            'caution_flg' => 'required|boolean',
            'np_flg' => 'required|boolean',
            'f_cost' => 'required|integer',
            'display' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $fish = Fish::create($request->all());
        return response()->json($fish, 201);
    }

    public function update(Request $request, Fish $fish)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|integer',
            'caution_flg' => 'required|boolean',
            'np_flg' => 'required|boolean',
            'f_cost' => 'required|integer',
            'display' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $fish->update($request->all());
        return response()->json($fish);
    }
    public function delete(Fish $fish)
    {
        $fish->delete();
        return $fish;
    }
}

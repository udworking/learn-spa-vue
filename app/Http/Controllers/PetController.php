<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
class petController extends Controller
{
    public function index()
    {
        // すべてのpetsTBLのレコードを取得
        $pet = Pet::all();
        // すべてのカテゴリを取得し、マッピングを作成
        $categories = Category::all() -> pluck('phylum', 'category');
        // カテゴリ名を置換した新しい配列
        $petswithphylm = $pet->map(function ($pet) use ($categories){
            $pet->category_name = $categories[$pet->category] ?? 'unknown';
            return $pet;
        });
        return response()->json([$petswithphylm]);
    }
    public function detail(Pet $pet)
    {
        return response()->json($pet);
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

        $pet = pet::create($request->all());
        return response()->json($pet, 201);
    }
    public function update(Request $request, pet $pet)
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

        $pet->update($request->all());
        return response()->json($pet);
    }
    public function destroy($id)
    {
        $pet = pet::find($id);
        if ($pet) {
            $pet->delete();
            return response()->json(['message' => 'pet deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'pet not found'], 404);
        }
    }
}

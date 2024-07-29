<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
class FishController extends Controller
{
    public function index()
    {
        // すべてのfishTBLのレコードを取得
        $fish = Fish::all();
        // すべてのカテゴリを取得し、マッピングを作成
        $categories = Category::all() -> pluck('phylum', 'category');
        // カテゴリ名を置換した新しい配列
        $fishwithphylum = $fish->map(function ($fish) use ($categories){
            $fish->category_name = $categories[$fish->category] ?? 'unknown';
            return $fish;
        });
        return response()->json(['original' => $fish, 'trans_category_name' => $fishwithphylum]);
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
    public function destroy($id)
    {
        $fish = Fish::find($id);
        if ($fish) {
            $fish->delete();
            return response()->json(['message' => 'Fish deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Fish not found'], 404);
        }
    }
    

}
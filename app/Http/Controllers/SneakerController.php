<?php

namespace App\Http\Controllers;

use App\Models\Sneaker;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SneakerController extends Controller
{
    // public function index(): Collection
    // {
    //     $sneakers = Sneaker::all();
        
    //     return $sneakers;
    // }

    public function read(Sneaker $sneaker): JsonResponse
    {
        return response()->json($sneaker, Response::HTTP_OK);
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'string',
            'colorway' => 'string',
            'gender' => 'string',
            'name' => 'string',
            'releaseDate' => 'string',
            'retailPrice' => 'string',
            'shoe' => 'string',
            'styleId' => 'string',
            'title' => 'string',
            'year' => 'string',
            'media' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Please fill in the form to continue'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $data = $request->all();

        $sneaker = Sneaker::create($data);
        
        return response()->json($sneaker, Response::HTTP_CREATED);
    }

    public function update(Request $request, Sneaker $sneaker): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'string',
            'colorway' => 'string',
            'gender' => 'string',
            'name' => 'string',
            'releaseDate' => 'string',
            'retailPrice' => 'string',
            'shoe' => 'string',
            'styleId' => 'string',
            'title' => 'string',
            'year' => 'string',
            'media' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Please fill in the form to continue'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $data = $request->all();

        $sneaker->update($data);
        
        return response()->json($sneaker);
    }

    public function delete(Sneaker $sneaker): JsonResponse
    {
        $sneaker->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

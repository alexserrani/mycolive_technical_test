<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TriviaController extends Controller
{
    public function index()
    {
        $response = Http::get('https://opentdb.com/api.php', [
            'amount' => 10,
            'category' => 9,
            'difficulty' => 'easy',
            'type' => 'multiple',
            'encode' => 'url3986',
        ]);

        $questions = $response->json()['results'];

        return view('index', compact('questions'));
    }
}

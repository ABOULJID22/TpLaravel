<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeamController extends Controller
{
    public function index()
    {
        $url = "https://worldcupjson.net/teams";
        $url2 = "https://cdn.jsdelivr.net/npm/country-flag-emoji-json@2.0.0/dist/by-code.json";
        $response1 = Http::get($url);
        $response2 = Http::get($url2);

        if ($response1->successful() && $response2->successful()) {
            $data = $response1->json();
            $flags = $response2->json();

            return view('teams/index', compact('data', 'flags'));
        }
    }
}

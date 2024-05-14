<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function store(Request $request, Link $link)
    {
        return $link->visits()
            ->create([
                'user_agent' => $request->userAgent()
            ]);
    }
}

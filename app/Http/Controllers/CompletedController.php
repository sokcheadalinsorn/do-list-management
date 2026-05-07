<?php

namespace App\Http\Controllers;

use App\Models\Completed;
use Illuminate\Http\Request;

class CompletedController extends Controller  // ← was wrongly named TaskController
{
    public function index()
    {
        return view('completed.index');
    }
}
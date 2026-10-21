<?php

namespace App\Http\Controllers;

use App\Support\Cars;
use Illuminate\View\View;

class CollectieController extends Controller
{
    public function index(): View
    {
        return view('collectie', ['cars' => Cars::all()]);
    }

    public function show(string $slug): View
    {
        $car = Cars::find($slug) ?? abort(404);

        return view('collectie-auto', ['car' => $car]);
    }
}

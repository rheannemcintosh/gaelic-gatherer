<?php

namespace App\Http\Controllers;

use App\Helpers\UnitHelper;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units           = Unit::with('lessons')->get();
        $unitPercentages = UnitHelper::getCompletionPercentagesOfAllUnits($units);

        return view('pages.overview', compact('units', 'unitPercentages'));
    }
}

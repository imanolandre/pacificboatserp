<?php

namespace App\Http\Controllers;

use App\Models\Week;
use Illuminate\Http\Request;
use Carbon\Carbon;

/**
 * Class WeekController
 * @package App\Http\Controllers
 */
class WeekController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weeks = Week::orderBy('date')->get();

        $organizedWeeks = [];
        $currentWeekNumber = 1;
        $currentSubWeek = 1;

        foreach ($weeks as $week) {
            $date = Carbon::parse($week->date);
            $weekOfYear = $date->weekOfYear;
            $dayOfWeek = $date->dayOfWeek;

            // Ajuste para que los lunes a miércoles sean "semana 1" y jueves a domingo sean "semana 2"
            $subWeek = ($dayOfWeek >= 1 && $dayOfWeek <= 3) ? 1 : 2;

            if (!isset($organizedWeeks[$currentWeekNumber])) {
                $organizedWeeks[$currentWeekNumber] = [];
            }

            if (!isset($organizedWeeks[$currentWeekNumber][$subWeek])) {
                $organizedWeeks[$currentWeekNumber][$subWeek] = [];
            }

            $organizedWeeks[$currentWeekNumber][$subWeek][$date->format('l')][] = $week;

            // Cambiar al siguiente conjunto de semanas después de dos sub-semanas
            if ($subWeek == 2 && $currentSubWeek == 2) {
                $currentWeekNumber++;
                $currentSubWeek = 1;
            } else {
                $currentSubWeek++;
            }
        }

        return view('weeks.index', compact('organizedWeeks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $week = new Week();
        return view('weeks.create', compact('week'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Week::$rules);

        $week = Week::create($request->all());

        return redirect()->route('weeks.index')
            ->with('success', 'Week created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $week = Week::find($id);

        return view('weeks.show', compact('week'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $week = Week::find($id);

        return view('weeks.edit', compact('week'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Week $week
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Week $week)
    {
        request()->validate(Week::$rules);

        $week->update($request->all());

        return redirect()->route('weeks.index')
            ->with('success', 'Week updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $week = Week::find($id)->delete();

        return redirect()->route('weeks.index')
            ->with('success', 'Week deleted successfully');
    }
}

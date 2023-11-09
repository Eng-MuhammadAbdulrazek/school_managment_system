<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;


class SchoolGradesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Grades = Grade::all();
        return view('Pages.Grades.Grades', compact('Grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradeRequest $request)
    {
        $validated = $request->validated();
        $Grade = new Grade();
        $Grade->Name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $Notes = '';
        if( Str::length($request->Notes) > 0){
        $Grade->Notes = $request->Notes;
        }
        else{
            $Grade->Notes = $Notes;
        }
        $Grade->save();
        Toastr::success(trans('messages.success'), '', ["positionClass" => "toast-bottom-center"]);
        return redirect()->route('Grades.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        //
    }
}

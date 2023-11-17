<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Grade;
use App\Models\Classroom;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;

class SectionController extends Controller
{
    
    public function index()
    {   
        $GradeWithSections = Grade::with('Sections')->get();
        
        $Grades = Grade::all();
        return view('Pages.Sections',compact('Grades','GradeWithSections'));
    }

    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        dd($request);
    }

    public function getClasses($id){
        $ClassList = Classroom::where('Grade_id', $id)->pluck('Name','id');
        return $ClassList;
    }

    public function update(UpdateSectionRequest $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}

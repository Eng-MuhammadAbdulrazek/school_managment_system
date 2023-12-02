<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Grade;
use App\Models\Classroom;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    
    public function index()
    {   
        $Grades = Grade::with('Sections')->get();
        
        $Grades_list = Grade::all();

        return view('Pages.Sections',compact('Grades','Grades_list'));
    }

    public function store(Request $request)
    {
        
            $Section = new Section();
            $Section->name = ['en' => $request['name_en'], 'ar' => $request['name_ar']];
            $Section->status = 1;
            $Section->grade_id = (int)$request->grade;
            $Section->class_id = (int)$request->class;
            $Section->save();
            Toastr::success(trans('messages.success'), '', ["positionClass" => "toast-bottom-center"]);
            return redirect()->route('Sections.index');    
        
       
    }

    public function getClasses($id){
        $ClassList = Classroom::where('Grade_id', $id)->pluck('Name','id');
        return $ClassList;
    }

    public function update(Request $request,$id)
    {
        $Section = Section::findOrFail($id);
            $Section->name = ['en' => $request['name_en'], 'ar' => $request['name_ar']];
            $Section->status = 1;
            $Section->grade_id = (int)$request->grade;
            $Section->class_id = (int)$request->class;
            $Section->save();
            Toastr::success(trans('messages.success'), '', ["positionClass" => "toast-bottom-center"]);
            return redirect()->route('Sections.index');    
    }


    public function destroy(Request $request)
    {
        Section::findOrFail($request->id)->delete();
        Toastr::success(trans('messages.deleted'), '', ["positionClass" => "toast-bottom-center"]);
        return redirect()->route('Sections.index');  
    }
}

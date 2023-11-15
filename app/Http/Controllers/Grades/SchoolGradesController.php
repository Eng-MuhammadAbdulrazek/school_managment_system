<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grade;
use App\Models\Classroom;
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

        if(Grade::where('Name->ar', $request->name_ar)->orWhere('Name->en',$request->name_en)->exists()){
            Toastr::error(trans('messages.nameExist'), '', ["positionClass" => "toast-bottom-center"]);
            return redirect()->route('Grades.index');
        }

        try{
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
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGradeRequest $request)
    {
        try{
            $validated = $request->validated();
            $Grade = Grade::findOrFail($request->id);
            
            $Notes = '';
            if( Str::length($request->Notes) > 0){
            $Notes = $request->Notes;
            }
            else{
                $Notes = '';
            }        

            $Grade->update([
                $Grade->Name = ['en' => $request->name_en, 'ar' => $request->name_ar],
                $Grade->Notes = $Notes,
            ]);
            $Grade->save();
            Toastr::success(trans('messages.updated'), '', ["positionClass" => "toast-bottom-center"]);
            return redirect()->route('Grades.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request )
    {

        $Classes_IDs = Classroom::where('Grade_id', $request->id)->pluck('id'); 
        // dd($Classes_IDs);
        if($Classes_IDs->count() == 0){
            Grade::findOrFail($request->id)->delete();
            Toastr::success(trans('messages.deleted'), '', ["positionClass" => "toast-bottom-center"]);
            return redirect()->route('Grades.index');
        }
       else{
        Toastr::error(trans('messages.Grade_Classes_Error'), '', ["positionClass" => "toast-bottom-center"]);
        return redirect()->route('Grades.index');
       }
    }
}

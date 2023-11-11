<?php 

namespace App\Http\Controllers\Classrooms;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use Brian2694\Toastr\Facades\Toastr;

class ClassroomController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $classrooms = Classroom::all();
    $Grades = Grade::all();
  
    return view('Pages.Classrooms.Classrooms', compact('classrooms', 'Grades'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ClassroomRequest $request)
  {

    if (Classroom::where('Grade_id', $request->Grade)
    ->where(function ($query) use ($request) {
        $query->where('Name->ar', $request->name_ar)
            ->orWhere('Name->en', $request->name_en);
    })->exists())
     {
            Toastr::error(trans('messages.nameExist'), '', ["positionClass" => "toast-bottom-center"]);
            return redirect()->route('Classrooms.index');
        }
    try{
      $validated = $request->validated();
      $classroom = new Classroom();
      $classroom->Name = ['en' => $request->name_en, 'ar' => $request->name_ar];
      $classroom->Grade_id = $request->Grade;
      $classroom->save();
      Toastr::success(trans('messages.success'), '', ["positionClass" => "toast-bottom-center"]);
      return redirect()->route('Classrooms.index');
    }
    catch(\Exception $e){
      return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>
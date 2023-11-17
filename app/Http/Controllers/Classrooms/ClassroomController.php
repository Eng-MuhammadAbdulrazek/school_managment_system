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
        public function index()
        {
          $classrooms = Classroom::all();
          $Grades = Grade::all();
        
          return view('Pages.Classrooms.Classrooms', compact('classrooms', 'Grades'));
        }

        public function store(ClassroomRequest $request)
        {
          
          $dataArray = $request->input();
          unset($dataArray['_token']);
              // Create an array to store the structured data
          $structuredData = [];
          // Ensure that all three keys exist and have the same number of values
          if (
              isset($dataArray['name_en'], $dataArray['name_ar'], $dataArray['Grade']) &&
              is_array($dataArray['name_en']) &&
              is_array($dataArray['name_ar']) &&
              is_array($dataArray['Grade']) &&
              count($dataArray['name_en']) === count($dataArray['name_ar']) &&
              count($dataArray['name_en']) === count($dataArray['Grade'])
          ) {
              // Iterate over the arrays and structure the data
              for ($i = 0; $i < count($dataArray['name_en']); $i++) {
                  $structuredData[] = [
                      'name_en' => $dataArray['name_en'][$i],
                      'name_ar' => $dataArray['name_ar'][$i],
                      'Grade' => $dataArray['Grade'][$i],
                  ];
              }
          }
          $error = [];
          foreach($structuredData as $entry){
            if (Classroom::where('Grade_id', $entry['Grade'])
            ->where(function ($query) use ($entry) {
                $query->where('Name->ar', $entry['name_ar'])
                    ->orWhere('Name->en', $entry['name_en']);
            })->exists())
            {
              Toastr::error(trans('messages.nameExist'), '', ["positionClass" => "toast-bottom-center"]);
              return redirect()->route('Classrooms.index');
            }
              $classroom = new Classroom();
              $classroom->Name = ['en' => $entry['name_en'], 'ar' => $entry['name_ar']];
              $classroom->Grade_id = $entry['Grade'];
              $classroom->save();
          }   
            Toastr::success(trans('messages.success'), '', ["positionClass" => "toast-bottom-center"]);
            return redirect()->route('Classrooms.index');
          

        }

        public function update(ClassroomRequest $request)
        {
          try{
            $validated = $request->validated();
            $Classroom = Classroom::findOrFail($request->id);
            
            $Classroom->update([
                $Classroom->Name = ['en' => $request->name_en, 'ar' => $request->name_ar],
                $Classroom->Grade_id = $request->Grade,
            ]);
            $Classroom->save();
            Toastr::success(trans('messages.updated'), '', ["positionClass" => "toast-bottom-center"]);
            return redirect()->route('Classrooms.index');
            }
          catch(\Exception $e){
              return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
          }
        }

        public function destroy(request $request)
        {
              Classroom::findOrFail($request->id)->delete();
              Toastr::success(trans('messages.deleted'), '', ["positionClass" => "toast-bottom-center"]);
              return redirect()->route('Classrooms.index');
        }

        public function destroySelected(request $request)
        {
            // Assuming you have the string in a variable named $requestData
            $requestData = $request->selected;

            // Use explode to create an array
            $itemArray = explode(', ', $requestData);

            // Loop through each item
            foreach ($itemArray as $item) {
              Classroom::findOrFail($item)->delete();
            }
            Toastr::success(trans('messages.deleted'), '', ["positionClass" => "toast-bottom-center"]);
              return redirect()->route('Classrooms.index');
        } 
}

?>
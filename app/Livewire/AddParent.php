<?php

namespace App\Livewire;

use App\Models\blood_types;
use App\Models\Nationality;
use App\Models\Relegion;
use Brian2694\Toastr\Toastr;
use Livewire\Component;

class AddParent extends Component
{

    public $currentStep = 1;


    public $email,
           $password,
           $fathername_en,
           $fathername_ar,
           $f_job_en,
           $f_job_ar,
           $f_ID,
           $f_phone,
           $f_nationality,
           $f_blood,
           $f_relegion
           ;

    
    public $successMsg = '';
  
    public function render()
    {
      
        return view('livewire.add-parent',[
            'relegions' => Relegion::all(),
            'bloods' => blood_types::all(),
            'nations' => Nationality::all(),
        ]);
    }

    /**
     * Write code on Method
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
            'fathername_en' => 'required',
            'fathername_ar' => 'required',
            'f_job_en' => 'required',
            'f_job_ar'=>'required',
            'f_ID' => 'required|min:11',
            'f_phone' => 'required|number'
            
        ],
        [
           'email'=>trans('Parents.emailver'),
           'password' => trans('Parents.passwordver'),
           'fathername_en' => trans('Parents.fathername_enver'),
           'fathername_ar' => trans('Parents.fathername_arver'),
           'f_job_en' => trans('Parents.f_job_enver'),
           'f_job_ar'=>trans('Parents.f_job_arver'),
           'f_ID' => trans('Parents.f_IDver'),
           'f_phone' => trans('Parents.f_phonever'),
        ]
    );


        echo "<script>console.log("+ $validatedData +")</script>";
        $this->currentStep = 2;
    }
  
    /**
     * Write code on Method
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'status' => 'required',
        ]);
  
        $this->currentStep = 3;
    }
  
    /**
     * Write code on Method
     */
    public function submitForm()
    {
        // Team::create([
        //     'name' => $this->name,
        //     'price' => $this->price,
        //     'detail' => $this->detail,
        //     'status' => $this->status,
        // ]);
  
        Toastr::success(trans('messages.success'), '', ["positionClass" => "toast-bottom-center"]);

        $this->clearForm();
  
        $this->currentStep = 1;
    }
  
    /**
     * Write code on Method
     */
    public function back($step)
    {
        $this->currentStep = $step;    
    }

}

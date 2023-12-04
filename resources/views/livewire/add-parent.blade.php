<div class="p-4">

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="multi-wizard-step">
                <a href="#step-1" type="button" style="height: auto !important;border: 1px solid #dbdbdb"
                    class="btn {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>{{ trans('Parents.fathinfo') }}</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-2" type="button" style="height: auto !important;border: 1px solid #dbdbdb !important"
                    class="btn {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>{{ trans('Parents.mothinfo') }}</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-3" type="button" style="height: auto !important;border: 1px solid #dbdbdb !important"
                    class="btn {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">3</a>
                <p>{{ trans('Parents.conf') }}</p>
            </div>
        </div>
    </div>
    <br><br>
    {{-- Step 1 --}}
    <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
        <div class="col-md-12">
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="email">{{ trans('Parents.email') }}</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-address-card"></i>
                      </div>
                    </div> 
                    <input id="email" name="email" type="email" class="form-control">
                  </div>
                  @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="password">{{ trans('Parents.pass') }}</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-lock"></i>
                      </div>
                    </div> 
                    <input id="password" name="password" type="password" class="form-control">
                  </div>
                  @error('password') <span class="error">{{ $message }}</span> @enderror

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="fathername_en">{{ trans('Parents.fathername_en') }}</label>
                  <div class="input-group">
                    <input id="fathername_en" name="fathername_en" type="text" class="form-control">
                  </div>
                  @error('fathername_en') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="fathername_ar">{{ trans('Parents.fathername_ar') }}</label>
                  <div class="input-group">
                    <input id="fathername_ar" name="fathername_ar" type="text" class="form-control">
                  </div>
                  @error('fathername_ar') <span class="error">{{ $message }}</span> @enderror

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="f_job_en">{{ trans('Parents.job_en') }}</label>
                  <div class="input-group">
                    <input id="f_job_en" name="f_job_en" type="text" class="form-control">
                  </div>
                  @error('f_job_en') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="f_job_ar">{{ trans('Parents.job_ar') }}</label>
                    <div class="input-group">
                      <input id="f_job_ar" name="f_job_ar" type="text" class="form-control">
                    </div>
                    @error('f_job_ar') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="f_ID">{{ trans('Parents.f_ID') }}</label>
                    <div class="input-group">
                      <input id="f_ID" name="f_ID" type="text" class="form-control">
                    </div>
                    @error('f_ID') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="f_phone">{{ trans('Parents.f_phone') }}</label>
                    <div class="input-group">
                      <input id="f_phone" name="f_phone" type="text" class="form-control">
                    </div>
                    @error('f_phone') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="f_nationality">{{ trans('Parents.f_nationality') }}</label>
                  <div class="input-group">

                    <select class="form-select form-control" name="f_nationality[]">
                        <option value="" disabled selected>{{ trans('Parents.chooseN') }}</option>
                        @foreach ($nations as $nation)
                        <option value="{{$nation->id}}">{{ $nation->name }}</option>
                        @endforeach
                    </select>

                  </div>
                </div>
              
                <div class="form-group col-md-3">
                    <label for="f_relegion">{{ trans('Parents.f_relegion') }}</label>
                    <div class="input-group">

                        <select class="form-select form-control" name="f_relegion[]">
                            <option value="" disabled selected>{{ trans('Parents.chooseR') }}</option>
                            @foreach ($relegions as $relegion)
                            <option value="{{$relegion->id}}">{{ $relegion->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="f_blood">{{ trans('Parents.f_blood') }}</label>
                    <div class="input-group">

                        <select class="form-select form-control" name="f_blood[]">
                            <option value="" disabled selected>{{ trans('Parents.chooseB') }}</option>
                            @foreach ($bloods as $blood)
                            <option value="{{$blood->id}}">{{ $blood->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" style="height: auto !important;font-size:auto !important"wire:click="firstStepSubmit"
                type="button">{{ trans('Parents.nxt') }}</button>
        </div>
    </div>
    {{-- End Step 1 --}}
    {{-- Step 2 --}}
    <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
        <div class="col-md-12">
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="mothername_en">{{ trans('Parents.mothername_en') }}</label>
                  <div class="input-group">
                    <input id="mothername_en" name="mothername_en" type="text" class="form-control">
                  </div>
                  @error('mothername_en') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="mothername_ar">{{ trans('Parents.mothername_ar') }}</label>
                  <div class="input-group">
                    <input id="mothername_ar" name="mothername_ar" type="text" class="form-control">
                  </div>
                  @error('mothername_ar') <span class="error">{{ $message }}</span> @enderror

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="m_job_en">{{ trans('Parents.m_job_en') }}</label>
                  <div class="input-group">
                    <input id="m_job_en" name="m_job_en" type="text" class="form-control">
                  </div>
                  @error('m_job_en') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="m_job_ar">{{ trans('Parents.m_job_ar') }}</label>
                    <div class="input-group">
                      <input id="m_job_ar" name="m_job_ar" type="text" class="form-control">
                    </div>
                    @error('m_job_ar') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="m_ID">{{ trans('Parents.m_ID') }}</label>
                    <div class="input-group">
                      <input id="m_ID" name="m_ID" type="text" class="form-control">
                    </div>
                    @error('m_ID') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="m_phone">{{ trans('Parents.m_phone') }}</label>
                    <div class="input-group">
                      <input id="m_phone" name="m_phone" type="text" class="form-control">
                    </div>
                    @error('m_phone') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="m_nationality">{{ trans('Parents.m_nationality') }}</label>
                  <div class="input-group">

                    <select class="form-select form-control" name="m_nationality[]">
                        <option value="" disabled selected>{{ trans('Parents.chooseN') }}</option>
                        @foreach ($nations as $nation)
                        <option value="{{$nation->id}}">{{ $nation->name }}</option>
                        @endforeach
                    </select>

                  </div>
                </div>
              
                <div class="form-group col-md-3">
                    <label for="m_relegion">{{ trans('Parents.m_relegion') }}</label>
                    <div class="input-group">

                        <select class="form-select form-control" name="m_relegion[]">
                            <option value="" disabled selected>{{ trans('Parents.chooseR') }}</option>
                            @foreach ($relegions as $relegion)
                            <option value="{{$relegion->id}}">{{ $relegion->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="m_blood">{{ trans('Parents.m_blood') }}</label>
                    <div class="input-group">

                        <select class="form-select form-control" name="m_blood[]">
                            <option value="" disabled selected>{{ trans('Parents.chooseB') }}</option>
                            @foreach ($bloods as $blood)
                            <option value="{{$blood->id}}">{{ $blood->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" style="height: auto !important;font-size:auto !important"type="button"
                wire:click="secondStepSubmit">{{ trans('Parents.nxt') }}</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" style="height: auto !important;font-size:auto !important"type="button" wire:click="back(1)">{{ trans('Parents.back') }}</button>
        </div>
    </div>
    {{-- End Step 2 --}}
    {{-- Step 3 --}}
    {{-- <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <td>Team Name:</td>
                    <td><strong>{{$name}}</strong></td>
                </tr>
                <tr>
                    <td>Team Price:</td>
                    <td><strong>{{$price}}</strong></td>
                </tr>
                <tr>
                    <td>Team status:</td>
                    <td><strong>{{$status ? 'Active' : 'DeActive'}}</strong></td>
                </tr>
                <tr>
                    <td>Team Detail:</td>
                    <td><strong>{{$detail}}</strong></td>
                </tr>
            </table>
            <button class="btn btn-success btn-lg pull-right" style="height: auto !important;font-size:auto !important"wire:click="submitForm" type="button">{{ trans('Parents.save') }}</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" style="height: auto !important;font-size:auto !important"type="button" wire:click="back(2)">{{ trans('Parents.back') }}</button>
        </div>
    </div> --}}
    {{-- End Step 3 --}}
</div>
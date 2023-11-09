@extends('layouts.master')
@section('css')

@section('title')
{{ trans('Grades_T.schoolGradesList') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('Grades_T.schoolGradesList') }}
			</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<div class="AddBTN">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal">{{ trans('Grades_T.AddGrade') }}</button>
				</div>
				<table class="table table-bordered">
					<thead class="thead-dark">
					  <tr>
						<th scope="col" style="width: 10%;">#</th>
						<th scope="col" style="width: 40%;">{{ trans('Grades_T.GradeName') }}</th>
						<th scope="col" style="width: 35%;">{{ trans('Grades_T.Notes') }}</th>
						<th scope="col" style="width: 15%;">{{ trans('Grades_T.Processes') }}</th>
					  </tr>
					</thead>
					<tbody>

					@php
					$i=0;	
					@endphp
					@foreach ($Grades as $Grade)
						@php
						$i++;	
						@endphp
					<tr>
						<th scope="row">{{ $i }}</th>
						<td>{{ $Grade->Name }}</td>
						<td>
							@php
								if(strlen($Grade->Notes) > 0 )
								{
									echo $Grade->Notes;
								}
								else {
									echo trans('Grades_T.No_Notes');
								}
							@endphp
							
						
						</td>
						<td class="processCol">
							<button type="button" class="btn btn-success"><i class="ti-pencil"></i></button>
							<button type="button" class="btn btn-danger"><i class="ti-trash"></i></button>
						</td>
					</tr>
					@endforeach
					@if (count($Grades) == 0)
					<td colspan="4" style="text-align:center">{{ trans('Grades_T.NoData') }}</td>
					@endif
					</tbody>
				  </table>
				  
            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog " role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title">{{ trans('Grades_T.AddGrade') }}</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<form action="{{  route('Grades.store') }}" method="POST">
				@csrf
				<div class="row">
				  <div class="col">
					<label for="name_en">{{ trans('Grades_T.name_en') }}</label>
					<input id="name_en" name="name_en" type="text" class="form-control" placeholder="" required>
				  </div>
				  <div class="col">
					<label for="name_ar">{{ trans('Grades_T.name_ar') }}</label>
					<input id="name_ar" name="name_ar" type="text" class="form-control" placeholder="" required>
				  </div>
				</div>
				<br>
				<div class="row">
					<div class="col">
					<label for="NotesTextArea">{{ trans('Grades_T.Notes') }}</label>
					<textarea class="form-control" name="Notes" id="NotesTextArea" rows="3"></textarea>
					</div>
				</div>
				<br>
				<div class="row" style="width:100% !important">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Grades_T.Close') }}</button>
						<input type="submit" class="btn btn-success" value="{{ trans('Grades_T.AddNew') }}">
					  </div>
				</div>
			</form>
		</div>
		
	  </div>
	</div>
  </div>
<!-- row closed -->
@endsection
@section('js')
	
@endsection

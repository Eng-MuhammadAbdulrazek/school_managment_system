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
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus"></i>	<span style="margin-right:10px;"> </span>{{ trans('Grades_T.AddGrade') }}</button>
				</div>
				<table class="table table-bordered table-hover">
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
							<button type="button" data-toggle="modal" data-target="#edit{{ $Grade->id }}" class="btn btn-success PButton"><i class="fa fa-pencil"></i></button>
							<button type="button" data-toggle="modal" data-target="#delete{{ $Grade->id }}" class="btn btn-danger PButton"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
					<!-- Edit Modal -->
					<div class="modal fade" id="edit{{ $Grade->id }}" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title">{{ trans('Grades_T.edit') }}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('Grades.update','test') }}" method="POST">
									{{ method_field('patch') }}
									@csrf
									<div class="row">
									<div class="col">
										<input type="hidden" name="id" id="id" value="{{ $Grade->id }}">
										<label for="name_en">{{ trans('Grades_T.name_en') }}</label>
										<input id="name_en" name="name_en" type="text" class="form-control" value="{{ $Grade->getTranslation('Name', 'en') }}" required>
									</div>
									<div class="col">
										<label for="name_ar">{{ trans('Grades_T.name_ar') }}</label>
										<input id="name_ar" name="name_ar" type="text" class="form-control" value="{{ $Grade->getTranslation('Name', 'ar') }}" required>
									</div>
									</div>
									<br>
									<div class="row">
										<div class="col">
										<label for="NotesTextArea">{{ trans('Grades_T.Notes') }}</label>
										<textarea class="form-control Notes" name="Notes" id="NotesTextArea" rows="3">{{ $Grade->Notes }}</textarea>
										</div>
									</div>
									<br>
									<div class="row" style="width:100% !important">
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Grades_T.Close') }}</button>
											<input type="submit" class="btn btn-success" value="{{ trans('Grades_T.saveEdit') }}">
										</div>
									</div>
								</form>
							</div>
							
						</div>
						</div>
					</div>
					<!-- Modal closed -->
					<!-- del Modal -->
					<div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title">{{ trans('Grades_T.delete') }}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('Grades.destroy','test') }}" method="POST">
									{{ method_field('Delete') }}
									@csrf
									<div class="row">
										<div class="col">
											<input type="hidden" name="id" id="id" value="{{ $Grade->id }}">
											<span style="font-size: 16px">{{ trans('Grades_T.delConf') }}</span>
										</div>
									</div>
									
									<br>
									<div class="row" style="width:100% !important">
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Grades_T.Close') }}</button>
											<input type="submit" class="btn btn-danger" value="{{ trans('Grades_T.delete') }}">
										</div>
									</div>
								</form>
							</div>
							
						</div>
						</div>
					</div>
					<!-- Modal closed -->
						
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
<!-- ADD Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
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
					<textarea class="form-control Notes" name="Notes" id="NotesTextArea" rows="3"></textarea>
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
<!-- Modal closed -->
@endsection
@section('js')
	
@endsection

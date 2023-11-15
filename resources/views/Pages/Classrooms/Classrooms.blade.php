@extends('layouts.master')
@section('css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

@section('title')
{{ trans('mainSideBar.ClassroomsList') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('mainSideBar.ClassroomsList') }}
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
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus"></i>	<span style="margin-right:10px;"> </span>{{ trans('Classrooms.AddClass') }}</button>
				</div>
				<table class="table table-bordered table-hover">
					<thead class="thead-dark">
					  <tr>
						<th scope="col" style="width: 10%;">#</th>
						<th scope="col" style="width: 40%;">{{ trans('Classrooms.ClassName') }}</th>
						<th scope="col" style="width: 35%;">{{ trans('Classrooms.GradeName') }}</th>
						<th scope="col" style="width: 15%;">{{ trans('Classrooms.Processes') }}</th>
					  </tr>
					</thead>
					<tbody>

					@php
					$i=0;	
					@endphp
					@foreach ($classrooms as $Classroom)
						@php
						$i++;	
						@endphp
					<tr>
						<th scope="row">{{ $i }}</th>
						<td>{{ $Classroom->Name }}</td>
						<td>{{ $Grades->Where('id',$Classroom->Grade_id)->first()->getTranslation('Name',LaravelLocalization::getCurrentLocale()) }}</td>
						<td class="processCol">
							<button type="button" data-toggle="modal" data-target="#edit{{ $Classroom->id }}" class="btn btn-success PButton"><i class="fa fa-pencil"></i></button>
							<button type="button" data-toggle="modal" data-target="#delete{{ $Classroom->id }}" class="btn btn-danger PButton"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
					<div class="modal fade" id="edit{{ $Classroom->id }}" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">{{ trans('Classrooms.editData') }}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{ route('Classrooms.update','test') }}" method="POST" id="editForm" class="">
										{{ method_field('patch') }}
										@csrf
										<div id="">
											<!-- Initial form row -->
											<div class="form-row">
												
												<div class="col-4">
													<label for="name_en">{{ trans('Classrooms.name_en') }}</label>
													<input name="name_en" type="text" class="form-control" placeholder="" required value="{{  $Classroom->getTranslation('Name','en')}}">
													<input type="hidden" name="id" value="{{ $Classroom->id }}">
												</div>
												<div class="col-4">
													<label for="name_ar">{{ trans('Classrooms.name_ar') }}</label>
													<input name="name_ar" type="text" class="form-control" placeholder="" required value="{{ $Classroom->getTranslation('Name','ar')}}">
												</div>
												<div class="col-3">
													<label for="Grade">{{ trans('Classrooms.GradeName') }}</label>
													<br>
													<select class="form-select form-control" name="Grade">
														@foreach ($Grades as $Grade)
														@if ($Classroom->Grade_id == $Grade->id)
														<option value="{{$Grade->id}}" selected>{{ $Grade->Name }}</option>
														@continue
														@endif
														<option value="{{$Grade->id}}">{{ $Grade->Name }}</option>
														@endforeach
													</select>
												</div>
											
											</div>
										</div>
										<br>
										<br>
										<div class="row" style="width:100% !important">
											
										</div>
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">{{ trans('Grades_T.Close') }}</button>
									</button>
									<input type="submit" id="submitForm2" class="btn btn-success" value="{{ trans('Classrooms.editData') }}">
								</div>
							</form>
							</div>
						</div>
					</div>
					
			
					<!-- Modal closed -->
					<!-- del Modal -->
					<div class="modal fade" id="delete{{ $Classroom->id }}" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title">{{ trans('Grades_T.delete') }}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('Classrooms.destroy','test') }}" method="POST">
									{{ method_field('Delete') }}
									@csrf
									<div class="row">
										<div class="col">
											<input type="hidden" name="id" id="id" value="{{ $Classroom->id }}">
											<span style="font-size: 16px">{{ trans('Classrooms.delConf') }}</span>
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
					 @if (count($classrooms) == 0)
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
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ trans('Classrooms.AddClass') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Classrooms.store') }}" method="POST" id="repeaterForm" class="">
                    @csrf
                    <div id="repeaterContainer">
                        <!-- Initial form row -->
                        <div class="form-row">
                            <div class="col-4">
                                <label for="name_en">{{ trans('Classrooms.name_en') }}</label>
                                <input name="name_en[]" type="text" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-4">
                                <label for="name_ar">{{ trans('Classrooms.name_ar') }}</label>
                                <input name="name_ar[]" type="text" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-3">
                                <label for="Grade">{{ trans('Classrooms.GradeName') }}</label>
                                <br>
                                <select class="form-select form-control" name="Grade[]">
                                    @foreach ($Grades as $Grade)
                                    <option value="{{$Grade->id}}">{{ $Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-1">
                                <button type="button" class="btn btn-danger removeRow PButton" hidden><i
                                        class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row" style="width:100% !important">
                        
                    </div>
                </form>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary"
					data-dismiss="modal">{{ trans('Grades_T.Close') }}</button>
				<button type="button" class="btn btn-secondary" id="addRow">{{ trans('Classrooms.AddRow') }}
				</button>
				<input type="submit" id="submitForm" class="btn btn-success" value="{{ trans('Classrooms.AddClass') }}">
			</div>
        </div>
    </div>
</div>

<!-- Modal closed -->
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        // Function to add repeater row
        $("#addRow").on("click", function () {
            addRepeaterRow();
        });

        // Function to remove repeater row
        $("#repeaterContainer").on("click", ".removeRow", function () {
            $(this).closest(".form-row").remove();
        });

        function addRepeaterRow() {
            var rowHTML = '<div class="form-row">' +
				'<br><br>' +
                '<div class="col-4">' +
                '<label for="name_en">{{ trans('Classrooms.name_en') }}</label>' +
                '<input name="name_en[]" type="text" class="form-control" placeholder="" required>' +
                '</div>' +
                '<div class="col-4">' +
                '<label for="name_ar">{{ trans('Classrooms.name_ar') }}</label>' +
                '<input name="name_ar[]" type="text" class="form-control" placeholder="" required>' +
                '</div>' +
                '<div class="col-3">' +
                '<label for="Grade">{{ trans('Classrooms.GradeName') }}</label>' +
                '<br>' +
                '<select class="form-select form-control" name="Grade[]">' +
                '@foreach ($Grades as $Grade)' +
                '<option value="{{$Grade->id}}">{{ $Grade->Name }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '<div class="col-1">' +
				'<label for="x" style="visibility:hidden">.</label>' +
				'<br>' +
                '<button name="x" type="button" class="btn btn-danger removeRow PButton"><i class="fa fa-trash"></button>' +
                '</div>' +
                '</div>';

            $("#repeaterContainer").append(rowHTML);
        }
        // Function to serialize and submit the form
        $("#submitForm").on("click", function () {
            var formData = $("#repeaterForm").serialize();
         //   console.log(formData);
            // Uncomment the line below to submit the form
             $("#repeaterForm").submit();
        });
	
		
    });

</script>
@endsection

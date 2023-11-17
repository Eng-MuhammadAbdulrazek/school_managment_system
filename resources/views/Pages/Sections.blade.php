@extends('layouts.master')
@section('css')
<style>

</style>
@section('title')
    {{ trans('Sections.sectionsList') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('Sections.sectionsList') }}</h4>
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
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal"><i class="fa fa-plus"></i><span style="margin-right:10px;"></span>{{ trans('Sections.AddSection') }}</button>
					</div>
                <div class="accordion accordion-border">
                    @foreach ($Grades as $Grade)
                    <div class="acd-group">
                        <a href="#" class="acd-heading">{{ $Grade->Name }}</a>
                        <div class="acd-des">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col" style="width: 10%;">#</th>
                                    <th scope="col" style="width: 30%;">{{ trans('Sections.SectionName') }}</th>
                                    <th scope="col" style="width: 30%;">{{ trans('Sections.ClassName') }}</th>
                                    <th scope="col" style="width: 15%;">{{ trans('Sections.Status') }}</th>
                                    <th scope="col" style="width: 15%;">{{ trans('Sections.Processes') }}</th>
                                  </tr>
                                </thead>
                                <tbody>
    
                                </tbody>
                              </table>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>   
        </div>
    </div>
</div>
<!-- ADD Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title">{{ trans('Sections.AddSection') }}</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<form action="{{ route('Sections.store') }}" method="POST">
				@csrf
				<div class="row">
				  <div class="col">
					<label for="name_en">{{ trans('Sections.name_en') }}</label>
					<input id="name_en" name="name_en" type="text" class="form-control" placeholder="" required>
				  </div>
				  <div class="col">
					<label for="name_ar">{{ trans('Sections.name_ar') }}</label>
					<input id="name_ar" name="name_ar" type="text" class="form-control" placeholder="" required>
				  </div>
				</div>
				<br>
				<div class="row">
                    <div class="col">
                        <label for="grade">{{ trans('Sections.grade') }}</label>
                        <select id="grade" name="grade" class="form-control">
                            <option disabled selected>{{ trans('Sections.chooseGrade') }}</option>
                            @foreach ($Grades as $Grade)
                                <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                            @endforeach

                        </select>
                    </div>
				</div>
				<br>
                <div class="row">
                    <div class="col">
                        <label for="class">{{ trans('Sections.class') }}</label>
                        <select id="class" name="class" class="form-control">
                            <option disabled selected>{{ trans('Sections.chooseClass') }}</option>

                        </select>
                    </div>
				</div>
				<br>
				<div class="row" style="width:100% !important">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Grades_T.Close') }}</button>
						<input type="submit" class="btn btn-success" value="{{ trans('Sections.AddSection') }}">
					  </div>
				</div>
			</form>
		</div>
		
	  </div>
	</div>
  </div>
<!-- Modal closed -->
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function() {

        // Event handler for the button click
        $('select[name="grade"]').on('change', function() {
            var grade_id = $(this).val();
          
            // Ajax request
           if(grade_id){
            $.ajax({
                url: "{{ URL::to('classes') }}/" + grade_id, // Replace with your actual server endpoint
                method: 'GET',
                dataType: 'json', // Change the data type as needed

                success: function(data) {
                    $('select[name="class"]').empty();
                    $('select[name="class"]').append('<option disabled selected>{{ trans('Sections.chooseClass') }}</option>');
                    $.each(data,function(key,value){
                        $('select[name="class"]').append('<option value="'+ key +'">'+ value +'</option>'); 
                    });
                },

                error: function(xhr, status, error) {
                    // Handle errors
                    console.error('Error:', status, error);
                    $('#result').text('Error loading data.');
                }
            }); 
           } 
        });



    });
</script>
@endsection

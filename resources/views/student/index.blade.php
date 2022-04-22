@extends('layouts.app')

@section('content')


<div class="modal fade" id="CreateStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      	<ul id="saveform_errList"></ul>
        <div class="form-group mb-3">
        	<label for="">Name</label>
        	<input type="text"  class="name form-control">
        </div>
         <div class="form-group mb-3">
        	<label for="">Email</label>
        	<input type="email"  class="email form-control">
        </div>
         <div class="form-group mb-3">
        	<label for="">Phone</label>
        	<input type="number" class="phone form-control">
        </div>
         <div class="form-group mb-3">
        	<label for="">Course</label>
        	<input type="text"  class="course form-control">
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary create_student">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editstudentmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      	<ul id="updateform_errList"></ul>

      	<input type="hidden" id="id">
        <div class="form-group mb-3">
        	<label for="">Name</label>
        	<input type="text" id="name" class="name form-control">
        </div>
         <div class="form-group mb-3">
        	<label for="">Email</label>
        	<input type="email" id="email" class="email form-control">
        </div>
         <div class="form-group mb-3">
        	<label for="">Phone</label>
        	<input type="number" id="phone" class="phone form-control">
        </div>
         <div class="form-group mb-3">
        	<label for="">Course</label>
        	<input type="text" id="course"  class="course form-control">
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_student">Update</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deletestudentmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<input type="hidden" id="delete_student_id">
       <h4>Are you sure delete data</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete_student_btn">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-md-12">
			<div class="card">


				<div id="success_message"></div>
				<div class="card-header">
					<h4>Student Data
						<a href="" data-bs-toggle="modal" data-bs-target="#CreateStudentModal" class="btn btn-primary float-end btn-sm">Create Student</a>

					</h4>
				</div>
				<div class="card-body">
							<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Course</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
							</table>
				</div>
			</div>
		</div>
	</div>
	
</div>



@endsection

@section('scripts')

<script>
	$(document).ready(function (){

			fecthstudent();

		function fecthstudent(){
			$.ajax({
				type: "GET",
				url: "/student/data",
				data: "data",
				dataype: "json",
				success: function(response) {
					//console.log(response.students);
					$('tbody').html("");
					$.each(response.students, function(key, item) {
							$('tbody').append('<tr>\
											<td>'+item.id+'</td>\
											<td>'+item.name+'</td>\
											<td>'+item.email+'</td>\
											<td>'+item.phone+'</td>\
											<td>'+item.course+'</td>\
											<td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary btn-sm">Edit</button></td>\
											<td><button type="button" value="'+item.id+'" class="delete_student btn btn-danger btn-sm">Delete</button></td>\
										</tr>');
					});
				}
			});
		}

		$(document).on('click', '.delete_student', function (e) {
			e.preventDefault();
			var id = $(this).val();
			// alert(id);
			$('#delete_student_id').val(id);
			$('#deletestudentmodel').modal('show');
		});

		$(document).on('click', '.delete_student_btn', function (e) {
			e.preventDefault();


			$(this).text("Deleted");
			var id = $('#delete_student_id').val();
			$.ajaxSetup({
    				headers: {
        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   						 }
			});
			$.ajax({
				type: "DELETE",
				url: "/delete/student/"+id,
				dataType: "json",
				success: function (response) {
					$('#success_message').addClass('alert alert-success')
					$('#success_message').text(response.message);
					$('#deletestudentmodel').modal('hide');
					$('#delete_student_btn').text("Yes Deleted");
					fecthstudent();
				}
			});
		});

		$(document).on('click', '.edit_student', function (e) {
			   e.preventDefault();
			   var id = $(this).val();
			   // console.log(id);
			   $('#editstudentmodel').modal('show');
			   $.ajax({
			   	type: "GET",
			   	url: "/edit/student/"+id,
			   	success: function (response) {
			   		console.log(response);

			   			if (response.status == 400) {
			   		$('#success_message').html("");
			   		$('#success_message').addClass('alert alert-danger');
			   		$('#success_message').text(response.message);
			   	}else{
			   			$('#name').val(response.student.name);
			   			$('#email').val(response.student.email);
			   			$('#phone').val(response.student.phone);
			   			$('#course').val(response.student.course);
			   			$('#id').val(response.student.id);
			     	}

			   	}



			   });
		});

		$(document).on('click', '.update_student', function (e) {
			e.preventDefault();
			$(this).text("Updated");
			var id = $('#id').val();
			var data = {
				'name' : $('#name').val(),
				'email' : $('#email').val(),
				'phone' : $('#phone').val(),
				'course' : $('#course').val(),
			}

			$.ajaxSetup({
    				headers: {
        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   						 }
			});

			$.ajax({
				type: "POST",
				url: "/post/student/"+id,
				data: data,
				dataType: "json",
				success: function (response) {
					// console.log(response);
					if (response.status == 400) {

							$("#updateform_errList").html("");
							$("#updateform_errList").addClass('alert alert-danger');
							$.each(response.errors, function (key, err_values){
							$("#updateform_errList").append('<li>'+err_values+'</li>');
						});
							$('.update_student').text("Update");
					}else if (response.status == 404) {
						$("#updateform_errList").html("");
						$('#success_message').addClass('alert alert-success')
						$('#success_message').text(response.message)	
						$('.update_student').text("Update");			
					}else{
						$("#updateform_errList").html("");
						$("#success_message").html("");
						$('#success_message').addClass('alert alert-success')
						$('#success_message').text(response.message)	

						$('#editstudentmodel').modal('hide');
						$('.update_student').text("Update");
						fecthstudent();
					}
				}
			});

		});













		$(document).on('click', '.create_student', function(e) {
			e.preventDefault();
			//console.log("hello");
			var data = {
				'name' : $('.name').val(),
				'email' : $('.email').val(),
				'phone' : $('.phone').val(),
				'course' : $('.course').val(),
			}
			//console.log(data);


			$.ajaxSetup({
    				headers: {
        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   						 }
			});

			$.ajax({
				type: 'POST',
				url: "/student",
				data: data,
				dataType: "json",
				success: function(response){
					//console.log(response.errors.name);
					if (response.status == 400) {
						$("#saveform_errList").html("");
						$("#saveform_errList").addClass('alert alert-danger');
						$.each(response.errors, function (key, err_values){
							$("#saveform_errList").append('<li>'+err_values+'</li>');
						});
					}
					else{
						$("#saveform_errList").html("");
						$('#success_message').addClass('alert alert-success')
						$('#success_message').text(response.message);
						$('#CreateStudentModal').modal('hide');
						$('#CreateStudentModal').find('input').val("");
						fecthstudent();
					}

				}
			})
		});
	});
</script>
@endsection
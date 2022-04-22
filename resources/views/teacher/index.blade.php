
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">


	<title></title>
</head>

<!-- Add teacher -->
<div class="modal fade" id="addteacherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<ul id="saveform_errList"></ul>
        <div class="form-group mb-3">
        	<label>Name</label>
        	<input type="text"  class="name form-control">
        </div>
        <div class="form-group mb-3">
        	<label>NIP</label>
        	<input type="text"  class="nip form-control">
        </div>
        <div class="form-group mb-3">
        	<label>Course</label>
        	<input type="text"  class="course form-control">
        </div>
        <div class="form-group mb-3">
        	<label>Grade</label>
        	<input type="text"  class="grade form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_teacher">Save</button>
      </div>
    </div>
  </div>
</div>
   <!-- End form add teacher -->

   		<!-- Edit teacher -->
   <div class="modal fade" id="editteacherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Teacher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<ul id="updateform_errList"></ul>
        <div class="form-group mb-3">
        	<label>Name</label>
        	<input type="hidden" id="id">
        	<input type="text" id="name" class="name form-control">
        </div>
        <div class="form-group mb-3">
        	<label>NIP</label>
        	<input type="text" id="nip" class="nip form-control">
        </div>
        <div class="form-group mb-3">
        	<label>Course</label>
        	<input type="text" id="course"  class="course form-control">
        </div>
        <div class="form-group mb-3">
        	<label>Grade</label>
        	<input type="text" id="grade" class="grade form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_teacher">Save</button>
      </div>
    </div>
  </div>
</div>
		<!-- End edit teacher -->

		<!-- Delete Teacher -->
		<div class="modal fade" id="deleteteachermodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Teacher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<input type="hidden" id="delete_teacher_id">
       <h4>Are you sure delete data</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete_teacher_btn">Delete</button>
      </div>
    </div>
  </div>
</div>
         <!-- End Delete -->

<div class="container py-5">
	<div class="row">
		<div class="col-md-12">
			<div id="success_message"></div>
			<div class="card">

		<div class="card-header">
			<h3 class="text-center">Data Teacher</h3>
			<a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addteacherModal">Add Teacher</a>

		</div>
				<div class="card-body">
					<table class="table table-striped table-bordered table-sm " width="100%" id="teacher">
						<thead>
								<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIP</th>
										<th>Course</th>
										<th>Grade</th>
										<th>Action</th>
								</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
	

<script>
	$(document).ready( function () {

		    $('#teacher').DataTable({
		    	processing : true,
		           serverSide : true,
		           ajax : {
		           	type : 'GET',
		           	url : '/teacher'

		           },
		           columns : [
		           			  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		           			  {data: 'name', name: 'name'},
		           			  {data: 'nip', name: 'nip'},
		           			  {data: 'course', name: 'course'},
		           			  {data: 'grade', name: 'grade'},
		           			  {data: 'action', name: 'action'}],
		            order: [[0, 'asc']]
		    }); 
    

    $(document).on('click', '.add_teacher', function (e) {
    	e.preventDefault();
    	// console.log();
    	
    	var data = {
    		'name': $('.name').val(),
    		'nip': $('.nip').val(),
    		'course': $('.course').val(),
    		'grade': $('.grade').val(),
    	}
    	// console.log(data)

    	$.ajaxSetup({
    				headers: {
        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   						 }
			});

    	$.ajax({
    		type: "POST",
    		url: "/teacher",
    		data: data,
    		dataype: "json",
    		success: function (response) {
    			// console.log(response);
    			if (response.status == 400) {
    				$('#saveform_errList').html("");
    				$('#saveform_errList').addClass('alert alert-danger');
    				$.each(response.errors, function(key, err_values){
    					$('#saveform_errList').append('<li>'+err_values+'</li>');
    				});
    			}
    			else{
    				$('#saveform_errList').html("");
    				$('#success_message').addClass('alert alert-success')
    				$('#success_message').text(response.message)
    				$('#addteacherModal').modal('hide');
    				$('#addteacherModal').find('input').val("");
    				var oTable = $('#teacher').dataTable(); 
                            oTable.fnDraw(false);
    			}
    		}
    	});

    });   

	$(document).on('click', '.edit', function (e) {
			   e.preventDefault();
			   var id = $(this).data('id');
			   // console.log(id);
			   $('#editteacherModal').modal('show');
			   $.ajax({
			   	type: "GET",
			   	url: "/edit/teacher/"+id,
			   	success: function (response) {
			   		console.log(response);

			   			if (response.status == 400) {
			   		$('#success_message').html("");
			   		$('#success_message').addClass('alert alert-danger');
			   		$('#success_message').text(response.message);
			   	}else{
			   			$('#name').val(response.teacher.name);
			   			$('#nip').val(response.teacher.nip);
			   			$('#course').val(response.teacher.course);
			   			$('#grade').val(response.teacher.grade);
			   			$('#id').val(response.teacher.id);

			     	}

			   	}



			   });
		});


	$(document).on('click', '.update_teacher', function (e) {
			e.preventDefault();
			$(this).text("Updated");
			var id = $('#id').val();
			var data = {
				'name' : $('#name').val(),
				'nip' : $('#nip').val(),
				'course' : $('#course').val(),
				'grade' : $('#grade').val(),
			}

			$.ajaxSetup({
    				headers: {
        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   						 }
			});

			$.ajax({
				type: "POST",
				url: "/edit/teacher/"+id,
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
							$('.update_teacher').text("Update");
					}else if (response.status == 404) {
						$("#updateform_errList").html("");
						$('#success_message').addClass('alert alert-success')
						$('#success_message').text(response.message)	
						$('.update_teacher').text("Update");			
					}else{
						$("#updateform_errList").html("");
						$("#success_message").html("");
						$('#success_message').addClass('alert alert-success')
						$('#success_message').text(response.message)	

						$('#editteacherModal').modal('hide');
						$('.update_teacher').text("Update");
						var oTable = $('#teacher').dataTable(); 
                            oTable.fnDraw(false);
						
					}
				}
			});

		});

	$(document).on('click', '.delete', function (e) {
			e.preventDefault();
			var id = $(this).data('id');
			// alert(id);
			$('#delete_teacher_id').val(id);
			$('#deleteteachermodel').modal('show');
		});

		$(document).on('click', '.delete_teacher_btn', function (e) {
			e.preventDefault();


			$(this).text("Deleted");
			var id = $('#delete_teacher_id').val();
			$.ajaxSetup({
    				headers: {
        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   						 }
			});
			$.ajax({
				type: "DELETE",
				url: "/delete/teacher/"+id,
				dataType: "json",
				success: function (response) {
					$('#success_message').addClass('alert alert-success')
					$('#success_message').text(response.message);
					$('#deleteteachermodel').modal('hide');
					$('#delete_teacher_btn').text("Yes Deleted");
					var oTable = $('#teacher').dataTable(); 
                            oTable.fnDraw(false);
				}
			});
		});

});


</script>
</html>
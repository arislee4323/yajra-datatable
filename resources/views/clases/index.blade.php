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


<body>

<div class="modal fade" id="addclases" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   	
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


	<div class="card-header">
		<a href="#" class="add_clases btn btn-primary btn-sm">Add Clases</a>
	</div>

	<div class="card-body">
			<table class="table table-striped table-bordered table-sm" width="100%" id="clases">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kelas</th>
						<th>Nama Guru</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Nama Kelas</th>
						<th>Nama Guru</th>
					</tr>
				</tfoot>
			</table>
	</div>
</body>

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

	<script>
		$(document).ready(function () {
			$('#clases').DataTable({
				processing : true,
				serverSide : true,
				ajax : {
					type : 'GET',
					url  : '/clases'
				},
				columns : [
				{data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'name', name: 'name'},
				{data: 'teacher', name: 'teacher'}]
			});

		});

		$(document).on('click', '.add_clases', function () {
			$('#addclases').modal('show');
		});



	</script>
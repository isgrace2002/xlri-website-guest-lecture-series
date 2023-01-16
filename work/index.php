<!DOCTYPE html>
<html>
	<head>
		<title>Guest Lecture Series</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

	</head>
	<body>
		<div class="container">
			<br />
			
			<h3 align="center">Guest Lecture Series</h3>
			<br />
			<div align="right" style="margin-bottom:5px;">
				<button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">Add</button>
			</div>

			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Batch</th>
							<th>Guest Lecture Title</th>
							<th>Guest Name</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</body>
</html>

<div id="apicrudModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Add Data</h4>
		      	</div>
		      	<div class="modal-body">
		      	
					<div class="form-group">
                          
							<label for="batch">Select Batch</label>
								<select id="batch" name="batch" class="form-control">
								  <option value="Batch 2022-2023">Batch 2022-2023</option>
								  <option value="Batch 2021-2022">Batch 2021-2022</option>
								  <option value="Batch 2020-2021">Batch 2020-2021</option>
								</select>
                    </div>
                        <div class="form-group">
                            <label>Enter Guest Lecture Title</label>
						<textarea name="title" id="title" class="form-control"></textarea>
                        </div>
						<div class="form-group">
                            <label>Enter Guest Name</label>
                            <textarea name="gname" id="gname" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Enter Guest Introduction</label>
                            <textarea name="intro" id="intro" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Enter Subheading</label>
                            <textarea name="subhead" id="subhead" class="form-control"></textarea>
                        </div>
						
						 <label>Enter Points Discussed</label>
						<div class="form-group" id="editor"></div>
                           
                            <textarea name="points" id="points" style="display:none;" class="form-control"></textarea>
						<br>
						<div class="form-group">
						<label>Enter Linkedin url</label>
                            <input type="url" name="linkedin" id="linkedin" class="form-control">
						</div>
						<div class="form-group">
						<label>Enter Youtube url</label>
                            <input type="url" name="youtube" id="youtube" class="form-control">
						</div>
						<div class="form-group">
						<label>Enter Guest's image url</label>
                            <input type="url" name="image" id="image" class="form-control">
						</div>
			    </div>
			    <div class="modal-footer">
			    	<input type="hidden" name="hidden_id" id="hidden_id" />
			    	<input type="hidden" name="action" id="action" value="insert" />
			    	<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
			    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
			</form>
		</div>
  	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){

	fetch_data();

	function fetch_data()
	{
		$.ajax({
			url:"fetch.php",
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}

	$('#add_button').click(function(){
		$('#action').val('insert');
		$('#button_action').val('Insert');
		$('.modal-title').text('Add Data');
		$('#apicrudModal').modal('show');
	});

	$('#api_crud_form').on('submit', function(event){
		event.preventDefault();
		if($('#title').val() == '')
		{
			alert("Enter Guest Lecture Title");
		}
		else if($('#intro').val() == '')
		{
			alert("Enter Guest Introduction");
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
					if(data == 'insert')
					{
						alert("Data Inserted using PHP API");
					}
					if(data == 'update')
					{
						alert("Data Updated using PHP API");
					}
				}
			});
		}
	});

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#hidden_id').val(id);
				$('#batch').val(data.batch);
				$('#gname').val(data.gname);
				$('#title').val(data.title);
				$('#intro').val(data.intro);
				$('#subhead').val(data.subhead);
				$('#points').val(data.points);
				$('#linkedin').val(data.linkedin);
				$('#youtube').val(data.youtube);	
				$('#image').val(data.image);					
				$('#action').val('update');
				$('#button_action').val('Update');
				$('.modal-title').text('Edit Data');
				$('#apicrudModal').modal('show');
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		var action = 'delete';
		if(confirm("Are you sure you want to remove this data using PHP API?"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data)
				{
					fetch_data();
					alert("Data Deleted using PHP API");
				}
			});
		}
	});

});
</script>
<script type="text/javascript">
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
  quill.on('text-change', function(delta, oldDelta, source) {
      console.log(quill.container.firstChild.innerHTML)
      $('#points').val(quill.container.firstChild.innerHTML);
  });
</script>
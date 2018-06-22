<!doctype html>
<html class="no-js" lang="">
    <head>

		<!-- TITLE -->
		<title>JS Dynamic Add Form and Loop</title>

		<!-- META -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		
		<!-- STYLES -->
		<style type="text/css">
			
			#header_wrapper { padding: 20px 0px; background: #F8F8F9; }
			#header_wrapper .header_container {}
			#header_wrapper .header_container h2 { margin: 0px; padding: 0px; text-align: center; }

			#content_wrapper { padding: 20px 0px; }
			
			#content_wrapper .form_container {}
			#content_wrapper .form_container h3 { margin: 0px 0px 20px 0px; padding: 0px; }

			#content_wrapper .result_container {}
			#content_wrapper .result_container h3 { margin: 0px 0px 20px 0px; padding: 0px; }

		</style>

    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

		<div id="header_wrapper">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="header_container">
							<h2>Dynamic Form Creation and Loop with JS</h2>
						</div> <!-- /header_container -->
					</div> <!-- /col -->

				</div> <!-- /row -->
			</div> <!-- /container -->
		</div> <!-- /header -->

		<div id="content_wrapper">
			<div class="container">
				<div class="row">

					<div class="col-md-6">
						<div class="form_container">
						
							<h3>Dynamic Form</h3>

							<form id="my-form" method="POST">

								<div class="form-group">
									<label for="exampleText1">Example Input Field</label>
									<input type="text" class="form-control" name="exampleText[]" placeholder="Enter Text">
									<input type="hidden" name="groupID[]" value="1">
								</div>

								<div id="additionalFields"></div>

								<div class="form-group">
									<a href="#" id="addQuesiton" class="btn btn-danger">Add Form Field</a>
									<input type="submit" value="Submit" class="btn btn-primary">
								</div>

							</form>

						</div> <!-- /content_container -->
					</div> <!-- /col -->

					<div class="col-md-6">
						<div class="result_container">
							
							<h3>Result Container</h3>

							<div id="results"></div>

						</div> <!-- /result_container -->
					</div> <!-- /col -->

				</div> <!-- /row -->
			</div> <!-- /container -->
		</div> <!-- /content_wrapper -->


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

		<script type="text/javascript">
			$(document).ready(function() {

				$('#my-form').submit(function(event) {
					event.preventDefault();

					var myArray = [];

					var inputs = document.getElementsByName('groupID[]');
					for(var i = 0; i < inputs.length; i++)  {

					    // Validation
					    // alert(inputs[i].value);

					    // Find Alternate Values
					    var val = $(inputs[i]).parent("div.form-group").find("input[name='exampleText[]']").val();

					    // Push to Array
					    myArray.push({id: inputs[i].value, value: val});

					}

					document.getElementById("results").innerHTML = "Array Values: <br>" + myArray;

					console.log(myArray);

				});

			    // DYNAMICALLY ADD FORM FIELDS
			    // ======================================================
			    var count = 1;

			    $("#content_wrapper .form_container .form-group a#addQuesiton").click(function() {

			        count++;

			        form_block = 
			        	"<div class='form-group'>" +
			        		"<label for='exampleText"+count+"'>Example Input Field</label>" +
			        		"<input type='text' class='form-control' name='exampleText[]' placeholder='Enter Text'>" +
			        		"<input type='hidden' name='groupID[]' value='"+count+"'>" +
			        	"</div>";

			        $("#content_wrapper .form_container #additionalFields").append(form_block);

			    });

			}); // DOCUMENT READY
		</script>

    </body>
</html>
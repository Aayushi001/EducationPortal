<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<script>

$(document).ready(function(){
	
	$(".submit").click(function(evt){
		
		var tel=$(".tel").val();
		var mob=$('.mob').val();
		var add=$(".add").val();
		if((tel.checkValidity()==false) || (mob.checkValidity()==false))
		{
			
			$(".alert").show(2000,function(){
				
				$(this).hide(2000);
			});
	return false;
		}
		

		
	});
	
});
</script>


<div class="alert alert-warning" style="display:none">
  <strong>Attention!</strong> Please check your fields entered , telephone no. and mobile no. should be of the mentioned length and are required to be filled
</div>

<div class="container">
  <h2>Contacts Information</h2>
  <form role="form" action="{{route('redtowelcome')}}" method="post">
    <div class="form-group">
      <label >Telephone:</label>
      <input type="number" min="10000000" max="99999999" class="form-control" name="telephone" placeholder="Enter Landline Number here" required>
    </div>
    <div class="form-group">
      <label for="pwd">Mobile:</label>
      <input type="number" size="10" class="form-control" name="mobile" min="1000000000" max="10000000000" placeholder="Enter your mobile no. here" required>
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text"  class="form-control" name="address" placeholder="Enter your address here" required>
    </div>
	
	
	<button type="submit" class="btn btn-default submit">Submit</button>
  </form>
</div>

</body>
</html>


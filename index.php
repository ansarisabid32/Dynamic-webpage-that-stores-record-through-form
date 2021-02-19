<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title></title>
</head>
<body>
<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
				<div class="row">
					<?php
						$conn = new mysqli('localhost','root','','details');
						if($conn->connect_error){
							echo "$conn->connect_error";
							die("Connection Failed : ". $conn->connect_error);
						} else {
								$sql ="select * from cricketer_records";
								$result = mysqli_query($conn,$sql);
						}
					?>
				</div>
				<input type="text" name="search" name="myInput" id="myInput" class='form-control' placeholder="Search By Name" value="" onkeyup="smartsearch()"/> 
				<table class="table table-bordered" id="myTable" style="margin-top: 15px">
					<tr class="header">
						<th>ID</th>
						<th>Name</th>
						<th>Total Scored</th>
						<th>Total fours</th>
						<th>Total Sixes</th>
					</tr>
					<?php while($row=mysqli_fetch_object($result)){ ?>
					<tr>
						<td><?php echo $row->id ?></td>
						<td><?php echo $row->full_name ?></td>
						<td><?php echo $row->runs_scored ?></td>
						<td><?php echo $row->fours_scored_count ?></td>
						<td><?php echo $row->sixes_scored_count ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

	<form method="post" action="submit.php">
            
    <div class="form-group fieldGroup" id="mainForm">
        <div class="input-group" style="margin-top: 30px; margin-right: 50px;margin-left: 50px;margin-bottom: 5px">
            <input type="text" name="name[]" class="form-control" placeholder="Enter name"/>
            <input type="number" name="total[]" id="total_runs" class="form-control" placeholder="Enter total scored"/>
            <input type="number" name="fours[]" id="fours_count" class="form-control" placeholder="Enter total four's" onkeyup="checkFoursValidation(this)"/>
            <input type="number" name="sixes[]" id="sixes_count" class="form-control" placeholder="Enter total sixes" onkeyup="checkSixesValidation()"/>
            <div class="input-group-addon"> 
                <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
            </div>
        </div>
    </div>
    
    <input type="submit" name="submit" id="submit_btn" style="margin-left: 600px" class="btn btn-primary" value="SUBMIT"/>
    
</form>

<!-- copy of input fields group -->
<div class="form-group fieldGroupCopy" style="display: none;" id="mainFormCopy">
    <div class="input-group" style="margin-top: 5px; margin-right: 50px;margin-left: 50px;margin-bottom: 5px">
        <input type="text" name="name[]" class="form-control" placeholder="Enter name"/>
        <input type="number" name="total[]" id="total_runs_cpy" class="form-control" placeholder="Enter total score"/>
        <input type="number" name="fours[]" id="fours_count_cpy" class="form-control" placeholder="Enter total four's" onkeyup="checkFoursValidationcpy(this)"/>
        <input type="number" name="sixes[]" id="sixes_count_cpy" class="form-control" placeholder="Enter total sixes" onkeyup="checkSixesValidationcpy(this)"/>
        <div class="input-group-addon"> 
            <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
        </div>
    </div>
</div>

</body>
</html>

<script>

window.onload=function(){
        document.getElementById("myTable").style.display="none";
    }

	$(document).ready(function(){
    var maxGroup = 10;
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
        }); 

        $("body").on("click",".remove",function(){ 
            $(this).parents(".fieldGroup").remove();
        });
    });
    function checkFoursValidationcpy(){
        let total=parseInt(document.getElementById('total_runs_cpy').value);
        let totalFoursCanBeTyped=parseInt(total/4)
        
        if(parseInt(document.getElementById('fours_count_cpy').value)>totalFoursCanBeTyped){
            document.getElementById('fours_count_cpy').style.backgroundColor="red";
        }
        else{
            document.getElementById('fours_count_cpy').style.backgroundColor="white";
        }
        if((total-((parseInt(document.getElementById('fours_count_cpy').value)*4)))<6){
            document.getElementById('sixes_count_cpy').value="0";
            document.getElementById('sixes_count_cpy').disabled=true;
        }
        else{
            document.getElementById('sixes_count_cpy').value="";
            document.getElementById('sixes_count_cpy').disabled=false;
        }
        if(document.getElementById("sixes_count_cpy").style.backgroundColor="white" && document.getElementById("sixes_count").style.backgroundColor==="white"){
            document.getElementById("submit_btn").disabled=false;
        }
        else{
            if(parseInt(document.getElementById('sixes_count_cpy').value).length==1){
                document.getElementById("submit_btn").disabled=true;
            }
        }
    }
    function checkSixesValidationcpy(){
        let total=parseInt(document.getElementById('total_runs_cpy').value);
        let totalSixes=parseInt(document.getElementById('sixes_count_cpy').value);
        let totalFours=parseInt(document.getElementById('fours_count_cpy').value);
        let totalSixesCanBeTyped=parseInt(((total-(totalFours*4))/6));
        if(totalSixes>totalSixesCanBeTyped){
            document.getElementById('sixes_count_cpy').style.backgroundColor="red";
        }
        else{
            document.getElementById('sixes_count_cpy').style.backgroundColor="white";
        }

        if(document.getElementById("sixes_count_cpy").style.backgroundColor="white" && document.getElementById("sixes_count").style.backgroundColor==="white"){
            document.getElementById("submit_btn").disabled=false;
        }
        else{
            if(parseInt(document.getElementById('sixes_count_cpy').value).length==1){
                document.getElementById("submit_btn").disabled=true;
            }
        }
    }
    function checkFoursValidation(){
        let total=parseInt(document.getElementById('total_runs').value);
        let totalFoursCanBeTyped=parseInt(total/4)
        
        if(parseInt(document.getElementById('fours_count').value)>totalFoursCanBeTyped){
            document.getElementById('fours_count').style.backgroundColor="red";
        }
        else{
            document.getElementById('fours_count').style.backgroundColor="white";
        }
        if((total-((parseInt(document.getElementById('fours_count').value)*4)))<6){
            document.getElementById('sixes_count').value="0";
            document.getElementById('sixes_count').disabled=true;
        }
        else{
            document.getElementById('sixes_count').value="";
            document.getElementById('sixes_count').disabled=false;
        }
        if(document.getElementById("sixes_count").style.backgroundColor="white" && document.getElementById("sixes_count").style.backgroundColor==="white"){
            document.getElementById("submit_btn").disabled=false;
        }
        else{
            if(parseInt(document.getElementById('sixes_count').value).length==1){
                document.getElementById("submit_btn").disabled=true;
            }
        }
    }
    function checkSixesValidation(){
        let total=parseInt(document.getElementById('total_runs').value);
        let totalSixes=parseInt(document.getElementById('sixes_count').value);
        let totalFours=parseInt(document.getElementById('fours_count').value);
        let totalSixesCanBeTyped=parseInt(((total-(totalFours*4))/6));
        if(totalSixes>totalSixesCanBeTyped){
            document.getElementById('sixes_count').style.backgroundColor="red";
        }
        else{
            document.getElementById('sixes_count').style.backgroundColor="white";
        }

        if(document.getElementById("sixes_count").style.backgroundColor="white" && document.getElementById("sixes_count").style.backgroundColor==="white"){
            document.getElementById("submit_btn").disabled=false;
        }
        else{
            if(parseInt(document.getElementById('sixes_count').value).length==1){
                document.getElementById("submit_btn").disabled=true;
            }
            
        }
    }

    function smartsearch(){

        if(document.getElementById('myInput').value.length==0){
            document.getElementById("mainForm").style.display='block';
            document.getElementById("submit_btn").style.display='block';
            document.getElementById("myTable").style.display="none";

        }
        else{
            document.getElementById("mainForm").style.display='none';
            document.getElementById("submit_btn").style.display='none';
            document.getElementById("myTable").style.display="block";
        }
        let filter=document.getElementById('myInput').value.toUpperCase();
		let mytable=document.getElementById('myTable');
		let tr=document.getElementsByTagName('tr');

		for (var i = 1; i < tr.length; i++) {
		let td=tr[i].getElementsByTagName('td')[1];
		if(td){
			let textValue=td.textContent || td.innerHTML;
			if(textValue.toUpperCase().indexOf(filter)>-1){
				tr[i].style.display="";
			}
			else{
				tr[i].style.display="none";
			}
		}
		}

	}

</script>


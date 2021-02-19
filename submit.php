<?php
if(isset($_POST['submit'])){
    $nameArr = $_POST['name'];
    $totalArr = $_POST['total'];
    $foursArr = $_POST['fours'];
    $sixesArr = $_POST['sixes'];
    $cnt=0;
    if(!empty($nameArr)){
        $conn = new mysqli('localhost','root','','details');
        if($conn->connect_error){
            echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
        } else {
            for($i = 0; $i < count($nameArr); $i++){
                if(!empty($nameArr[$i])){
                    $full_name = $nameArr[$i];
                    $runs_scored = $totalArr[$i];
                    $fours_scored_count = $foursArr[$i];
                    $sixes_scored_count = $sixesArr[$i];
                        
                    $stmt = $conn->prepare("insert into cricketer_records(full_name,runs_scored,fours_scored_count, sixes_scored_count) values('$full_name', '$runs_scored', '$fours_scored_count', '$sixes_scored_count')");
					$execval = $stmt->execute();
                    $cnt=$cnt+$execval;
				}
            }
        }
    }
}
$stmt->close();
$conn->close();
?>
<script>
    var msg=<?php echo $cnt ?>;
    alert(msg + " rows stored") 
    document.location = 'index.php'
</script>
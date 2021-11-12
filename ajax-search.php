<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
        include "connection.php";
        //zip code 
        if(isset($_POST['term'])){
	        $zip=$_POST['term'];
	        $zipcode_arr=array();
	        $sql="SELECT*FROM cities_extended WHERE zip LIKE '%".$zip."%' LIMIT 10";
	        $result=$conn->query($sql);
	        while($row=$result->fetch_assoc()){
	        	$data['zip']=$row['zip'];
	        	array_push($zipcode_arr,$data['zip']);
	        }
	        echo json_encode($zipcode_arr);
	    }
	    if(isset($_POST['state_code'])){
	    	$state_code=$_POST['state_code'];
	    	$state_code_arr=array();
	    	$sql="SELECT*FROM cities_extended WHERE zip='$state_code'";
	    	$result=$conn->query($sql);
	    	while($row=$result->fetch_assoc()){
	    		echo json_encode($row['state_code']);
	    	}
	    	
	    	// $sql="SELECT*FROM cities_extended WHERE state_code='$x'";
	    	// $result=$conn->query($sql);
	    	// while($row=$result->fetch_assoc()){
	    	// 	 echo "<pre>";
	    	// }
	    }
    }else{
    	echo "not allow to access";

    }
?>
<?php
// Read the file contents into a string variable,
// and parse the string into a data structure
	if(isset($_POST['workouts'])) {
		$json = $_POST['workouts'];
		var_dump(json_decode($json, true));
		updateWorkout($json);
	} else {
		echo "Noooooooob";
	}
	
	function updateWorkout($jsonObj){
		$str_data = file_get_contents("workouts.json");
		$data = json_decode($str_data,true);
	 			 
		// Modify the value, and write the structure to a file "data_out.json"
		//
		$data[] = array('id'=>4, 'name'=>'abcdef', 'value'=>'abcdefg');
		$json = json_encode($data);
		$data[0]["workoutmanage"][0]["weekworkouts"][0]["workout"][$json.dayOfWeek]["distance"] = $jsonObj.distance;
		 
		$fh = fopen("workouts.json", 'w')
			  or die("Error opening output file");
		fwrite($fh, json_encode($data,JSON_UNESCAPED_UNICODE));
		fclose($fh);
	}
	
	
?>
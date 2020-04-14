<?php
	$conn = pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=postgres");
		if(!$conn){
			die("PostgreSQL connection failed");
		}
	echo "PostgreSQL connected successfully";
?>
<?php

	error_reporting(0);

   	if(session_destroy()) 
   	{
		
    	header("location: login");
		

   	}

?>
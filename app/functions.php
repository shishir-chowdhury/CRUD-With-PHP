<?php 

	/**
 	* Data recover form submission
 	*/
 
 	function old($name){

 		if (isset($_POST[$name])) {

 		echo $_POST[$name];
 		}
 		
 	}

 

 	/**
 	 *  file upload system 
 	 */
 	  
 	  function fileupload($file, $location ='photos/', $format =['jpg','png','gif'] ){
 	  	// file info
 	  	 $file_name = $file['name'];
 	  	 $file_tmp_name = $file['tmp_name'];
 	  	 


 	  	 // get file extention
 	  	 $file_array = explode('.', $file_name);
 	  	 $ext = strtolower(end($file_array));
 	  	 

 	  	// unique file name 
 	     $unique_name = md5(time().rand()).'.'.$ext;

 	     $status='';
 	     if (in_array($ext, $format)) {

 	      	//upload file
 	  	    move_uploaded_file($file_tmp_name, $location.$unique_name );
 	  	    $status= 'yes';
 	      }else{
 	      	$status= 'no';
 	      }


 	  	return [
 	  		'file_name' => $unique_name,
 	  		'status'    => $status
 	  	];

 	 }



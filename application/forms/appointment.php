<?php
/*
--------------------------------------------------------------------------------
HHIMS - Hospital Health Information Management System
Copyright (c) 2011 Information and Communication Technology Agency of Sri Lanka
<http: www.hhims.org/>
----------------------------------------------------------------------------------
This program is free software: you can redistribute it and/or modify it under the
terms of the GNU Affero General Public License as published by the Free Software 
Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,but WITHOUT ANY 
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR 
A PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License along 
with this program. If not, see <http://www.gnu.org/licenses/> or write to:
Free Software  HHIMS
C/- Lunar Technologies (PVT) Ltd,
15B Fullerton Estate II,
Gamagoda, Kalutara, Sri Lanka
---------------------------------------------------------------------------------- 
Author: Mr. Thurairajasingam Senthilruban   TSRuban[AT]mdsfoss.org
Consultant: Dr. Denham Pole                 DrPole[AT]gmail.com
URL: http: www.hhims.org
----------------------------------------------------------------------------------
*/


////////Configuration for clinic_patient form
$form = array();
$form["OBJID"] = "APPID";
$form["TABLE"] = "appointment";
$form["SAVE"] = "appointment/save";
$form["CONTINUE"]  = "";
$form["PATIENT_BANNER_ID"] = $this->uri->segment(4);
$form["NEXT"]  = "";	
$form["FORM_CAPTION"] = "Patient appointment";
$form["FLD"]=array(
array(		
		"id"=>"VDate", 
		"name"=>"VDate",
		"label"=>"Appointment date", 
		"type"=>"date",
		"value"=>date("Y-m-d"),
		"option"=>"age",
		"placeholder"=>"Date of appointment",
		"rules"=>"required|xss_clean",
		"style"=>"",
		"class"=>"input",
		"onmousedown"=>"onmousedown=$('#VDate').datepicker({changeMonth: true,changeYear: true,yearRange: 'c-0:c+40',dateFormat: 'yy-mm-dd',maxDate: '+30D'});"
	),	
array(		
		"id"=>"Type", 
		"name"=>"Type",
		"label"=>"*Token type ",
		"type"=>"table_select",
		"value"=>'',
		"option"=>'Type',
		"sql"=>"SELECT VTYPID,Name as `Type` FROM visit_type WHERE Active = TRUE 
		 ORDER BY Name " ,
		"placeholder"=>"Visit Type",
		"rules"=>"required|trim|xss_clean",
		"style"=>"",
		"class"=>"input",
		"can_edit"=>array("Programmer","Admin")
	),	
	array(		
		"id"=>"Consultant", 
		"name"=>"Consultant",
		"label"=>"*Doctor ",
		"type"=>"table_select",
		"value"=>'',
		"option"=>'UID',
		"sql"=>"SELECT UID ,CONCAT(Title,FirstName,' ',OtherName ) as Consultant 
		FROM user WHERE (Active = TRUE) AND ((Post = 'OPD Doctor') OR (Post = 'Consultant')) 
		 ORDER BY OtherName ",
		"placeholder"=>"Doctor",
		"rules"=>"required|trim|xss_clean",
		"style"=>"",
		"class"=>"input",
		"can_edit"=>array("Programmer","Admin")
	),
array(		
		"id"=>"PID", 
		"name"=>"PID",
		"label"=>"",
		"type"=>"hidden",
		"value"=>$this->uri->segment(4),
		"option"=>"",
		"placeholder"=>"",
		"rules"=>"required|xss_clean",
		"class"=>"input",
		"style"=>""
	)
	);
if (isset($_GET["CONTINUE"])){
array_push ($form["FLD"],
	array(		
			"id"=>"CONTINUE", 
			"name"=>"CONTINUE",
			"label"=>"",
			"type"=>"hidden",
			"value"=>$_GET["CONTINUE"],
			"option"=>"",
			"placeholder"=>"",
			"rules"=>"xss_clean",
			"class"=>"input",
			"style"=>""
		)
	);
}
else{
array_push ($form["FLD"],
	array(		
			"id"=>"CONTINUE", 
			"name"=>"CONTINUE",
			"label"=>"",
			"type"=>"hidden",
			"value"=>"",
			"option"=>"",
			"placeholder"=>"",
			"rules"=>"xss_clean",
			"class"=>"input",
			"style"=>""
		)
	);
}
	/*

  
   

     
    $form["FLD"][14]=array(
                                    "Id"=>"Address_DSDivision", "Name"=>"",   "Type"=>"hidden",     "Value"=>"",     "Help"=>"",   "Ops"=>"","valid"=>""
                                    );    
      $form["FLD"][15]=array(
                                    "Id"=>"Address_District", "Name"=>"",   "Type"=>"hidden",     "Value"=>"",     "Help"=>"",   "Ops"=>"","valid"=>""
                                    );       
      $form["FLD"][16]=array(
                                    "Id"=>"PID", "Name"=>"PID",   "Type"=>"hidden",     "Value"=>"",     "Help"=>"",   "Ops"=>"","valid"=>""
                                    );   
		      $form["FLD"][17]=array(
                                    "Id"=>"FS", "Name"=>"FS",   "Type"=>"hidden",     "Value"=>"0",     "Help"=>"",   "Ops"=>"","valid"=>""
                                    );   						
$form["BTN"][0]=array(
                                   "Id"=>"SaveBtn",    "Name"=>"Save",   "Type"=>"button", "Value"=>"Save",     
                                    "Help"=>"",   "Ops"=>"",  "onclick"=>"saveData()",
                                    "Next"=>""
                                    );                                            
   
*/
$patient["JS"] = "
<script>
function ForceSave(){
}
</script>
";  									
////////Configuration for patient form END;                   
?>
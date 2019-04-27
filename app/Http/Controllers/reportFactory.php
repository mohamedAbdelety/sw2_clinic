<?php
 namespace App\Http\Controllers; 
 class reportFactory {
	
   //use getShape method to get object of type shape 
   public function __construct(){}
   public function getReport($reportType){
      if($reportType == null){
         return null;
      }		
      if($reportType == "doctor"){
         return new reportDoctor();
      } else if($reportType == "hr"){
         return new reportHR();  
      } else if($reportType == "fr"){
         return new reportFR();
      } else if($reportType == "admin"){
         return new reportAdmin();
      }
      return null;
   }
}
<?php
 namespace App\Http\Controllers;
 use App\Http\Controllers\salaryInterface;
 class contextStrategy {
   
   private $strategy;
   public function __construct(salaryInterface $strategy)
    {
        $this->strategy = $strategy;
    }
   public function executeStrategy($id){
      	return $this->strategy->paySalary($id);
   }

}
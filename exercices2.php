<?php

session_start();
class DevinetteMot{
     public $lettre ; 

     public function __construct($lettre = null){
        if($lettre !== null){
            $this->setLettre($lettre); 
        }
     }

     public function setLettre($lettre){
            $mot = ["jouet"]; 
            extract($mot); 

            if(is_string($lettre) && strlen($lettre) ===1){
                
            }
     }




}

>





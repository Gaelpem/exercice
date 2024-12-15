<?php
spl_autoload_register(function($nomClass) {
   require 'class/' . $nomClass . 'php';  
});  


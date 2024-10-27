<?php
/*
$salarie = [
    ['nom' => 'Durant',"age" => '29' , 'prenom' => 'Loic','age' => 29,'profession' => 'webmaster','site' =>'openclassroom'],
    ['nom' => 'Dupont',"age" => '55', 'prenom' => 'Loic','age' => 55,'profession' =>'integrateur','site' => 'alsacreation'],
    ['nom' => 'Martin',"age"=>'25','prenom' => 'Loic','age' => 25,'profession' => 'deveoppeur','site' => 'creativejuiz'],
];

echo '<pre>';
print_r($salarie);
echo '</pre>';


echo '<table  border="1" width="100%"><tr><th>Nom</th><th>Âge</th><th>Prenom</th><th>Profession</th><th>Site</th></tr>';
$lgTabSalarie = count($salarie);
for ($p = 0;$p <$lgTabSalarie; $p++){
    echo '<tr>';
    echo '<td>'. $salarie[$p]['nom']. '</td>';
    echo '<td>'. $salarie[$p]['age']. '</td>';
    echo '<td>'. $salarie [$p]['prenom']. '</td>';
    echo '<td>'.  $salarie[$p]['profession']. '</td>';
    echo '<td>', '<a href="#">'.  $salarie[$p]['site']. '</a>','</td>';
    
    echo '</tr>';
}
echo '</table>';
?>
<style>
    td a {
        color:white; 
    }
   table{
    border-collapse: collapse; 
    border : 2px solid black; 
   }
   th{
    background-color:black;
    text-align : center; 
    color: white;
   }
   
    td{
        text-align:center; 
        background : red;  
        color : white; 
    }
    </style>



<?php
for ($i = 1; $i <= 10; $i++) {
      echo "Table de multiplication de $i<br>";
      for ($j = 0; $j <= 10; $j++) {
            echo "$i x $j = " . $i * $j . "<br>";
      }
      echo '<hr>';
}
?>

<?php
// nombre pair jusqu'à 20 

for ($p = 1 ; $p <= 20 ;$p++){
    if($p % 2 == 0 ){
        echo $p . "<br>";
    }
}


// nombre factorielle 
/*
$n= 5; 
$f= 1; 
for($h=1; $h<= $n; $h++){
    $f *= $h; 
    echo $f .'<br>';
}

for($q=1; $q<=5; $q++) {  
    for($j=1;$j<=$q;$j++ ){
        echo "*" ;
    }
 echo " <br>";
}

 */
$menus = array(  
"Entrées" => array("Pain", "Légumes", "Toast"),
"Plats" => array("Agneau" , "Kebab", "Pizza"),
"Desserts" => array("Tiramisu" ,"Glace","Pates")
); 

 foreach($menus as $entree => $plat){

    echo "<ul><li>$entree : <ul><li>{$plat[0]}</li><li>{$plat[1]}</li><li>{$plat[2]}</li></ul></li></ul>";
}


 
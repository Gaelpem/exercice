<?php

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

$tab = array("pomme", "fraise" , "orange"); 
foreach($p=0; count($tab); $p++){
    echo $tab[$p];
}
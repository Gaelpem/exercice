<?php
print 'fonctionnement egalement';
echo "<h3>Les commentaires</h3>";

echo "<h3>Les variables</h3>";
$a = 10;
$b = 5;
$c = $a + $b;
echo $c;

$dataClientName = " John";
$dataClientAge = 25;
$dataClientCity = "Paris";
echo $dataClientCity;
$dataClientCity = "New York";
echo $dataClientCity;

echo "<h3>Affectation par copie et références</h3>";
$firstVar = 1;
$secondVar = $firstVar + 9;
echo $secondVar;
echo $firstVar;

$newVar = 8;
$otherVar = &$newVar;
$otherVar = 10;
echo $otherVar;
echo $newVar;

echo "<h3>Variables dynamiques</h3>";
$personnage = "link";
echo $personnage;
${$personnage}="Zelda";
echo $link;

${$personnage . "Mechant"} = "Ganon";
echo $linkMechant;


echo "<h3>La concaténation</h3>";

$x = "bonjour";
$y = "tout le monde";
echo $x . ' ' . $y;


$etudiant = " Noah <br>";
$etudiant .= "  est un étudaint";
echo $etudiant;


$message = "aujourd'hui";
$message = "aujourd\ 'hui"; 

echo "<p>Hey! {$x}  {$y}</p>";

echo "<h3>LE typage</h3>";

/*

type scalaire
- entier = > integer 
- flottant = > float 
- chaine de caractere = > string 
- booleens = >

Les types composés 
- tableuaux = > array 
- objet 
- ressoource
- itterables 

*/

$a = 127;
$b = 1.5;
$c = "Bonjour";
$d =  true; 

echo gettype($a) . '<br>';
echo gettype($b) . '<br>';
echo gettype($c) . '<br>';
echo gettype($d) . '<br>'; 

$tab = [1, 2]; 
$obj = new DateTime();
echo gettype($tab) . '<br>';
echo gettype($obj) . '<br>'; 

echo '<h3>Les constantes</h3>';
define("CAPITALE", "PARIS");
echo CAPITALE; 

const Lien_Google = " <a href= ''https://www.google.com''>Google</a> ";
echo Lien_Google;
echo constant("Lien_Google");

const PI = 3.14 ;
$rayon = 12; 
echo "<p> L'aire du cercle est : " . PI * $rayon * $rayon . "</p>";

echo "<h3>Les constantes magiques</h3>"; 
echo __LINE__ . '<br>';
echo __FILE__ . '<br>';
echo __DIR__ . '<br>'; 
echo PHP_VERSION; 

echo "<h3>Les opérateurs artithmétiques</h3>";
$a = 10; 
$b = 2; 
echo $a + $b . '<br>'; 
echo $a - $b . '<br>'; 
echo $a / $b . '<br>';

$a = 7;
$b = 3; 
echo $a % $b .  '<br>';

//affectation par addition !

$panirMouss = 0; 
$panirMouss +=10; 
$panirMouss += 5; 
$panirMouss -= 2; 
echo $panirMouss ; 


echo '<h3>Les structures conditionnelles</h3>';
?>

<style>
  .carre{
    height:100px;
    width:100px; 
  }
  .carreRouge{
    background-color:red; 
  }
  .carreVert{
    background-color:green; 
  }
 .CarreBleu{
    background-color:blue;
 }
 .simpleCarre{
   border: 2px solid black;
 }
    </style>

<?php
$var0 = 0; 
$var1 = 1; 
$rouge = "<div class='carre carreRouge'> </div>";
$bleu = "<div class='carre carreBleu'></div>";
$vert = "<div class='carre carreVert'></div>";
$simpleCarre = "<div class='carre simpleCarre'></div>";

if (isset($rouge)){
    echo $rouge;
} else {
    echo $simpleCarre;
}

if (empty($var0)){
    echo $rouge; 
} else {
    echo $simpleCarre;
}

//opérateurs Logiques
#&& ou AND = > ET 
if (isset($rouge) && isset($jaune)){
    echo $rouge; 
} else{
    echo $simpleCarre;
}

if (isset($bleu) || isset($jaune)) {
       echo $bleu;
}else{
    echo $simpleCarre;
}

#opérateurs de comparaison 

#== : égalité
#=== : égalité stricte 
#! = : différent de 

$a = mt_rand(1, 50);
$b = mt_rand(1, 50);
$c = 2; 
if ($a > $b ){
    echo $a . ' est supérieur à ' . $b;
} else {
    echo $a . ' est inférieur à '  . $b;
}
//elseif

$salaire = mt_rand(1, 5000);
if ($salaire < 1000) {
    echo " Vous gagnez $salaire €. Vous êtes pauvre";
} else if ($salaire < 2000){
    echo "Vous gagnez {$salaire} €. Vous êtes moyen";
}else {
    echo " Vous gagnez {$salaire} €. Vous êtes riche";
}

//ternaire

$var0 = 0; 
$var1 = 1; 
$truc = ($var === 0 ) ? true : (($var1
 === 0) ? true : false);

 //forme = pratique : 
    $display = false ; 
    if ($display != true) : ?>
       <h3>Aucun formulaire à afficher</h3>
       <?php else : ?>
         <form action ="" method="post">
            <input type="text" name="nom" id="nom">
            <input type="submit" value="Envoyer">
        </form>
      <?php endif; 

echo "<h3>Le Switch</h3>"; 
$couleur = 'jaune';
switch($couleur){
    case 'rouge':
        echo 'Vous avez choisi ma couleur rouge';
        break;
    case 'bleu':
        echo 'Vous avez choisi la couleur bleu';
        break;
    case 'vert':
      echo 'Vous avez choisi la couleur vert';
      break;
    default:
         echo 'La couleur choisie n\'est ni rouge, ni bleu, ni vert';
}
$couleur = 'jaune';
if($couleur == 'rouge'){
     echo 'Vous avez choisi la couleur rouge';
}elseif($couleur == 'bleu'){
   echo 'Vous avez choisi la couleur bleu';
}elseif($couleur == 'vert'){
    echo 'Vous avez choisi la couleur vert';
}else{
    echo 'La couleur choisie n\'est ni rouge, ni bleu, ni vert';
}
  echo "<h3>Les fonctions prédéfinies</h3>";
  //phpinfo(); // affiche les informations sur la configuration Php
  //débug :
  $tab =[1, 2, 3];
  echo '<pre>'; 
  print_r($tab);
  echo '</pre>';

  echo '<pre>';
  var_dump($tab);//affiche le contenu d'une variable

  echo '</pre>';

  //dates : 
 
  echo '<p>Nous sommes le ' . date('d F Y') . ' et 
  il est ' .date('H') . 'h' . date('i') . '</p>';

  #time() : nombre de seconde ecoulées depuis le 1er janvier 1970
  echo time() . '<br>';
  // fonction mathematiquee 
 $valueToTest = 105.898;
 echo ceil($valueToTest) . '<br>'; // arrondi au supérieur 

 echo floor($valueToTest) . '<br>' ;// arrondie à l'inferieur

 echo round($valueToTest) . '<br>' ;// arrondi au plus proche

 echo '<p>La valeur maximale est : ' . max(1, 2, 3, 4, 5). '</p>';
 echo '<p>La valeur minimal est : ' . min(1, 2, 3, 4, 5). '</p>';

 //fonction text :

 $firstName ="john";
 echo ucfirst($firstName) . '<br>'; //met la 1ere lettre en majuscule

 #srttolower() : met tout en minujuscule
 #strtouper() : met tout en majuscule
 $chaine = "voici Une Chaine De caracTeres en Lettres Majuscules"; 
 echo strtolower($chaine) . '<br>';
 echo strtoupper($chaine) . '<br>';

 #strpos() : retourne la position de la premiere chaine trouver 
 $email = "aliou@gmail.com";
 echo strpos($email, '@') . '<br>';
 if (strpos ($email, '@')  === false){
    echo 'L\'email n\' est pas valide <br>'; 

 }else {
    echo 'L\'email est valide <br>';
 }

 #strstr():retourne la chaine de caractère à partir de la 1ere occurence

 echo strstr($email, '@') . 'br'; 

 #iconv_strlen(): retourne la longueur d'une chaine de caractère 
 echo iconv_strlen($texte) . '<br>';

 #substr() : retourne une partie de la chaine de caracteres

 $texte = "lorem ipsum fohnkfnkf  oihfklnopj ojzhfiojeoij
 mot kjour nuit venir nojnzlaof  ziohfznf opzjpojlk"; 
 echo substr($texte, 0, 50) . '...<a href="#">Lire la suite</a>';

 #trim : supprime les espaces en débat et fin de chaine 
 $trimChaine = "Bonjour tout le monde ";
 echo trim($trimChaine);

 echo '<h3>Les boucles</h3>';
 //boucle while 
 /*
 condition /itération/ affichage /initialisation 
 */
$i = 0 ; // initialisation 
while ($i < 10 ){//prédicat 
    echo $i . '<br>'; //affichage 
    $i = $i + 1 ; // iteration => incrementation 
}

// boucle for 
for ($j = 100; $j >= 0; $j = $j - 1 ){
    echo $j . '<br>';
}
?>

<select>
    <?php
    //forme pratique
    $year = 1900;
    while ($year <= date('Y')) : ?>
          <option><?= $year; ?></option>
        <?php $year++; 
        endwhile; ?>
</select>

<?php
// Exo : afficher avec une boucle. Résultat attendu : 0--1--2

  $w = 0; 
  while ($w < 2) {
    echo ($w < 2 ) ? $w . '--' : $w; 
    $w++; 
    /* if ($w < 2 ){
        echo $w .'--';
    }else{
        $w;
    }*/
  }

  //Exo : afficher avec une boucle.Résultat attendu : 12 14 16 18 20 

  $k = 12; 
  while ($k <= 20 ){
     echo $k . ' '; 
     $k = $k + 2;
  }
  // exo 3: A l'aide d'une boucle, calculez la somme des nombres de 0 à 30
  // exo 4 : Un match de foot dure 90min. A la fois mi-temps de match, on recense deux buts :
  // - Le 1er à la 11e minute 
  // - Lz second à la 23eme min
  // : Affcihez le nombre total de buts marqués durant  cette 1ere partie du match et les moments pendant lesquels les buts ont été inscritS

// exo 3
$sum = 0; 
$o = 1; 
while($o <= 30){
    $sum += $o; 
    $o++;
}
echo '<p> le résultat est : ' . $sum . '</p>';

 // exo 4
$miTemps = 45; 
$nButs = 0; 
$affichage = "";
while($miTemps >= 0){
    if($miTemps == 11 || $miTemps == 23){
        $nButs++; 
        $affichage .= "<li>But à la $miTemps minute </li>"; 
    }
    $miTemps--; 
}
echo "<p>Nombre de buts marqués : $nButs</p><ul>$affichage</ul>";


echo '<h3>Les tableaux</h3>';
//tableau indexé
$tab = ["Kévin", "Noah", "Aliou", "Mouss", "Mouss", "Aurélie"]; 
echo '<pre>'; 
print_r($tab); 
echo '</pre>'; 
echo '<p>' . $tab[2]. ' et ' . $tab[3] . ' sont amis pour la  vie </p>'; 
//2nde maniere de creer les tableaux;
$tab1 = array("Nassira", "Noah", "Lucas", "Gael"); 
echo '<pre>'; 
print_r($tab1); 
echo '</pre>'; 
echo $tab1[2]; 

//la maniere de creer les tableaux:

//3eme maniere de creer les tableaux: 

$atb3 [] = "Ruben"; 
$atb3 [] = "DYDY";
$atb3 [] = "JASON";
$atb3 [] = "Erwan";
$atb3 [] = "Heyyy ohh !"; 
echo '<pre>'; 
print_r($atb3); 
echo '</pre>'; 
echo $atb3[1]; 
//EXO : ['titi',true,78,['DC','php',['html-css','javascript',['sql']],'Vejko']]; 
//Afficher : Veljko maitrise le html-css mais a du mal avec php et sql ! Hâte de voir ce que cela donnera avec javascript !

$tab4 =  ['titi',true,78,['DC','php',['html-css','javascript',['sql']],'Vejko']];
echo '<pre>'; 
print_r($tab4);
echo '</pre>';
echo $tab4[3][3] . 'maitrise le ' . $tab4[3][2][0] . ' mais a du mal avec ' . $tab4[3][2][1] . ' et cela donnera avec' . $tab4[3][2][1] . ' ! '; 

$student = [
    'nom' => 'Noah',
    'age' => 23, 
    'ville' => 'Paris'
]; 

echo '<pres>'; 
print_r($student); 
echo '</pres>'; 
echo '<p>' . $student['nom'] . ' a ' . $student
['age'] . ' ans et habite à ' . $student['ville'] . 
'</p>'; 

// boucle foreach() : parcourir un tableau
//recuperation clé + valeurs

foreach ($student as $key => $value) {
    echo $key . ' : ' . $value . '<br>';
}

//récupération des valeurs
foreach ($student as $value) {
    echo $value . '<br>';
}

// tableau associatif
$student = [
    'nom' => 'Noah', // indice => valeur
    'age' => 23,
    'ville' => 'Paris'
];
echo '<pre>';
print_r($student);
echo '<pre>';
echo '<p>' . $student['nom'] . ' a ' . $student['age'] . ' ans et habite à ' . $student['ville'] . '</p>';


// boucle foreach() : parcourir un tableau
// récupération clé + valeurs
foreach($student as $key => $value){
    echo $key . ' : ' . $value . '<br>';
}


// récupération des valeurs
foreach ($student as $value){
    echo $value . '<br>';
}


$students = [
    ['nom' => 'Noah', 'age' => 23, 'ville' => 'Paris'],
    ['nom' => 'Aliou', 'age' => 25, 'ville' => 'Lyon'],
    ['nom' => 'Mouss', 'age' => 24, 'ville' => 'Marseille'],
    ['nom' => 'Erwan', 'age' => 24, 'ville' => 'Dijon'],
    ['nom' => 'Kevin', 'age' => 24, 'ville' => 'Nancy'],
    ['nom' => 'Jason', 'age' => 24, 'ville' => 'Bourg en Bresse'],

];
echo '<pre>';
print_r($students);
echo '<pre>';

$lgTabStudents = count($students);//sizeof
for($p = 0; $p < $lgTabStudents; $p++){
    foreach($students[$p] as $key => $value){
        echo $key . ' : ' . $value . '<br>';
    }
}
 
echo $students[2]['nom']; 

echo '<table  border="1" width="100%"><tr><th>Id</th><th>Nom</th><th>Age</th><th>Ville</th></tr>';
for($p = 0; $p < $lgTabStudents; $p++){
        echo "<tr >";
        echo '<td>' . ($p + 1) . '</td>';
        echo '<td>' . $students[$p]['nom'] . '</td>';
        echo '<td>' . $students[$p]['age'] . '</td>';
        echo '<td>' . $students[$p]['ville'] . '</td>';
        echo '</tr>';
    }
echo '</table>';

echo '<h3>Les fonctions prédéfinies </h3>';
#implode() : rassemble les élément d'un tableau en une chaine de caractere 
$tab =['Noah', 'Aliou', 'Mouss', 'Erwan', 'Kévin']; 
$separation = implode(', ', $tab);
echo $separation . '<br>'; 

//assasseur : récuperation d'information surle tableau
//explode(): sépare une chaine de caractere en tableau
$langage = "PHP, Jvasccript, HTML, CSS, SQL"; 
$recupTag = explode(', ',$langage);
echo '<pre>'; 
print_r($recupTag); 
echo '</pre>'; 

#in_array() : recherche une valeur dans un tableau

$prenom = 'Noah'; 
if(in_array($prenom, $tab)){
    echo 'Le prénom ' . $prenom . 'est dans le tableau'; 
}else {
    echo 'Le prénom ' . $prenom . ' n\'est pas dans le tableau'; 
}

//array_unique : supprime les doublons
$tab = ['Noah', 'Aliou', 'Mouss', 'Erwan', 'Kévin', 'Noah', 'Aliou', 'Mouss', 'Erwan', 'Kévin'];
$tabUnique = array_unique($tab);
echo '<pre>';
print_r($tabUnique);
echo '<pre>';

#array_push() : ajoute un ou plusieurs éléments à la fin d'un tableau
$tab = ['Noah', 'Aliou', 'Mouss', 'Erwan', 'Kévin'];
array_push($tab, 'jason', 'Ruben');
echo '<pre>';
print_r($tab);
echo '<pre>';

#array_pop() : supprimer le dernier élément d'un tableau
$tab = ['Noah', 'Aliou', 'Mouss', 'Erwan', 'Kévin'];
array_pop($tab);
echo '<pre>';
print_r($tab);
echo '<pre>';

#sort() : trie un tableau
$tab  = ['Noah', 'Aliou', 'Mouss', 'Veljko', 'Kévin'];
sort($tab);
echo '<pre>';
print_r($tab);
echo '<pre>';

#extroat() : importe les éléments d'un tableau (indices) et les traduires sous forme de variables
$student['nom'] = 'Noah';
$student['age'] = 23;
$student['ville'] = 'paris';
extract($student);
echo $nom . ' a ' . $age . ' ans et habite à ' . $ville;

echo "<h3>Les fonctions 'utilisateurs'</h3>"; 
function displayHr()
{
    echo '<hr><hr><hr>'; 
}
displayHr();
displayHr();
displayHr();
displayHr();

function sayHello($name)
{
    echo "hey salut $name !"; 
}
sayHello('Ruben'); 
sayHello('Noah'); 

function sayHello_2(string $nama) : string
{
    return "hey salut $name ! comment ca va ? weshhh !"; 
    echo 'Noah n\'écoute pas ! '; 
}
echo sayHello_2('Mouss'); 


$couleur = ['red', 'blue', 'green', 'yellow', 'purple']; 

function squareColor(string $color, int $height, int $width): string
{
    return "<div style= 'height:{$height}px; width:{$width}px; 
    background:{$color}'></div>"; 
}
echo squareColor($couleur[0], 100, 100);
echo squareColor($couleur[4], 50, 150);  

//particularité des fonctions : on peut l'exécuter avant sa déclaration

echo addition(10, 5.9);
function addition(int | float $a, int | float  $b): int | float
{
    return $a + $b; 
}

// exo: creer une fonction meteo() qui prend en parametre une température et une saison et qui retourne la phrase suivante:
// température et une une saison et qui retourne la phrase suivante: 
//il fait 25 deg en été 
//il fait 1 dégré en hiver => meteo (1, 'hiver')
//il fait 15 deg au printemps => meteo(15, 'printemps')
//il fait 20deg en automne => meteo(20, 'automne')

function meteo(int $temperature,string $saison) : string{
    $article = ($saison == 'printemps') ? 'au' : ' en'; 
    $pluriel = ($temperature >= 2 || $temperature <= -2) ? 
    'degrés' : 'dégré'; 

    return "<p>Il fait {$temperature}{$pluriel}{$article}
    $saison</p>"; 
}

echo meteo(25, 'été'); 
echo meteo(1 , 'été'); 
echo meteo(25, 'été'); 
echo meteo(25, 'été'); 

// parametre défini; 

function soustration(int | float $a = 0 , int | float $b = 0): int | float{
    return $a - $b ; 
}
echo soustration();
echo soustration(0, 3); 
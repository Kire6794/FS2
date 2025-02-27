<?php
$name = "Erick";
$number = 4;
var_dump($name);
 
// echo "the name is :$name"
$a = (string) 5;
var_dump($a);
 
// const HELLO = "123";
// HELLOW = "234";

///////////////////////////
if($number == '4'){
    echo "Good" . "<br>";
}else{
    echo "Bad";
}
////////Arrays/////////////

$fruits = ["Apple", "Banana", "Cherry"];
echo $fruits[0];
 
$fruits[] = "Orange" . "<br>";
echo $fruits[3];

foreach($fruits as $f){
    echo $f . " ";
}

$person = [
    "name" => "Lily",
    "age" => 20,
    "city"=> "Calgary",
];
 
echo $person ['name'];
 
foreach ($person as $p => $v){
    echo $p;
    echo "<br>";
}

$persons = [
    [
        "name" => "Lily",
        "age" => 20,
        "city"=> "Calgary",
    ],
    [
        "name" => "Tom",
        "age" => 15,
        "city"=> "Calgary",
    ],
    [
        "name" => "Marie",
        "age" => 40,
        "city"=> "Calgary",
    ]
];

foreach($persons as $p){
    foreach($p as $k => $v){
        echo $k . "=" . $v;
        echo "<br>";
    }
    echo "<br>";
}

/////////////////////////////
$ages = [25,30,35,20,40];
// filter the array
$newAges = [];
foreach($ages as $a){
    if($a >= 30){
        $newAges[] = $a;
    }
}

print_r($newAges)

?>
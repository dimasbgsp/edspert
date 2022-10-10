// Diberikan array seperti dibawah ini
<?php
$arr= array(1,2,3,4,5);

// Carilah nilai array dan indexnya dengan kondisi

// nilai target lebih kecil dari 4 dan lebih besar dari 2;

$target = NULL;

$targetIndex = NULL;

// Lengkapi kode dibawah ini ganti ... dengan kode yang sesuai

foreach($arr as $key => $value) {

if($value < 4 && $value > 2) {

$target = $value;

$targetIndex = $key;

}

}

echo "ketemu nih, aku ada di index $targetIndex dengan nilai $target";
?>

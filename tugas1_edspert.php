<?php
	$arrNumber = array(1,2,3,4,5);
	
	print_r ($arrNumber);
	
	$total = 0;
	foreach ($arrNumber as $index => $val){
	 echo "index ke-$index = $val \n";
	 $total += $val;
	}
	echo "hasil penjumlahan dari array tersebut adalah $total";
	
// 	echo "Hasil dari penjumlahan (arrNumber) adalah ".array_sum($arrNumber);
?>
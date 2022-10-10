<?php

class Company {
  public $companyName = 'PT satu dua';
  public $basicBonus = 50000;
  public $dailySalary = 100000;
  
  function calculateBonus() {
    $bonusMultiplier = $this->level == 'senior' ? 2 : 1;
    $bonus = 0;
    if($this->dayCount >= 17 && $this->dayCount <=20) {
      $bonus = $this->basicBonus * $bonusMultiplier;
    }
    return $bonus;
  }
}

class Employee extends Company {
  public $name;
  public $level;
  public $dayCount;
  
  function __construct($name, $level, $dayCount) {
    $this->name = $name;
    $this->level = $level;
    $this->dayCount = $dayCount;
  }
  
  public function getSalary() {
    $bonus = $this->calculateBonus();
    
    $salary = $this->dailySalary * $this->dayCount;
    
    $total = $bonus + $salary;
    
    echo "Pegawai $this->name menjabat sebagai $this->level kamu mendapatkan gaji sebesar $total";
    
  }
}

$pakBrewok = new Employee('Pak Brewok', 'senior', 20);
$pakBrewok->getSalary();
?>


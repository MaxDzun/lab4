<?php

// Приклади ООП:
class Person{
  // property declaration
  public $firstName;
  public $secondName;

  // method declaration

  public function __construct( $fn = 'Abraham', $sn = 'Lincoln') {
    $this->firstName = $fn;
    $this->secondName = $sn;
  }

  // Приклад конкатенації
  public function fullName() {
    return $this->firstName . ' ' . $this->secondName;
  }
}

class Politician extends Person {
  public $partyName;
  public $isPresident = false;
  public function __construct($fn = 'Bob', $sn = 'Brown', $partyName = 'random party') {
    parent::__construct($fn, $sn);
    $this->partyName = $partyName;
  }

  function elect() {
    $this->isPresident = true;
  }

  public function fullInfo() {
    return "Політик " . $this->fullName() . ' ,член партії ' . $this->partyName . ($this->isPresident ? ' Був президентом США.' : 'Не був президентом США.');
  }
}

class America {
  public static $instance = null;

  public function __construct()  {

  }

 // Перевірка на сінглтон:
  public static function getInstance()  {
    if (self::$instance == null)
    {
      self::$instance = new America();
    }

    return self::$instance;
  }

  public function electCandidate(Politician $candidate) {
    $candidate->elect();
  }
}


$america = new America();

$person1 = new Person();
$person2 = new Person('George', 'Washington');
$candidate1 = new Politician( 'Theodore', 'Roosevelt', 'Республіканська партія');
$candidate2 = new Politician( 'Jefferson', 'Davis', 'Демократична партія');
$america->electCandidate($candidate1);

//

$candidateNumbers = [
  $candidate1->firstName => '0679095677',
  $candidate2->firstName => '0665421421',
];

$kyivstarCandidates = [];

foreach ($candidateNumbers as $name => $number ) {
  if (substr($number, 3) === '067') {
    $kyivstarCandidates[] = $name;
  }
}


//GET Запит

$page = $_GET['page'];
if($page == "mono") {
  echo "Сторінка з монографіями: Монографії(читати)";
} else {
  echo "Сторінка без монографій -_-";
}

echo "<br>";

//explode, implode в массивах

$strMountains = "Carpathian Alps Pyrenees Apennines Dinaric Ural Caucasus";
$arrMountains = explode(' ', $strMountains);
echo $arrMountains[2];
echo "<br>";
echo $arrMountains[5];
echo "<br>";

$arrCities = array('Aleppo','Istanbul','Damascus','Jerusalem','Jericho','Alexandria');
$strCities = implode(', ',$arrCities);
echo $strCities;

?>

<br>
<div style="text-align: center">
    <br>
    <div>Форма для заповнення:</div><br>
    <form action="form.php" method="post">
        Name: <input type="text" name="name"><br><br>
        Phone: <input type="tel" name="tel"><br><br>
        E-mail: <input type="text" name="email"><br><br>
        <textarea type="text" name="comment"></textarea><br><br>
        <input type="submit">
    </form>
    <br>
  <p><?php echo $person1->fullName(); ?></p>
  <p><?php echo $person2->fullName(); ?></p>
  <p><?php echo $candidate1->fullInfo(); ?></p>
  <p><?php echo $candidate2->fullInfo(); ?></p>

</div>


<?php

?>

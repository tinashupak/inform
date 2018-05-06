
<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

echo "Подключились!<br>";

$sql = "CREATE TABLE breed (
  id_breed int(10) NOT NULL AUTO_INCREMENT,
  productivity int(10) NOT NULL,
  diet_name varchar(100) NOT NULL,
  weight int(10) NOT NULL,
  PRIMARY KEY (id_breed))";
  
if (mysqli_query($link, $sql)) {
  echo "ОК. Принято.";
} else {
  echo "Нужно пофиксить " . mysqli_error($link);
}

$sql = "INSERT INTO breed (productivity, diet_name, weight) VALUES
  ('67', 'A1', '2'),
  ('57', 'А2', '2'),
  ('63', 'С3', '3'),
  ('43', 'B2', '4'),
  ('59', 'A1', '3')";
  
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Не фурычит <br>" . mysqli_error($link);
}


$sql = "CREATE TABLE cell (
  id_cell int(10) NOT NULL,
  row_number int(10) NOT NULL,
  chickens_number int(10) NOT NULL,
  PRIMARY KEY (id_cell))";
  
if (mysqli_query($link, $sql)) {
  echo "ОК. Принято.";
} else {
  echo "Нужно пофиксить " . mysqli_error($link);
}

$sql = "INSERT INTO cell VALUES
  ('1', '12', '3'),
  ('2', '1', '2'),
  ('3', '3', '3'),
  ('4', '17', '3'),
  ('5', '7', '5')";
  
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Не фурычит <br>" . mysqli_error($link);
}

$sql = "CREATE TABLE  worker (
  id_worker int(10) NOT NULL AUTO_INCREMENT,
  passport_data varchar(100) NOT NULL,
  contacts varchar(100) NOT NULL,
  wage int(10) NOT NULL,
  PRIMARY KEY (id_worker))";
  
if (mysqli_query($link, $sql)) {
  echo "ОК. Принято.";
} else {
  echo "Нужно пофиксить " . mysqli_error($link);
}

$sql = "INSERT INTO worker (passport_data, contacts, wage) VALUES
  ('Иванов А. Л.', 'alex@gmail.com', '28000'),
  ('Петров И. Г.', 'v79@gmail.com', '29000'),
  ('Оситров Е. Д.', 'kate@mail.ru', '30000'),
  ('Григорьев К. Г.', 'kon80@mail.ru', '30000'),
  ('Константинова О.Ю.', 'olga@mail.ru', '29000')";
  
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Не фурычит <br>" . mysqli_error($link);
}


$sql = "CREATE TABLE  poultry (
  id_poultry int(10) NOT NULL AUTO_INCREMENT,
  address varchar(100) NOT NULL,
  shop_number int(10) NOT NULL,
  PRIMARY KEY (id_poultry))";
  
if (mysqli_query($link, $sql)) {
  echo "ОК. Принято.";
} else {
  echo "Нужно пофиксить " . mysqli_error($link);
}

$sql = "INSERT INTO poultry (address, shop_number) VALUES
  ('пр. Маршала Жукова, 57', '2'),
  ('пр. Ветеранов, 59', '2'),
  ('ул. Михаила Дудина, 35', '1'),
  ('ул. Конюшенная, 58', '1'),
  ('ул. Нижняя Родищевская, 13', '2')";
  
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Не фурычит <br>" . mysqli_error($link);
}


$sql = "CREATE TABLE contract (
  id_contract int(10) NOT NULL AUTO_INCREMENT,
  worker int(10) NOT NULL,
  poultry int(10) NOT NULL,
  conditions varchar(100) NOT NULL,
  PRIMARY KEY (id_contract),
  KEY poultry (poultry),
  KEY worker (worker),
  CONSTRAINT contract_ibfk_1 FOREIGN KEY (poultry) REFERENCES poultry (id_poultry),
  CONSTRAINT contract_ibfk_2 FOREIGN KEY (worker) REFERENCES worker (id_worker))";
  
if (mysqli_query($link, $sql)) {
  echo "ОК. Принято.";
} else {
  echo "Нужно пофиксить " . mysqli_error($link);
}

$sql = "INSERT INTO contract (worker, poultry, conditions) VALUES
  ('1', '1', '№3А'),
  ('4', '3', '№2В'),
  ('3', '5', '№2А'),
  ('5', '4', '№2В'),
  ('2', '2', '№3В')";
  
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Не фурычит <br>" . mysqli_error($link);
}


$sql = "CREATE TABLE hen (
  id_hen int(10) NOT NULL,
  age int(10) NOT NULL,
  breed_name varchar(100) NOT NULL, 
  breed int(10) NOT NULL,
  PRIMARY KEY (id_hen),
  KEY breed (breed),
  CONSTRAINT hen_ibfk_1 FOREIGN KEY (breed) REFERENCES breed (id_breed))";
  
if (mysqli_query($link, $sql)) {
  echo "ОК. Принято.";
} else {
  echo "Нужно пофиксить " . mysqli_error($link);
}

$sql = "INSERT INTO hen VALUES
  ('1', '6', 'Брама', '2'),
  ('2', '8', 'Русская белая', '3'),
  ('3', '6', 'Леггорн', '5'),
  ('4', '5', 'Силки', '1'),
  ('5', '7', 'Виандот', '4')";
  
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Не фурычит <br>" . mysqli_error($link);
}


$sql = "CREATE TABLE  location (
  hen int(10) NOT NULL,
  cell int(10) NOT NULL,
  KEY hen (hen),
  KEY cell (cell),
  CONSTRAINT location_ibfk_1 FOREIGN KEY (hen) REFERENCES hen (id_hen),
  CONSTRAINT location_ibfk_2 FOREIGN KEY (cell) REFERENCES cell (id_cell))";
  
if (mysqli_query($link, $sql)) {
  echo "ОК. Принято.";
} else {
  echo "Нужно пофиксить " . mysqli_error($link);
}

$sql = "INSERT INTO location VALUES
  ('1', '2'),
  ('2', '3'),
  ('3', '4'),
  ('4', '5'),
  ('5', '1')";
  
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Не фурычит <br>" . mysqli_error($link);
}


$sql = "CREATE TABLE  shop (
  id_shop int(10) NOT NULL AUTO_INCREMENT,
  address varchar(100) NOT NULL,
  hens_number int(10) NOT NULL,
  poultry int(10) NOT NULL,
  PRIMARY KEY (id_shop),
  KEY poultry (poultry),
  CONSTRAINT shop_ibfk_1 FOREIGN KEY (poultry) REFERENCES poultry (id_poultry))";
  
if (mysqli_query($link, $sql)) {
  echo "ОК. Принято.";
} else {
  echo "Нужно пофиксить " . mysqli_error($link);
}

$sql = "INSERT INTO shop VALUES
  ('1', 'ул. Михаила Дудина', '97', '3'),
  ('2', 'ул. Конюшенная, 58', '127', '4'),
  ('3', 'ул. Нижняя Родищевская, 13', '104', '1'),
  ('4', 'пр. Ветеранов, 59', '167', '2'),
  ('5', 'пр. Маршала Жукова, 57', '145', '5')";
  
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Не фурычит <br>" . mysqli_error($link);
}

$sql = "CREATE TABLE  service (
  cell int(10) NOT NULL,
  shop int(10) NOT NULL,
  poultry int(10) NOT NULL,
  worker int(10) NOT NULL,
  KEY poultry (poultry),
  KEY cell (cell),
  KEY shop (shop),
  KEY worker (worker),
  CONSTRAINT service_ibfk_1 FOREIGN KEY (poultry) REFERENCES poultry (id_poultry),
  CONSTRAINT service_ibfk_2 FOREIGN KEY (cell) REFERENCES cell (id_cell),
  CONSTRAINT service_ibfk_3 FOREIGN KEY (shop) REFERENCES shop (id_shop),
  CONSTRAINT service_ibfk_4 FOREIGN KEY (worker) REFERENCES worker (id_worker))";
  
if (mysqli_query($link, $sql)) {
  echo "ОК. Принято.";
} else {
  echo "Нужно пофиксить " . mysqli_error($link);
}

$sql = "INSERT INTO service VALUES
  ('1', '1', '3', '4'),
  ('5', '5', '5', '3'),
  ('4', '4', '2', '2'),
  ('3', '3', '1', '1'),
  ('2', '2', '4', '5')";
  
if (mysqli_query($link, $sql)) {
  echo "Добавили данные<br>";
} else {
  echo "Не фурычит <br>" . mysqli_error($link);
}


mysqli_close($link);
?>

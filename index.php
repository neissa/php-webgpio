<?php 
require_once 'vendor/autoload.php';
use webgpio\pin;
?>
<!DOCTYPE html>
<html>
<head>
    <script src="vendor/components/jquery/jquery.js"></script>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Php-WebGPIO</h1>

<table>
<?php
$pins[] = new pin(1,'3.3V', pin::VCC);
$pins[] = new pin(2,'5V', pin::VCC);
$pins[] = new pin(3,'SDA 1');
$pins[] = new pin(4,'5V', pin::VCC);
$pins[] = new pin(5,'SCL 1');
$pins[] = new pin(6,'GND', pin::GND);
$pins[] = new pin(7,'GPIO 4', pin::IO);
$pins[] = new pin(8,'TXD 0', pin::TX);
$pins[] = new pin(9,'GND', pin::GND);
$pins[] = new pin(10,'RXD 0', pin::RX);
$pins[] = new pin(11,'GPIO 17', pin::IO);
$pins[] = new pin(12,'GPIO 18', pin::IO);
$pins[] = new pin(13,'GPIO 27', pin::IO);
$pins[] = new pin(14,'GND', pin::GND);
$pins[] = new pin(15,'GPIO 22', pin::IO);
$pins[] = new pin(16,'GPIO 23', pin::IO);
$pins[] = new pin(17,'3.3V', pin::VCC);
$pins[] = new pin(18,'GPIO 24', pin::IO);
$pins[] = new pin(19,'SPMS 1');
$pins[] = new pin(20,'GND', pin::GND);
$pins[] = new pin(21,'SPMS 0');
$pins[] = new pin(22,'GPIO 25');
$pins[] = new pin(23,'SPIS CLK');
$pins[] = new pin(24,'SPICE 0');
$pins[] = new pin(25,'GND', pin::GND);
$pins[] = new pin(26,'SPICE 1');
$pins[] = new pin(27,'ID_SD');
$pins[] = new pin(28,'ID_SC');
$pins[] = new pin(29,'GPIO 5', pin::IO);
$pins[] = new pin(30,'GND', pin::GND);
$pins[] = new pin(31,'GPIO 6', pin::IO);
$pins[] = new pin(32,'GPIO 12', pin::IO);
$pins[] = new pin(33,'GPIO 13', pin::IO);
$pins[] = new pin(34,'GND', pin::GND);
$pins[] = new pin(35,'GPIO 19', pin::IO);
$pins[] = new pin(36,'GPIO 16', pin::IO);
$pins[] = new pin(37,'GPIO 26', pin::IO);
$pins[] = new pin(38,'GPIO 20', pin::IO);
$pins[] = new pin(39,'GND', pin::GND);
$pins[] = new pin(40,'GPIO 21', pin::IO);


foreach( $pins as $i=>$pin )
{
    if( $i%2==0 )
        echo '<tr>';
    echo '<td>'.$pin->render().'</td>';
    if( $i%2!=0 )
        echo '</tr>';
}
?>
</table>

</body>
</html>

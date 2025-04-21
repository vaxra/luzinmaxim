<?php
// Часть а) 
$lastName = "лузин";
$firstName = "максим";
$middleName = "дмитриевич";


$formattedLastName = mb_convert_case($lastName, MB_CASE_TITLE, "UTF-8");
$formattedInitials = mb_strtoupper(mb_substr($firstName, 0, 1, "UTF-8"), "UTF-8") . "." 
                   . mb_strtoupper(mb_substr($middleName, 0, 1, "UTF-8"), "UTF-8") . ".";


echo "Форматированное ФИО: " . $formattedLastName . " " . $formattedInitials . "<br><br>";

// Часть б) 
echo "Субботы в 2021 году (первые 20 дней месяца):<br><br>";

for ($month = 1; $month <= 12; $month++) {
   
    for ($day = 1; $day <= 20; $day++) {
        
        $date = new DateTime("2021-$month-$day");
        
        if ($date->format('N') == 6) {
            
            echo $date->format('d.m.Y') . "<br><br>";  
        }
    }
}
?>
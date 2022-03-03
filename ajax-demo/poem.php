<h3>A Poem for You</h3>

<?php

$num = $_POST['num'];
//echo $num."<br>";

for ($i=0; $i<$num; $i++) {
    $colors = array("red", "blue", "green", "purple");
    $color1 = $colors[rand(0, sizeof($colors) - 1)];
    $color2 = $colors[rand(0, sizeof($colors) - 1)];
    echo "<p>Roses are $color1,<br>Violets are $color2</p>";
}
//var_dump($_POST);


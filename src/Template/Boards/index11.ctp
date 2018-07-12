<p>data: <?php print_r($data) ?></p>

<?php

foreach ($data as $key => $value) {
    echo  'id = ' . $key . ', ' . 'title = ' . $value ;
    echo "<br>";
}

echo "-------------<br>";

foreach ($data as $value) {
    echo  'title = ' . $value ;
    echo "<br>";
}
?>
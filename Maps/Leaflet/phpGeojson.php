<?php
$conn = new PDO('mysql:host=localhost;dbname=dc','mena','123');
$sql = 'SELECT * from lugares';
$rs = $conn->query($sql);
if (!$rs) {
    echo 'An SQL error occured.\n';
    exit;
}
$geojson = array(
   'type'      => 'FeatureCollection',
   'features'  => array()
);
while($row = mysql_fetch_assoc($dbquery)) {
    $feature = array(
        'type' => 'Feature',
        'geometry' => array(
            'type' => 'Point',
            'coordinates' => array($row['longitud'], $row['latitud'])
        ),
        'properties' => array(
            'name' => $row['nombre'],
            )
        );
    array_push($geojson['features'], $feature);
}
header('Content-type: application/json');
echo json_encode($geojson, JSON_NUMERIC_CHECK);
$conn = NULL;
?>

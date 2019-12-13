<?php
# Connect to MySQL database
$conn = new PDO('mysql:host=localhost;dbname=dc','mena','123');
# However the User's Query will be passed to the DB:
$sql = 'SELECT * from lugares';
# Try query or error
$rs = $conn->query($sql);
if (!$rs) {
    echo 'An SQL error occured.\n';
    exit;
}
# Build GeoJSON feature collection array
$geojson = array(
   'type'      => 'FeatureCollection',
   'features'  => array()
);
# Loop through rows to build feature arrays
while($row = mysql_fetch_assoc($dbquery)) {
    $feature = array(
        'type' => 'Feature',
        'geometry' => array(
            'type' => 'Point',
            # Pass Longitude and Latitude Columns here
            'coordinates' => array($row['longitud'], $row['latitud'])
        ),
        # Pass other attribute columns here
        'properties' => array(
            'name' => $row['nombre'],
            )
        );
    # Add feature arrays to feature collection array
    array_push($geojson['features'], $feature);
}
header('Content-type: application/json');
echo json_encode($geojson, JSON_NUMERIC_CHECK);
$conn = NULL;
?>

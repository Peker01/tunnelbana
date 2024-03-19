<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yuh</title>
</head>
<body>

<div id="form">
  <form action="" method="post">
    <label for="station.from">From:</label>
    <select name="from_station" id="from_station">
        <option value=""></option>
        <?php 
        $linje19 = ['Hagsätra', 'Rågsved', 'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull', 'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen', 'Hötorget', 'Rådmansgatan',
        'Odenplan', 'S:T Eriksplan', 'Fridhemsplan', 'Thorildsplan', 'Kristineberg', 'Alvik', 'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov', 'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby', 'Johannelund', 'Hässelby Gård', 'Hässelby Strand'];
        foreach($linje19 as $station){
            echo "<option value='" . strtolower($station) . "'>$station</option>";
        }
        ?>
    </select>

    <label for="station.to">To:</label>
    <select name="to_station" id="to_station">
        <option value=""></option>
        <?php
        foreach ($linje19 as $station) {
            echo "<option value='" . strtolower($station) . "'>$station</option>";
        }
        ?>
    </select>
    <input type="submit" value="Submit">
  </form>
</div>

<?php
if (isset($_POST['from_station']) && isset($_POST['to_station'])) {
    $fromStation = strtolower($_POST['from_station']);
    $toStation = strtolower($_POST['to_station']);

    $stationIndexFrom = array_search($fromStation, array_map('strtolower', $linje19));
    $stationIndexTo = array_search($toStation, array_map('strtolower', $linje19));
    $numberOfStations = abs($stationIndexTo - $stationIndexFrom);
    $travelTime = $numberOfStations * 3;

    $currentTime = time();
    $arrivalTime = date('H:i', $currentTime + ($travelTime * 60));

    echo "<h2>yuhh</h2>";
    echo "Antal stationer mellan $fromStation och $toStation: $numberOfStations<br>";
    echo "Beräknad restid: $travelTime minuter<br>";
    echo "Förväntad ankomsttid till $toStation: $arrivalTime";
}
?>
</body>
</html>

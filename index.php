
<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div class="container py-5">
    <form method="get">
            <label for="filterParking"><h3>Filtra per Parcheggio:</h3></label>
            <select name="filterParking" id="filterParking">
                <option value="all">Tutti gli Hotel</option>
                <option value="true">Con Parcheggio</option>
                <option value="false">Senza Parcheggio</option>
            </select>
            <button type="submit" class="btn btn-primary">Applica Filtro</button>
        </form>


   <ul class="list-group mt-3">
            <?php
            // Verifica se il parametro "filterParking" è impostato nella richiesta GET
            if (isset($_GET['filterParking'])) {
                $filterValue = $_GET['filterParking'];

                foreach ($hotels as $hotel) {
                    if ($filterValue === "all" || ($filterValue === "true" && $hotel['parking']) || ($filterValue === "false" && !$hotel['parking'])) {
                        echo '<li class="list-group-item">';
                        echo 'Nome dell\'Hotel: ' . $hotel['name'] . '<br>';
                        echo 'Descrizione: ' . $hotel['description'] . '<br>';
                        echo 'Voto: ' . $hotel['vote'] . '<br>';
                        echo 'Distanza dal centro: ' . $hotel['distance_to_center'] . ' km<br>';
                        echo 'Parcheggio: ' . ($hotel['parking'] ? 'Disponibile' : 'Non Disponibile') . '<br>';
                        echo '</li>';
                    }
                }
            } else {
                // Se il parametro "filterParking" non è impostato, stampa tutti gli hotel
                foreach ($hotels as $hotel) {
                    echo '<li class="list-group-item">';
                    echo 'Nome dell\'Hotel: ' . $hotel['name'] . '<br>';
                    echo 'Descrizione: ' . $hotel['description'] . '<br>';
                    echo 'Voto: ' . $hotel['vote'] . '<br>';
                    echo 'Distanza dal centro: ' . $hotel['distance_to_center'] . ' km<br>';
                    echo 'Parcheggio: ' . ($hotel['parking'] ? 'Disponibile' : 'Non Disponibile') . '<br>';
                    echo '</li>';
                }
            }
            ?>
        </ul>
    </div>


    <style>
        #filterParking{
            padding: 7px;
        }
        button{
            margin-top: -5px;
        }
        h3{
            font-weight: 600;
            margin-right: 40px;
        }
    </style>
</body>
</html>
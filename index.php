<?php
//recupero info album

$albums = file_get_contents('./albums.json');
$albums = json_decode($albums, true);

var_dump($albums);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Php - dischi</title>
</head>

<body>
    <div class="container">
        <div class="row">

            <h1 class="text-center">Music</h1>

            <div class="wrapper">

                <ul class="track-list d-flex">
                    <li>
                        <div class="card">
                            <div class=" card-header">
                                <img class="card-img-top" src="" alt="cover album">
                            </div>
                            <div class=" card-body">
                                artista e descrizione
                            </div>
                        </div>
                    </li>
                </ul>

            </div>

        </div>
    </div>

</body>

</html>
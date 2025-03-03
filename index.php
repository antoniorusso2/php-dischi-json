<?php
//recupero info album

$albums = file_get_contents('./albums.json');
$albums = json_decode($albums, true);

$errors = [];
if (isset($_POST['artist']) && isset($_POST['title']) && isset($_POST['year']) && isset($_POST['cover'])) {


    $new_album = [
        'artist' => $_POST['artist'],
        'title' => $_POST['title'],
        'year' => $_POST['year'],
        'cover' => $_POST['cover']
    ];

    if (!$new_album['artist']) {
        $errors[] = 'Inserisci un artista';
    }

    if (!$new_album['title']) {
        $errors[] = 'Inserisci un titolo';
    }

    if (!$new_album['year']) {
        $errors[] = 'Inserisci un anno';
    }

    if (!$new_album['cover']) {
        $errors[] = 'Inserisci una copertina';
    }

    //se non ci sono errori allora aggiungo l'album
    if (count($errors) == 0) {
        $albums[] = $new_album;
        file_put_contents('./albums.json', json_encode($albums));

        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Php - dischi</title>
</head>

<body>
    <div class="container">
        <div class="row">

            <h1 class="text-center">Music</h1>

            <div class="wrapper">
                <form class="form w-50 mx-auto my-3" method="post">
                    <!-- errore -->
                    <?php
                    if (count($errors) > 0) {
                        echo '<div class="alert alert-danger" role="alert">';
                        foreach ($errors as $e) {
                            echo '<p>' . $e . '</p>';
                        }
                        echo '</div>';
                    }
                    ?>
                    <h2 class="text-center">Aggiungi un nuovo album</h2>
                    <div class="form-group">
                        <label for="title">Titolo album</label>
                        <input type="text" placeholder="Inserisci il titolo" name="title" id="title" class="form-control" value=<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>>

                        <label for="artist">Artista</label>
                        <input type="text" placeholder="Inserisci l'artista" name="artist" id="artist" class="form-control" value=<?php echo isset($_POST['artist']) ? $_POST['artist'] : '' ?>>

                        <label for="year">Anno</label>
                        <input type="text" placeholder="Inserisci l'anno" name="year" id="year" class="form-control" value=<?php echo isset($_POST['year']) ? $_POST['year'] : '' ?>>

                        <label for="cover">Copertina</label>
                        <input type="text" placeholder="Inserisci un url per la copertina" name="cover" id="cover" class="form-control" value=<?php echo isset($_POST['cover']) ? $_POST['cover'] : '' ?>>

                        <button type="submit" class="btn btn-primary">Aggiungi</button>
                    </div>
                </form>
                <ul class="card-group track-list row-gap-3 justify-content-xs-center justify-content-sd-start ">
                    <?php
                    foreach ($albums as $album) {
                        echo '<li class="track-item col-sm-6 col-md-4 ">
                                <div class="card mx-sm-auto"">
                                    <img class="card-img-top" src="' . $album['cover'] . '" alt="' . $album['title'] . '">
                                    <div class="card-body">
                                        <h3>' . $album['title'] . '</h3>
                                        <p>' . $album['artist'] . '</p>
                                        <p>' . $album['year'] . '</p>
                                    </div>
                                </div>
                            </li>';
                    }
                    ?>
                </ul>

            </div>

        </div>
    </div>

</body>

</html>
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

$park = isset($_GET['park']) && $_GET['park'] != "" ? $_GET['park'] : null;
$vote = isset($_GET['vote']) && $_GET['vote'] != "" ? (int)$_GET['vote'] : null;

$filtered_hotels = array_filter($hotels, )
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container rounded-2 p-4 mt-5 bg-body-secondary">
        <form method="GET">
            <div class="mb-3">
                <label for="park" class="form-label">Parking:</label>
                <select class="form-control" id="park" name="park">
                    <option value="">Any</option>
                    <option value="1" <?php if ($park === '1') echo 'selected'; ?>>Yes</option>
                    <option value="0" <?php if ($park === '0') echo 'selected'; ?>>No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="vote" class="form-label">Minimum Vote:</label>
                <select class="form-control" id="vote" name="vote">
                    <option value="">Any</option>
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <option value="<?php echo $i; ?>" <?php if ($vote === (string)$i) echo 'selected'; ?>><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <!--    RESULT TABLE    -->
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Parking</th>
                <th>Vote</th>
                <th>Distance to Center</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($hotels as $hotel) {
                $parking = $hotel['parking'] ? 'Yes' : 'No';

                // Apply filters
                if (($park === null || $hotel['parking'] == $park) && ($vote === null || $hotel['vote'] >= $vote)) { ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $parking; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>

    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Document</title>
</head>

<body>

    <a href="tours.php"><button class="btn btn-primary" id="alltours">VIEW ALL TRUCK TOURS</button></a>

    <h1 class="text-success">Truck Management System - Available Trucks</h1>

    <div class="pretrazivanje">
        <input type="text" class="form-control" id="tablice-p">
        <button type="button" class="btn btn-primary mx-2" id="start">START</button>
    </div>


    <table class="table table-bordered table-hover table-striped" id="availabletruckstable">

        <thead class="table-success">
            <tr>
                <th>Tablice</th>
                <th>Vozac</th>
                <th>Model</th>
                <th>KM</th>
            </tr>
        </thead>

        <tbody>
            <?php
            require 'connection.php';
            $SQL = "SELECT kamion.*, vozac.ime_prezime FROM kamion JOIN vozac ON kamion.vozac_id = vozac.id WHERE dostupnost='da'";
            $result = $connection->query($SQL);
            while ($truck = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td>
                        <?php echo $truck['tablice'] ?>
                    </td>
                    <td>
                        <?php echo $truck['ime_prezime'] ?>
                    </td>
                    <td>
                        <?php echo $truck['model'] ?>
                    </td>
                    <td>
                        <?php echo $truck['km'] ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</body>

</html>


<script>
    $(document).on('click', '#start', function() {

        let tablice = $('#tablice-p').val();

        $.ajax({
            url: 'ajax/brtablica.php',
            type: 'post',
            data: {
                tablice: tablice
            },

        }).done(function(data) {
            $('tbody').html(data);
        })

    });
</script>
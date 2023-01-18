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

    <a href="index.php"><button class="btn btn-primary" id="alltours">VIEW ALL AVAILABLE TRUCKS</button></a>

    <h1 class="text-success">Truck Management System - All Tours</h1>

    <?php
    require 'connection.php';
    require 'modal.php'
    ?>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addtourmodal" id="addtour">
        ADD NEW TOUR
    </button>

    <button type="button" class="btn btn-primary" id="sorttour">
        SORT
    </button>


    <table class="table table-bordered table-hover table-striped" id="availabletruckstable">

        <thead class="table-success">
            <tr>
                <th>Tablice</th>
                <th>Datum</th>
                <th class="cena" id="DESC">Cena</th>
                <th>Polazak</th>
                <th>Dolazak</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $SQL = "SELECT prevoz.*, kamion.tablice FROM prevoz JOIN kamion ON prevoz.kamion_id = kamion.id";
            $result = $connection->query($SQL);
            while ($truck = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td>
                        <?php echo $truck['tablice'] ?>
                    </td>
                    <td>
                        <?php echo $truck['datum'] ?>
                    </td>
                    <td>
                        <?php echo $truck['cena'] ?>
                    </td>
                    <td>
                        <?php echo $truck['polazak'] ?>
                    </td>
                    <td>
                        <?php echo $truck['dolazak'] ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</body>

</html>


<script>
    $(document).on('click', '#save', function() {

        let kamion = $('#kamion').val();
        let datum = $('#datum').val();
        let cena = $('#cena').val();
        let polazak = $('#polazak').val();
        let dolazak = $('#dolazak').val();


        $.ajax({
            url: 'ajax/save.php',
            type: 'post',
            data: {
                kamion: kamion,
                datum: datum,
                cena: cena,
                polazak: polazak,
                dolazak: dolazak
            },

        }).done(function() {
            window.location.href = "tours.php"
        })

    });



    $(document).on('click', '#sorttour', function() {

        let asc_desc = $('.cena').attr('id');

        $.ajax({
            url: 'ajax/sort.php',
            type: 'post',
            data: {
                asc_desc: asc_desc
            },

        }).done(function(data) {
            $('tbody').html(data);
        })


        if (asc_desc == 'ASC')
            $('.cena').attr('id', 'DESC')
        else
            $('.cena').attr('id', 'ASC')

    });
</script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAB 9/3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .container_mod{
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.25);
            background: url('bg.jpg') center/cover no-repeat;
        }
    </style>
</head>
<body>
    <?php
        $url = "https://wt.jacktnp.com/lab9/3/10countries";
        //$url = "http://10.0.15.12/lab9/restapis/10countries";
        $response = file_get_contents($url);
        $result = json_decode($response);
        $i = 0;
        echo "<div class='container w-50'>";
        foreach($result as $country){
            echo "<div class='row py-5' style='border-bottom: 1px solid #000;'>";

            echo "<div class='col-md-8'>";
            echo "Name : <b>" . $country->name . "</b><br>";
            echo "Capital : " . $country->capital . "<br>";
            echo "Population : " . $country->population . "<br>";
            echo "Region : " . $country->region . "<br>";
            echo "Location : ";
            foreach($country->latlng as $latlng){
                echo $latlng . " ";//latlng
            }
            echo "<br>";
            echo "Borders : ";
            foreach($country->borders as $borders){
                echo $borders . " ";//borders
            }
            echo "<br>";
            echo "</div>";

            echo "<div class='col-md-4'>";
            echo "<img class='w-75' src='" . $country->flag . "'>";
            echo "</div>";

            echo '</div>';
        }
    ?>
    
</body>
</html>
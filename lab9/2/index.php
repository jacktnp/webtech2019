<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAB 9/2</title>
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
        $url = "https://wt.jacktnp.com/lab9/2/movies90";
        //$url = "http://10.0.15.12/lab9/restapis/movies90";
        $response = file_get_contents($url);
        $result = json_decode($response);
        $i = 0;
        echo "<div class='container w-50'>";
        foreach($result as $movies){
            $j = 0;
            $i++;
            $genres_count = count($movies->genres);
            echo '<div class="container_mod my-3 p-4">';
            echo "<b>" . $i . ". " . $movies->title . "</b> (" . $movies->year . ")<br>";
            echo "<b>Cast : </b>";
            foreach($movies->cast as $cast){
                echo "- " . $cast . "<br>";
            }
            echo "<b>Genres : </b>";
            foreach($movies->genres as $genres){
                $j++;
                echo $genres;
                if($j != $genres_count) {
                    echo " ,";
                }
                
            }
            echo "</div>";
        }
        echo "</div>";
    ?>
    
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['start'])){
            $start = $_POST['start'];
            $stop = $_POST['stop'];
        }
    ?>

    <form action="test.php" method="POST" accept-charset="UTF-8">
        <input type="text" name="start" id="start" value="%E0%B8%AA%E0%B8%B8%E0%B8%A7%E0%B8%A3%E0%B8%A3%E0%B8%93%E0%B8%A0%E0%B8%B9%E0%B8%A1%E0%B8%B4">
        <input type="text" name="stop" id="stop" value="%E0%B8%A1%E0%B8%B1%E0%B8%81%E0%B8%81%E0%B8%B0%E0%B8%AA%E0%B8%B1%E0%B8%99">
        <input type="submit" value="ค้นหา">
    </form>

    <?php
        if(isset($_POST['start'])){
            $url = "http://34.87.20.177:8080/$start/to/$stop/";
            $data = file_get_contents($url);
            $result = json_decode($data);

            foreach($result->routes as $route){
                echo $route->fare . "<br>";
                echo $route->route . "<br>";
                echo $route->time . "วินาที";
                echo "<hr>";
            }
        }
    ?>
</body>
</html>
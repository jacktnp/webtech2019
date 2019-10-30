<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAB 9/4</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Mitr:300&display=swap');
    *{
        font-family: 'Mitr', sans-serif !important;
    }
    </style>
</head>
<body>

    <div class="container mt-5 mb-3">
        <form method="POST">
            <div class="row">
                <div class="col-md-3">
                    <h4>เลือกปีที่ต้องการค้นหา</h4>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control" name="year">
                            <option value="2010" <?php if($search_year == "2010"){echo "selected";}; ?>>2010</option>
                            <option value="2011" <?php if($search_year == "2011"){echo "selected";}; ?>>2011</option>
                            <option value="2012" <?php if($search_year == "2012"){echo "selected";}; ?>>2012</option>
                            <option value="2013" <?php if($search_year == "2013"){echo "selected";}; ?>>2013</option>
                            <option value="2014" <?php if($search_year == "2014"){echo "selected";}; ?>>2014</option>
                            <option value="2015" <?php if($search_year == "2015"){echo "selected";}; ?>>2015</option>
                            <option value="2016" <?php if($search_year == "2016"){echo "selected";}; ?>>2016</option>
                            <option value="2017" <?php if($search_year == "2017"){echo "selected";}; ?>>2017</option>
                            <option value="2018" <?php if($search_year == "2018"){echo "selected";}; ?>>2018</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="submit" class="btn btn-outline-dark w-100" value="ค้นหา">
                </div>
            </div>
        </form>
    </div>

    <?php
        $search_year = $_POST['year'];

        $url = "https://wt.jacktnp.com/lab9/4/nobleprize100";
        //$url = "http://10.0.15.12/lab9/restapis/nobleprize100";
        $response = file_get_contents($url);
        $result = json_decode($response);
        
        echo "<div class='container'>";
        echo "<h5 class='text-center'>ค้นหารางวัลโนเบล ปี " . $search_year . " ได้ผลลัพธ์ดังนี้</h5>";

        foreach($result as $noble){
            if($noble->year == $search_year){
                echo "<div class='my-5'>";
                echo "Year : " . $noble->year . "<br>";
                echo "Category : " . $noble->category . "<br>";
                echo "Laureates : <br>";
                foreach($noble->laureates as $laureates){
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;" . $laureates->id . " : " . $laureates->firstname . " " . $laureates->surname . ", Motivation : " . $laureates->motivation . "<br>";
                }
                echo "</div>";
            }
        }
        echo "</div>";
    ?>
    
</body>
</html>
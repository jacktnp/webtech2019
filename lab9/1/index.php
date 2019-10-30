<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAB 9/1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
        $currency1 = $_POST['currency1'];
        $currency2 = $_POST['currency2'];
        $value1 = $_POST['value1'];

        $url = "https://api.exchangeratesapi.io/latest?base=" . $currency1;    
        $response = file_get_contents($url);
        $result = json_decode($response);
    
        $convert = floatval($value1) * floatval($result->rates->$currency2);
        echo $value1 . "<br>";
        echo $result->rates->$currency2 . "<br>";
        echo $convert . "<br>";
    ?>

    <div class="container w-50 mt-5">
        <h1 class="text-center my-3">Currency Convert !</h1>
        <form method="POST">
            <div class="row">
                <div class="col-md-2">
                    <p>From :</p>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control" name="currency1">
                            <option value="THB" <?php if($currency1 == "THB"){echo "selected";}; ?>>THB</option>
                            <option value="JPY" <?php if($currency1 == "JPY"){echo "selected";}; ?>>JPY</option>
                            <option value="CNY" <?php if($currency1 == "CNY"){echo "selected";}; ?>>CNY</option>
                            <option value="SGD" <?php if($currency1 == "SGD"){echo "selected";}; ?>>SGD</option>
                            <option value="USD" <?php if($currency1 == "USD"){echo "selected";}; ?>>USD</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="value1" value="<?php echo @$value1; ?>" >
                </div>

                <div class="col-md-2">
                    <p>To :</p>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control" name="currency2">
                            <option value="THB" <?php if($currency2 == "THB"){echo "selected";}; ?>>THB</option>
                            <option value="JPY" <?php if($currency2 == "JPY"){echo "selected";}; ?>>JPY</option>
                            <option value="CNY" <?php if($currency2 == "CNY"){echo "selected";}; ?>>CNY</option>
                            <option value="SGD" <?php if($currency2 == "SGD"){echo "selected";}; ?>>SGD</option>
                            <option value="USD" <?php if($currency2 == "USD"){echo "selected";}; ?>>USD</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="value2" value="<?php echo @$convert; ?>">
                </div>
            </div>
            <input type="submit" class="btn btn-outline-dark w-100" value="Convert">
        </form>
    </div>
    
</body>
</html>
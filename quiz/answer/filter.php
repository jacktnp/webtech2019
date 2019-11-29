<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9cdefafb29.js" crossorigin="anonymous"></script>
    <style>
    *{
        font-family: 'Kanit', sans-serif;
    }
    </style>
</head>
<body>
    <?php
        if(isset($_POST['search']))
        {
            $year = $_POST['year'];
            $review = $_POST['review'];
            
            if($review == 1){
                $review_min = 0;
                $review_max = 1000;
            }
            else if($review == 1001){
                $review_min = 1001;
                $review_max = 10000;
            }
            else if($review == 10001){
                $review_min = 10001;
                $review_max = 100000;
            }
            else if($review == 100001){
                $review_min = 100001;
                $review_max = 1000000;
            }
            else{
                $review_min = 1000001;
                $review_max = 10000000;
            }
            $url = "https://www.jacktnp.com/api/steam";
            $response = file_get_contents($url);
            $result = json_decode($response);
        }
    ?>
    <div class="container my-5">
        <h1 class="text-center">Steam Search <i class="fas fa-search"></i></h1>
        <p class="text-center"><small>ค้นหาเกมตามปีที่วางจำหน่ายและยอดรีวิว</small></p>
        <form action="" method="POST">
        <div class="row my-4">
            <div class="col-md-2 mb-1">
                <h3 class="text-center">ค้นหาโดย</h3>
            </div>
            <div class="col-md-4 mb-1">
                <select class="form-control w-100" name="year">
                    <option value="0" <?php if(isset($year) && $year == 0){echo "selected";}; ?>>--- ไม่เลือกปี ---</option>
                    <option value="2012" <?php if(isset($year) && $year == 2012){echo "selected";}; ?>>2012</option>
                    <option value="2013" <?php if(isset($year) && $year == 2013){echo "selected";}; ?>>2013</option>
                    <option value="2014" <?php if(isset($year) && $year == 2014){echo "selected";}; ?>>2014</option>
                    <option value="2015" <?php if(isset($year) && $year == 2015){echo "selected";}; ?>>2015</option>
                    <option value="2016" <?php if(isset($year) && $year == 2016){echo "selected";}; ?>>2016</option>
                    <option value="2017" <?php if(isset($year) && $year == 2017){echo "selected";}; ?>>2017</option>
                    <option value="2018" <?php if(isset($year) && $year == 2018){echo "selected";}; ?>>2018</option>
                    <option value="2019" <?php if(isset($year) && $year == 2019){echo "selected";}; ?>>2019</option>
                </select>
            </div>
            <div class="col-md-4 mb-1">
                <select class="form-control w-100" name="review">
                    <option value="0" <?php if(isset($review) && $review == 0){echo "selected";}; ?>>--- ไม่เลือกยอดรีวิว ---</option>
                    <option value="1" <?php if(isset($review) && $review == 1){echo "selected";}; ?>>0 - 1,000</option>
                    <option value="1001" <?php if(isset($review) && $review == 1001){echo "selected";}; ?>>1,001 - 10,000</option>
                    <option value="10001" <?php if(isset($review) && $review == 10001){echo "selected";}; ?>>10,001 - 100,000</option>
                    <option value="100001" <?php if(isset($review) && $review == 100001){echo "selected";}; ?>>100,001 - 1,000,000</option>
                    <option value="1000001" <?php if(isset($review) && $review == 1000001){echo "selected";}; ?>>มากกว่า 1 ล้าน</option>
                </select>
            </div>
            <div class="col-md-2 mb-1">
                <button type="input" class="btn btn-outline-dark w-100" name="search">ค้นหา <i class="fas fa-search"></i></button>
            </div>
        </div>
        </form>
    </div>
    <div class="container my-5">
    <?php
        if(isset($_POST['search'])){
            foreach($result as $game){
                if($year != 0 && $review != 0 && $game->all_reviews >= $review_min && $game->all_reviews <= $review_max && $game->year == $year){
                    echo '<div class="card my-2"><div class="card-body">';
                    echo '<h5>' . $game->title . '</h5>';
                    echo    '<p class="card-text">Release: '.$game->year.' ('. $game->all_reviews .' reviews)';
                    foreach($game->links as $link){
                        echo " • ";
                        if(isset($link->website)){
                            echo '<a href="'.$link->website.'">website</a>';
                        }
                        if(isset($link->steam)){
                            echo '<a href="'.$link->steam.'">steam</a>';
                        }                    
                    }
                    echo '</p><ul>';
                    foreach($game->genres as $genre){
                        echo '<li>' . $genre . '</li>';
                    }
                    echo '</ul>';
                    echo '</div></div>';
                }
                else if($review != 0 && $year == 0 && $game->all_reviews >= $review_min && $game->all_reviews <= $review_max){
                    echo '<div class="card my-2"><div class="card-body">';
                    echo '<h5>' . $game->title . '</h5>';
                    echo    '<p class="card-text">Release: '.$game->year.' ('. $game->all_reviews .' reviews)';
                    foreach($game->links as $link){
                        echo " • ";
                        if(isset($link->website)){
                            echo '<a href="'.$link->website.'">website</a>';
                        }
                        if(isset($link->steam)){
                            echo '<a href="'.$link->steam.'">steam</a>';
                        }                    
                    }
                    echo '</p><ul>';
                    foreach($game->genres as $genre){
                        echo '<li>' . $genre . '</li>';
                    }
                    echo '</ul>';
                    echo '</div></div>';
                }
                else if($review == 0 && $year != 0 && $game->year == $year){
                    echo '<div class="card my-2"><div class="card-body">';
                    echo '<h5>' . $game->title . '</h5>';
                    echo    '<p class="card-text">Release: '.$game->year.' ('. $game->all_reviews .' reviews)';
                    foreach($game->links as $link){
                        echo " • ";
                        if(isset($link->website)){
                            echo '<a href="'.$link->website.'">website</a>';
                        }
                        if(isset($link->steam)){
                            echo '<a href="'.$link->steam.'">steam</a>';
                        }                    
                    }
                    echo '</p><ul>';
                    foreach($game->genres as $genre){
                        echo '<li>' . $genre . '</li>';
                    }
                    echo '</ul>';
                    echo '</div></div>';
                }
                else if($review == 0 && $year == 0){
                    echo '<div class="card my-2"><div class="card-body">';
                    echo '<h5>' . $game->title . '</h5>';
                    echo    '<p class="card-text">Release: '.$game->year.' ('. $game->all_reviews .' reviews)';
                    foreach($game->links as $link){
                        echo " • ";
                        if(isset($link->website)){
                            echo '<a href="'.$link->website.'">website</a>';
                        }
                        if(isset($link->steam)){
                            echo '<a href="'.$link->steam.'">steam</a>';
                        }                    
                    }
                    echo '</p><ul>';
                    foreach($game->genres as $genre){
                        echo '<li>' . $genre . '</li>';
                    }
                    echo '</ul>';
                    echo '</div></div>';
                }
            }
        }
    ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
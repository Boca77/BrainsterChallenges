<?php

$name;
$rating;
$rated;


$date = date('H');
$voters = [
    'Mila' => ['rated' => 'false', 'rating' => 5],
    'Hritina' => ['rated' => 'true', 'rating' => 6],
    'Viktor' => ['rated' => 'false', 'rating' => 11],
    'Vasil' => ['rated' => 'true', 'rating' => 0],
    'Marija' => ['rated' => 'true', 'rating' => 12],
    'Pavel' => ['rated' => 'false', 'rating' => 4],
    'Jovan' => ['rated' => 'true', 'rating' => 5],
    'Petar' => ['rated' => 'false', 'rating' => 6],
    'Martin' => ['rated' => 'false', 'rating' => 7],
    'Leonid' => ['rated' => 'true', 'rating' => 2],
];

foreach ($voters as $voter => $data) {
    echo $voter . ' => ';

    $i = 1;
    foreach ($data as $key => $value) {
        if ($i % 2 != 0) {
            echo $value . " , ";
        } else {
            echo $value . '<br>';
        }
        $i++;
    }

    if ($voter == 'Kathrin') {
        echo 'Hello Kathrin <br>';
    } else {
        echo 'Nice name <br>';
    }

    if ($date < 12) {
        echo "Good morning $voter, <br>";
    } elseif ($date > 12 && $date < 19) {
        echo "Good afternoon $voter, <br>";
    } else {
        echo "Good evening $voter, <br>";
    }

    if (is_int($data['rating'])) {
        if ($data['rating'] >= 1 && $data['rating'] <= 10) {
            if ($data['rated'] == 'false') {
                echo 'Thank you for rating <br>';
                $data['rated'] = 'true';
            } elseif ($data['rated'] == 'true') {
                echo "You already voted with $data[rating] <br>";
            }
        } else {
            echo 'Invalid rating, only numbers between 1 and 10. <br>';
        }
    } else {
        echo "Rating isn't an integer <br>";
    }



    echo "<br>";
}

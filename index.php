<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
        }

        .block {
            padding: 10px;
            width: 20%;
            border: green solid 2px;
            border-radius: 10px;
            flex-basis: 33.33%;
            margin: 15px;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            align-content: center;
            min-height: 100vh;
            width: 60%;
        }
    </style>
</head>

<body>

    <div class="container">

        <?php

        function decimalToBinary($num, $binNum = [])
        {
            if ($num > 0) {
                $binNum[] = $num % 2;
                $num = round($num / 2, 0, PHP_ROUND_HALF_DOWN);
                return decimalToBinary($num, $binNum);
                //loop se povikuva funkcijata sama
            }

            return implode(array_reverse($binNum));
        }
        // echo decimalToBinary(6);
        // die;

        function decimalToRoman($num)
        {
            $roman = [
                'M'  => 1000,
                'CM' => 900,
                'D'  => 500,
                'CD' => 400,
                'C'  => 100,
                'XC' => 90,
                'L'  => 50,
                'XL' => 40,
                'X'  => 10,
                'IX' => 9,
                'V'  => 5,
                'IV' => 4,
                'I'  => 1
            ];
            $romanValue = '';

            if ($num <= 3999999) {

                foreach ($roman as $key => $value) {
                    if ($num >= $value) {
                        $num -= $value;
                        $romanValue .= $key;
                    }
                }
                return $romanValue;
            } else {
                return  "invalid num";
            }
        }

        function binToDecimal($num)
        {

            $binTable = [
                '1' => '',
                '2' => '',
                '4' => '',
                '8' => '',
                '16' => '',
                '32' => '',
                '64' => '',
                '128' => '',
            ];
            $arrayNum = array_reverse(str_split($num));
            $i = 0;

            foreach ($binTable as $key => $bin) {
                if (!empty($arrayNum[$i])) {
                    $binTable[$key] = $arrayNum[$i];
                } elseif (empty($arrayNum[$i])) {
                    $binTable[$key] = 0;
                }
                $i++;
            }
            $numberKeys = [];
            foreach ($binTable as $number => $bin) {
                if ($bin == 1) {
                    $numberKeys[] =  $number;
                }
            }

            $result = array_sum($numberKeys);
            if (preg_match('/^[01]+$/', implode($binTable))) {
                return $result;
            } else {
                return "not a binary number";
            }
        }

        function romanToDecimal($num)
        {
            $romanNum = [
                'M'  => 1000,
                'CM' => 900,
                'D'  => 500,
                'CD' => 400,
                'C'  => 100,
                'XC' => 90,
                'L'  => 50,
                'XL' => 40,
                'X'  => 10,
                'IX' => 9,
                'V'  => 5,
                'IV' => 4,
                'I'  => 1
            ];
            $result = 0;
            foreach ($romanNum as $key => $value) {
                while (strpos($num, $key) === 0) {
                    $result += $value;
                    $num = substr($num, strlen($key));
                }
            }
            return $result;
        }

        function numCheckConvert($num)
        {
            $numType = '';
            if (preg_match('/^[MCDXLVI]+$/', $num)) {
                echo "<div class = 'block'> $num is roman" . '<br>';
                $numType = "roman";
            } elseif ((preg_match('/^[01]+$/', $num))) {
                echo "<div class = 'block'> $num is binary" . '<br>';
                $numType = "binary";
            } else {
                if ($num[1] == 0 && ($num[0] == '+' || $num[0] == '-')) {
                    return "Error";
                } else {
                    echo "<div class = 'block'> $num is decimal" . '<br>';
                    $numType = "decimal";
                }
            }
            switch ($numType) {
                case 'roman':
                    echo romanToDecimal($num) . '<br>';
                    echo decimalToBinary(romanToDecimal($num)) . '</div> <br>';
                    break;
                case 'binary':
                    echo binToDecimal($num) . '<br>';
                    echo decimalToRoman(binToDecimal($num)) . '</div> <br>';
                    break;
                case 'decimal':
                    if ($num > 0) {
                        echo decimalToBinary($num) . '<br>';
                        echo decimalToRoman($num)  . '</div> <br>';
                    } else {
                        echo "There are no negative decimal or binary numbers </div> <br>";
                    }
                    break;
                default:
                    return "Error";
            }
        }

        $numArray = ['XL', '5000000', '-15', '155', 'XXX', '+58', '1011001', '+1010', 'VI', '0'];

        foreach ($numArray as $num) {
            echo numCheckConvert($num);
        }
        ?>

    </div>


</body>

</html>
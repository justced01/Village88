<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo</title>
    <style>
        table, th, td {
            width: 20%;
            font-family: sans-serif;
            border: 1px solid black;
            border-collapse: collapse;
        }
        table {
            height: 400px;
            text-align: center;
        }
        th {
            height: 30px;
            font-size: 50px;
            color: white;
        }
        .red {
            background-color: red;
        }
        .blue {
            background-color: blue;
        }
        .cyan {
            color: cyan;
        }
        .violet {
            color: violet;
        }
    </style>
</head>
<body>
    <table>
        <tr class="red">
            <th>B</th>
            <th>I</th>
            <th>N</th>
            <th>G</th>
            <th>O</th>
        </tr>
        <tr class="blue">
            <?php foreach(generate_val(2) as $key => $value){ ?>  
                <td class="<?= $key % 2 == 0 ? 'cyan' : 'violet' ?>"><?= $value ?></td>
            <?php } ?>
        </tr>
        <tr class="red">
            <?php foreach(generate_val(3) as $key => $value){ ?>  
                <td class="<?= $key % 2 == 1  ? 'cyan' : 'violet' ?>"><?= $value ?></td>
            <?php } ?>
        </tr>
        <tr class="blue">
            <?php foreach(generate_val(4) as $key => $value){ ?>  
                <td class="<?= $key % 2 == 0 ? 'cyan' : 'violet' ?>"><?= $value ?></td>
            <?php } ?>
        </tr>
        <tr class="red">
            <?php foreach(generate_val(5) as $key => $value){ ?>  
                <td class="<?= $key % 2 == 1 ? 'cyan' : 'violet' ?>"><?= $value ?></td>
            <?php } ?>
        </tr>
        <tr class="blue">
            <?php foreach(generate_val(6) as $key => $value){ ?>  
                <td class="<?= $key % 2 == 0 ? 'cyan' : 'violet' ?>"><?= $value ?></td>
            <?php } ?>
        </tr>
    </table>
</body>
</html>
<?php 
    function generate_val($multiplicand){
        $value = array();
        for($index = 1; $index <= 5; $index++){
            $value[] = $index * $multiplicand;
        }
        return $value;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo (Revisited)</title>
    <style>
        table, td {
            width: 20%;
            height: 50px;
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        .title {
            font-size: 45px;
        }
        .color_1 {
            color: red;
        }
        .color_2 {
            color: blue;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th colspan="5" class="title">BINGO</th>
        </tr>
        <?php for($index = 2; $index <= 6; $index++){ ?>
            <tr>
                <?php for($value = 1; $value <= 5; $value++){ ?>
                    <td class="color_<?= ($index + $value) % 2 + 1 ?>"><?= $value * $index ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
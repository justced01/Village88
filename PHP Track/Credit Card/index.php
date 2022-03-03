<?php
    $users = array( 
        array("cardholder_name" => "Michael Choi", "cvc" => 123, "acc_num" => "1234 5678 9876 5432"),
        array("cardholder_name" => "John Supsupin", "cvc" => 789, "acc_num" => "0001 1200 1500 1510"),
        array("cardholder_name" => "KB Tonel", "cvc" => 567, "acc_num" => "4568 456 123 5214"),
        array("cardholder_name" => "John Tonel", "cvc" => 489, "acc_num" => "4264 456 423 4135"),
        array("cardholder_name" => "JC Rizal", "cvc" => 452, "acc_num" => "2568 456 789 7574"),
        array("cardholder_name" => "DC Cobrero", "cvc" => 241, "acc_num" => "7489 126 168 4568"),
        array("cardholder_name" => "Cyrus Cruz", "cvc" => 111, "acc_num" => "6346 567 123 4587"),
        array("cardholder_name" => "Lala Pal", "cvc" => 552, "acc_num" => "2512 126 168 4785"),
        array("cardholder_name" => "Mark Guillen", "cvc" => 345, "acc_num" => "123 123 123 123") 
    );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card</title>
    <style>
        table, th, td{
            padding: 0 5px;
            font-family: sans-serif;
            font-weight: normal;
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Name in uppercase</th>
            <th>Account Num</th>
            <th>CVC Num</th>
            <th>Full Account</th>
            <th>Length of full account</th>
            <th>is valid</th>
        </tr>
        <?php 
            foreach($users as $info => $details){ 
            $string = str_replace(' ', '', $details["acc_num"]. " " . $details["cvc"]);
        ?>
            <tr>
                <td><?= $info ?></td>
                <td><?= $details["cardholder_name"] ?></td>  
                <td><?= strtoupper($details["cardholder_name"]) ?></td>  
                <td><?= $details["acc_num"] ?></td>  
                <td><?= $details["cvc"] ?></td>  
                <td><?= $details["acc_num"]. " " . $details["cvc"] ?></td>  
                <td><?= strlen($string) ?></td>  
                <td><?= strlen($string) == 19 ? "yes" : "no" ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

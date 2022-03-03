<?php 
    require('conn.php');
    ini_set('auto_detect_line_endings', true);
    $id = $_GET['id'];
    $query = "SELECT * FROM csv WHERE id = '$id'";
    $csv = fetch_record($query);
    $file = fopen("./upload/" . $csv['file'] . ".csv", "r");
    $color = 0;

    // Pagination
    $limit = 50;
    $row = file("./upload/" . $csv['file'] . ".csv");
    $total_rows = count($row);
    $total_pages = ceil ($total_rows / $limit);    

    if(!isset($_GET['page'])){  
        $page_number = 1;  
    } 
    else{  
        $page_number = $_GET['page'];  
    }  

    $current_page = ($page_number - 1) * $limit; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>
    <div class="view-wrapper">
        <h1 class="title"><span><?= $csv['file'] ?></span> Table</h1>
        <p><a href="./index.php" class="home-btn"><= Upload</a></p>
        <table>
<?php
    $count = 0; 
    while(($line = fgetcsv($file)) !== false){ 
    $color++;
?>
            <tr class="style_<?= $color == 1 ? $color = 2 : $color % 2; ?>">
<?php
        foreach($line as $row) {
            if($count <= $limit) { 
?>
                <td><?= $row ?></td>
<?php       }
        }
    $count++; 
?>
            </tr>
<?php } fclose($file); ?>
        </table>
<?php for($page_number = 1; $page_number <= $total_pages; $page_number++) {?>
        <p class="pagination" ><a href="view.php?id=<?= $id ?>&page=<?= $page_number ?>"><?= $page_number ?></a></p> <!--CHANGED-->
<?php } ?>
    </div>

</body>
</html>
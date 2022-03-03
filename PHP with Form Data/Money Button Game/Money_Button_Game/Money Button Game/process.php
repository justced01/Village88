<?php
    session_start();
    // no need to check if money is isset bc it is already set initially in index.php
    $money = $_SESSION['money'];
    $chance = $_SESSION['chance'];

    // no need to have message array
    // u can push your statement directly to session history

    $timestamp = "[ " . date("Y/m/d") . ' ' . date("h:iA") . " ]";
    if(isset($_POST['low_risk']) && $_POST['low_risk'] == 'Low Risk'){
        $lowrisk = $_POST['low_risk'];
        $random = rand(-25, 100);
        $money += $random;
        $chance--;
        $statement = $timestamp . " You pushed " . '"' . $lowrisk . '"' . ". Value is " . $random . ". Your current money now is " . $money . " with " . $chance . " chance(s) left.";

        if($chance >= 0 && $random > 0 && $money > 0){
            $_SESSION['color'] = 1;
            $_SESSION['history'][] = $statement;
        } 
        else if($chance >= 0 && $random < 0 && $money > 0){
            $_SESSION['color'] = 0;
            $_SESSION['history'][] = $statement;
        }
        else {
            $_SESSION['color'] = 2;
            $_SESSION['history'][] = "Game Over!";
        }
    }
    else if(isset($_POST['mod_risk']) && $_POST['mod_risk'] == 'Moderate Risk'){
        $modrisk = $_POST['mod_risk'];
        $random = rand(-100, 1000);
        $money += $random;
        $chance--;
        $statement = $timestamp . " You pushed " . '"' . $modrisk . '"' . ". Value is " . $random . ". Your current money now is " . $money . " with " . $chance . " chance(s) left." ; 

        if($chance >= 0 && $random > 0){
            $_SESSION['color'] = 1;
            $_SESSION['history'][] = $statement;
        } 
        else if($chance >= 0 && $random < 0){
            $_SESSION['color'] = 0;
            $_SESSION['history'][] = $statement;
        }
        else {
            $_SESSION['color'] = 2;
            $_SESSION['history'][] = "Game Over!";
        }
    }
    else if(isset($_POST['high_risk']) && $_POST['high_risk'] == 'High Risk'){
        $highrisk = $_POST['high_risk'];
        $random = rand(-500, 2500);
        $money += $random;
        $chance--;
        $statement = $timestamp . " You pushed " . '"' . $highrisk . '"' . ". Value is " . $random . ". Your current money now is " . $money . " with " . $chance . " chance(s) left." ; 

        if($chance >= 0 && $random > 0){
            $_SESSION['color'] = 1;
            $_SESSION['history'][] = $statement;
        } 
        else if($chance >= 0 && $random < 0){
            $_SESSION['color'] = 0;
            $_SESSION['history'][] = $statement;
        }
        else {
            $_SESSION['color'] = 2;
            $_SESSION['history'][] = "Game Over!";
        }
    }
    else if(isset($_POST['severe_risk']) && $_POST['severe_risk'] == 'Severe Risk'){
        $severerisk = $_POST['severe_risk'];
        $random = rand(-3000, 5000);
        $money += $random;
        $chance--;
        $statement = $timestamp . " You pushed " . '"' . $severerisk . '"' . ". Value is " . $random . ". Your current money now is " . $money . " with " . $chance . " chance(s) left." ; 

        if($chance >= 0 && $random > 0){
            $_SESSION['color'] = 1;
            $_SESSION['history'][] = $statement;
        } 
        else if($chance >= 0 && $random < 0){
            $_SESSION['color'] = 0;
            $_SESSION['history'][] = $statement;
        }
        else {
            $_SESSION['color'] = 2;
            $_SESSION['history'][] = "Game Over!";
        }
    }

    if(!empty($_SESSION['history'])){
        $_SESSION['money'] = $money;
        $_SESSION['chance'] = $chance;
        header("Location: ./index.php");
    }

?>
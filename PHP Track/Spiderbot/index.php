<?php 
    $url = "https://www.onlinejobs.ph/jobseekers/jobsearch";
    
    $fields = [
        'btnSubmit' => 'Submit',
        'jobkeyword' => 'software engineer'
    ];
    $fields_string = http_build_query($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $data = curl_exec($ch); 
    echo $data;
?>
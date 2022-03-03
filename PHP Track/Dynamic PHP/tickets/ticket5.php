<?php 
    $ticket_num = rand(000000, 100000);
    $ticket = imagecreate( 200, 80 );
    $background = imagecolorallocate( $ticket, 210, 180, 140);
    $text_color = imagecolorallocate( $ticket, 139, 69, 19);
    $line_color = imagecolorallocate( $ticket, 51, 51, 0);

    imagestring( $ticket, 5, 80, 15, "FREE", $text_color );
    imagestring( $ticket, 5, 65, 35, "TICKET!", $text_color );
    imagestring( $ticket, 5, 55, 55, "ADMIT ONE!", $text_color );
    imagestringup( $ticket, 5, 20, 60, $ticket_num, $text_color );
    imagestringup( $ticket, 5, 160, 60, $ticket_num, $text_color );
    imageline( $ticket, 0, 10, 200, 10, $line_color );
    imageline( $ticket, 0, 75, 200, 75, $line_color );
    imageline( $ticket, 10, 0, 10, 200, $line_color );
    imageline( $ticket, 10, 0, 10, 200, $line_color );
    imageline( $ticket, 15, 0, 15, 200, $line_color );
    imageline( $ticket, 40, 0, 40, 200, $line_color );
    imageline( $ticket, 45, 0, 45, 200, $line_color );
    imageline( $ticket, 150, 0, 150, 200, $line_color );
    imageline( $ticket, 155, 0, 155, 200, $line_color );
    imageline( $ticket, 180, 0, 180, 200, $line_color );
    imageline( $ticket, 185, 0, 185, 200, $line_color );

    header( "Content-type: image/png" );
    imagepng( $ticket );
    imagecolorallocate( $text_color );
    imagecolorallocate( $background );
    imagedestroy( $ticket );
?>
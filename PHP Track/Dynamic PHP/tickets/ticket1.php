<?php
    $ticket_num = rand(000000, 100000);
    $ticket = imagecreate( 200, 80 );
    $background = imagecolorallocate( $ticket, 240, 230, 140 );
    $text_color = imagecolorallocate( $ticket, 0, 0, 0 );
    $line_color = imagecolorallocate( $ticket, 51, 51, 0);
    $ticket_num_color = imagecolorallocate( $ticket, 0, 0, 0 );
    imagestring( $ticket, 4, 70, 25, "TICKET", $text_color );
    imagestring( $ticket, 4, 70, 50, $ticket_num, $ticket_num_color );
    imagesetthickness ( $ticket, 5 );
    imageline( $ticket, 30, 45, 165, 45, $line_color );

    header( "Content-type: image/png" );
    imagepng( $ticket );
    imagecolordeallocate( $line_color );
    imagecolordeallocate( $text_color );
    imagecolordeallocate( $background );
    imagedestroy( $ticket );

?>
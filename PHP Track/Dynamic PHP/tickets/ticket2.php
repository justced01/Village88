<?php
    $ticket_num = rand(000000, 100000);
    $ticket = imagecreate( 200, 80);
    $background = imagecolorallocate( $ticket, 233, 116, 81 );
    $box_color = imagecolorallocate($ticket, 255, 195, 0); 
    $text_color = imagecolorallocate( $ticket, 0, 0, 0 );
    $ticket_num_color = imagecolorallocate( $ticket, 0, 0, 0 );
    
    imagerectangle ( $ticket, 5, 10, 195, 70, $box_color );
    imagestring( $ticket, 10, 65, 25, "TICKET!", $text_color );
    imagestring( $ticket, 4, 70, 50, $ticket_num, $ticket_num_color );

    header( "Content-type: image/png" );
    imagepng( $ticket );
    imagecolordeallocate( $background );
    imagedestroy( $ticket );
?>

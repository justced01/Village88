<?php 
    $ticket_num = rand(000000, 100000);
    $ticket = imagecreate( 200, 80 );
    $background = imagecolorallocate( $ticket, 255, 215, 0 );
    $box_color1 = imagecolorallocate($ticket, 139, 0, 0); 
    $box_color2 = imagecolorallocate($ticket, 139, 0, 0); 
    $text_color = imagecolorallocate( $ticket, 199, 21, 133 );
    
    imagerectangle ( $ticket, 5, 10, 40, 75, $box_color1 );
    imagerectangle ( $ticket, 190, 10, 150, 75, $box_color2 );
    imagestring( $ticket, 5, 65, 25, "TICKET", $text_color );
    imagestring( $ticket, 10, 55, 55, "ADMIT ONE", $text_color );
    imagestringup( $ticket, 5, 20, 65, $ticket_num, $text_color );
    imagestringup( $ticket, 5, 160, 65, $ticket_num, $text_color );

    header( "Content-type: image/png" );
    imagepng( $ticket );
    imagecolordeallocate( $text_color );
    imagecolordeallocate( $background );
    imagedestroy( $ticket );
?>
<?php
//    Image thumbnail0r (with an "0" :])
//    mike[@]filespanker.com
//
//    PARAMETERS:
//
//    img:
//        The image file as relative to THIS script.
//    h:
//        The thumbnail's height.    Default: 30
//    w:
//        The thumbnail's width.    Default: 30
//    mode:
//        1          = stretch:      The image is resized to height and width

//        0[default] = proportioned: The image is shrunken, but keeps proportions
//    type:
//        [optional]
//        jpg         = JPEG
//        gif        = GIF
//        png        = PNG
//        If this is not set, it is determined by its file extension.
//
//    This script's functions rely completely on your gd lib version.
//
//    So, if I recall correctly:
//        gd v1.5 or lower : GIF
//        gd v1.6 or higher: PNG
//        gd v1.8 or higher: PNG and JPEG
//
//    So, all three image types should never work on the same gd lib :[
//    You can thank Unisys for that.
//
//    Before mailing me, please actually look at the code.
//Theres not much I could have really screwed up, and its probably an
//    issue with your gd library.  Try up/downgrading it.

// Configuration:


//// CODE

  if( !isset($w) ) {
    $w = 50;
}

if( !isset($h) ) {
    $h = 50;
}


SetType($mode,   'integer');
SetType($w,      'integer');
SetType($h,     'integer');
SetType($img,     'string' );

function percent($p, $w) {
    return(real)(100 * ($p / $w));
}

function unpercent($percent, $whole) {
    return(real)(($percent * $whole) / 100);
}

// Initialization

// Make sure the file exists...
if( !file_exists($img) ) {
    echo "Error: could not find file: $img.";
    exit();
}

// If the user defined a type to use.
if( !isset($type) ) {
    $ext = explode('.', $img);
    $ext = $ext[count($ext)-1];
    switch( strtolower($ext) ) {
        case 'jpeg'  :
            $type = 'jpg';
            break;
        default :
            $type = $ext;
            break;
    }
}

// Create the image...
switch( strtolower($type) ) {
    case 'jpg':
        $tmp = imagecreatefromjpeg($img);
        break;

    case 'gif':
        $tmp = @imagecreatefromgif($img);
        break;

    case 'png':
        $tmp = @imagecreatefrompng($img);
        break;

    default:
        echo 'Error: Unrecognized image format.';
        exit();
        break;
}

if( $tmp ) {
    // Resize it

    $ow  = imagesx ($tmp);    // Original image width
    $oh  = imagesy ($tmp);    // Original image height

    if( $mode ) {
        // Just smash it up to fit the dimensions
        $nw = $w;
        $nh = $h;
    } else {
        // Make it proportional.
        if( $ow > $oh ) {
            $nw  = $w;
            $nh = unpercent(percent($nw, $ow), $oh);
        } else if( $oh > $ow ) {
            $nh = $h;
            $nw = unpercent(percent($nh, $oh), $ow);
        } else {
            $nh = $h;
            $oh = $w;
        }
    }

    $out = imagecreate($nw, $nh);
    imagecopyresized($out, $tmp, 0, 0, 0, 0, $nw, $nh, $ow, $oh);
    imagedestroy($tmp);
} else {
    echo 'Could not create image resource.';
    exit;
}


if( $out ) {
    switch( strtolower($type) ) {
        case 'jpg':
            header('Content-type: image/jpeg');
            imagejpeg($out);
            break;

        case 'gif':
            header('Content-type: image/gif');
            imagegif($out);
            break;

        case 'png':
            header('Content-type: image/png');
            imagepng($out);
            break;
    }
    imagedestroy($out);
} else {
    echo 'ERROR: Could not create resized image.';
}
?>


<?php 
$ffmpeglocation = "C:\FFMPEG\bin\\ffmpeg.exe "; // ffmpeg full path
$imagelocation = "C:/xampp/htdocs/images/back.jpg"; // image location full path
$dir = "C:/xampp/htdocs/music/"; //music folder full path
$exportdir = "C:/xampp/htdocs/output/"; // output location full path
$command2 = ' -c:v libx264 -shortest -c:a copy -preset ultrafast -tune zerolatency -threads 3 -pix_fmt yuv420p -r 1 ';
$command = '-loop 1 -i '.$imagelocation.' -i ';

$folder = scandir($dir);
$files = array_diff($folder, array('.', '..'));


foreach ($files as $file) {
    
    $music = $dir.$file;
    $filewo = explode(".",$file)[0];
    $direxport = $exportdir.$filewo.".mp4";
    
    $commandfull = $ffmpeglocation.$command.$music.$command2.$direxport;

    echo "---------------------";
    echo $commandfull;
    shell_exec(addslashes($commandfull));
    echo "---------------------";
}

?>
<?php
/*
**  @file    substr.php
**  @desc    Custom Substring Function
**  @info    
**  @path    /Volumes/Macintosh HD/Users/devnull/Library/Caches/Coda 2/C768D9CA-0FF9-4C4A-AA7E-0B1BEED0B2AC/wp-content/themes/spcsa/includes/template-tags/substr.php
**  @package spcsa
**  @author  Lee Peterson
**  @date    4/14/17
*/

function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}

<?php
/*
    Plugin Name: my plugin
    Description: new plugin
    Author: Nermeen

*/

add_action( 'the_title', 'title_capitalize');
function title_capitalize( $title ) {

    // Uppercases the entire title
    $title = ucwords( $title );
    return $title;
}
add_filter('the_title','title_capitalize');

//test



add_action('the_content', 'rename_content');
function rename_content($content){
    $arr1 = [4, 10, 1, 5];
    $arr2 = ["Four", "Ten", "One", "Five"];
    return str_replace($arr1, $arr2 ,$content );
}


// // the_content($string ,$strip_teaser = true );

//   function convert_number( $number ) { 
//     global $number;
//     $hyphen = '-'; 
//     $conjunction = ' and '; 
//     $separator = ', '; 
//     $negative = 'negative '; 
//     $decimal = ' point '; 
//     $dictionary = array( 
//         0 => 'zero',  
//         1 => 'one',  
//         2 => 'two',  
//         3 => 'three',  
//         4 => 'four',  
//         5 => 'five',  
//         6 => 'six',  
//         7 => 'seven',  
//         8 => 'eight',  
//         9 => 'nine',  
//         10 => 'ten',  
//         11 => 'eleven',  
//         12 => 'twelve',  
//         13 => 'thirteen',  
//         14 => 'fourteen',  
//         15 => 'fifteen',  
//         16 => 'sixteen',  
//         17 => 'seventeen',  
//         18 => 'eighteen',  
//         19 => 'nineteen',  
//         20 => 'twenty',  
//         30 => 'thirty',  
//         40 => 'fourty',  
//         50 => 'fifty',  
//         60 => 'sixty',  
//         70 => 'seventy',  
//         80 => 'eighty',  
//         90 => 'ninety',  
//         100 => 'hundred',  
//         1000 => 'thousand',  
//         1000000 => 'million',  
//         1000000000 => 'billion',  
//         1000000000000 => 'trillion',  
//         1000000000000000 => 'quadrillion',  
//         1000000000000000000 => 'quintillion' 
//  ); 
 
//     if (!is_numeric($number)) { 
//         return false; 
//     } 
 
//     if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) { 
//         // overflow 
//         trigger_error( 
//             'convert_number only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,  
//             E_USER_WARNING 
//  ); 
//         return false; 
//     } 
 
//     if ($number < 0) { 
//         return $negative . convert_number(abs($number)); 
//     } 
 
//     $string = $fraction = null; 
 
//     if (strpos($number, '.') !== false) { 
//         list($number, $fraction) = explode('.', $number); 
//     } 
 
//     switch (true) { 
//         case $number < 21: 
//             $string = $dictionary[$number]; 
//             break; 
//         case $number < 100: 
//             $tens = ((int) ($number / 10)) * 10; 
//             $units = $number % 10; 
//             $string = $dictionary[$tens]; 
//             if ($units) { 
//                 $string .= $hyphen . $dictionary[$units]; 
//             } 
//             break; 
//         case $number < 1000: 
//             $hundreds = $number / 100; 
//             $remainder = $number % 100; 
//             $string = $dictionary[$hundreds] . ' ' . $dictionary[100]; 
//             if ($remainder) { 
//                 $string .= $conjunction . convert_number($remainder); 
//             } 
//             break; 
//         default: 
//             $baseUnit = pow(1000, floor(log($number, 1000))); 
//             $numBaseUnits = (int) ($number / $baseUnit); 
//             $remainder = $number % $baseUnit; 
//             $string = convert_number($numBaseUnits) . ' ' . $dictionary[$baseUnit]; 
//             if ($remainder) { 
//                 $string .= $remainder < 100 ? $conjunction : $separator; 
//                 $string .= convert_number($remainder); 
//             } 
//             break; 
//     } 
 
//     if (null !== $fraction && is_numeric($fraction)) { 
//         $string .= $decimal; 
//         $words = array(); 
//         foreach (str_split((string) $fraction) as $number) { 
//             $words[] = $dictionary[$number]; 
//         } 
//         global $string;
//         $string .= implode(' ', $words); 
//     } 
   
//     return $string; 

// } 

// add_action('the_content', 'rename_content');
// function rename_content($content){
//     global $string;
//     global $number;
//     return str_replace($number ,$string ,$content );
// }

?>
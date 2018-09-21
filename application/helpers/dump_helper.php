<?php 

if (!function_exists('dump')) {
    function dump ($var, $show = TRUE, $exit = FALSE) {
        // Add formatting
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        
        //exit ?
        if ($exit == TRUE) {
            exit;
        }
        
    }
}
?>
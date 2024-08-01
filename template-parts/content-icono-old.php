<?php
if (!function_exists('display_icon')) {
    function display_icon($icon_name) {
        switch ($icon_name) {
            case 'arrow-rojo':
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><path fill="currentColor" d="m14.83 11.29-4.24-4.24a1 1 0 1 0-1.42 1.41L12.71 12l-3.54 3.54a1 1 0 0 0 0 1.41.999.999 0 0 0 .71.29.998.998 0 0 0 .71-.29l4.24-4.24a1 1 0 0 0 0-1.42Z"/></svg>';
                break;
            case 'next-purple':
                echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 40 31"><rect width="38.5" height="30" x="39" y="30.5" fill="#755465" rx="15" transform="rotate(-180 39 30.5)"/><rect width="38.5" height="30" x="39" y="30.5" stroke="#E0D6CD" rx="15" transform="rotate(-180 39 30.5)"/><path stroke="#E0D6CD" stroke-linecap="round" stroke-linejoin="round" d="m16 8 7.5 7.5L16 23"/></svg>';
                break;
        }
    }
}
?>


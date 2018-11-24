<?php

if (!function_exists('rupiah')) {

    function rupiah(int $number)
    {
        return 'Rp.' . number_format($number,2,',','.');
    }
}

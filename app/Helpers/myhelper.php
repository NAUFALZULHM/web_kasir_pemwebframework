<?php

function format_rupiah($angka)
{
    $hasil_rupiah = number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
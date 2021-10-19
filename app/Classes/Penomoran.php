<?php

namespace App\Classes;

class Penomoran
{
    public function numbering(String $transksiName, $nomorUrurtanTerakhir)
    {
        if ($nomorUrurtanTerakhir == null) {
            $nomorUrurtanTerakhir = 0000;
        }
        $nomorUrurtan = (int) substr($nomorUrurtanTerakhir, 6, 4);
        $nomorUrurtan++;
        $formaturutan = sprintf('%04s', $nomorUrurtan);
        $tahun = date('y');
        $bulan = date('m');

        $finalnumbering = $transksiName.$tahun.$bulan.$formaturutan;
        return $finalnumbering;
    }
}

<?php


class Nomor
{
    public function numbering(String $transksiName, String $nomorUrurtanTerakhir)
    {
        $nomorUrurtan = (int) substr($nomorUrurtanTerakhir, 6, 4);
        $nomorUrurtan++;
        $formaturutan = sprintf('%04s', $nomorUrurtan);
        $tahun = date('y');
        $bulan = date('m');

        $finalnumbering = $transksiName.$tahun.$bulan.$formaturutan;
        return $finalnumbering;
    }
}

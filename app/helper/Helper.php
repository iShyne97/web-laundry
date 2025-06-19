<?php

class Helper
{

    public static function generateOrderCode($id_user)
    {
        $datetime = date('YmdHis');
        return "TR-{$datetime}{$id_user}";
    }

    public static function LocalDate($date)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        $get = explode('-', $date);
        return $get[2] . ' ' . $bulan[(int)$get[1]] . ' ' . $get[0];
    }

    public static function generateDate()
    {
        return date('YmdHis');
    }

    public static function generateDateTime()
    {
        return date('Ymd');
    }
}

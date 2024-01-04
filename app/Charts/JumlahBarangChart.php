<?php

namespace App\Charts;

use App\Models\Toko;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class JumlahBarangChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $namaBarang = Toko::all();

        $groupedBarang = $namaBarang->groupBy('nama')->map->count();

        $label = [];

        foreach ($groupedBarang as $nama => $count) {
            $label[] = $nama;
        }

        $jumlahBarang = Toko::all();
        $groupedBarang = Toko::groupBy('nama')->get(['nama', DB::raw('COUNT(*) as count')]);

        $result = $groupedBarang->pluck('count', 'nama');

        // $groupBarang = $jumlahBarang->pluck('count', 'nama');
        $barang = [];

        foreach ($groupedBarang as $jumlah => $count) {
            $barang[] = $jumlah;
        }

        return $this->chart->donutChart()
            ->setTitle('Stok Barang')
            ->setSubtitle(date('Y'))
            ->setWidth(380)
            ->setHeight(380)
            ->addData($barang)
            ->setLabels($label);

    }
    
}

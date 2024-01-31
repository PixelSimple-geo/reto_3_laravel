<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\FormatoProducto;
use App\Models\TicketProducto;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class EstadisticasController extends Controller
{
    public function index()
    {
        $formatos = FormatoProducto::with('producto')->get();

        $cantidadTotalPorFormato = [];
        $labels = [];

        foreach ($formatos as $formato) {
            $idFormato = $formato->id;  
            $cantidadTotalPorFormato[] = TicketProducto::where('idFormatoProducto', $idFormato)->sum('unidades');

            $productoFormato = $formato->producto->nombreProducto . ' ' . $formato->formatoEnvase;
            $labels[] = $productoFormato;
        }

        $chart = LarapexChart::barChart()
            ->setTitle('Productos Comprados')
            ->setXAxis($labels)
            ->addData('Unidades', $cantidadTotalPorFormato)
            ->setColors(['#334FFF']);

        return view('estadisticas.estadisticas', compact('chart'));
    }
}

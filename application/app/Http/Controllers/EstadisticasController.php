<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

use App\Models\Producto;
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

        $tickets = TicketProducto::all();
        $ticketsPorMes = $tickets->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->created_at)->format('m');
        });

        $totalPorMes = [];
        $labels2 = [];

        foreach ($ticketsPorMes as $key => $value) {
            $total = 0;
            foreach ($value as $ticket) {
                $total += $ticket->unidades * $ticket->formatoProducto->precioUnitario;
            }
            $totalPorMes[] = number_format($total, 2);
            $labels2[] = \Carbon\Carbon::createFromFormat('!m', $key)->format('F');
        }

        $chart2 = LarapexChart::lineChart()
            ->setTitle('Ganancias Mensuales')
            ->setXAxis($labels2)
            ->addData('Ganancias', $totalPorMes)
            ->setColors(['#FF5733']);

        return view('estadisticas.estadisticas', compact('chart', 'chart2'));
    }
}

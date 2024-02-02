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
        $gananciasMensuales = TicketProducto::selectRaw('DATE_FORMAT(ticket_producto.created_at, "%Y-%m") as month, SUM(ticket_producto.unidades * formato_productos.precioUnitario) as total')
            ->join('formato_productos', 'ticket_producto.idFormatoProducto', '=', 'formato_productos.id')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = $gananciasMensuales->pluck('month')->map(function ($month) {
            return \Carbon\Carbon::parse($month)->format('F Y');

        });

        $datosGanancias = $gananciasMensuales->pluck('total');

        $chart2 = LarapexChart::lineChart()
            ->setTitle('Ganancias Mensuales')
            ->setXAxis($labels->toArray())
            ->addData('Ganancias', $datosGanancias->toArray())
            ->setColors(['#334FFF']);


        $formatos = FormatoProducto::with('producto')->get();
        $cantidadTotalPorFormato = [];
        $labels1 = [];

        foreach ($formatos as $formato) {
            $idFormato = $formato->id;  
            $cantidadTotalPorFormato[] = TicketProducto::where('idFormatoProducto', $idFormato)->sum('unidades');

            $productoFormato = $formato->producto->nombreProducto . ' ' . $formato->formatoEnvase;
            $labels1[] = $productoFormato;
        }

        $chart1 = LarapexChart::barChart()
            ->setTitle('Productos Comprados')
            ->setXAxis($labels1)
            ->addData('Unidades', $cantidadTotalPorFormato)
            ->setColors(['#334FFF']);

        return view('estadisticas.estadisticas', compact('chart1', 'chart2'));
    }
}
    
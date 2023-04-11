<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Proyecto;

class NavigationController extends Controller{
    //
    public function avances(){
        if(\Auth::user()->isAdministrador() || \Auth::user()->isGerencial()) {
            $ano2022 = 2022;
            $ano2023 = 2023;
            $ano2024 = 2024;

            for ($i = 1; $i <= 12; $i++) {
                $seriesData2022[] = Proyecto::whereHas('actividades', function ($q) use ($ano2022, $i) {
                    $q->where('fecha_inicio', '<=', date_create($ano2022.'-'.$i.'-31'))
                    ->where('fecha_final', '>=', date_create($ano2022.'-'.$i.'-01'));
                })->count();
            }

            for ($i = 1; $i <= 12; $i++) {
                $seriesData2023[] = Proyecto::whereHas('actividades', function ($q) use ($ano2023, $i) {
                    $q->where('fecha_inicio', '<=', date_create($ano2023.'-'.$i.'-31'))
                        ->where('fecha_final', '>=', date_create($ano2023.'-'.$i.'-01'));
                })->count();
            }

            for ($i = 1; $i <= 12; $i++) {
                $seriesData2024[] = Proyecto::whereHas('actividades', function ($q) use ($ano2024, $i) {
                    $q->where('fecha_inicio', '<=', date_create($ano2024.'-'.$i.'-31'))
                        ->where('fecha_final', '>=', date_create($ano2024.'-'.$i.'-01'));
                })->count();
            }

            $proyectos2022 = Proyecto::whereHas('actividades', function ($q) use ($ano2022) {
                $q->whereYear('fecha_inicio', $ano2022)->orWhereYear('fecha_final', $ano2022);
            })->count();
            $proyectos2023 = Proyecto::whereHas('actividades', function ($q) use ($ano2023) {
                $q->whereYear('fecha_inicio', $ano2023)->orWhereYear('fecha_final', $ano2023);
            })->count();
            $proyectos2024 = Proyecto::whereHas('actividades', function ($q) use ($ano2024) {
                $q->whereYear('fecha_inicio', $ano2024)->orWhereYear('fecha_final', $ano2024);
            })->count();

            $proyectosEnProceso2022 = Proyecto::whereHas('actividades', function ($q) use ($ano2022) {
                $q->where('concluida', 0)->where(function($r) use($ano2022){
                    $r->whereYear('fecha_inicio', $ano2022)->orWhereYear('fecha_final', $ano2022);
                });
            })->count();
            $proyectosEnProceso2023 = Proyecto::whereHas('actividades', function ($q) use ($ano2023) {
                $q->where('concluida', 0)->where(function($r) use($ano2023){
                    $r->whereYear('fecha_inicio', $ano2023)->orWhereYear('fecha_final', $ano2023);
                });
            })->count();
            $proyectosEnProceso2024 = Proyecto::whereHas('actividades', function ($q) use ($ano2024) {
                $q->where('concluida', 0)->where(function($r) use($ano2024){
                    $r->whereYear('fecha_inicio', $ano2024)->orWhereYear('fecha_final', $ano2024);
                });
            })->count();

            $proyectosDesfasados2022 = Proyecto::whereHas('actividades', function ($q) use ($ano2022) {
                $q->where('concluida', 0)->whereDate('fecha_final', '<', date('Y-m-d'))->where(function($r) use($ano2022){
                    $r->whereYear('fecha_inicio', $ano2022)->orWhereYear('fecha_final', $ano2022);
                });
            })->count();
            $proyectosDesfasados2023 = Proyecto::whereHas('actividades', function ($q) use ($ano2023) {
                $q->where('concluida', 0)->whereDate('fecha_final', '<', date('Y-m-d'))->where(function($r) use($ano2023){
                    $r->whereYear('fecha_inicio', $ano2023)->orWhereYear('fecha_final', $ano2023);
                });
            })->count();
            $proyectosDesfasados2024 = Proyecto::whereHas('actividades', function ($q) use ($ano2024) {
                $q->where('concluida', 0)->whereDate('fecha_final', '<', date('Y-m-d'))->where(function($r) use($ano2024){
                    $r->whereYear('fecha_inicio', $ano2024)->orWhereYear('fecha_final', $ano2024);
                });
            })->count();

            $proyectosConcluidos2022 = Proyecto::whereHas('actividades', function ($q) use ($ano2022) {
                $q->whereYear('fecha_inicio', $ano2022)->orWhereYear('fecha_final', $ano2022);
            })->whereDoesntHave('actividades', function ($q) {
                $q->where('concluida', 0);
            })->count();
            $proyectosConcluidos2023 = Proyecto::whereHas('actividades', function ($q) use ($ano2023) {
                $q->whereYear('fecha_inicio', $ano2023)->orWhereYear('fecha_final', $ano2023);
            })->whereDoesntHave('actividades', function ($q) {
                $q->where('concluida', 0);
            })->count();
            $proyectosConcluidos2024 = Proyecto::whereHas('actividades', function ($q) use ($ano2024) {
                $q->whereYear('fecha_inicio', $ano2024)->orWhereYear('fecha_final', $ano2024);
            })->whereDoesntHave('actividades', function ($q) {
                $q->where('concluida', 0);
            })->count();

            $areas = Area::whereHas('proyectos')->orderBy('nombre')->get();

            return view('tablero-detalles', compact('seriesData2022', 'seriesData2023', 'seriesData2024',
                'ano2022', 'ano2023', 'ano2024', 'proyectos2022', 'proyectos2023', 'proyectos2024',
                'proyectosEnProceso2022', 'proyectosEnProceso2023', 'proyectosEnProceso2024',
                'proyectosDesfasados2022', 'proyectosDesfasados2023', 'proyectosDesfasados2024',
                'proyectosConcluidos2022', 'proyectosConcluidos2023', 'proyectosConcluidos2024',
                'areas'));
        }else{
            return redirect()->to('/');
        }
    }

    public function resumen(){
        return view('tablero-resumen');
    }

    public function nuevoProyecto(){
        return view('catalogos.nuevo-proyecto');
    }

    public function editarProyecto($id){
        $proyecto = Proyecto::find($id);
        $responsable_id = \Auth::user()->responsable ? \Auth::user()->responsable->id : 0;

        if(\Auth::user()->isAdministrador() || $proyecto->responsable_id == $responsable_id)
            return view('catalogos.editar-proyecto')->with('id', $id);
        else
            return view('pages.layouts-error-401');
    }

    public function verProyecto($id){
        $proyecto = Proyecto::find($id);
        $area_id1 = $proyecto->responsable->area->id;
        $area_id2 = \Auth::user()->responsable ? \Auth::user()->responsable->area->id : 0;

        if(\Auth::user()->isAdministrador() || \Auth::user()->isGerencial() ||
            (\Auth::user()->responsable && $proyecto->responsable_id == \Auth::user()->responsable->id) ||
            $area_id1 == $area_id2)
            return view('catalogos.ver-proyecto')->with('id', $id);
        else
            return view('pages.layouts-error-401');
    }

    public function proyectos(){
        return view('proyectos');
    }

    public function verPdf($id){
        $proyecto = Proyecto::find($id);
        $area_id1 = $proyecto->responsable->area->id;
        $area_id2 = \Auth::user()->responsable ? \Auth::user()->responsable->area->id : 0;

        if(\Auth::user()->isAdministrador() || \Auth::user()->isGerencial() || $proyecto->responsable_id == \Auth::user()->responsable->id || $area_id1 == $area_id2)
            return view('reportes.resumen', ['proyecto' => $proyecto]);
        else
            return view('pages.layouts-error-401');
    }
}

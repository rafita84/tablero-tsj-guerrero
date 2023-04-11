<?php

namespace App\Main;


class SidebarPanel
{

    public static function tableros()
    {
        if(\Auth::user()->isAdministrador() || \Auth::user()->isGerencial()) {
            return [
                'title' => 'Tableros',
                'items' => [
                    [
                        'resumen' => [
                            'title' => 'Resumen',
                            'route_name' => 'tableros.index'
                        ],
                        'detalles' => [
                            'title' => 'Detalles',
                            'route_name' => 'tableros.avances'
                        ]
                    ]
                ]
            ];
        }else{
            return [
                'title' => 'Tableros',
                'items' => [
                    [
                        'resumen' => [
                            'title' => 'Resumen',
                            'route_name' => 'tableros.index'
                        ]
                    ]
                ]
            ];
        }
    }

    public static function proyectos()
    {
        return [
            'title' => 'Proyectos',
            'items' => [
                [
                    'todos' => [
                        'title' => 'Todos los proyectos',
                        'route_name' => 'proyectos.todos'
                    ],
                    'nuevo' => [
                        'title' => 'Crear nuevo',
                        'route_name' => 'proyectos.nuevo'
                    ]
                ]
            ]
        ];
    }

    public static function catalogos()
    {
        return [
            'title' => 'Catálogos',
            'items' => [
                [
                    'areas' => [
                        'title' => 'Áreas',
                        'route_name' => 'catalogos.areas.index'
                    ],
                    'responsables' => [
                        'title' => 'Responsables',
                        'route_name' => 'catalogos.responsables.index'
                    ],
                    'usuarios' => [
                        'title' => 'Usuarios',
                        'route_name' => 'catalogos.usuarios.index'
                    ]
                ]
            ]
        ];
    }

    public static function vacio(){
        return [
            'title' => '',
            'items' => []
        ];
    }
}

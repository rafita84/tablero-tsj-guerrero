<?php

namespace App\Http\View\Composers;

use App\Main\SidebarPanel;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        if (!is_null(request()->route())) {
            $pageName = request()->route()->getName();
            $routePrefix = explode('.', $pageName)[0];

            switch ($routePrefix) {
                case 'catalogos':
                    $view->with('sidebarMenu', SidebarPanel::catalogos());
                    break;
                case 'proyectos':
                    $view->with('sidebarMenu', SidebarPanel::proyectos());
                    break;
                case 'tableros':
                    $view->with('sidebarMenu', SidebarPanel::tableros());
                    break;
                default:
                    $view->with('sidebarMenu', SidebarPanel::vacio());
            }
            $view->with('pageName', $pageName);
            $view->with('routePrefix', $routePrefix);
        }
    }
}

<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    private string $view = 'Panel/dashboard_admin';

    public function __construct()
    {
        helper('array');
    }

    private function cargardatos(): array
    {
        $datos = [];

        $datos['nombre_pagina'] = 'Dashboard';
        $datos['titulo'] = 'Yamis';

        $breadcrum = [
            [
                'href'   => route_to('dashboard'),
                'titulo' => 'Dashboard ',
            ],
            [
                'href'   => '#',
                'titulo' => 'Dashboard vista',
            ],
        ];

        $datos['header_page'] = [
            'titulo' => $datos['titulo'],
            'breadcrumb' => $breadcrum,
        ];

        $datos['breadcrumb_panel'] = breadcrumb_panel($datos['titulo'], $breadcrum);

        return $datos;
    }

    public function index(): string
    {
        return view($this->view, $this->cargardatos());
    }
}

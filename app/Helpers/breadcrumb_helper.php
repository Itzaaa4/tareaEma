<?php

if (!function_exists('breadcrumb_panel')) {
    /**
     * Genera el HTML del breadcrumb para el panel.
     * Cada item puede venir como:
     * ['titulo' => 'Usuarios', 'href' => '/usuarios'] o
     * ['label' => 'Usuarios', 'url' => '/usuarios'].
     */
    function breadcrumb_panel(string $titulo_pagina, array $breadcrum = []): string
    {
        $hasActiveItem = false;
        $html = '
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">' . esc($titulo_pagina) . '</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="' . base_url('dashboard') . '">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </a>
                    </li>';

        foreach ($breadcrum as $bd) {
            $titulo = esc($bd['titulo'] ?? $bd['label'] ?? '');
            $href = $bd['href'] ?? $bd['url'] ?? '#';

            if ($titulo === '') {
                continue;
            }

            if ($href !== '#') {
                $html .= '
                    <li class="breadcrumb-item">
                        <a href="' . esc($href) . '">' . $titulo . '</a>
                    </li>';
            } else {
                $hasActiveItem = true;
                $html .= '
                    <li class="breadcrumb-item active">' . $titulo . '</li>';
            }
        }

        if (!$hasActiveItem) {
            $html .= '
                    <li class="breadcrumb-item active">' . esc($titulo_pagina) . '</li>';
        }

        $html .= '
                </ol>
            </div>
        </div>';

        return $html;
    }
}

if (!function_exists('breadcrumb_helper')) {
    /**
     * Alias para mantener compatibilidad con vistas existentes.
     */
    function breadcrumb_helper(string $nombrePagina, array $breadcrumb = []): string
    {
        return breadcrumb_panel($nombrePagina, $breadcrumb);
    }
}

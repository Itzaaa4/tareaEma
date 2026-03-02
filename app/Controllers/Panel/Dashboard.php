<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @var string $view Nombre de la vista a renderizar
     */
    private string $view='Panel/dashboard_admin';
    

    public function __construct(){}

    private function cargarDatos(): array {
        $datos=array();

       

     
        $datos['nombre_pagina']='Dashboard';

        $datos['hearder_page']=array(
            'titulo'=>$datos['nombre_pagina'],
            'breadcrumb'=>array()
        );
        $datos['titulo']='Yamis';
        
        

        return $datos;
    }



    /**
     * cargar los datos necesarios para renderizar la vista
     * @return array $datos a pasar a la vista
     */

    public function index(): string{
        return view($this->view, $this->cargarDatos());
    }
}
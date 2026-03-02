<?php
if(!function_exists('breadcrumb_helper')) {
    function breadcrumb_helper(string $nombrePagina, array $breadcrumb = [] ): string {

        $html = '
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">'.$nombrePagina.'</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
              
              <a href="#">Home</a></li>
              <li class="breadcrumb-item active">'.$nombrePagina.'</li>
            </ol>
          </div>
        </div>';

        return $html;           
    }
}
<?php
namespace App\Services\Interfaces;

interface ViewInterface {

    public function views($id);

    public function dateOfView($id);
}
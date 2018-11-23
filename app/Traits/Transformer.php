<?php


namespace App\Traits;


use League\Fractal\Manager;

trait Transformer
{
    protected $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }
}

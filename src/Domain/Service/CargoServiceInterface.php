<?php
/**
 * Created by PhpStorm.
 * User: Wandson
 * Date: 19/06/2018
 * Time: 20:40
 */

namespace Domain\Service;


use Domain\Model\Cargo;

interface CargoServiceInterface
{
    /**
     * @param Cargo $cargo
     * @return void
     */
    public function salvar(Cargo $cargo);
}
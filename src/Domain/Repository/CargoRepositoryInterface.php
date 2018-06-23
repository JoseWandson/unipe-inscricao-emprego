<?php
/**
 * Created by PhpStorm.
 * User: Wandson
 * Date: 19/06/2018
 * Time: 20:44
 */

namespace Domain\Repository;


use Domain\Model\Cargo;

interface CargoRepositoryInterface
{
    /**
     * @param Cargo $cargo
     * return void
     */
    public function save(Cargo $cargo);
}
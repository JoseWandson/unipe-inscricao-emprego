<?php
/**
 * Created by PhpStorm.
 * User: Wandson
 * Date: 19/06/2018
 * Time: 20:39
 */

namespace AppBundle\Service;


use Domain\Model\Cargo;
use Domain\Repository\CargoRepositoryInterface;
use Domain\Service\CargoServiceInterface;

class CargoService implements CargoServiceInterface
{
    /**
     * @var CargoRepositoryInterface
     */
    private $cargoRepository;

    /**
     * CargoService constructor.
     * @param CargoRepositoryInterface $cargoRepositiry
     */
    public function __construct(CargoRepositoryInterface $cargoRepository)
    {
        $this->cargoRepository = $cargoRepository;
    }

    /**
     * @param Cargo $cargo
     * @return void
     */
    public function salvar(Cargo $cargo)
    {
        $this->cargoRepository->save($cargo);
    }
}
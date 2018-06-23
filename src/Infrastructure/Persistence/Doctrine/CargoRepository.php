<?php
/**
 * Created by PhpStorm.
 * User: Wandson
 * Date: 19/06/2018
 * Time: 20:51
 */

namespace Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityRepository;
use Domain\Model\Cargo;
use Domain\Repository\CargoRepositoryInterface;

class CargoRepository extends EntityRepository implements CargoRepositoryInterface
{
    public function save(Cargo $cargo)
    {
        $this->getEntityManager()->persist($cargo);
        $this->getEntityManager()->flush();
    }
}
<?php

namespace AppBundle\Service;

use Domain\Model\Oportunidade;
use Domain\Repository\OportunidadeRepositoryInterface;
use Domain\Service\OportunidadeServiceInterface;

class OportunidadeService implements OportunidadeServiceInterface
{
    /**
     * @var OportunidadeRepositoryInterface
     */
    private $oportunidadeRepository;

    /**
     * OportunidadeService constructor.
     * @param OportunidadeRepositoryInterface $oportunidadeRepository
     */
    public function __construct(OportunidadeRepositoryInterface $oportunidadeRepository)
    {
        $this->oportunidadeRepository = $oportunidadeRepository;
    }

    /**
     * @param Oportunidade $oportunidade
     * @return void
     */
    public function salvar(Oportunidade $oportunidade)
    {
        $this->oportunidadeRepository->save($oportunidade);
    }

    /**
     * @param int $id
     * @return Oportunidade
     */
    public function buscarPorId(int $id)
    {
        return $this->oportunidadeRepository->findOneById($id);
    }

    /**
     * @return mixed
     */
    public function buscarTodos()
    {
        return $this->oportunidadeRepository->buscarTodos();
    }
}

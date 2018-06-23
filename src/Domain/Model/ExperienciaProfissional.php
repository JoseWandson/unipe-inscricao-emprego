<?php

namespace Domain\Model;

class ExperienciaProfissional
{
    /**
     * @var int
     */
    private $idExperienciaProfissional;

    /**
     * @var Cargo
     */
    private $cargo;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var \DateTime
     */
    private $dataInicial;

    /**
     * @var \DateTime
     */
    private $dataFinal;

    /**
     * @var boolean
     */
    private $trabalhoAtual;

    /**
     * ExperienciaProfissional constructor.
     * @param Cargo $cargo
     */
    public function __construct(Cargo $cargo)
    {
        $this->cargo = $cargo;
    }
}

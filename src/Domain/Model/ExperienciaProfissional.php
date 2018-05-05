<?php

namespace Domain\Model;

class ExperienciaProfissional
{
    /**
     * @var int
     */
    private $idExperienciaProfissional;

    /**
     * @var string
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
}

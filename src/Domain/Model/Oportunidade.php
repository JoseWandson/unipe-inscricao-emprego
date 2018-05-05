<?php

namespace Domain\Model;

class Oportunidade
{
    /**
     * @var integer
     */
    private $idOportunidade;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var \DateTime
     */
    private $dtInicio;

    /**
     * @var \DateTime
     */
    private $dtFinal;

    /**
     * @var integer
     */
    private $qtdVagas;
}

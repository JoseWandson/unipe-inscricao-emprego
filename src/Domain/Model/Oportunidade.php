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

    /**
     * @return int
     */
    public function getIdOportunidade()
    {
        return $this->idOportunidade;
    }

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return \DateTime
     */
    public function getDtInicio()
    {
        return $this->dtInicio;
    }

    /**
     * @return \DateTime
     */
    public function getDtFinal()
    {
        return $this->dtFinal;
    }

    /**
     * @return int
     */
    public function getQtdVagas()
    {
        return $this->qtdVagas;
    }
}

<?php

namespace Domain\Model;

class Inscricao
{
    /**
     * @var int
     */
    private $idInscricao;

    /**
     * @var Candidato
     */
    private $candidato;

    /**
     * @var Oportunidade
     */
    private $oportunidade;

    /**
     * @var string
     */
    private $codigoConfirmacao;

    /**
     * @var bool
     */
    private $ativa;

    /**
     * Inscricao constructor.
     * @param Candidato $candidato
     * @param Oportunidade $oportunidade
     */
    public function __construct(
        Candidato $candidato,
        Oportunidade $oportunidade
    ) {
        $this->candidato = $candidato;
        $this->oportunidade = $oportunidade;
        $this->ativa = true;
    }

    /**
     * @return int
     */
    public function getIdInscricao()
    {
        return $this->idInscricao;
    }

    /**
     * @return string
     */
    public function getCodigoConfirmacao()
    {
        return $this->codigoConfirmacao;
    }

    public function generateCodigoVerificacao()
    {
        $this->codigoConfirmacao = uniqid();
    }
}
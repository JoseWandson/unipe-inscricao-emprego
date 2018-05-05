<?php

namespace Domain\Model;

class Inscricao
{
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
    }

    public function generateCodigoVerificacao()
    {
        $this->codigoConfirmacao = uniqid();
    }
}
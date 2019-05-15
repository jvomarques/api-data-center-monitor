<?php

namespace API\Repositories;

use Tymon\JWTAuth\JWTAuth;
use API\User;
use API\Servicos;
use API\Cidades;
use API\Bairros;
use API\Cores;
use API\Marcas;
use API\Modelos;
use API\Veiculos;
use API\Montadoras;
use API\Oficinas;
use API\Categorias;
use API\Comissoes;
use API\Atendimentos;
use API\Situacoes;
use API\Avaliacoes;
use API\Atendimentos_Servicos;
use API\Atendimentos_Oficinas;
use API\Oficinas_Montadoras;
use API\Oficinas_Servicos;

class BaseRepository
{
    protected $JWTAuth;
    protected $user;
    protected $servicos;
    protected $cidades;
    protected $bairros;
    protected $marcas;
    protected $montadoras;
    protected $oficinas;
    protected $categorias;
    protected $comissoes;
    protected $atendimentos;
    protected $situacoes;
    protected $avaliacoes;
    protected $atendimentosServicos;
    protected $atendimentosoficinas;
    protected $oficinasmontadoras;
    protected $oficinasservicos;

    public function __construct(JWTAuth $JWTAuth, User $user, Servicos $servicos, Cidades $cidades, Bairros $bairros, Cores $cores, Marcas $marcas, Modelos $modelos, Veiculos $veiculos, Montadoras $montadoras, Oficinas $oficinas, Categorias $categorias, Comissoes $comissoes, Atendimentos $atendimentos, Situacoes $situacoes, Avaliacoes $avaliacoes, Atendimentos_Servicos $atendimentosServicos, Atendimentos_Oficinas $atendimentosoficinas, Oficinas_Montadoras $oficinasmontadoras, Oficinas_Servicos $oficinasservicos)
    {
        $this->JWTAuth = $JWTAuth;
        $this->user = $user;
        $this->servicos = $servicos;
        $this->cidades = $cidades;
        $this->bairros = $bairros;
        $this->cores = $cores;
        $this->marcas = $marcas;
        $this->modelos = $modelos;
        $this->veiculos = $veiculos;
        $this->montadoras = $montadoras;
        $this->oficinas = $oficinas;
        $this->categorias = $categorias;
        $this->comissoes = $comissoes;
        $this->atendimentos = $atendimentos;
        $this->situacoes = $situacoes;
        $this->avaliacoes = $avaliacoes;
        $this->atendimentosServicos = $atendimentosServicos;
        $this->atendimentosoficinas = $atendimentosoficinas;
        $this->oficinasmontadoras = $oficinasmontadoras;
        $this->oficinasservicos = $oficinasservicos;
    }
}
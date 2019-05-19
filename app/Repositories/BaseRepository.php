<?php

namespace API\Repositories;

use Tymon\JWTAuth\JWTAuth;
use API\User;

use API\Monitoramento;

class BaseRepository
{
    protected $JWTAuth;
    protected $user;

    protected $monitoramento;

    public function __construct(Monitoramento $monitoramento, JWTAuth $JWTAuth, User $user)
    {
        $this->JWTAuth = $JWTAuth;
        $this->user = $user;

        $this->monitoramento = $monitoramento;
    }
}
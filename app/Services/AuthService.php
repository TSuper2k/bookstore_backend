<?php

namespace App\Services;

use App\Repositories\AuthRepository;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        return $this->authRepository = $authRepository;
    }

    public function getLogin($data){
        return $this->authRepository->getLogin($data);
    }

    public function getRegister($data){
        return $this->authRepository->getRegister($data);
    }

    public function getLogout(){
        return $this->authRepository->getLogout();
    }
}

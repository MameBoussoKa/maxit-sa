


<?php

use App\Core\Database;
use App\Core\Session;
use Src\Repository\CompteRepository;
use Src\Repository\UtilisateurRepository;
use Src\Service\SecurityService;

$dependencies=[
            "core"=>[
                    "database"=> Database::class,
                    "session"=> Session::class

            ],
            "repository"=>[
                    "utilisateurRepository"=> UtilisateurRepository::class,
                    "compteRepository"=> CompteRepository::class

            ],
            "service"=>[
                     "securityService"=> SecurityService::class
            ]
];


return $dependencies;
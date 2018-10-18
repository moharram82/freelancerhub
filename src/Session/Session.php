<?php

namespace moharram82\Session;

use Symfony\Component\HttpFoundation\Session\Session as SymfonySession;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler;

class Session extends SymfonySession
{
    private $pdo;
    private $sessionStorage;

    public function __construct(\PDO $pdo = null) {

        $this->pdo = $pdo;

        if(config('session.driver') === 'database') {

            if(null === $this->pdo || ! $this->pdo instanceof \PDO) {
                $this->pdo = $this->dbConnect();
            }

            $this->sessionStorage = new NativeSessionStorage(config('session'), new SessionProxy(new PdoSessionHandler($this->pdo, [
                'db_table' => config('session.table')
            ])));
        } else {
            $this->sessionStorage = new NativeSessionStorage(config('session'), new SessionProxy(new NativeFileSessionHandler(config('session.files'))));
        }

        parent::__construct($this->sessionStorage);
    }

    protected function dbConnect() {
        return pdoMysqlConnect(config('db.host'), config('db.username'), config('db.password'), config('db.name'));
    }
}
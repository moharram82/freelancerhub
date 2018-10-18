<?php

namespace moharram82\Session;

use Illuminate\Encryption\Encrypter;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpFoundation\Session\Storage\Proxy\SessionHandlerProxy;

class SessionProxy extends SessionHandlerProxy
{
    private $encrypter;

    public function __construct(\SessionHandlerInterface $handler)
    {
        if(config('session.encrypt')) {
            $this->encrypter = new Encrypter(config('encryption_key'), 'AES-128-CBC');
        }

        parent::__construct($handler);
    }

    public function read($id)
    {
        $data = parent::read($id);

        if(config('session.encrypt')) {

            try {
                return $this->encrypter->decrypt($data);
            } catch (DecryptException $e) {
                return $data;
            }
        }

        return $data;
    }

    public function write($id, $data)
    {

        if(config('session.encrypt')) {
            $data = $this->encrypter->encrypt($data);
        }

        return parent::write($id, $data);
    }
}
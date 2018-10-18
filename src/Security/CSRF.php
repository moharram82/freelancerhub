<?php

namespace moharram82\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator;
use Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Security\Csrf\CsrfToken;

class CSRF
{
    private $session;
    private $request;
    private $csrfTokenGenerator;
    private $csrfTokenStorage;
    private $csrfTokenManager;

    public function __construct(SessionInterface $session, Request $request)
    {
        $this->session = $session;

        $this->request = $request;

        $this->csrfTokenGenerator = new UriSafeTokenGenerator();

        $this->csrfTokenStorage = new SessionTokenStorage($this->session);

        $this->csrfTokenManager = new CsrfTokenManager($this->csrfTokenGenerator, $this->csrfTokenStorage);

        // check if CSRF protection is enabled
        if(config('csrf.enabled')) {

            // create or get CSRF token
            $this->getToken(config('csrf.token_id'));

            // check if the previously available token is valid
            if(! $this->validateToken()) {
                exit('<strong>Error:</strong> Bad form submission!');
            }
        }
    }

    public function isTokenValid()
    {
        return $this->csrfTokenManager->isTokenValid(new CsrfToken(config('csrf.token_id'), $this->request->request->get(config('csrf.field_name'))));
    }

    public function getToken($token_id)
    {
        return $this->csrfTokenManager->getToken($token_id);
    }

    private function validateToken()
    {
        // check if the request is post
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // validate the published form against csrf
            if (! $this->request->request->has(config('csrf.field_name')) || ! $this->isTokenValid()) {
                return false;
            }
        }

        return true;
    }
}
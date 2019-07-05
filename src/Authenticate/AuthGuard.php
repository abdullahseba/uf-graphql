<?php

namespace UserFrosting\Sprinkle\GraphQl\Authenticate;

use UserFrosting\Sprinkle\GraphQl\Authenticate\Exception\AuthExpiredException;

class AuthGuard
{
    /**
     * @var Authenticator
     */
    protected $authenticator;
    /**
     * Constructor.
     *
     * @param Authenticator $authenticator The current authentication object.
     */
    public function __construct(Authenticator $authenticator)
    {
        $this->authenticator = $authenticator;
    }
    /**
     * Invoke the AuthGuard middleware, throwing an exception if there is no authenticated user in the session.
     *
     * @param Request  $request  PSR7 request
     * @param Response $response PSR7 response
     * @param callable $next     Next middleware
     *
     * @return Response
     */
    public function check(Request $request, Response $response, $next)
    {
        if (!$this->authenticator->check()) {
            throw new AuthExpiredException();
        } else {
            return $next($request, $response);
        }
        return $response;
    }
}

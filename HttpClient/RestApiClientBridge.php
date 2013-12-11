<?php

/**
 * This file is part of the Da Project.
 *
 * (c) Thomas Prelot <tprelot@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Da\ApiClientBundle\HttpClient;

/**
 * RestApiClientBridge is the abstraction class of a bridge pattern allowing
 * to dynamically change the implementation for the REST API client.
 *
 * @author Thomas Prelot <tprelot@gmail.com>
 * @author Gabriel Bondaz <gabriel.bondaz@idci-consulting.fr>
 */
class RestApiClientBridge implements RestApiClientInterface
{
    /**
     * The implementor.
     *
     * @var RestApiClientImplementorInterface
     */
    protected $implementor;

    /**
     * Constructor.
     *
     * @param RestApiClientImplementorInterface $implementor
     * @param array                             $configuration
     */
    public function __construct(RestApiClientImplementorInterface $implementor, array $configuration)
    {
        $this->implementor = $implementor;
        $this->implementor->setEndpointRoot($configuration['endpoint_root']);
        $this->implementor->setSecurityToken($configuration['security_token']);
        $this->implementor->enableCache($configuration['cache_enabled']);
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpointRoot()
    {
        return $this->implementor->getEndpointRoot();
    }

    /**
     * {@inheritdoc}
     */
    public function get($path, array $queryString = array(), array $headers = array())
    {
        return $this->implementor->get($path, $queryString, $headers);
    }

    /**
     * {@inheritdoc}
     */
    public function post($path, array $queryString = array(), array $headers = array())
    {
        return $this->implementor->post($path, $queryString, $headers);
    }

    /**
     * {@inheritdoc}
     */
    public function put($path, array $queryString = array(), array $headers = array())
    {
        return $this->implementor->put($path, $queryString, $headers);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($path, array $queryString = array(), array $headers = array())
    {
        return $this->implementor->delete($path, $queryString, $headers);
    }
}

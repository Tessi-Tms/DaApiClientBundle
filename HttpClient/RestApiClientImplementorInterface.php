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

use Da\AuthCommonBundle\Security\AuthorizationRefresherInterface;

/**
 * RestApiClientImplementorInterface is the interface that an RestApiClientImplementor
 * should implement to be used as an implementor by the RestApiClientBridge.
 *
 * @author Thomas Prelot <tprelot@gmail.com>
 * @author Gabriel Bondaz <gabriel.bondaz@idci-consulting.fr>
 */
interface RestApiClientImplementorInterface extends RestApiClientInterface
{
    /**
     * Set the endpoint root URL of the API (from which all the path will be relative to).
     *
     * @param string $endpointRoot The api endpoint root URL.
     *
     * @return RestApiClientImplementorInterface.
     */
    public function setEndpointRoot($endpointRoot);

    /**
     * Get the security token to authenticate your client in the API.
     *
     * @return string The security token.
     */
    public function getSecurityToken();

    /**
     * Set the security token to authenticate your client in the API.
     *
     * @param string $securityToken The security token.
     *
     * @return RestApiClientImplementorInterface.
     */
    public function setSecurityToken($securityToken);

    /**
     * Inform about the cache activation.
     *
     * @return bool True if the cache is enabled.
     */
    public function isCacheEnabled();

    /**
     * Enable or disable the cache.
     *
     * @param bool $enableCache Should enable the cache or not
     *
     * @return RestApiClientImplementorInterface.
     */
    public function enableCache($enableCache);
}

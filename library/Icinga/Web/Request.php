<?php
/* Icinga Web 2 | (c) 2013-2015 Icinga Development Team | GPLv2+ */

namespace Icinga\Web;

use Zend_Controller_Request_Http;
use Icinga\User;

/**
 * A request
 */
class Request extends Zend_Controller_Request_Http
{
    /**
     * User if authenticated
     *
     * @var User|null
     */
    protected $user;

    /**
     * Unique identifier
     *
     * @var string
     */
    protected $uniqueId;

    /**
     * Request URL
     *
     * @var Url
     */
    protected $url;

    /**
     * Get whether the request seems to be an API request
     *
     * @return bool
     */
    public function getIsApiRequest()
    {
        return $this->getHeader('Accept') === 'application/json';
    }

    /**
     * Get the request URL
     *
     * @return Url
     */
    public function getUrl()
    {
        if ($this->url === null) {
            $this->url = Url::fromRequest($this);
        }
        return $this->url;
    }

    /**
     * Get the user if authenticated
     *
     * @return User|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the authenticated user
     *
     * @param   User $user
     *
     * @return  $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Makes an ID unique to this request, to prevent id collisions in different containers
     *
     * Call this whenever an ID might show up multiple times in different containers. This function is useful
     * for ensuring unique ids on sites, even if we combine the HTML of different requests into one site,
     * while still being able to reference elements uniquely in the same request.
     *
     * @param   string  $id
     *
     * @return  string  The id suffixed w/ an identifier unique to this request
     */
    public function protectId($id)
    {
        if (! isset($this->uniqueId)) {
            $this->uniqueId = Window::generateId();
        }
        return $id . '-' . $this->uniqueId;
    }
}

<?php
// {{{ICINGA_LICENSE_HEADER}}}
/**
 * This file is part of Icinga 2 Web.
 *
 * Icinga 2 Web - Head for multiple monitoring backends.
 * Copyright (C) 2013 Icinga Development Team
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * @copyright 2013 Icinga Development Team <info@icinga.org>
 * @license   http://www.gnu.org/licenses/gpl-2.0.txt GPL, version 2
 * @author    Icinga Development Team <info@icinga.org>
 */
// {{{ICINGA_LICENSE_HEADER}}}

namespace Icinga\Module\Monitoring\Command;

use Icinga\Exception\NotImplementedError;
use Icinga\Protocol\Commandpipe\CommandType;

/**
 * Base class for any concrete command implementation
 *
 * Provides some example methods and often used routines. When implementing
 * a new command one is encouraged to override one of those examples.
 */
class BaseCommand implements CommandType
{
    /**
     * Whether hosts are ignored in case of a host- or servicegroup
     *
     * @var bool
     */
    protected $withoutHosts = false;

    /**
     * Whether services are ignored in case of a host- or servicegroup
     *
     * @var bool
     */
    protected $withoutServices = false;

    /**
     * Whether child hosts are going to be included in case of a host command
     *
     * @var bool
     */
    protected $withChildren = false;

    /**
     * Whether only services are going to be included in case of a host command
     *
     * @var bool
     */
    protected $onlyServices = false;

    /**
     * Set whether this command should only affect the services of a host- or servicegroup
     *
     * @param   bool    $state
     * @return  self
     */
    public function excludeHosts($state = true)
    {
        $this->withoutHosts = (bool) $state;
        return $this;
    }

    /**
     * Set whether this command should only affect the hosts of a host- or servicegroup
     *
     * @param   bool    $state
     * @return  self
     */
    public function excludeServices($state = true)
    {
        $this->withoutServices = (bool) $state;
        return $this;
    }

    /**
     * Set whether this command should also affect all children hosts of a host
     *
     * @param   bool    $state
     * @return  self
     */
    public function includeChildren($state = true)
    {
        $this->withChildren = (bool) $state;
        return $this;
    }

    /**
     * Set whether this command only affects those services beyond a host
     *
     * @param   bool    $state
     * @return  self
     */
    public function excludeHost($state = true)
    {
        $this->onlyServices = (bool) $state;
        return $this;
    }

    /**
     * Return this command's parameters properly arranged in an array
     *
     * @return array
     */
    public function getParameters()
    {
        throw new NotImplementedError();
    }

    /**
     * Return the command as a string with the given host being inserted
     *
     * @param   string  $hostname   The name of the host to insert
     *
     * @return  string              The string representation of the command
     */
    public function getHostCommand($hostname)
    {
        throw new NotImplementedError();
    }

    /**
     * Return the command as a string with the given host and service being inserted
     *
     * @param   string  $hostname       The name of the host to insert
     * @param   string  $servicename    The name of the service to insert
     *
     * @return  string                  The string representation of the command
     */
    public function getServiceCommand($hostname, $servicename)
    {
        throw new NotImplementedError();
    }

    /**
     * Return the command as a string with the given hostgroup being inserted
     *
     * @param   string  $hostgroup  The name of the hostgroup to insert
     *
     * @return  string              The string representation of the command
     */
    public function getHostgroupCommand($hostgroup)
    {
        throw new NotImplementedError();
    }

    /**
     * Return the command as a string with the given servicegroup being inserted
     *
     * @param   string  $servicegroup   The name of the servicegroup to insert
     *
     * @return  string                  The string representation of the command
     */
    public function getServicegroupCommand($servicegroup)
    {
        throw new NotImplementedError();
    }
}

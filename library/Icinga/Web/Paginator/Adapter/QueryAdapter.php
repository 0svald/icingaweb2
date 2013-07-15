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

namespace Icinga\Web\Paginator\Adapter;

/**
 * @see Zend_Paginator_Adapter_Interface
 */

class QueryAdapter implements \Zend_Paginator_Adapter_Interface
{
    /**
     * Array
     * 
     * @var array
     */
    protected $query = null;

    /**
     * Item count
     *
     * @var integer
     */
    protected $count = null;

    /**
     * Constructor.
     * 
     * @param array $query Query to paginate
     */
    // TODO: Re-add abstract Query type as soon as a more generic one
    //       is available. Should fit Protocol-Queries too.
    // public function __construct(\Icinga\Backend\Query $query)
    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Returns an array of items for a page.
     *
     * @param  integer $offset Page offset
     * @param  integer $itemCountPerPage Number of items per page
     * @return array
     */
    public function getItems($offset, $itemCountPerPage)
    {
        return $this->query->limit($itemCountPerPage, $offset)->fetchAll();
    }

    /**
     * Returns the total number of items in the query result.
     *
     * @return integer
     */
    public function count()
    {
        if ($this->count === null) {
            $this->count = $this->query->count();
        }
        return $this->count;
    }
}

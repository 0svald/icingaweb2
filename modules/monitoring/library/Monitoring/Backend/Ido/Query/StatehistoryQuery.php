<?php
// {{{ICINGA_LICENSE_HEADER}}}
// {{{ICINGA_LICENSE_HEADER}}}

namespace Icinga\Module\Monitoring\Backend\Ido\Query;

class StatehistoryQuery extends IdoQuery
{
    protected $types = array(
        'soft_state' => 0,
        'hard_state' => 1,
    );

    protected $columnMap = array(
        'statehistory' => array(
            'raw_timestamp' => 'sh.state_time',
            'timestamp'  => 'UNIX_TIMESTAMP(sh.state_time)',
            'state_time' => 'sh.state_time',
            'object_id'  => 'sho.object_id',
            'type'       => "(CASE WHEN sh.state_type = 1 THEN 'hard_state' ELSE 'soft_state' END)",
            'state'      => 'sh.state',
            'state_type' => 'sh.state_type',
            'output'     => 'sh.output',
            'attempt'      => 'sh.current_check_attempt',
            'max_attempts' => 'sh.max_check_attempts',

            'host'                => 'sho.name1 COLLATE latin1_general_ci',
            'service'             => 'sho.name2 COLLATE latin1_general_ci',
            'host_name'           => 'sho.name1 COLLATE latin1_general_ci',
            'service_description' => 'sho.name2 COLLATE latin1_general_ci',
            'service_host_name'   => 'sho.name1 COLLATE latin1_general_ci',
            'service_description' => 'sho.name2 COLLATE latin1_general_ci',
            'object_type'         => "CASE WHEN sho.objecttype_id = 1 THEN 'host' ELSE 'service' END"
        ),
        'hostgroups' => array(
            'hostgroup' => 'hgo.name1 COLLATE latin1_general_ci'
        )
    );

    public function whereToSql($col, $sign, $expression)
    {
        if ($col === 'UNIX_TIMESTAMP(sh.state_time)') {
            return 'sh.state_time ' . $sign . ' ' . $this->timestampForSql($this->valueToTimestamp($expression));
        } elseif ($col === $this->columnMap['statehistory']['type']
            && is_array($expression) === false
            && array_key_exists($expression, $this->types) === true
        ) {
                return 'sh.state_type ' . $sign . ' ' . $this->types[$expression];
        } else {
            return parent::whereToSql($col, $sign, $expression);
        }
    }

    protected function joinBaseTables()
    {
        $this->select->from(
            array('sho' => $this->prefix . 'objects'),
            array()
        )->join(
            array('sh' => $this->prefix . 'statehistory'),
            'sho.' . $this->object_id . ' = sh.' . $this->object_id . ' AND sho.is_active = 1',
            array()
        );
        $this->joinedVirtualTables = array('statehistory' => true);
    }

    protected function joinHostgroups()
    {
        $this->select->join(
            array('hgm' => $this->prefix . 'hostgroup_members'),
            'hgm.host_object_id = sho.object_id',
            array()
        )->join(
            array('hg' => $this->prefix . 'hostgroups'),
            'hgm.hostgroup_id = hg.' . $this->hostgroup_id,
            array()
        )->join(
            array('hgo' => $this->prefix . 'objects'),
            'hgo.' . $this->object_id. ' = hg.hostgroup_object_id' . ' AND hgo.is_active = 1',
            array()
        );
        return $this;
    }
}

<?php

namespace IPS\wowsuite\Utils;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( $_SERVER['SERVER_PROTOCOL'] ?? 'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

class _DbUtils
{
    public static function getRaids(): object
    {
        return \IPS\Db::i()->select( 'raid_id, raid_name', 'wowsuite_raid_instances');
    }

    public static function getRaidsArray(): array
    {
        $data = \IPS\Db::i()->select( 'raid_id, raid_name', 'wowsuite_raid_instances');
        
		$raids = array( 1 => 'default_raid' );
		foreach($data as $r) {
			$raids[$r['raid_id']] = $r['raid_name'];
        }
        
        return $raids;
    }
    
	public function countBosses( $raid ) {
        $data = \IPS\Db::i()->select( 'boss_id', 'wowsuite_instance_boss', array('boss_instance=?', $raid['raid_id']));
        
        return count($data);
	}
    
	public function countBossKills( $raid, $tag ) {
        $data = \IPS\Db::i()->select( 'boss_id', 'wowsuite_instance_boss', array('boss_instance=? AND boss_'.$tag.'=1', $raid['raid_id']));
        
        return count($data);
	}

    public static function getClassesArray(): array
    {
        $data = \IPS\Db::i()->select( 'class_id, class_name', 'wowsuite_recruit_class');
        
		$classes = array( 1 => 'default_class' );
		foreach($data as $c) {
			$classes[$c['class_id']] = $c['class_name'];
        }
        
        return $classes;
    }

    /**
     * By-pass IPS coding-standards check.
     */
    final protected function dummy()
    {
    }
}

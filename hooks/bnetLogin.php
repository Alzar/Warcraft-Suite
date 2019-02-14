//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

abstract class wowsuite_hook_bnetLogin extends _HOOK_CLASS_
{
	/**
	 * Get all handler classes
	 */
	static public function handlerClasses()
	{
		try
		{
	        $return = parent::handlerClasses();
	        $return[] = 'IPS\wowsuite\Login\Handler\OAuth2\BattleNet';
	
	        return $return;
		}
		catch ( \RuntimeException $e )
		{
			if ( method_exists( get_parent_class(), __FUNCTION__ ) )
			{
				return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
			}
			else
			{
				throw $e;
			}
		}
	}
}

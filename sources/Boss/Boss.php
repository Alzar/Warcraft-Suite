<?php
/**
 * @brief		Boss Model
 * @author		<a href='https://www.faceroll.org/'>Alzar</a>
 * @copyright	(c) Alzar
 * @package		Invision Community
 * @subpackage	Content
 * @since		2 November 2018
 */

namespace IPS\wowsuite;

class _Boss extends \IPS\Node\Model
{
	/**
	* @brief [ActiveRecord] Multiton Store */

     protected static $multitons;
	/**
	* @brief [ActiveRecord] Default Values */

     protected static $defaultValues = NULL;
	/**
	* @brief [ActiveRecord] Database Table */

     public static $databaseTable = 'wowsuite_instance_boss';
	/**
	* @brief [ActiveRecord] Database Prefix */

     public static $databasePrefix = 'boss_';
	/**
	* @brief [Node] Node Title */

	 public static $nodeTitle = 'wowsuite_boss_header';

	 public static $parentNodeColumnId = 'instance';
	 
	 	/**
	 * @brief	[Node] ACP Restrictions
	 * @code
	 	array(
	 		'app'		=> 'core',				// The application key which holds the restrictrions
	 		'module'	=> 'foo',				// The module key which holds the restrictions
	 		'map'		=> array(				// [Optional] The key for each restriction - can alternatively use "prefix"
	 			'add'			=> 'foo_add',
	 			'edit'			=> 'foo_edit',
	 			'permissions'	=> 'foo_perms',
	 			'delete'		=> 'foo_delete'
	 		),
	 		'all'		=> 'foo_manage',		// [Optional] The key to use for any restriction not provided in the map (only needed if not providing all 4)
	 		'prefix'	=> 'foo_',				// [Optional] Rather than specifying each  key in the map, you can specify a prefix, and it will automatically look for restrictions with the key "[prefix]_add/edit/permissions/delete"
	 * @endcode
	 */
	protected static $restrictions = array(
		'app'		=> 'wowsuite',
		'module'	=> 'progression',
		'prefix' 	=> 'progression_',
		'map'		=> array( 'permissions' => 'progression_perms' ),
	);

	/**
	* Get URL
	*
	* @return \IPS\Http\Url */

     public function url()
     {
          return \IPS\Http\Url::internal( 'app=wowsuite&module=progress&controller=boss', 'front', 'wowsuite' );
	 }
	 
	 /**
	 * [Node] Add/Edit Form
	 *
	 * @param	\IPS\Helpers\Form	$form	The form
	 * @return	void
	 */
	public function form( &$form )
	{
		$groups = array();
		foreach ( \IPS\Member\Group::groups() as $k => $v )
		{
			$groups[ $k ] = $v->name;
		}
		$groupsNoGuests = array();
		foreach ( \IPS\Member\Group::groups( TRUE, FALSE ) as $k => $v )
		{
			$groupsNoGuests[ $k ] = $v->name;
		}
				
		$form->addTab( 'boss_settings' );
		$form->addHeader( 'boss_settings' );
		$form->add( new \IPS\Helpers\Form\Text( 'boss_name', $this->id ? $this->name : NULL, TRUE ) );
		$form->add( new \IPS\Helpers\Form\Text( 'boss_abv', $this->id ? $this->name : NULL, TRUE ) );

		$raids = \IPS\wowsuite\Utils\DbUtils::getRaidsArray();

		$form->add(
			new \IPS\Helpers\Form\Select( 'boss_instance', $this->instance ?: 0, TRUE, [
				'options' => $raids
			] )
		);

		$form->add( new \IPS\Helpers\Form\Checkbox( 'boss_normal', $this->normal, FALSE));
		$form->add( new \IPS\Helpers\Form\Checkbox( 'boss_heroic', $this->heroic, FALSE));
		$form->add( new \IPS\Helpers\Form\Checkbox( 'boss_mythic', $this->mythic, FALSE));

		$form->add( new \IPS\Helpers\Form\Url( 'boss_video', $this->id ? $this->video : array(), FALSE, array( 'placeholder' => 'http://www.youtube.com/' ), NULL, NULL, NULL, 'boss_video' ) );
	}

	protected function get__badge()
	{
		\IPS\Output::i()->cssFiles = array_merge( \IPS\Output::i()->cssFiles, \IPS\Theme::i()->css( 'core/badges.css', 'wowsuite', 'admin' ) );
		if($this->mythic) {
			return array(
				0	=> 'ipsBadge ipsBadge_mythic ipsPos_right',
				1	=> 'node_boss_mythic',
			);
		}
		elseif($this->heroic) {
			return array(
				0	=> 'ipsBadge ipsBadge_heroic ipsPos_right',
				1	=> 'node_boss_heroic',
			);
		}
		elseif($this->normal) {
			return array(
				0	=> 'ipsBadge ipsBadge_normal ipsPos_right',
				1	=> 'node_boss_normal',
			);
		}
		else {
			return array(
				0	=> 'ipsBadge ipsBadge_undefeated ipsPos_right',
				1	=> 'node_boss_undefeated',
			);
		}
	}
	
	/**
	 * [Node] Get Title
	 *
	 * @return	string
	 */
	protected function get__title()
	{
		return $this->name;
	}
}
<?php
/**
 * @brief		Specs Model
 * @author		<a href='https://www.faceroll.org/'>Alzar</a>
 * @copyright	(c) Alzar
 * @package		Invision Community
 * @subpackage	Content
 * @since		2 November 2018
 */

namespace IPS\wowsuite;

class _Specs extends \IPS\Node\Model
{
	/**
	* @brief [ActiveRecord] Multiton Store */

     protected static $multitons;
	/**
	* @brief [ActiveRecord] Default Values */

     protected static $defaultValues = NULL;
	/**
	* @brief [ActiveRecord] Database Table */

     public static $databaseTable = 'wowsuite_recruit_spec';
	/**
	* @brief [ActiveRecord] Database Prefix */

     public static $databasePrefix = 'spec_';
	/**
	* @brief [Node] Node Title */

	 public static $nodeTitle = 'wowsuite_spec_header';

	 public static $parentNodeColumnId = 'class';
	 
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
		'module'	=> 'recruitment',
		'prefix' 	=> 'recruitment_',
		'map'		=> array( 'permissions' => 'recruitment_perms' ),
	);

	/**
	* Get URL
	*
	* @return \IPS\Http\Url */

     public function url()
     {
          return \IPS\Http\Url::internal( 'app=wowsuite&module=recruitment&controller=specs', 'front', 'wowsuite' );
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
				
		$form->addTab( 'spec_settings' );
		$form->addHeader( 'spec_settings' );
		$form->add( new \IPS\Helpers\Form\Text( 'spec_name', $this->id ? $this->name : NULL, TRUE ) );
		$form->add( new \IPS\Helpers\Form\Text( 'spec_abv', $this->id ? $this->name : NULL, TRUE ) );

		$classes = \IPS\wowsuite\Utils\DbUtils::getClassesArray();

		$form->add(
			new \IPS\Helpers\Form\Select( 'spec_class', $this->class ?: 0, TRUE, [
				'options' => $classes
			] )
		);

		$form->add( new \IPS\Helpers\Form\Upload( 'spec_icon', $this->icon ? \IPS\File::get( 'spec_Icons', $this->icon ) : NULL, TRUE, array( 'image' => TRUE, 'storageExtension' => 'spec_Icons' ), NULL, NULL, NULL, 'spec_icon' ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'spec_recruiting', $this->recruiting ?: 1 ) );
	}

	protected function get__badge()
	{
		\IPS\Output::i()->cssFiles = array_merge( \IPS\Output::i()->cssFiles, \IPS\Theme::i()->css( 'core/badges.css', 'wowsuite', 'admin' ) );
		if($this->recruiting) {
			return array(
				0	=> 'ipsBadge ipsBadge_open ipsPos_right',
				1	=> 'node_boss_open',
			);
		}
		else {
			return array(
				0	=> 'ipsBadge ipsBadge_closed ipsPos_right',
				1	=> 'node_boss_closed',
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
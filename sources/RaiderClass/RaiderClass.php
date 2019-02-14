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

class _RaiderClass extends \IPS\Node\Model
{
	/**
	* @brief [ActiveRecord] Multiton Store */

	protected static $multitons;
	/**
	* @brief [ActiveRecord] Default Values */

     protected static $defaultValues = NULL;
	/**
	* @brief [ActiveRecord] Database Table */

     public static $databaseTable = 'wowsuite_recruit_class';
	/**
	* @brief [ActiveRecord] Database Prefix */

     public static $databasePrefix = 'class_';
	/**
	* @brief [Node] Node Title */

	 public static $nodeTitle = 'wowsuite_class_header';

	/**
	 * @brief	[Node] Title prefix.  If specified, will look for a language key with "{$key}_title" as the key
	 */
	public static $titleLangPrefix = 'class_';

	public static $subnodeClass = '\IPS\wowsuite\Specs';
	 
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
          return \IPS\Http\Url::internal( 'app=wowsuite&module=recruitment&controller=raiderclass', 'front', 'wowsuite' );
	 }

	 /**
	 * [Node] Add/Edit Form
	 *
	 * @param	\IPS\Helpers\Form	$form	The form
	 * @return	void
	 */
	public function form( &$form )
	{		
		$form->addTab( 'class_settings' );
		$form->addHeader( 'class_settings' );
		$form->add( new \IPS\Helpers\Form\Text( 'class_name', $this->id ? $this->name : NULL, TRUE ) );
		$form->add( new \IPS\Helpers\Form\Text( 'class_abv', $this->id ? $this->abv : NULL, TRUE ) );
	}
	
	/**
	 * [ActiveRecord] Delete Record
	 *
	 * @return	void
	 */
	public function delete()
	{
		\IPS\Db::i()->delete( 'core_follow', array( "follow_app=? AND follow_area=? AND follow_rel_id=?", static::$permApp, static::$permType, $this->_id ) );

		/* Delete lang strings */
		if ( static::$titleLangPrefix )
		{
			\IPS\Lang::deleteCustom( ( static::$permApp !== NULL ) ? static::$permApp : 'core', static::$titleLangPrefix . $this->_id );
		}

		if( isset( static::$descriptionLangSuffix ) )
		{
			\IPS\Lang::deleteCustom( ( static::$permApp !== NULL ) ? static::$permApp : 'core', static::$titleLangPrefix . $this->_id . static::$descriptionLangSuffix );
		}

		\IPS\Db::i()->delete( 'wowsuite_recruit_spec', array('spec_class=?', $this->_id));
		\IPS\Db::i()->delete( 'wowsuite_recruit_class', array('class_id=?', $this->_id));
	}

	
	/**
	 * [Node] Can this node have children?
	 *
	 * @return bool
	 */
	public function canAdd()
	{
		return TRUE;
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
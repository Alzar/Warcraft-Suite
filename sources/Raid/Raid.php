<?php
/**
 * @brief		Raids Model
 * @author		<a href='https://www.faceroll.org/'>Alzar</a>
 * @copyright	(c) Alzar
 * @package		Invision Community
 * @subpackage	Content
 * @since		2 November 2018
 */

namespace IPS\wowsuite;

class _Raid extends \IPS\Node\Model
{
	/**
	* @brief [ActiveRecord] Multiton Store */

     protected static $multitons;
	/**
	* @brief [ActiveRecord] Default Values */

     protected static $defaultValues = NULL;
	/**
	* @brief [ActiveRecord] Database Table */

     public static $databaseTable = 'wowsuite_raid_instances';
	/**
	* @brief [ActiveRecord] Database Prefix */

     public static $databasePrefix = 'raid_';
	/**
	* @brief [Node] Node Title */

	 public static $nodeTitle = 'wowsuite_raids_header';

	/**
	 * @brief	[Node] Title prefix.  If specified, will look for a language key with "{$key}_title" as the key
	 */
	public static $titleLangPrefix = 'raid_';

	public static $subnodeClass = '\IPS\wowsuite\Boss';
	 
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
          return \IPS\Http\Url::internal( 'app=wowsuite&module=progress&controller=raid', 'front', 'wowsuite' );
	 }

	 /**
	 * [Node] Add/Edit Form
	 *
	 * @param	\IPS\Helpers\Form	$form	The form
	 * @return	void
	 */
	public function form( &$form )
	{		
		$form->addTab( 'raid_settings' );
		$form->addHeader( 'raid_settings' );
		$form->add( new \IPS\Helpers\Form\Text( 'raid_name', $this->id ? $this->name : NULL, TRUE ) );
		$form->add( new \IPS\Helpers\Form\Text( 'raid_abv', $this->id ? $this->abv : NULL, TRUE ) );
		$form->add( new \IPS\Helpers\Form\Upload( 'raid_image', $this->image ? \IPS\File::get( 'raid_Images', $this->image ) : NULL, FALSE, array( 'image' => TRUE, 'storageExtension' => 'raid_Images' ), NULL, NULL, NULL, 'raid_image' ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'raid_current_tier', $this->current_tier ?: 0 ) );
	}
	
	/**
	 * [Node] Perform actions after saving the form
	 *
	 * @param	array	$values	Values from the form
	 * @return	void
	 */
	public function postSaveForm( $values )
	{
		if($values['raid_current_tier']) {
			\IPS\Db::i()->update( 'wowsuite_raid_instances', 'raid_current_tier = 0');
			\IPS\Db::i()->update( 'wowsuite_raid_instances', 'raid_current_tier = 1', array( 'raid_id=?', $this->id ));
		}
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

		$tRaid = \IPS\Db::i()->select( '*', 'wowsuite_raid_instances', array('raid_id=?', $this->_id));
		
		foreach($tRaid as $t) {
			$currTier = $t['raid_current_tier'];
		}

		\IPS\Db::i()->delete( 'wowsuite_instance_boss', array('boss_instance=?', $this->_id));
		\IPS\Db::i()->delete( 'wowsuite_raid_instances', array('raid_id=?', $this->_id));

		if($currTier) {
			$raids = \IPS\Db::i()->select( '*', 'wowsuite_raid_instances', 'raid_current_tier = 0 ORDER BY raid_id DESC LIMIT 1');
	
			foreach($raids as $r) {
				$rId = $r['raid_id'];
			}
	
			\IPS\Db::i()->update( 'wowsuite_raid_instances', 'raid_current_tier = 1', array( 'raid_id=?', $rId ));
		}

	}

	protected function get__badge()
	{
		\IPS\Output::i()->cssFiles = array_merge( \IPS\Output::i()->cssFiles, \IPS\Theme::i()->css( 'widgets/recruitment_style.css', 'wowsuite' ) );
		if($this->current_tier) {
			return array(
				0	=> 'ipsBadge ipsBadge_positive',
				1	=> 'node_current_tier',
			);
		}

		return NULL;
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
<?php
/**
 * @brief		progression Widget
 * @author		<a href='https://www.invisioncommunity.com'>Invision Power Services, Inc.</a>
 * @copyright	(c) Invision Power Services, Inc.
 * @license		https://www.invisioncommunity.com/legal/standards/
 * @package		Invision Community
 * @subpackage	wowsuite
 * @since		21 Oct 2018
 */

namespace IPS\wowsuite\widgets;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * progression Widget
 */
class _tier extends \IPS\Widget
{
	/**
	 * @brief	Widget Key
	 */
	public $key = 'tier';
	
	/**
	 * @brief	App
	 */
	public $app = 'wowsuite';
		
	/**
	 * @brief	Plugin
	 */
	public $plugin = '';
	
	/**
	 * Initialise this widget
	 *
	 * @return void
	 */ 
	public function init()
	{
		parent::init();
		\IPS\Output::i()->cssFiles = array_merge( \IPS\Output::i()->cssFiles, \IPS\Theme::i()->css( 'widgets/tier_style.css', 'wowsuite' ) );
	}
	
	/**
	 * Specify widget configuration
	 *
	 * @param	null|\IPS\Helpers\Form	$form	Form object
	 * @return	null|\IPS\Helpers\Form
	 */
	public function configuration( &$form=null )
 	{
 		if ( $form === null )
 		{
	 		$form = new \IPS\Helpers\Form;
		}
		

	    /* Block title */
		$form->add( new \IPS\Helpers\Form\Text( 'tier_widget_title', isset( $this->configuration['tier_widget_title'] ) ? $this->configuration['tier_widget_title'] : \IPS\Member::loggedIn()->language()->addToStack( 'tier_widget_title_default' ) ) );
		$form->add( new \IPS\Helpers\Form\YesNo( 'tier_show_old', isset( $this->configuration['tier_show_old'] ) ? $this->configuration['tier_show_old'] : 0, FALSE, array( 'togglesOn' => array( 'tier_max_old_container' ) ) ) );
		$form->add( new \IPS\Helpers\Form\Text( 'tier_max_old', isset( $this->configuration['tier_max_old'] ) ? $this->configuration['tier_max_old'] : 3 , FALSE, array(), NULL, NULL, NULL, 'tier_max_old_container' ) );
		
		return $form;
 	}
 	
 	 /**
 	 * Ran before saving widget configuration
 	 *
 	 * @param	array	$values	Values from form
 	 * @return	array
 	 */
 	public function preConfig( $values )
 	{
 		return $values;
 	}

	/**
	 * Render a widget
	 *
	 * @return	string
	 */
	public function render()
	{
		$title = isset( $this->configuration['tier_widget_title'] ) ? $this->configuration['tier_widget_title'] : \IPS\Member::loggedIn()->language()->addToStack( 'tier_widget_title_default' );
		$raid = \IPS\Db::i()->select( '*', 'wowsuite_raid_instances', 'raid_current_tier = 1');

		foreach($raid as $r) {
			$id = $r['raid_id'];
		}

		$bosses = \IPS\Db::i()->select( '*', 'wowsuite_instance_boss', array( 'boss_instance=?', $id ));
		$DbUtils = new \IPS\wowsuite\Utils\DbUtils;

		$diffTags = [
			'normal' => 'normal',
			'heroic' => 'heroic',
			'mythic' => 'mythic',
		];

		$showOld = isset( $this->configuration['tier_show_old']) ? $this->configuration['tier_show_old'] : 0;

		if($showOld) {
			$oldRaids = \IPS\Db::i()->select( '*', 'wowsuite_raid_instances', array('raid_current_tier = 0 ORDER BY raid_id DESC LIMIT ?', $this->configuration['tier_max_old']));

			if(count($oldRaids) < 1) {
				$showOld = FALSE;
			}
		}
		else {
			$oldRaids = NULL;
		}

		/* Display */
		return $this->output($title, $raid, $bosses, $diffTags, $DbUtils, $showOld, $oldRaids);
	}
}
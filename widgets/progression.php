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
class _progression extends \IPS\Widget
{
	/**
	 * @brief	Widget Key
	 */
	public $key = 'progression';
	
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
		\IPS\Output::i()->cssFiles = array_merge( \IPS\Output::i()->cssFiles, \IPS\Theme::i()->css( 'widgets/progression_style.css', 'wowsuite' ) );
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
		$form->add( new \IPS\Helpers\Form\Text( 'progression_widget_title', isset( $this->configuration['progression_widget_title'] ) ? $this->configuration['progression_widget_title'] : \IPS\Member::loggedIn()->language()->addToStack( 'progression_widget_title_default' ) ) );
		
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
		$title = isset( $this->configuration['progression_widget_title'] ) ? $this->configuration['progression_widget_title'] : \IPS\Member::loggedIn()->language()->addToStack( 'progression_widget_title_default' );
		$raids = \IPS\Db::i()->select( '*', 'wowsuite_raid_instances', array('raid_id > 0 ORDER BY raid_id DESC'));
		$bosses = \IPS\Db::i()->select( '*', 'wowsuite_instance_boss');
		$DbUtils = new \IPS\wowsuite\Utils\DbUtils;

		$diffTags = [
			'normal' => 'normal',
			'heroic' => 'heroic',
			'mythic' => 'mythic',
		];

		/* Display */
		return $this->output($title, $raids, $bosses, $diffTags, $DbUtils);
	}
}
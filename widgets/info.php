<?php
/**
 * @brief		info Widget
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
 * info Widget
 */
class _info extends \IPS\Widget
{
	/**
	 * @brief	Widget Key
	 */
	public $key = 'info';
	
	/**
	 * @brief	App
	 */
	public $app = 'wowsuite';
		
	/**
	 * @brief	Plugin
	 */
	public $plugin = '';
	
	/**
	 * Initialize this widget
	 *
	 * @return	void
	 */
	public function init()
	{
		
		parent::init();
		\IPS\Output::i()->cssFiles = array_merge( \IPS\Output::i()->cssFiles, \IPS\Theme::i()->css( 'widgets/info_style.css', 'wowsuite' ) );
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
		$form->add( new \IPS\Helpers\Form\Text( 'info_widget_title', isset( $this->configuration['info_widget_title'] ) ? $this->configuration['info_widget_title'] : \IPS\Member::loggedIn()->language()->addToStack( 'info_widget_title_default' ) ) );
		$form->add( new \IPS\Helpers\Form\Text( 'info_widget_disc_link', isset( $this->configuration['info_widget_disc_link'] ) ? $this->configuration['info_widget_disc_link'] : \IPS\Member::loggedIn()->language()->addToStack( 'info_widget_disc_link_default' ) ) );
		
		return $form;
 	}

	/**
	 * Render a widget
	 *
	 * @return	string
	 */
	public function render()
	{
		$title = isset( $this->configuration['info_widget_title'] ) ? $this->configuration['info_widget_title'] : \IPS\Member::loggedIn()->language()->addToStack( 'info_widget_title_default' );
		$discord = isset( $this->configuration['info_widget_disc_link'] ) ? $this->configuration['info_widget_disc_link'] : \IPS\Member::loggedIn()->language()->addToStack( 'info_widget_disc_link_default' );
		
		/* Display */		
		return $this->output($title, $discord);
	}
}
<?php
/**
 * @package		Warcraft Suite
 * @author		<a href='https://faceroll.org'>Alzar</a>
 * @copyright	(c) 2018 Alzar
 */

namespace IPS\wowsuite\widgets;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}


class _recruitment extends \IPS\Widget
{
	/**
	 * @brief	Widget Key
	 */
	public $key = 'recruitment';
	
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
		\IPS\Output::i()->cssFiles = array_merge( \IPS\Output::i()->cssFiles, \IPS\Theme::i()->css( 'widgets/recruitment_style.css', 'wowsuite' ) );
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
		$form->add( new \IPS\Helpers\Form\Text( 'recruitment_widget_title', isset( $this->configuration['recruitment_widget_title'] ) ? $this->configuration['recruitment_widget_title'] : \IPS\Member::loggedIn()->language()->addToStack( 'recruitment_widget_title_default' ) ) );
		$form->add( new \IPS\Helpers\Form\Text( 'recruitment_widget_btn_link', isset( $this->configuration['recruitment_widget_btn_link'] ) ? $this->configuration['recruitment_widget_btn_link'] : \IPS\Member::loggedIn()->language()->addToStack( 'recruitment_widget_btn_link_default' ) ) );
		
		return $form;
 	}

	/**
	 * Render a widget
	 *
	 * @return	string
	 */
	public function render()
	{
		$title = isset( $this->configuration['recruitment_widget_title'] ) ? $this->configuration['recruitment_widget_title'] : \IPS\Member::loggedIn()->language()->addToStack( 'recruitment_widget_title_default' );
		$link = isset( $this->configuration['recruitment_widget_btn_link'] ) ? $this->configuration['recruitment_widget_btn_link'] : \IPS\Member::loggedIn()->language()->addToStack( 'recruitment_widget_btn_link_default' );
		$classes = \IPS\Db::i()->select( '*', 'wowsuite_recruit_class');
		$specs = \IPS\Db::i()->select( '*', 'wowsuite_recruit_spec');
		$date = \IPS\Db::i()->select( '*', 'wowsuite_recruit_date');
		
		/* Display */		
		return $this->output($title, $link, $classes, $specs, $date);
	}
}
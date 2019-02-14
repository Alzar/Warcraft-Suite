<?php


namespace IPS\wowsuite\modules\front\recruitment;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * update
 */
class _update extends \IPS\Dispatcher\Controller
{
	/**
	 * Initialize this widget
	 *
	 * @return	void
	 */
	public function init()
	{
		\IPS\Output::i()->jsFiles = array_merge( \IPS\Output::i()->jsFiles, \IPS\Output::i()->js( 'controllers/progress/ips.progress.update.js', 'wowsuite' ) );
		\IPS\Output::i()->cssFiles = array_merge( \IPS\Output::i()->cssFiles, \IPS\Theme::i()->css( 'modules/recruitment-update.css', 'wowsuite' ) );
		
		parent::init();
	}

	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		parent::execute();
	}

	/**
	 * ...
	 *
	 * @return	void
	 */
	protected function manage()
	{
		$member = \IPS\Member::loggedIn();


		if( $member->group['can_edit_needs'] && \IPS\Member::loggedIn()->member_id ) {
			$form = new \IPS\Helpers\Form;

			$classes = \IPS\Db::i()->select( '*', 'wowsuite_recruit_class' );
			$specs = \IPS\Db::i()->select( '*', 'wowsuite_recruit_spec' );
			
			foreach ( $classes as $class )
			{
				\IPS\Lang::saveCustom('wowsuite', 'class_' . $class['class_abv'], $class['class_name']);
				$form->addTab('class_'.$class['class_abv']);

				foreach ( $specs as $spec ) {
					if ( $spec['spec_class'] == $class['class_id']) {
						\IPS\Lang::saveCustom('wowsuite', 'recruit_'. $class['class_abv'] . '_' . $spec['spec_abv'], $spec['spec_name'] . ' ' . $class['class_name']);
						$form->add( new \IPS\Helpers\Form\Checkbox( 'recruit_'. $class['class_abv'] . '_' . $spec['spec_abv'], $spec['spec_recruiting'], FALSE));
					}
				}
			}

			\IPS\Output::i()->title  = \IPS\Member::loggedIn()->language()->addToStack( '__app_wowsuite' );
			\IPS\Output::i()->output = $form;

			if( $values = $form->values() )
			{
				foreach ( $classes as $class )
				{
					foreach( $specs as $spec )
					{
						if( $spec['spec_class'] == $class['class_id'])
						{
							$save = array(
								'spec_recruiting' =>  $values['recruit_'. $class['class_abv'] . '_' . $spec['spec_abv']]
							);

							\IPS\Db::i()->update( 'wowsuite_recruit_spec', $save, array( 'spec_class=? AND spec_abv=?', $class['class_id'], $spec['spec_abv'] ));
							
							$updated = array(
								'last_updated' => date('m/d/Y')
							);

							\IPS\Db::i()->update( 'wowsuite_recruit_date', $updated, array( 'id=?', '1' ));
							}
					}
				}
			}	
		}
		else {
			\IPS\Output::i()->error( 'recruit_insuf_perms', 'RE001', 403 );
		}
	}
}
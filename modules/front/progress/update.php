<?php


namespace IPS\wowsuite\modules\front\progress;

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

		if( $member->group['can_update_progression'] && \IPS\Member::loggedIn()->member_id ) {
			$raids = \IPS\Db::i()->select( '*', 'wowsuite_raid_instances' );
			$bosses = \IPS\Db::i()->select( '*', 'wowsuite_instance_boss' );
			$diffTags = [
				'normal' => 'normal',
				'heroic' => 'heroic',
				'mythic' => 'mythic',
			];

			$form = new \IPS\Helpers\Form;

			$template = array( call_user_func_array( array( \IPS\Theme::i(), 'getTemplate' ), array( 'forms', 'wowsuite' ) ), 'pupdate' );
			\IPS\Output::i()->cssFiles = array_merge( \IPS\Output::i()->cssFiles, \IPS\Theme::i()->css( 'modules/progression-update.css', 'wowsuite' ) );
			\IPS\Output::i()->title  = \IPS\Member::loggedIn()->language()->addToStack( '__app_wowsuite' );


			foreach ( $raids as $raid )
			{
				\IPS\Lang::saveCustom('wowsuite', 'raid_' . $raid['raid_abv'], $raid['raid_name']);
				$form->addTab('raid_' . $raid['raid_abv']);

				foreach( $bosses as $boss )
				{
					if($boss['boss_instance'] == $raid['raid_id']) {
						$form->addSeparator();
						$form->addMessage($boss['boss_name']);
						foreach($diffTags as $tag) {
							$field = ( new \IPS\Helpers\Form\Checkbox( 'boss_' . $boss['boss_abv'] . '_' . $tag, $boss['boss_' . $tag], FALSE, array(), NULL, "<div class='$tag'></div>"));
							$field->label = ' ';

							$form->add($field);
						}
						$field = ( new \IPS\Helpers\Form\Url( 'boss_' . $boss['boss_abv'] . '_video', $boss['boss_abv'] ? $boss['boss_video'] : array(), FALSE, array( 'placeholder' => 'https://faceroll.org/videos/' ), NULL, NULL, NULL, $boss['boss_abv'] . '_video' ) );
						$field->label = "Kill Video";

						$form->add($field);
					}
				}
			}

			\IPS\Output::i()->output = $form;

			if( $values = $form->values() )
			{
				foreach ( $raids as $raid )
				{
					foreach( $bosses as $boss )
					{
						if( $boss['boss_instance'] == $raid['raid_id'])
						{
							$save = array(
								'boss_video' =>  $values['boss_'. $boss['boss_abv'] . '_video'],
								'boss_normal' =>  $values['boss_'. $boss['boss_abv'] . '_normal'],
								'boss_heroic' => $values['boss_'. $boss['boss_abv'] . '_heroic'],
								'boss_mythic' => $values['boss_'. $boss['boss_abv'] . '_mythic']
							);
						
							\IPS\Db::i()->update( 'wowsuite_instance_boss', $save, array( 'boss_id=?', $boss['boss_id'] ));
						}
					}
				}
			}	
		}
		else {
			\IPS\Output::i()->error( 'progress_insuf_perms', 'RE001', 403 );
		}
	}
}
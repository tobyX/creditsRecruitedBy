<?php
/*
 * +-----------------------------------------+
 * | Copyright (c) 2008 Tobias Friebel       |
 * +-----------------------------------------+
 * | Authors: Tobias Friebel <TobyF@Web.de>	 |
 * +-----------------------------------------+
 * 
 * CC Namensnennung-Keine kommerzielle Nutzung-Keine Bearbeitung
 * http://creativecommons.org/licenses/by-nc-nd/2.0/de/
 * 
 * $Id$
 */

require_once (WCF_DIR . 'lib/system/event/EventListener.class.php');
require_once (WCF_DIR . 'lib/data/user/UserEditor.class.php');

class RecruitedByRegisterListener implements EventListener
{
	/**
	 * @see EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName) 
	{
		if (!GUTHABEN_ENABLE_GLOBAL || GUTHABEN_EARN_PER_REGISTER < 0)
			return;

		switch ($eventName)
		{
			case 'readParameters':
				if ($className == 'RegisterPage' && isset($_GET['recruitedBy']))
				{
					$user = new UserEditor(intval($_GET['recruitedBy']));
					if ($user->userID)
						WCF :: getSession()->register('recruitedBy', $user->username);
				}
			break;
			
			case 'assignVariables':
				WCF :: getTPL()->assign('recruitedBy', WCF :: getSession()->getVar('recruitedBy'));
				WCF :: getTPL()->append('additionalFields', WCF :: getTPL()->fetch('recruitedByRegister'));
			break;
			
			case 'saved':
				$user = new UserEditor(null, null, StringUtil::trim($_REQUEST['recruitedBy']));
				
				if ($user->userID)
				{
					$eventObj->user->updateOptions(array('recruitedBy' => $user->userID));
					Guthaben :: add(GUTHABEN_EARN_PER_REGISTER, 'wcf.guthaben.log.newrecruit', $eventObj->username, '', $user);
				}
			break;
		}
	}
}
?>
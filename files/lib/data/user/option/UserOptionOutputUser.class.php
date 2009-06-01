<?php
/*
 * +-----------------------------------------+
 * | Copyright (c) 2009 Tobias Friebel       |
 * +-----------------------------------------+
 * | Authors: Tobias Friebel <TobyF@Web.de>	 |
 * +-----------------------------------------+
 * 
 * CC Namensnennung-Keine kommerzielle Nutzung-Keine Bearbeitung
 * http://creativecommons.org/licenses/by-nc-nd/2.0/de/
 * 
 * $Id$
 */

require_once (WCF_DIR . 'lib/data/user/option/UserOptionOutput.class.php');
require_once (WCF_DIR . 'lib/data/user/User.class.php');

class UserOptionOutputUser implements UserOptionOutput
{
	/**
	 * @see UserOptionOutput::getShortOutput()
	 */
	public function getShortOutput(User $user, $optionData, $value)
	{
		return $this->getOutput($user, $optionData, $value);
	}

	/**
	 * @see UserOptionOutput::getMediumOutput()
	 */
	public function getMediumOutput(User $user, $optionData, $value)
	{
		return $this->getOutput($user, $optionData, $value);
	}

	/**
	 * @see UserOptionOutput::getOutput()
	 */
	public function getOutput(User $user, $optionData, $value)
	{
		if ($value == 0)
			return '';

		$user = new User($value);
		
		if (!$user->userID)
			return '';
		
		$username = StringUtil::encodeAllChars($user->username);
		return '<a href="index.php?page=User&userID='.$user->userID.'">'.$username.'</a>';
	}
}
?>

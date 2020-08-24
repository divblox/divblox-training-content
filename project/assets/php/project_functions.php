<?php
/*
 * ProjectFunctions is used throughout your project and is loaded by default by divblox
 * When making changes to this file, keep in mind that every back-end process that
 * your project will run will load this file
 * */
include(FRAMEWORK_ROOT_STR . '/assets/php/framework_functions.php');

abstract class ProjectFunctions extends FrameworkFunctions {
	public static function getNewTicketUniqueId() {
		$CandidateStr = self::generateRandomString(24);
		$DoneBool = false;
		while (!$DoneBool) {
			// Divblox query language to load a ticket from the database,
			// based on the UniqueId field
			$ExistingTicketCount = Ticket::LoadByTicketUniqueId($CandidateStr);
			if ($ExistingTicketCount == 0) {
				$DoneBool = true;
			} else {
				$CandidateStr = self::generateRandomString(24);
			}
		}
		return $CandidateStr;
	}

	// Strict typing
	public static function getBreadCrumbsRecursive(Category $CategoryObj = null, $BreadCrumbsArray = []) {
		if (is_null($CategoryObj)) {
			return $BreadCrumbsArray;
		}

		$BreadCrumbsArray[$CategoryObj->CategoryLabel] = $CategoryObj->Id;

		if (is_null($CategoryObj->CategoryParentId) || ($CategoryObj->CategoryParentId < 1)) {
			return $BreadCrumbsArray;
		}

		$ParentCategoryObj = Category::Load($CategoryObj->CategoryParentId);

		return self::getBreadCrumbsRecursive($ParentCategoryObj, $BreadCrumbsArray);

	}

}
<?php
	include("PortfolioMemberManager.php");
	$g_memberMan = new PortfolioMemberManager();
	print("<table cellpadding='5' border='1'><tr>");
	print("<th>pk</th><th>name</th><th>starts</th><th>expires</th><th>numDays</th><th>started</th></tr>");
	foreach ($g_memberMan->users as $user) {
		print("<tr><td>" . $user->pk . "</td>");
		print("<td>" . $user->name . "</td>");
		print("<td>" . $user->starts . "</td>");
		print("<td>" . $user->expires . "</td>");
		print("<td>" . $user->numDays . "</td>");
		print("<td>" . $user->started . "</td></tr>");
	}
	print("</tr></table>");
	$g_date = new DateObj();
	$member = $g_memberMan->findMemberOnQueryString();
	print("Expiration type for member [" . $member . "] is [" . $g_memberMan->getUserExpirationType($member) . "]<br/>");
	$reason = $g_memberMan->authenticate($member);
	print("authentication result is [" . $reason . "]<br/>");
	if ($member != "") {
		$userObj = $g_memberMan->getUser($member);
		print("<br/>userObj starts is " . $userObj->starts);
		print("<br/>userObj expires is " . $userObj->expires);
		print("<br/>userObj started is " . $userObj->started);
		print("<br/>userObj numDays is " . $userObj->numDays);
	}
		
?>	

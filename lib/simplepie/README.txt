Siumplepie is used to grab posts from gregsandell.blogspot.com as an RSS feed, and then re-display them
in jquery-mobile pages.

Greg 2017-07-24

Problem!  After updating the code that uses simplepie (j/pageBlogList.php) it started complaining about not being
able to write to a ./cache directory.  Could not find a solution except to squelch the complaint.  Make this
change:

Line 1773 of lib/simplepie/1.1.3/simplepie.inc reads:

								trigger_error("$cache->name is not writeable", E_USER_WARNING);

Comment the line out.

Another thing:  the individual posts do not display for me on localhost, but work fine in prod.  (Seems to be
a domain of origin issue.)

GJS 2017-07-29
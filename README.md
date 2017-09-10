# gregsandell.com
Website code &amp; resources for http://gregsandell.com

## Development of gregsandell.com

### MAMP
* Start Mamp Pro
* View http://localhost:8888

## Adding new position to resume
For an example, say you are adding a position for Rainbird Sprinklers.

1. In */resume/objResume.php*, add a new entry to the *ResumeManager* object
2. Give the employer a new unique key:  *$pos = $resume->addPosition($globals->Key->rainbird*
3. In */objGlobals.php*, add that key to the *allResumeItems* array of the *GlobalsObj*:  *$this->Key->rainbird,*
4. In the same file, add an analogous entry to *KeyObj*:  *var $rainbird = "rainbird";*

This will update both desktop and mobile versions.

## Adding new Portolio Item
Again, we are adding a portfolio for the position held at Rainbird Sprinklers.

1. Follow all the steps in the previous section (<i>Adding new position to resume</i>) if you haven't already
1. In */objGlobals.php*, add that key to the *allPortfolioItems* array of the *GlobalsObj*:  *$this->Key->rainbird,
1. In */css/cssGlobal.php*, add a class *rainbirdPortolio*, using the pattern used for other clients.  (For example, 
   see the class for the tenx portfolio, in the line that begins with *.<?php print($g_globals->Key->tenx) ?>Portfolio {*.)
   Almost all the portfolios are using the same copied class, but the parameters are there to be modified if
   necessary.  
1. Do the following if you want rainbird's company site as a link in your rainbird portfolio page's sidebar.  In In */objSidebar.php*, in *SidebarPageManager*'s *load()* function, go to the code block beginning with the comment *// External Websites*, and add an entry equivalent to those for other clients (use tenx as an example).
1. In */objSidebar.php*, create a section of code in *SidebarPageManager*'s *load()* function that will specify what links show up in the sidebar for rainbird's portfolio page.  You need to add the line:  *$page = $this->addPage("pageClient_rainbird");*, followed by calls to *$page->addLinkObj()* that add preexisting links that are created in this file.  See code for tenx for an example.
1. Create a new file in */portfolio/pages*.  Copy one of the other files, such
   as named *pageClient_tenx.php*, and name it  named *pageClient_rainbird.php*.  You only need to modify 
   a few places (usually).  
    1. Set the *$g_key* variable to *$g_globals->Key->rainbird.
    2.  Set the *$g_engagementDetails* variable to a blurb describing the work at rainbird.
    3. Set the *$g_title* variable to something useful for SEO, such as *'Greg Sandell - Portfolio - Irrigation';*
1. You need to create a 150x120px thumbnail named *spinklerThumb.png* (or gif, jpg, etc.) and put it in the directory */image/projThumbs*.
   This image will show up in the 'Projects slideshow' that appears in some pages' sidebar.  If your image
   isn't perfect for 150x120, just make it smaller and pad it with transparant margins.  
1. In */portfolio/objSlideshow.php*, in the *load()* function, add your thumb with the *$slideshow->add()*
   function.  It should be somewhere around line 129.
1. Finally the step with all the real work in it:  creating your rainbird portfolio content.  Summary:  create a splash screen, then for each portfolio item, create the main image and a thumbnail image for it.
   	1. In */portfolio/resources*, create a *rainbird* directory with subdirectory *images*.  Splash screen, portfolio items and their thumbs all go in there.
   	2. All the images you create should have the dimensions in the title, such as *homepage_500x290.png*.  This is more of a convention than a requirement.  It is useful because the php functions you use to add the item to the metadata require the image dimensions, and this will keep you from getting confused.
   	2. Consider a scenario one of your portfolio items is a picture of the rainbird homepage, and also you want a rainbird homepage image to be the main splash screen.
   	3. Create *homepage_500x290.png* as the main display item.  These dimensions are a convention that have been adopted over time, because the 1.7 ratio is a good look...but they aren't a requirement.  
   	4. Create a 150x150px thumb called *homepageThumb.png*.  Those dimensions are a requirement.  Typically we don't just make a minature version of the main item, because it won't be legible at 150x150.  Instead, use a zoomed portion of the item for the thumb.  The file name can be whatever you want, though.  No need to put *150x150* in the title, because all thumbs have those dimensions.  
   	5. If you portfolio item is a video, the convention is overlay the */music/resources/play-overlay.png* "play button* image on top of it.  (Do it in gimp, not as an HTML overlay.)
   	5. In */portfolio/objPortfolio.php*, add an entry for rainbird in the *loadData()* function of the *Portfolio* object with a call to *$this->addClient()*.  Look at the signature for *addClient*:   *addClient($key, $client, $url, $linkText, $description, $role, $technologies, $timeframe, $image, $width, $height, $iconImage, $iWidth, $iHeight,$hostedUrl, $hostedState, $lastKey, $nextKey)*.  Let's g through each of these arguments:
   	    1. *$key* will be the rainbird key, *$this->globals->Key->rainbird*
   	    2. *$client* should be a fully worded title for the client (e.g. *Rainbird Sprinkler Corp.*)
   	    3. *$url* should be *rainbird* (TO DO: document this better, why is it called *url*?)
   	    4. *$linkText* should be a user-viewable shortened name of the client, e.g. *Rainbird*.  These will be links in the sidebars to each client portfolio page, and must be short enough to fit in the sidebar.
   	    5. The next four variables are deprecated and can be set to empty strings (*$description* through *$timeframe*)
   	    6. *$image* is set to the full pathname (from root) of that splash image.  In our example that would be */portfolio/resources/rainbird/images/homepage_500x290.png*.  
   	    7. Set *$width* and *$height* accordingly.  Thy must be strings (*"500"* and *"290"*)
   	    8. Four more deprecated args that should all be set to empty strings:  *$iconImage* though *$hostedState*.
   	    9. *$lastKey* and *$nextKey* pertain to the fact that all the portfolio clients are in a large carousel, and you must identify which clients (by their keys) come before and after *rainbird*.  For example, clients Pathfinder, Sears and Ten-X were worked at in that order (earliest to latest).  The settings for the Sears client then, are:  *$lastKey* = *$this->globals->Key->path*, *$nextKey*= *$this->globals->Key->tenx*.  The carousel is in a circle and evntually points back to the first client in time.  Since *rainbird* is the latest client to be added, and *spectrum* is the earliest client in the portfolio, so *$nextKey* would be *$this->globals->Key->spectrum*


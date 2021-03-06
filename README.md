# gregsandell.com
Website code &amp; resources for http://gregsandell.com

## Development of gregsandell.com

### AMPPS
These are instructions that work with MacOs, but should be easily adaptable for a Windows platform.

* Install Ampps
* Next step is to point the Apache server to your site code.  There are supposed to be ways to do this by editing the *httpd.conf* file (see [here](https://www.worldoweb.co.uk/2013/ammps-for-mac-changing-the-apache-document-root-path) for example), but it doesn't work for me.  Instead, solve it with a soft link:
  * Let's assume your site root is at `/Users/gregsandell/Documents/git/Projects/gregsandell.com`
  * In terminal, go to `/Applications/Ampps`
  * Delete the *www* folder/file:  `rm -rf www`
  * Execute:  `ln -s /Users/gregsandell/Documents/git/Projects/gregsandell.com www`
* The site should be available at `http://localhost` with the need for an Apache restart


### MAMP
Most people have stopped using MAMP and switched to Ampps.  But here are the directions I had previously:

* Start Mamp Pro
* View http://localhost:8888

## Adding New Sidebar Tech Logos

It's a little odd, but the sidebar logo code lives in the `portfolio` area.  Perhaps this can be fixed some day.

Instructions:

1. Standard size for logos is 190x150.  Whatever size your logo is, shrink it down and center it within a canvas size of 190x150.
2. Use simple and straightforward naming.  If the logo is about Java 1.6, then call it `java1.6.png`
2. Edit the file `/portfolio/objSlideshow.php`.  Add the new file in the `load()` method.  
4. Retaining alphabetical order according to the file name is desired.
3. Note that the parameter `category` needs to be set.  Currently the category list encompasses: Networking, Server, Front End Framework, Build, Javascript, Language, Deployment, Code Versioning, Presentation, Library, Collaboration, Code Authoring, Code Quality, Markup, Templating, Database, e-Commerce.  
4. The purpose of category is for an improved skills page, that will list tech stack according to category, in the future.  Right now the jQuery mobile page has a skills page based on `/objSkills.php` that is older and more primitive.  The desktop site has no skills page at all. 
5. The url `parameter` will make it possible to set individual links for individual icons, but we aren't doing that yet.  Instead all icons lead to `/technologies/list.php`.  Just copy what the other lines are doing.

## Resume Change:  Top Level Description

Keep in mind that if you change the summary and tech stack paragraphs, you want to change them on the home page too.  TO DO:  have the home page read this directly from objResume.php.

## Adding new position to resume
For an example, say you are adding a position for Rainbird Sprinklers.

1. In `/resume/objResume.php`, add a new entry to the *ResumeManager* object
2. Give the employer a new unique key:  *$pos = $resume->addPosition($globals->Key->rainbird*
3. In `/objGlobals.php`, add that key to the *allResumeItems* array of the *GlobalsObj*:  *$this->Key->rainbird,*
4. In the same file, add an analogous entry to *KeyObj*:  *var $rainbird = "rainbird";*

This will update both desktop and mobile versions.

## Adding new Portolio Item
Again, we are adding a portfolio for the position held at Rainbird Sprinklers.

1. Follow all the steps in the previous section (<i>Adding new position to resume</i>) if you haven't already
1. In */objGlobals.php*, add that key to the *allPortfolioItems* array of the *GlobalsObj*:  *$this->Key->rainbird.  Most likely this is your most recent position, and you want to insert at the front of the list.
1. In */css/cssGlobal.php*, add a class *rainbirdPortfolio*, using the pattern used for other clients.  (For example, 
   see the class for the tenx portfolio, in the line that begins with *.<?php print($g_globals->Key->tenx) ?>Portfolio {*)
   Almost all the portfolios are using the same copied class, but the parameters are there to be modified if necessary.  
1. Do the following if you want rainbird's company site as a link in your rainbird portfolio page's sidebar.  In In */objSidebar.php*, in *SidebarPageManager*'s *load()* function, go to the code block beginning with the comment *// External Websites*, and add an entry equivalent to those for other clients (use tenx as an example).
1. In */objSidebar.php*, create a section of code in *SidebarPageManager*'s *load()* function that will specify what links show up in the sidebar for rainbird's portfolio page.  You need to add the line:  *$page = $this->addPage("pageClient_rainbird");*, followed by calls to *$page->addLinkObj()* that add preexisting links that are created in this file.  See code for tenx for an example.
2. In */portfolio/templatePortfolio.php*, see the *&lt;script&gt; block that sets the javascript *g_projectNames* array.  Following the examples for previous clients, add an entry for *$g_globals->Key->rainbird*.
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
   function. Look for the line with *tenx* and copy/modify it.
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
   	    7. Set *$width* and *$height* accordingly.  They must be strings (*"500"* and *"290"*)
   	    8. Four more deprecated args that should all be set to empty strings:  *$iconImage* though *$hostedState*.
   	    9. *$lastKey* and *$nextKey* pertain to the fact that all the portfolio clients are in a large carousel (which appears in the right rail, bottom, under *Other Clients*), and you must identify which clients (by their keys) come before and after *rainbird*.  For example, clients Pathfinder, Sears and Ten-X were worked at in that order (earliest to latest).  The settings for the Sears client then, are:  *$lastKey* = *$this->globals->Key->path*, *$nextKey*= *$this->globals->Key->tenx*.  The carousel is in a circle and evntually points back to the first client in time.  Since *rainbird* is the latest client to be added, and *spectrum* is the earliest client in the portfolio, so *$nextKey* would be *$this->globals->Key->spectrum*
   	1.  Congrats, you finished adding an *addClient()* call!  Now you need to call *addThumbdoc()* for each rainbird portfolio item.  Here is the signature for *addThumbdoc()*:  *addThumbdoc($key, $image, $thumbImage, $description, $width, $height)*.  Here's how to interpret the args:
   	    1. *$key*: use ordinal numbers 1, 2, 3 etc., as strings.  So your first item should be "1", the second "2", and so on.
   	    2. *$image*: Similar to *$image* in *addClient*, the full path (from website root) to the portfolio item.  But if the item is a YouTube video instead of a graphic image, this will be the YouTube video's url.
   	    3. *$thumbImage*: The full path to the item's thumbnail image.
   	    4. *$description*: Short descriptive text of the item.  It get sets to the *title* attribute of the thumbnail's &lt;a&gt; tag, so it appears as tip text when you mouse over it.
   	    5. *$width* &amp; *$height*: the width and height of the item (not the thumbnail).  These are entered as integers:  1 and 2 instead of "1" and "2".  If the *$image* arg was set to a YouTube video url, then 600 and 400 are good values.

## favicon.ico and other icons

The *favicon* is the image that comes up in the browser address bar for *gregsandell.com*.  This is a file in `.ico` format that is retrieved with this line in *templateMain.php*:

```
<link rel="SHORTCUT ICON" href="/image/icons/favicon.ico" type="image/x-icon" />
```
...so we keep the file in */image/icons*.  Generally the headshot on the home page, in miniature form, is used as the icon.  The image must be 16x16 pixels.  To make it look crisp, it can help to use a Gimp *sharpen* filter on the fullsize pic before bringing it down to 16x16.  Then you can convert it to `.ico` format online with a converter such as [HNET PNG to ICO](https://hnet.com/png-to-ico/).

The browser will be stubborn about updating the icon that it uses for *gregsandell.com*.  To force it to update, add new information to the querystring to the `<link rel` line, for example:

```
<link rel="SHORTCUT ICON" href="/image/icons/favicon.ico?v=2" type="image/x-icon" />
```
...and you would increment the **v** value by one each time you've change the icon.  The browser will start shoding the new icon.

### Apple Touch Icons

These lines also live in *templateMain.php*:

```
	<link href="/image/icons/apple-touch-icon.png" rel="apple-touch-icon" />
	<link href="/image/icons/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
	<link href="/image/icons/apple-touch-icon-167x167.png" rel="apple-touch-icon" sizes="167x167" />
	<link href="/image/icons/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />
```

The Apple Touch icons are thumbnails used by Apple devices/computers.  For example, when you text someone the *gregsandell.com* URL in iMessage, the nice display you get back includes one of those thumbnails.  A similar thing happens when you post a URL in Facebook.  

The expected names and dimensions are:

* **apple-touch-icon.png**: 120x120 *(that's right, the file name does not show the dimensions for this one)*
* **apple-touch-icon-152x152.png**: 152x152
* **apple-touch-icon-167x167.png**: 167x167
* **apple-touch-icon-180x180.png**: 180x180
* 
## Unlinked Parts of Site
 Some sections of the site I don't use any more; they're still live, but there a no (or few) inbound links to them so noone will see them.
 
### /talks
*/talks* is still live and there is one (!) inbound link to it from the sidebar of the */code* page.  */talks/* used to have it's own tab in the header; it got replaced by */music*.

### Old Portfolio Pages
This is a previous iteration of the portfolio section.  It had: 

* A different look (not as polished)
* Screen shots were presented as slideshows
* Lots of process docs, in pdf form, from the client were available
* Breadcrumb links were shown
* Material was iFramed in a *"portfolioPopup"* which showed the user that they were in a new window, with a close button.  It's a cheesy user experience, so I'm not using this approach anywher in the site any more.
* Permissioning was set up so the material could be seen only by people invited to see it
* A 'highlights' page of some of the more interesting of "employment-worthy" documents from various clients
* A page of documents from all clients, arranged by type.  Very little value, it was more of a programming exercise.

All of the pages described above can stil be reached from */portfolio/oldPages/index.php*.

#### Porfolio Permissioning
This involved giving out 'secret' urls to employers, e.g. Sears would be given *http://gregsandell.com/sears*, and this would grant them access to portfolio pages.  

This was managed with these files in */portfolio/oldPages*:  DataObj.php, dbTest.php, PortfolioMemberManager.php, DB.php (lost) and SessionObj.php.  Member access would time out eventually, so (for example) the */sears* token would cease to work after a while.  There was a mysql database involved, and an "email spy" which would send me email whenever a portfolio page was accessed.  This functionality is unrecoverable without new code and a mysql database.

### Old Publications Page
Pretty much the same as current */publications*, but with poorer design, and breadcrumbs.  Still reachable at */portfolio/oldPages/publications.php*.
 
 


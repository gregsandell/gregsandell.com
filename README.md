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



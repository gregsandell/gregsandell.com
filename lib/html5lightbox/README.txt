Changes made to free version of html5lightbox:

Step one:  unminify html5lightbox.js  (site http://unminify.com/ works)

Problem #1
==========
Line 103 reads as follows:

                skinsfoldername: "/lib/skins/default/",
 
Change it to:
                skinsfoldername: "/lib/html5lightbox/7.0/skins/default/",
 

 Problem #2
 ==========
 Line 413 reads as follows:
                    "</div>" + "<div id='html5-image' style='display:none;position:relative;top:0px;left:0px;width:100%;height:100%;" + (inst.options.iequirksmode ? "margin" : "padding") + ":" + inst.options.bordersize + "px;text-align:center;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;'></div>" + "</div>" + "</div>" + "<div id='html5-watermark' style='display:none;position:absolute;left:" + String(inst.options.bordersize + 2) + "px;top:" + String(inst.options.bordersize + 2) + "px;'></div>" + "</div>" + "</div>");
 

 Change it to:
                     "</div>" + "<div id='html5-image' style='display:none;position:relative;top:0px;left:0px;width:100%;height:100%;" + (inst.options.iequirksmode ? "margin" : "padding") + ":" + inst.options.bordersize + "px;text-align:center;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;'></div>" + "</div>" + "</div>" +"</div>");
 

Problem #3
==========
Code tries to load "froogaloop2.min.js"

Line 280 reads as follows:
                tag.src = inst.options.jsfolder + "froogaloop2.min.js";

Comment it out.

Problem #4
==========
Code tries to load "fontello.css"

Lin 291 reads as follows:
            if (inst.options.initsocial) $("head").append('<link rel="stylesheet" href="' + inst.options.jsfolder + 'icons/css/fontello.css" type="text/css" />');

Comment it out.
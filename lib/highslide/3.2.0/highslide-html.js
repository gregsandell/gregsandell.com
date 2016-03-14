/******************************************************************************
Name:    Highslide HTML Extension
Version: 3.2.0 (July 25 2007)
Author:  Torstein H�nsi
Support: http://vikjavev.no/highslide/forum
Email:   See http://vikjavev.no/megsjol

Licence:
Highslide JS is licensed under a Creative Commons Attribution-NonCommercial 2.5
License (http://creativecommons.org/licenses/by-nc/2.5/).

You are free:
	* to copy, distribute, display, and perform the work
	* to make derivative works

Under the following conditions:
	* Attribution. You must attribute the work in the manner  specified by  the
	  author or licensor.
	* Noncommercial. You may not use this work for commercial purposes.

* For  any  reuse  or  distribution, you  must make clear to others the license
  terms of this work.
* Any  of  these  conditions  can  be  waived  if  you  get permission from the 
  copyright holder.

Your fair use and other rights are in no way affected by the above.
******************************************************************************/

hs.allowWidthReduction = false;
hs.allowHeightReduction = true;
hs.objectLoadTime = 'before'; // Load iframes 'before' or 'after' expansion.
hs.cacheAjax = true; // Cache ajax popups for instant display. Can be overridden for each popup.
hs.preserveContent = false; // Preserve changes made to the content and position of HTML popups.

// These properties can be overridden in the function call for each expander:
hs.push(hs.overrides, 'contentId');
hs.push(hs.overrides, 'allowWidthReduction');
hs.push(hs.overrides, 'allowHeightReduction');
hs.push(hs.overrides, 'objectType');
hs.push(hs.overrides, 'objectWidth');
hs.push(hs.overrides, 'objectHeight');
hs.push(hs.overrides, 'objectLoadTime');
hs.push(hs.overrides, 'swfObject');
hs.push(hs.overrides, 'cacheAjax');
hs.push(hs.overrides, 'preserveContent');

// Internal
hs.preloadTheseAjax = new Array;
hs.cacheBindings = new Array;
hs.sleeping = new Array;
hs.cacheCounter = 0;

hs.htmlExpand = function(a, params, custom) {
	if (!hs.$(params.contentId) && !hs.origNodes[params.contentId]) return true;
	
	for (var i = 0; i < hs.sleeping.length; i++) {
		if (hs.sleeping[i] && hs.sleeping[i].a == a) {
			hs.sleeping[i].awake();
			hs.sleeping[i] = null;
			return false;
		}
	}
	try {
		hs.hasHtmlexpanders = true;
    	new HsExpander(a, params, custom, 'html');
		return false;
	} catch (e) {
		return true;
	}	
};

hs.identifyContainer = function (parent, className) {
	for (i = 0; i < parent.childNodes.length; i++) {
    	if (parent.childNodes[i].className == className) {
			return parent.childNodes[i];
		}
	}
};

hs.geckoBug = function(d) { // freezes on DOM access to flash object
	return (!hs.ie && d.className && d.className == 'highslide-body' 
		&& hs.expanders[hs.getWrapperKey(d)] && hs.expanders[hs.getWrapperKey(d)].swfObject);	
};

hs.preloadAjax = function (e) {
	var aTags = document.getElementsByTagName('A');
	var a, re, j = 0;
	for (i = 0; i < aTags.length; i++) {
		a = aTags[i];
		re = hs.isHsAnchor(a);
		if (re && re[0] == 'hs.htmlExpand' && hs.getParam(a, 'objectType') == 'ajax' && hs.getParam(a, 'cacheAjax')) {
			hs.preloadTheseAjax[j] = a;
			j++;
		}
	}
	hs.preloadAjaxElement(0);
};

hs.preloadAjaxElement = function (i) {
	if (!hs.preloadTheseAjax[i]) return;
	var a = hs.preloadTheseAjax[i];
	var orig = hs.getOrigContent(a, hs.getParam(a, 'contentId'));	
	var cache = hs.cloneNode(orig.id);
	var ajax = new HsAjax(a, cache);	
   	ajax.onError = function () { };
   	ajax.onLoad = function () {
   		hs.setId(cache, /-hsOrig$/, 1);
		hs.setId(cache, '-hsCache'+ hs.cacheCounter);
		hs.genContainer();
   		hs.container.appendChild(cache);
   		hs.cacheBindings[cache.id] = a;
   		hs.cacheCounter++;
   		hs.preloadAjaxElement(i + 1);
   	};
   	ajax.run();
};

hs.getCacheBinding = function (a) {
	for (var x in hs.cacheBindings) {
		if (hs.cacheBindings[x] == a) {
			return hs.$(x);
		}
	}
	return false;
};

hs.getOrigContent = function (a, contentId) {
	var cb = hs.getCacheBinding(a);
	if (cb) return cb;
	return hs.origNodes[contentId] ? hs.origNodes[contentId] : hs.$(contentId);
};

HsExpander.prototype.htmlCreate = function () {
	this.origContent = hs.getOrigContent(this.a, this.contentId);
	this.tempContainer = hs.createElement('div', null,
		{
			padding: '0 '+ hs.marginRight +'px 0 '+ hs.marginLeft +'px',
			position: 'absolute',
			left: 0,
			top: 0
		},
		document.body
	);
	this.innerContent = hs.cloneNode(this.origContent.id);
	hs.setId(this.innerContent, /-hsCache[0-9]+/, 1);

    this.setObjContainerSize(this.innerContent);
	this.tempContainer.appendChild(this.innerContent); // to get full width
	hs.setStyles (this.innerContent, { position: 'relative', visibility: 'hidden' });
	this.innerContent.className += ' highslide-display-block';
	
	this.content = hs.createElement(
    	'div',
    	{	className: 'highslide-html' },
		{
			position: 'relative',
			zIndex: 3,
			overflow: 'hidden',
			width: this.thumbWidth +'px',
			height: this.thumbHeight +'px'
		}, null, true
	);
    
	if (this.objectType == 'ajax' && !hs.getCacheBinding(this.a)) {
    	var ajax = new HsAjax(this.a, this.innerContent);
    	var pThis = this;
    	ajax.onLoad = function () {	pThis.onLoad(); };
    	ajax.onError = function () { location.href = hs.getSrc(this.a); };
    	ajax.run();
	}
    else this.onLoad();
};
    
HsExpander.prototype.htmlGetSize = function() {
	var clearing = hs.createElement('div', null, 
		{ clear: 'both', borderTop: '1px solid white' }, this.innerContent, true);
	this.newWidth = this.innerContent.offsetWidth;
    this.newHeight = this.innerContent.offsetHeight;
    this.innerContent.removeChild(clearing);
    if (hs.ie && this.newHeight > parseInt(this.innerContent.currentStyle.height)) { // ie css bug
		this.newHeight = parseInt(this.innerContent.currentStyle.height);
	}
};

HsExpander.prototype.setObjContainerSize = function(parent, auto) {
	if (this.swfObject || this.objectType == 'iframe') {
		var c = hs.identifyContainer(parent, 'highslide-body');
		c.style.width = this.swfObject ? this.swfObject.attributes.width +'px' : this.objectWidth +'px';
		c.style.height = this.swfObject ? this.swfObject.attributes.height +'px' : this.objectHeight +'px';
	}
};

HsExpander.prototype.writeExtendedContent = function () {
	if (this.hasExtendedContent) return;
	this.objContainer = hs.identifyContainer(this.innerContent, 'highslide-body');
	if (this.objectType == 'iframe') {
		if (hs.ie && hs.ieVersion() < 5.5) window.location.href = hs.getSrc(this.a);
		var key = this.key;
		this.iframe = hs.createElement('iframe', { frameBorder: 0 },
		   { width: this.objectWidth +'px', height: this.objectHeight +'px' }, 
		   this.objContainer);
		if (hs.safari) this.iframe.src = null;
		this.iframe.src = hs.getSrc(this.a);
		
		if (this.objectLoadTime == 'after') this.correctIframeSize();
		
	} else if (this.swfObject) {	
		this.objContainer.id = this.objContainer.id || 'hs-flash-id-' + this.key;
		this.swfObject.write(this.objContainer.id);	
	}
	this.hasExtendedContent = true;
};

HsExpander.prototype.correctIframeSize = function () {
	var wDiff = this.innerContent.offsetWidth - this.objContainer.offsetWidth;
    if (wDiff < 0) wDiff = 0;
	var hDiff = this.innerContent.offsetHeight - this.objContainer.offsetHeight;
	hs.setStyles(this.iframe, { width: (this.x.span - wDiff) +'px', height: (this.y.span - hDiff) +'px' });
    hs.setStyles(this.objContainer, { width: this.iframe.style.width, height: this.iframe.style.height });
    
    this.scrollingContent = this.iframe;
    this.scrollerDiv = this.scrollingContent;
};

HsExpander.prototype.htmlSizeOperations = function () {
	this.setObjContainerSize(this.innerContent);
	
	if (this.objectLoadTime == 'before') this.writeExtendedContent();		

    // handle minimum size
    if (this.x.span < this.newWidth && !this.allowWidthReduction) this.x.span = this.newWidth;
    if (this.y.span < this.newHeight && !this.allowHeightReduction) this.y.span = this.newHeight;
    this.scrollerDiv = this.innerContent;
    
    this.mediumContent = hs.createElement('div', null, 
    	{ 
    		width: this.x.span +'px',
    		position: 'relative',
    		left: (this.x.min - this.thumbLeft) +'px',
    		top: (this.y.min - this.thumbTop) +'px'
    	}, this.content, true);
	
    this.mediumContent.appendChild(this.innerContent);
    document.body.removeChild(this.tempContainer);
    hs.setStyles(this.innerContent, { border: 'none', width: 'auto', height: 'auto' });
    
    var node = hs.identifyContainer(this.innerContent, 'highslide-body');
    if (node && !this.swfObject && this.objectType != 'iframe') {    	
		var cNode = node.cloneNode(true); // to get true width
    	
    	node.innerHTML = '';
    	node.id = null;
    	
    	hs.setStyles ( node, 
    		{
    			margin: 0,
    			border: 'none',
    			padding: 0,
    			overflow: 'hidden'
			}
    	);
    	node.appendChild(cNode);
    	
    	var wDiff = this.innerContent.offsetWidth - node.offsetWidth;
    	var hDiff = this.innerContent.offsetHeight - node.offsetHeight;
    	
    	var kdeBugCorr = hs.safari || navigator.vendor == 'KDE' ? 1 : 0; // KDE repainting bug
    	hs.setStyles(node, { 
    			width: (this.x.span - wDiff - kdeBugCorr) +'px', 
    			height: (this.y.span - hDiff + 1) +'px', // add 1px for FF painting bug
    			overflow: 'auto', 
    			position: 'relative' 
    		} 
    	);
		if (cNode.offsetHeight > node.offsetHeight)	{
    		if (kdeBugCorr) node.style.width = (parseInt(node.style.width) + kdeBugCorr) + 'px';
		}
    	this.scrollingContent = node;
    	this.scrollerDiv = this.scrollingContent;
    	
	} 
	
    if (this.iframe && this.objectLoadTime == 'before') this.correctIframeSize();
    if (!this.scrollingContent && this.y.span < this.mediumContent.offsetHeight) this.scrollerDiv = this.content;
	
	if (this.scrollerDiv == this.content && !this.allowWidthReduction && this.objectType != 'iframe') {
		this.x.span += 17; // room for scrollbars
	}
	if (this.scrollerDiv && this.scrollerDiv.offsetHeight > this.scrollerDiv.parentNode.offsetHeight) {
		setTimeout("try { hs.expanders["+ this.key +"].scrollerDiv.style.overflow = 'auto'; } catch(e) {}",
			 hs.expandDuration);
	}
};

HsExpander.prototype.htmlSetSize = function (w, h, x, y, offset, end) {
	try {
		hs.setStyles(this.wrapper, { visibility: 'visible', left: x +'px', top: y +'px'});
		hs.setStyles(this.content, { width: w +'px', height: h +'px' });
		hs.setStyles(this.mediumContent, { left: (this.x.min - x) +'px', top: (this.y.min - y) +'px' });
		
		this.innerContent.style.visibility = 'visible';
		
		if (this.objOutline && this.outlineWhileAnimating) {
			var o = this.objOutline.offset - offset;
			this.positionOutline(x + o, y + o, w - 2*o, h - 2*o, 1);
		}
		
		if (end == 1) setTimeout('try { hs.expanders['+this.key+'].onExpanded(); } catch(e) {}', 0); // jerk in IE
		else if (end == -1) setTimeout('try { hs.expanders['+this.key+'].onEndClose(); } catch(e) {}', 0);
		
	} catch (e) {
		window.location.href = hs.getSrc(this.a);
	}
};

HsExpander.prototype.reflow = function () {
	hs.setStyles(this.scrollerDiv, { height: 'auto', width: 'auto' });
	this.x.span = this.innerContent.offsetWidth;
	this.y.span = this.innerContent.offsetHeight;
	var size = { width: this.x.span +'px', height: this.y.span +'px' };
	hs.setStyles(this.content, size);
	this.positionOutline(this.x.min, this.y.min, this.x.span, this.y.span);
};

HsExpander.prototype.htmlOnClose = function() {
	if (this.objectLoadTime == 'after' && !this.preserveContent) this.destroyObject();		
	if (this.scrollerDiv && this.scrollerDiv != this.scrollingContent) 
		this.scrollerDiv.style.overflow = 'hidden';
	if (this.swfObject) hs.$(this.swfObject.getAttribute('id')).StopPlay();
};

HsExpander.prototype.destroyObject = function () {
	this.objContainer.innerHTML = '';
};

HsExpander.prototype.sleep = function() {
	if (this.objOutline) this.objOutline.table.className = 'highslide-display-none';
	this.wrapper.className += ' highslide-display-none';
	hs.setId(this.content, '-hsSleeping'+ this.key);
	hs.push(hs.sleeping, this);
};

HsExpander.prototype.awake = function() {
	hs.expanders[this.key] = this;
	
	this.wrapper.className = this.wrapper.className.replace(/highslide-display-none/, '');
	var z = hs.zIndexCounter++;
	this.wrapper.style.zIndex = z;
	if (o = this.objOutline) {
		if (!this.outlineWhileAnimating) o.table.style.visibility = 'hidden';
		o.table.className = null;
		o.table.style.zIndex = z;
	}
	hs.setId(this.content, '-hsSleeping'+ this.key, 1);
	this.show();
};

// HsAjax object prototype
HsAjax = function (a, content) {
	this.a = a;
	this.content = content;
};

HsAjax.prototype.run = function () {
	try { this.xmlHttp = new XMLHttpRequest(); }
	catch (e) {
		try { this.xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); }
		catch (e) {
			try { this.xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); }
			catch (e) { this.onError(); }
		}
	}
	this.src = hs.getSrc(this.a);
	if (this.src.match('#')) {
		var arr = this.src.split('#');
		this.src = arr[0];
		this.id = arr[1];
	}
	var pThis = this;
	this.xmlHttp.onreadystatechange = function() {
		if(pThis.xmlHttp.readyState == 4) {	
			if (pThis.id) pThis.getElementContent();
			else pThis.loadHTML();
		}
	};
	
	this.xmlHttp.open("GET", this.src, true);
	this.xmlHttp.send(null);
};

HsAjax.prototype.getElementContent = function() {
	hs.genContainer();
	var attribs = window.opera ? { src: this.src } : null; // Opera needs local src
	this.iframe = hs.createElement('iframe', attribs, 
		{ position: 'absolute', left: '-9999px' }, hs.container);
		
	try {
		this.loadHTML();
	} catch (e) { // Opera security
		var pThis = this;
		setTimeout(function() {	pThis.loadHTML(); }, 1);
	}
};

HsAjax.prototype.loadHTML = function() {
	var s = this.xmlHttp.responseText;
	if (!hs.ie || hs.ieVersion() >= 5.5) {
		s = s.replace(/\s/g, ' ');
		if (this.iframe) {
			var doc = this.iframe.contentDocument || this.iframe.contentWindow.document;
			doc.open();
			doc.write(s.replace(new RegExp('<link[^>]*>', 'gi'), ''));
			doc.close();
			try { s = doc.getElementById(this.id).innerHTML; } catch (e) {}
			hs.container.removeChild(this.iframe);
		} else {
			s = s.replace(new RegExp('^.*?<body[^>]*>(.*?)</body>.*?$', 'i'), '$1');
		}
		
	}
	hs.identifyContainer(this.content, 'highslide-body').innerHTML = s;
	this.onLoad();
};

hs.addEventListener(window, 'load', hs.preloadAjax);
<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$wikiImg = "<img src='/image/wikipediaExternalPage.png' style='border: 0px' alt='External Page' />";

?>
	<link rel="stylesheet" type="text/css" href="techGoogle.css">
	  <h1>Javascript Programming</h1>
      <p class="c1"><span class="c15 c4 c36">Q: What are the features of the Javascript language?</span></p>
      <p class="c1"><span class="c10 c4">A: functions, loose typing, dynamic objects, prototypal inheritance, and object literal notation (comma-separated name/value pairs inside curly brace). The bad ideas include a programming model based on global variables. It is one of the only lambda languages (along with LISP).</span></p>
      <p class="c1"><span class="c36 c15 c4">Q: What makes Javascript a &ldquo;functional language&rdquo;?</span></p>
      <p class="c1"><span class="c10 c4">A: (1) it supports passing functions as arguments to other functions, returning them as the values from other functions, see &nbsp;assigning them to variables or storing them in data structures. (2) It is a lambda language, which means it supports anonymous functions.</span></p>
      <p class="c1"><span class="c8">Q: What datatypes are supported in Javascript?</span></p>
      <p class="c1"><span>A: </span><span class="c10 c4">Number, String, Boolean, Object, Array, undefined</span></p>
      <p class="c1"><span class="c8">Q: Explain how threading works in JavaScript. </span></p>
      <p class="c1"><span class="c4">A: JavaScript is single threaded. Unlike Java where one can use interrupts and yields to pop in and out of code blocks, any method that is running will run until completion. User click events, or setTimeout/setInterval calls that trigger callbacks, pushes those callbacks onto a queue. So if a user clicks while some insanely long method is already executing, there will be a delay before the queued callback gets reached. Also if event bubbling results in single clicks propagating multiple callbacks, they too will be called in order rather than producing a simultaneity that one might erroneously expect. </span></p>
      <p class="c1 c6"><span class="c10 c4"></span></p>
      <h1 class="c22" id="h.88rri8tor4jc"><span class="c27 c12 c29">Objects</span></h1>
      <p class="c1"><span class="c8">Q: Why can an object be created by either &quot;myObj = {}&quot; or &quot;function myObj()&quot;?</span></p>
      <p class="c1"><span class="c4">A: The first creates an object, the second is a constructor, i.e. the recipe for making an object with </span><span class="c2">new myObj()</span></p>
      <p class="c1"><span class="c8">Q: Show two ways of writing a constructor.</span></p>
      <p class="c1"><span class="c4">A: </span><span class="c2">function Bar() { this.method = function() {}; }</span><span class="c4">, which would be call with </span><span class="c2">var bar = new Bar()</span></p>
      <p class="c1"><span class="c4">Or, factory style: </span><span class="c0">function Animal(name) { return { run: function() { &nbsp;alert(name + &quot; is running!&quot;) }</span></p>
      <p class="c1"><span class="c2">&nbsp; }}</span><span class="c4">, then create with </span><span class="c2">var animal = Animal(&lsquo;fox&rsquo;)</span><span class="c4">&nbsp;then </span><span class="c2">animal.run()</span></p>
      <p class="c1"><span class="c8">Q: Give an example of inheritance.</span></p>
      <p class="c1"><span class="c4">A: &nbsp;create an instance, mutate it, create a factory constructor that returns it.<br></span><span class="c0">function Rabbit(name) {</span></p>
      <p class="c1"><span class="c2">&nbsp; &nbsp; &nbsp; var rabbit = Animal(name);</span><span class="c4">&nbsp;// make animal</span></p>
      <p class="c1"><span class="c2">&nbsp; &nbsp; &nbsp; rabbit.bounce = function() {</span><span class="c4">&nbsp;// mutate</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; this.run()</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; alert(name + &quot; bounces to the skies! :)&quot;)</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; &nbsp; }</span></p>
      <p class="c1"><span class="c2">&nbsp; &nbsp; &nbsp; return rabbit</span><span class="c10 c4">&nbsp;// return the result</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;};</span></p>
      <p class="c1"><span class="c0">var rabbit = Rabbit(&quot;rab&quot;)</span></p>
      <p class="c1"><span class="c0">rabbit.bounce()</span></p>
      <p class="c1"><span class="c8">Q: How do you create a private/protected method?</span></p>
      <p class="c1"><span class="c10 c4">A: Any methods not returned by the constructor remain private to the constructor.</span></p>
      <p class="c1 c6"><span class="c10 c4"></span></p>
      <p class="c1 c6"><span class="c10 c4"></span></p>
      <p class="c1"><span class="c8">Q: Explain the purpose of the Object.hasOwnProperty() method.</span></p>
      <p class="c1"><span class="c4">A: Any instance of an object has its own fields plus any of the fields inherited from its prototype. When looping through an object&#39;s fields, often we are only interested in the instance fields, not the prototype members. So inside a </span><span class="c2">for (key in myObj)</span><span class="c4">&nbsp;loop, we want to act only on the fields that pass the </span><span class="c2">myObj.hasOwnProperty(key)</span><span class="c10 c4">&nbsp;test.</span></p>
      <p class="c1"><span class="c8">Q: How do you accomplish object inheritance in Javascript?</span></p>
      <p class="c1"><span class="c4">A: Use </span><span class="c2">Object.create()</span><span class="c10 c4">, passing the parent object as an argument. &nbsp;(Note: ie8 does not support.)</span></p>
      <p class="c1"><span class="c8">Q: What does every object inherit?</span></p>
      <p class="c1"><span class="c4">A: When you say </span><span class="c2">var foo = {}</span><span class="c4">&nbsp;</span><span class="c4">you are actually executing </span><span class="c2">var foo = Object.create(Object.prototype)</span><span class="c4">.</span><span class="c4">&nbsp;You have created an object that inherits from prototype, which has the functions </span><span class="c2">toString(</span><span class="c4">), </span><span class="c2">toLocaleString()</span><span class="c4">, </span><span class="c2">valueOf()</span><span class="c4">, </span><span class="c2">hasOwnProperty()</span><span class="c4">, </span><span class="c2">isPrototypeOf()</span><span class="c4">&nbsp;and </span><span class="c2">isPropertyEnumerable()</span><span class="c10 c4">. It also has the property constructor, which is an object. The prototype of prototype is null.</span></p>
      <p class="c1"><span class="c4">You can actually create an object which does not inherit from prototype with </span><span class="c2">var foo = Object.create(null)</span><span class="c4">. It will not have a </span><span class="c2">toString()</span><span class="c10 c4">&nbsp;function, for example.</span></p>
      <p class="c1"><span class="c4">Note: IE does not have </span><span class="c2">Object.create()</span><span class="c10 c4">.</span></p>
      <p class="c1"><span class="c8">Q: What are Javascript closures? How are they useful?</span></p>
      <p class="c1"><span class="c10 c4">A: A closure is (1) a stack-frame which is not deallocated when the function returns and (2) a kind of object that combines a function along with any local variables that were in-scope at the time that the closure was created.</span></p>
      <p class="c1"><span class="c4">Closures </span><span class="c4 c23">reduce the need to pass state around the application</span><span class="c10 c4">. The inner function has access to the variables in the outer function so there is no need to store the information somewhere that the inner function can get it.</span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <h2 class="c31" id="h.as6lw59t9qiy"><span>t</span><span class="c27 c12 c35">his</span></h2>
      <p class="c1"><span class="c16">Definition</span><span>: &nbsp;&ldquo;when a function executes, it gets the </span><span class="c4">this</span><span>&nbsp;property&mdash;a variable with the value of the object that invokes the function where </span><span class="c4">this</span><span class="c10 c12">&nbsp;is used&rdquo;</span></p>
      <p class="c1"><span>&ldquo;</span><span class="c4">this</span><span class="c10 c12">&nbsp;is used inside a function (let&rsquo;s say function A) and it contains the value of the object that invokes function A.&rdquo;</span></p>
      <p class="c1"><span>&ldquo;</span><span class="c7 c4">this</span><span class="c5">&nbsp;is really just a shortcut reference for the invoking object.&rdquo;</span></p>
      <p class="c1"><span class="c7 c16">Closures are not objects</span><span class="c7">: &nbsp;don&rsquo;t confuse an invoking object with a closure. &nbsp;&ldquo;closures cannot access the outer function&rsquo;s this variable by using the </span><span class="c4 c7">this</span><span class="c7">&nbsp;keyword because the </span><span class="c7 c4">this</span><span class="c5">&nbsp;variable is accessible only by the function itself, not by inner functions. </span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1"><span class="c0">var myObj = {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; foo: &#39;bar&#39;,</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; wow: function() {</span></p>
      <p class="c1"><span class="c2">&nbsp; &nbsp; &nbsp; console.log(&#39;foo is &#39; + this.foo);</span><span class="c5">&nbsp; // prints &lsquo;bar&rsquo;...myObj is the &ldquo;invoking object&rdquo;</span></p>
      <p class="c1"><span class="c2">&nbsp; &nbsp; &nbsp; </span><span class="c2">this.foo = &lsquo;changed&rsquo;;</span><span class="c7">&nbsp; // exists only in wow function</span></p>
      <p class="c1"><span class="c2">&nbsp; &nbsp; &nbsp; function hmm() { &nbsp; &nbsp;</span><span class="c5">// The closure is not the invoker. </span></p>
      <p class="c1"><span class="c5">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;// myObj.foo not available in inner function</span></p>
      <p class="c1"><span class="c2">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;console.log(&#39;foo is &#39; + this.foo);</span><span class="c7">&nbsp; // prints undefined</span></p>
      <p class="c1"><span class="c2">&nbsp; &nbsp; &nbsp; </span><span class="c0">}</span></p>
      <p class="c1"><span class="c2">&nbsp; &nbsp; &nbsp; </span><span class="c0">hmm();</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; }</span></p>
      <p class="c1"><span class="c0">};</span></p>
      <p class="c1"><span class="c0">myObj.wow();</span></p>
      <p class="c1"><span class="c5">Output:</span></p>
      <p class="c1"><span class="c5">foo is bar</span></p>
      <p class="c1"><span class="c7">foo is undefined</span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <h1 class="c22" id="h.pizxta9blvby"><span class="c27 c29 c12">Miscellaneous</span></h1>
      <p class="c1"><span class="c8">Q: What is the difference between == and ===?</span></p>
      <p class="c1"><span>A: </span><span class="c10 c4">The == checks for value equality, but === checks for both type and value.</span></p>
      <p class="c1"><span class="c8">Q: Difference between window.onload and onDocumentReady?</span></p>
      <p class="c1"><span class="c10 c4">A: The onload event does not fire until every last piece of the page is loaded, this includes css and images, which means there&rsquo;s a huge delay before any code is executed. That isn&rsquo;t what we want. We just want to wait until the DOM is loaded and is able to be manipulated. onDocumentReady allows the programmer to do that.</span></p>
      <p class="c1"><span class="c8">4. What is the difference between undefined value and null value?</span></p>
      <p class="c1"><span>A: </span><span class="c10 c4">undefined means a variable has been declared but has not yet been assigned a value. On the other hand, null is an assignment value and is an object. Also, undefined and null are two distinct types: undefined is a type itself (undefined) while null is an object.</span></p>
      <p class="c1 c6"><span class="c10 c4"></span></p>
      <p class="c1"><span class="c8">Q: Explain Number/String coercing:</span></p>
      <p class="c1"><span class="c10 c4">&quot;1&quot; + 2 + 4 = &quot;124&quot;. 2 + 5 + &quot;8&quot; = 78. It goes from left to right, and String has the last word wherever it occurs.</span></p>
      <p class="c1 c6"><span class="c10 c4"></span></p>
      <p class="c1"><span class="c8">Q: What is &quot;this&quot;?</span></p>
      <p class="c1"><span class="c8">TODO this fishy, correct it</span></p>
      <p class="c1"><span class="c4">A: </span><span class="c2">This</span><span class="c4">&nbsp;refers to the owner object of the function that we&#39;re executing. Otherwise, the function&#39;s owner is defined by any closure around that function. If there is no closure, then &#39;this&#39; is the same as &#39;window&#39;. This will also be true for a function defined with an inline event registration such as </span><span class="c2">onClick=myFunc(2,3)</span><span class="c10 c4">.</span></p>
      <p class="c1"><span class="c4">The rules change for HTML element with events registered by copying the function to the event property, such as </span><span class="c2">onClick=someFunc</span><span class="c10 c4">. In this case, the owner of the function is the HTML element.</span></p>
      <p class="c1 c6"><span class="c10 c4"></span></p>
      <p class="c1"><span class="c4">You can override the contents of </span><span class="c2">this</span><span class="c10 c4">&nbsp;with:</span></p>
      <p class="c1"><span class="c2">onClick=myFunc(2,3).bind({foo: 10});</span></p>
      <p class="c1 c6"><span class="c10 c4"></span></p>
      <p class="c1 c6"><span class="c4 c10"></span></p>
      <p class="c1"><span class="c11">Q: What is event bubbling?</span></p>
      <p class="c1"><span class="c4 c14">A: Event bubbling describes the behavior of events in child and parent nodes in the (DOM); that is, all child node events are automatically passed to its parent nodes</span><span class="c40 c4 c41">. </span><span class="c4 c40">You can prevent event bubbling with </span><span class="c2">event.stopPropagation()</span></p>
      <p class="c1 c6"><span class="c10 c4"></span></p>
      <p class="c1"><span class="c8">Q: What is call() and what is apply()?</span></p>
      <p class="c1"><span class="c4">Both </span><span class="c2">call()</span><span class="c4">&nbsp;and </span><span class="c2">apply()</span><span class="c4">&nbsp;are methods that belong to every function. Both are a way of replacing the function&#39;s calling context (i.e. its </span><span class="c2">this</span><span class="c4">) with a different context. &nbsp;Both take the calling context as the first argument, and the following arguments are for passing arguments to that function. With </span><span class="c2">call()</span><span class="c4">&nbsp;they are passed with a variable number of arguments, and with </span><span class="c2">apply()</span><span class="c4">&nbsp;they are passed as an array. &nbsp;(Memory aid: &nbsp;the &ldquo;a&rdquo; in </span><span class="c2">apply</span><span class="c10 c4">&nbsp;stands for array!)</span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1"><span class="c8">Q: Describe the &ldquo;in&rdquo; operator.</span></p>
      <p class="c1"><span class="c4">A. Checking presence of a field in an object. Use </span><span class="c2">if (&#39;foo&#39; in myObj)</span><span class="c4">&nbsp;instead of </span><span class="c2">if (myObj.foo)</span><span class="c10 c4">&nbsp;(which would return false if foo is a zero). &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
      <p class="c1"><span class="c8">Q: Describe how you&#39;d write a singleton</span></p>
      <p class="c1"><span class="c10 c4">A.</span></p>
      <p class="c1"><span class="c0">function Navtree() {</span></p>
      <p class="c1"><span class="c0">if (typeof Navtree.instance === &#39;object&#39;) {</span></p>
      <p class="c1"><span class="c0">return Navtree.instance;</span></p>
      <p class="c1"><span class="c0">}</span></p>
      <p class="c1"><span class="c0">Navtree.instance = this;</span></p>
      <p class="c1 c6"><span class="c10 c4"></span></p>
      <p class="c1"><span class="c8">Q: What is strict mode?</span></p>
      <p class="c1"><span class="c4">A: &nbsp;It is an ES5 feature. &nbsp;It is triggered by </span><span class="c2">&ldquo;use strict;&rdquo;</span><span class="c4">&nbsp;(</span><span class="c16 c4">with</span><span class="c4">&nbsp;the quotes). &nbsp;It guards against: undeclared variables (accidental globals), duplicate argument names, using reserve words, duplicate keys in an object literal, deleting a prototype property, use of deprecated features like </span><span class="c2">with</span><span class="c10 c4">. &nbsp; Violations will result in thrown exceptions.</span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1"><span class="c8">Q: How does javascript handle float precision</span></p>
      <p class="c1"><span class="c4">A: The number has &lsquo;hidden precision&rsquo; out to 16 decimal points. &nbsp;&ldquo;.1 + .2&rdquo; is not equal to .3, it may equal 0.30000000000000004. &nbsp;So beware of </span><span class="c2">==</span><span class="c4">&nbsp;comparisons. Use an epsilon value for a safe comparison: &nbsp;</span><span class="c2">var isEqual = Math.abs((.1 + .2) - .3) &lt; .0000001</span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1"><span class="c15">Q</span><span>: </span><span class="c8">&nbsp;What is the Asynchronous Loop problem?</span></p>
      <p class="c1"><span class="c10 c4">A: &nbsp;Contrary to expectation this will print &lsquo;4&rsquo; five times:</span></p>
      <p class="c1 c9"><span class="c0">for (var i=0; i&lt;4; i++)</span></p>
      <p class="c1 c9"><span class="c0">{</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; var temp = i;</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; setTimeout(function(){</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; &nbsp; &nbsp; console.log(temp); &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; }, 1000);</span></p>
      <p class="c1 c9"><span class="c0">}</span></p>
      <p class="c1"><span class="c10 c4">There are several misleading solutions that look correct but fail to set &lsquo;i&rsquo; to the correct scope. &nbsp;This one works (prints 0,1,2,3,4):</span></p>
      <p class="c1 c9"><span class="c0">for (var i=0; i&lt;4; i++)</span></p>
      <p class="c1 c9"><span class="c0">{</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; (function(num){</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; &nbsp; &nbsp; setTimeout(function(){</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; console.log(num);</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; &nbsp; &nbsp; }, 1000);</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; })(i);</span></p>
      <p class="c1 c9"><span class="c0">}</span></p>
      <p class="c1 c6"><span class="c8"></span></p>
      <p class="c1"><span class="c8">Q: &nbsp;What is the difference between an undeclared variable, and a declared but unassigned variable?</span></p>
      <p class="c1"><span class="c10 c4">A: &nbsp;</span></p>
      <p class="c1 c9"><span class="c2">var bar;</span></p>
      <p class="c1 c9"><span class="c2">console.log(bar);</span><span class="c10 c4">&nbsp;//returns &#39;undefined&#39;</span></p>
      <p class="c1 c9"><span class="c2">console.log(baz)</span><span class="c10 c4">&nbsp;// Uncaught reference error: baz is not defined</span></p>
      <p class="c1 c6"><span class="c8"></span></p>
      <p class="c1"><span class="c8">Q: &nbsp;What are some ES6 Features?</span></p>
      <ul class="c32 lst-kix_3zkpsgye245r-0 start">
         <li class="c1 c17 c9"><span class="c16 c4">Array spread operator</span><span class="c4">: &nbsp;elipsis (&hellip;). &nbsp;Example: &nbsp;</span><span class="c2">foo(...myArray)</span><span class="c4">&nbsp;is same as calling </span><span class="c2">foo(myArray[0], myArray[1], etc.)</span></li>
         <li class="c1 c17 c9"><span class="c16 c4">Object spread operator</span><span class="c4">: (ES7, actually) You can copy an object (shallow only) with </span><span class="c2">var newObj = {...originalObj}</span><span class="c10 c4">. &nbsp;</span></li>
         <li class="c1 c17 c9"><span class="c16 c4">Destructured assignment</span><span class="c4">: </span><span class="c2">[a, b, c] = [1, 2, 3]</span><span class="c10 c4">, a, b and c will be primitives with values 1, 2 and 3.</span></li>
         <li class="c1 c17 c9"><span class="c16 c4">Rest parameters</span><span class="c4">: &nbsp;</span><span class="c2">[a, b, ...theRest] = [1, 2, 3, 4, 5];</span><span class="c4">&nbsp; a and b will be single vars, theRest will be array </span><span class="c2">[3,4,5]</span></li>
         <li class="c1 c17 c9"><span class="c16 c4">Weird destructured assignment:</span><span class="c4">&nbsp; </span><span class="c2">const {cls: extcls} = this.props</span><span class="c4">&nbsp;means take </span><span class="c2">this.props.cls</span><span class="c4">&nbsp;and assign it to variable </span><span class="c2">extcls</span><span class="c10 c4">. &nbsp;I&rsquo;ve seen this in ten-x code.</span></li>
         <li class="c1 c17 c9"><span class="c4">Another weird destructure assignment: &nbsp;</span><span class="c0">import {init as initUser} from &#39;../client/actions/user&#39;</span></li>
         <li class="c1 c17 c9"><span class="c16 c4">Default arguments:</span><span class="c4">&nbsp; </span><span class="c0">const foo = (state = 0) =&gt; { return state }</span></li>
         <li class="c17 c9 c18"><span class="c16 c4">Template literals</span><span class="c4">: &nbsp;</span><span class="c2">`here is my ${foo} string`</span><span class="c10 c4">. &nbsp;Uses backticks.</span></li>
         <li class="c18 c17 c9"><span class="c16 c4">Promises</span><span class="c10 c4">: &nbsp;built-in now, no need to include a library</span></li>
         <li class="c18 c17 c9"><span class="c16 c4 c30">Block-Scoped Constructs Let and Const</span></li>
         <li class="c18 c17 c9"><span class="c16 c4">Fat Arrow functions:</span><span class="c4">&nbsp; Special benefit, allows </span><span class="c15 c4">this</span><span class="c4">&nbsp;to behave properly, i.e., this will have the same value as in the context of the function&mdash;it won&rsquo;t mutate. Instead, typically each time you create a closure, </span><span class="c4 c15">this</span><span class="c10 c4">&nbsp;gets mutated.</span></li>
         <li class="c18 c17 c9"><span class="c16 c4">Multi-line Strings</span><span class="c4">: &nbsp;no need to concatenate strings with </span><span class="c4 c25">+</span><span class="c4">&nbsp;over multiple lines. &nbsp;Contain everything in one set of quotes and no </span><span class="c25 c4">+</span><span class="c10 c4">&nbsp;sign.</span></li>
         <li class="c18 c17 c9"><span class="c16 c4">Object.assign()</span><span class="c4">: &nbsp;a way of cloning and/or merging objects. &nbsp;Given: &nbsp;</span><span class="c2">foo = {wow: &#39;oldwow&#39;, sniff: &#39;oldSniff&#39;}</span><span class="c4">, then </span><span class="c2">Object.assign({}, {wow: &#39;ignoredNewWow&#39;, sniff: &#39;newSniff&#39;}, {wow: &#39;newWow&#39;})</span><span class="c4">&nbsp;will result in </span><span class="c2">{wow: &quot;newWow&quot;, sniff: &quot;newSniff&quot;}</span><span class="c10 c4">. &nbsp;Note how the &ldquo;last assignment wins&rdquo;</span></li>
         <li class="c18 c6 c17 c9"><span class="c10 c4"></span></li>
         <li class="c18 c17 c9"><span class="c16 c4">Classes</span><span class="c4">: &nbsp;Old way of creating a class involved creating a function that uses </span><span class="c15 c4">this</span><span class="c4">&nbsp;assignments and then creating an instance with </span><span class="c2">new myFunc()</span><span class="c4">, aka the Factory Approach. &nbsp;Classes do this as well as allow you to create constructors, and call </span><span class="c2">super()</span><span class="c10 c4">.</span></li>
         <li class="c18 c17 c9"><span class="c16 c4">Native Modules</span><span class="c4">: &nbsp;No more AMD, RequireJS, or CommonJS. &nbsp;Create myModule.js with this content: &nbsp;</span><span class="c2">module.exports = { ...stuff you want to expose&hellip;} and use var mymoduleVar = require(&lsquo;myModule&rsquo;)</span></li>
         <li class="c18 c17 c9"><span class="c2">For-of</span><span class="c4 c16">&nbsp;loops</span></li>
         <li class="c18 c17 c9"><span class="c16 c4">Enhanced Object Literals</span><span class="c10 c4">: &nbsp;I don&rsquo;t know this well; elements can be functions?</span></li>
         <li class="c18 c17 c9"><span class="c16 c4">Using E6 in a transitional world</span><span class="c10 c4">: &nbsp;use Babel as a polyfill for older browsers.</span></li>
         <li class="c18 c17 c9"><span class="c4">Double colon </span><span class="c2">::</span><span class="c4">&nbsp;bind operator: &nbsp;</span><span class="c2">::</span><span class="c2">this</span><span class="c2">.handleStuff</span><span class="c4">&nbsp;does the following ES5 action: </span><span class="c4 c42">&nbsp;</span><span class="c2">this</span><span class="c2">.handleStuff.bind(</span><span class="c2">this</span><span class="c2">)</span></li>
         <li class="c18 c17 c9"><span class="c4">Dynamic object keys. &nbsp;You set </span><span class="c2">var foo = &lsquo;myField&rsquo;</span><span class="c4">&nbsp;and then </span><span class="c2">var myObj = {[foo]: &lsquo;wow&rsquo;}</span><span class="c4">&nbsp;and now </span><span class="c2">myObj.myField</span><span class="c10 c4">&nbsp;has value &lsquo;wow&rsquo;. &nbsp;</span></li>
         <li class="c18 c17 c9"><span class="c2">async</span><span class="c4">&nbsp;and </span><span class="c2">await</span><span class="c4">&nbsp;(ES7, actually): a new way of doing Promises</span></li>
      </ul>
      <p class="c6 c20"><span class="c10 c12"></span></p>
      <p class="c20"><span class="c10 c12">Q: What is the Virtual DOM in React?</span></p>
      <p class="c1"><span class="c10 c12">A: React&rsquo;s local and simplified copy of the HTML DOM. &nbsp;a browser-independent DOM system for performance and cross-browser compatibility. You are creating a virtual DOM element when you create a ReactElement. &nbsp;A ReactElement is a light, stateless, immutable, virtual representation of a DOM Element. &nbsp;The call to ReactDOM.render() is the moment the virtual DOM code is inserted into the real DOM.</span></p>
      <p class="c1"><span class="c10 c12">Q: How does asynchrony work in Javascript:</span></p>
      <p class="c1"><span>A: &nbsp;</span><span class="c27 c26 c12">JavaScript is always synchronous and single-threaded. If you&#39;re executing a JavaScript block of code on a page then no other JavaScript on that page will currently be executed.</span></p>
      <p class="c19"><span class="c26 c12 c27">JavaScript is only asynchronous in the sense that it can make, for example, Ajax calls. The code will stop executing until the call returns (successfully or otherwise), at which point the callback will run synchronously. No other code will be running at this point. It won&#39;t interrupt any other code that&#39;s currently running.</span></p>
      <p class="c19"><span class="c27 c26 c12">JavaScript timers operate with this same kind of callback.</span></p>
      <p class="c19"><span class="c27 c26 c12">Describing JavaScript as asynchronous is perhaps misleading. It&#39;s more accurate to say that JavaScript is synchronous and single-threaded with various callback mechanisms.</span></p>
      <p class="c19"><span class="c26">jQuery has an option on Ajax calls to make them synchronously (with the </span><span class="c21">async: false</span><span class="c26">&nbsp;option). Beginners might be tempted to use this incorrectly because it allows a more traditional programming model that one might be more used to. The reason it&#39;s problematic is that this option will block </span><span class="c26 c15">all</span><span class="c27 c26 c12">&nbsp;JavaScript on the page until it finishes, including all event handlers and timers.</span></p>
      <p class="c1"><span class="c10 c12">Rather than blocking the thread, async code gets pushed to an event queue that fires after all other code executes. It can, however, be difficult for beginners to follow async code.</span></p>
      <p class="c1"><span class="c10 c12">The Event Loop is a queue of callback functions. When an async function executes, the callback function is pushed into the queue. The JavaScript engine doesn&#39;t start processing the event loop until the code after an async function has executed. This means that JavaScript code is not multi-threaded even though it appears to be so. The event loop is a first-in-first-out (FIFO) queue, meaning that callbacks execute in the order they were added onto the queue. </span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1"><span class="c10 c12">timer delay is not guaranteed. Since all JavaScript in a browser executes on a single thread asynchronous events (such as mouse clicks and timers) are only run when there&rsquo;s been an opening in the execution.</span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1"><span class="c10 c12">Q: What does an Ajax request written like in core javascript?</span></p>
      <p class="c1"><span class="c10 c12">A: Let&rsquo;s translate this jQuery code into core javascript:</span></p>
      <p class="c1 c9"><span class="c0">$.ajax({</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; url: &quot;some/url/1&quot;,</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; success: function( data ) {</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; &nbsp; &nbsp; console.log( data );</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; }</span></p>
      <p class="c1 c9"><span class="c0">})</span></p>
      <p class="c1"><span class="c10 c12">Here we go:</span></p>
      <p class="c1 c9"><span class="c2">var xhr = new XMLHttpRequest();</span><span>&nbsp; &nbsp;// note: &nbsp;different solution needed for IE</span></p>
      <p class="c1 c9"><span class="c2">xhr.open( &quot;GET&quot;, &quot;some/ur/1&quot;, true );</span><span>&nbsp; // doesn&rsquo;t send it yet...</span></p>
      <p class="c1 c9"><span class="c0">xhr.onreadystatechange = function( data ) { </span></p>
      <p class="c1 c9"><span class="c2">&nbsp; &nbsp; </span><span>// fires every time </span><span class="c2">readyState</span><span>&nbsp;changes</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; if ( xhr.readyState === 4 ) {</span></p>
      <p class="c1 c9"><span class="c2">&nbsp; &nbsp; &nbsp; &nbsp; console.log( data );</span><span>&nbsp; &nbsp;// callback code executed here</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; }</span></p>
      <p class="c1 c9"><span class="c0">};</span></p>
      <p class="c1 c9"><span class="c2">xhr.send( null ); </span><span>&nbsp;// now it sends. &nbsp;If there is a payload, that replaces null.</span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c20"><span class="c15">Q: &nbsp;Describe the difference between these Array methods: &nbsp;</span><span class="c13 c4">.map</span><span class="c15">, </span><span class="c13 c4">.reduce</span><span class="c15">, and </span><span class="c4 c13">.filter</span></p>
      <p class="c1"><span class="c4">A</span><span>: .map returns an array with as many elements as the input. &nbsp;</span><span class="c4">.</span><span class="c2">filter</span><span>&nbsp;will return only the elements that pass a boolean test. &nbsp;</span><span class="c2">.reduce</span><span>&nbsp;is for cumulative actions such as summing. &nbsp;Here is a </span><span class="c2">.reduce</span><span class="c10 c12">&nbsp;example:</span></p>
      <p class="c1 c9"><span class="c0">var numbers = [1, 2, 3, 4];</span></p>
      <p class="c1 c9"><span class="c0">Var initialTotal = 0</span></p>
      <p class="c1 c9"><span class="c0">var totalNumber = numbers.reduce(function(total, number){</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; return total + number;</span></p>
      <p class="c1 c9"><span class="c0">}, initialTotal);</span></p>
      <p class="c1 c9"><span class="c0">// totalNumber will be 10</span></p>
      <p class="c1"><span>The second arg to </span><span class="c2">.reduce</span><span>&nbsp;is the initial value; the first arg to the function passed to </span><span class="c2">.reduce</span><span class="c10 c12">&nbsp;is for passing the accumulating variable.</span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1"><span>These three methods often appear in chains to get the result you want. &nbsp;For example, if you want to transform the original data AND exclude values, you would run a </span><span class="c2">.filter</span><span>&nbsp;chained to a </span><span class="c2">.map</span><span class="c10 c12">. &nbsp;For example:</span></p>
      <p class="c1 c9"><span class="c0">var numbers = [1, 2, 3, 4];</span></p>
      <p class="c1 c6 c9"><span class="c0"></span></p>
      <p class="c1 c9"><span class="c0">var newNumbers = numbers.filter(function(number){</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; return (number % 2 !== 0);</span></p>
      <p class="c1 c9"><span class="c0">}).map(function(number){</span></p>
      <p class="c1 c9"><span class="c0">&nbsp; &nbsp; return number * 2;</span></p>
      <p class="c1 c9"><span class="c0">});</span></p>
      <p class="c1 c6 c9"><span class="c0"></span></p>
      <p class="c1 c9"><span class="c2">console.log(&quot;The doubled numbers are&quot;, newNumbers); // [2, 6]</span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1"><span class="c8">Q: &nbsp;What is the History of Javascript?</span></p>
      <p class="c1"><span class="c15 c4">A:</span><span class="c10 c12">&nbsp;</span></p>
      <ul class="c32 lst-kix_iaptgywsq2e-0 start">
         <li class="c1 c17 c9"><span class="c10 c4">1995: JavaScript is born as LiveScript</span></li>
         <li class="c1 c17 c9"><span class="c10 c4">1997: ECMAScript standard is established</span></li>
         <li class="c1 c9 c17"><span class="c10 c4">1999: ES3 comes out and IE5 is all the rage</span></li>
         <li class="c1 c17 c9"><span class="c10 c4">2000&ndash;2005: XMLHttpRequest, a.k.a. AJAX, gains popularity in app such as Outlook Web Access (2000) and Oddpost (2002), Gmail (2004) and Google Maps (2005).</span></li>
         <li class="c1 c17 c9"><span class="c10 c4">2009: ES5 comes out (this is what most of us use now) with forEach, Object.keys, Object.create, and standard JSON</span></li>
         <li class="c1 c17 c9"><span class="c10 c4">2015: ES6/ECMAScript2015 comes out; it has mostly syntactic sugar, because people weren&rsquo;t able to agree on anything more ground breaking (ES7?)</span></li>
      </ul>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1"><span class="c8">Q: Write your own string reverse method, without using string.prototype.reverse()</span></p>
      <p class="c1"><span class="c10 c4">A:</span></p>
      <p class="c1"><span class="c0">function reverseString(s) {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;return s.split(&lsquo;&rsquo;).reverse().join(&lsquo;&rsquo;);</span></p>
      <p class="c1"><span class="c0">}</span></p>
      <p class="c1"><span class="c10 c4">Ha ha, I cheated by using Array.prototype.reverse()!</span></p>
      <p class="c1"><span class="c8">Q: No cheating from here on! &nbsp;Write your own string reverse method, with an iterative approach.</span></p>
      <p class="c1"><span class="c10 c12">A:</span></p>
      <p class="c1"><span class="c0">function reverseString(s) {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;var sBuff = [];</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;for (var sBuff i = 0, j = s.length - 1; i &lt; s.length; i++) {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sBuff.push(s[j - i])</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;}</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;return sBuff.join(&#39;&#39;)</span></p>
      <p class="c1"><span class="c0">}</span></p>
      <p class="c1"><span class="c8">Q: Write your own string reverse method, with an iterative approach, but without for().</span></p>
      <p class="c1"><span class="c10 c4">A:</span></p>
      <p class="c1"><span class="c0">function reverseString(s) {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;var sBuff = [];</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;s.split(&#39;&#39;).forEach(function(c) {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sBuff.unshift(c)</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;})</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;return sBuff.join(&#39;&#39;)</span></p>
      <p class="c1"><span class="c0">}</span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1 c6"><span class="c0"></span></p>
      <p class="c1"><span class="c8">Q: Write your own string reverse method, without an iterative approach.</span></p>
      <p class="c1"><span class="c4">A: &nbsp;Using reduce():</span></p>
      <p class="c1"><span class="c0">function reverseString(s) {</span></p>
      <p class="c1"><span class="c0">&nbsp; return s.split(&#39;&#39;).reduce(function(accumulator, result) {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; &nbsp; return result + accumulator;</span></p>
      <p class="c1"><span class="c0">&nbsp; }, accumulator);</span></p>
      <p class="c1"><span class="c0">}</span></p>
      <p class="c1"><span>(But this is a memory hog)</span></p>
      <p class="c1"><span class="c8">Q: Write your own string reverse method using reduce(), but without creating a new string on each callback.</span></p>
      <p class="c1"><span class="c10 c4">A: &nbsp;</span></p>
      <p class="c1"><span class="c0">function reverseString(s) {</span></p>
      <p class="c1"><span class="c0">&nbsp; var accumulator = [];</span></p>
      <p class="c1"><span class="c0">&nbsp; return s.split(&#39;&#39;).reduce(function(accumulator, result) {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; &nbsp; accumulator.unshift(result);</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; &nbsp; return accumulator;</span></p>
      <p class="c1"><span class="c0">&nbsp; }, accumulator).join(&#39;&#39;);</span></p>
      <p class="c1"><span class="c10 c12">}</span></p>
      <p class="c1"><span class="c8">Q: Write reverseString() using recursion.</span></p>
      <p class="c1"><span class="c10 c4">A: </span></p>
      <p class="c1"><span class="c0">function reverseString(s) {</span></p>
      <p class="c1"><span class="c0">&nbsp; return (s === &#39;&#39;) ? &#39;&#39; : reverseString(s.substr(1)) + s.charAt(0);</span></p>
      <p class="c1"><span class="c0">}</span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
      <p class="c1 c6"><span class="c10 c12"></span></p>
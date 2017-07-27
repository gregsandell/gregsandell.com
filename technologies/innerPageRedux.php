<style type="text/css">@import url('https://themes.googleusercontent.com/fonts/css?kit=lhDjYqiy3mZ0x6ROQEUoUw');ol{margin:0;padding:0}table td,table th{padding:0}.c0{background-color:#cfe2f3;color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:11pt;font-family:"Consolas";font-style:italic}.c2{color:#434343;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:14pt;font-family:"Arial";font-style:normal}.c3{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:11pt;font-family:"Arial";font-style:normal}.c16{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:16pt;font-family:"Arial";font-style:normal}.c9{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:26pt;font-family:"Arial";font-style:normal}.c6{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:11pt;font-family:"Arial"}.c1{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:left}.c10{padding-top:0pt;padding-bottom:3pt;line-height:1.15;page-break-after:avoid;text-align:left}.c15{padding-top:16pt;padding-bottom:4pt;line-height:1.15;page-break-after:avoid;text-align:left}.c7{padding-top:18pt;padding-bottom:6pt;line-height:1.15;page-break-after:avoid;text-align:left}.c13{font-weight:400;vertical-align:baseline;font-size:11pt;font-family:"Arial";font-style:normal}.c11{background-color:#cfe2f3;font-family:"Consolas";font-weight:400}.c14{background-color:#ffffff;max-width:468pt;padding:72pt 72pt 72pt 72pt}.c12{color:#1155cc;text-decoration:underline}.c8{color:inherit;text-decoration:inherit}.c4{font-style:italic}.c5{height:11pt}.title{padding-top:0pt;color:#000000;font-size:26pt;padding-bottom:3pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}.subtitle{padding-top:0pt;color:#666666;font-size:15pt;padding-bottom:16pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}li{color:#000000;font-size:11pt;font-family:"Arial"}p{margin:0;color:#000000;font-size:11pt;font-family:"Arial"}h1{padding-top:20pt;color:#000000;font-size:20pt;padding-bottom:6pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h2{padding-top:18pt;color:#000000;font-size:16pt;padding-bottom:6pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h3{padding-top:16pt;color:#434343;font-size:14pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h4{padding-top:14pt;color:#666666;font-size:12pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h5{padding-top:12pt;color:#666666;font-size:11pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h6{padding-top:12pt;color:#666666;font-size:11pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;font-style:italic;orphans:2;widows:2;text-align:left}</style>
<h1 class="techTitle">React Programming</h1>
<br/>
<p class="c1"><span class="c3">Redux provides a store object which maintains the application state, and can notify your React components when state changes. </span></p>
      <h2 class="c7" id="h.mbtciqhciipq"><span class="c16">Step by Step construction of a Redux app</span></h2>
      <p class="c1"><span class="c3">Our app&rsquo;s structure looks like this:</span></p>
      <p class="c1"><span class="c4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">&lt;div&gt;</span></p>
      <p class="c1"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;Input onSubmittingEditing={a function}&gt;</span></p>
      <p class="c1"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;List list={this.props.someData} onClickItem={a function}&gt;</span></p>
      <p class="c1"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;</span></p>
      <p class="c1 c5"><span class="c4 c6"></span></p>
      <p class="c1"><span class="c3">Both of the callback functions contain this:</span></p>
      <p class="c1 c5"><span class="c3"></span></p>
      <p class="c1"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">function callback(someArg) {</span></p>
      <p class="c1"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;this.props.dispatch(actionCreators.someAction(someArg))</span></p>
      <p class="c1"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</span></p>
      <p class="c1"><span>&hellip;where does </span><span class="c11 c4">actionCreators</span><span>&nbsp;come from? &nbsp;How did </span><span class="c11 c4">dispatch()</span><span class="c3">&nbsp;get attached to props?</span></p>
      <p class="c1 c5"><span class="c3"></span></p>
      <p class="c1"><span class="c3">Answer: &nbsp;at the top of our app we have:</span></p>
      <p class="c1"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;import { connect } from &#39;react-redux&#39;</span></p>
      <p class="c1"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;import { actionCreators } from &lsquo;./someOtherJsFile&rsquo;</span></p>
      <p class="c1"><span class="c3">&hellip;and at the bottom:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
      <p class="c1"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">export default connect(state =&gt; ({</span></p>
      <p class="c1"><span class="c0">&nbsp; todos: state.todos,</span></p>
      <p class="c1"><span class="c0">}))(App)</span></p>
      <p class="c1 c5"><span class="c3"></span></p>
      <p class="c1"><span class="c4">someOtherJsFile.js</span><span class="c3">&nbsp;will contain most of our Redux mechanics:</span></p>
      <p class="c1"><span>(1) </span><span class="c4">actionCreators</span><span class="c3">&nbsp;is just a hashmap with our functions&rsquo; names as keys. &nbsp;Their values are functions, but they only prepare the work they do for other functions that will actually act on state.</span></p>
      <p class="c1"><span class="c4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">export const actionCreators = {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;someAction1: arg =&gt; {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return { type: &lsquo;someAction1&rsquo;, payload: arg };</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;},</span></p>
      <p class="c1"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; someAction2: arg =&gt; {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; return { type: &lsquo;someAction2&rsquo;, payload: arg };</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</span></p>
      <p class="c1"><span class="c11 c4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;};</span></p>
      <p class="c1 c5"><span class="c6 c4"></span></p>
      <p class="c1"><span>The real work is done in a &lsquo;cleanroom environment&rsquo; called a </span><span class="c4">reducer</span><span class="c3">. &nbsp;</span></p>
      <p class="c1 c5"><span class="c3"></span></p>
      <p class="c1"><span class="c4">&nbsp; &nbsp; </span><span class="c0">export const reducer = (state = {someData: [&rsquo;foo&rsquo;, &lsquo;bar&rsquo;]}, action) =&gt; {</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; &nbsp; &nbsp; const { someData } = state;</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; &nbsp; &nbsp; const { type, payload } = action;</span></p>
      <p class="c1 c5"><span class="c0"></span></p>
      <p class="c1"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if (type == &lsquo;someFunction1&rsquo;) return {someData: [payload]};</span></p>
      <p class="c1"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if (type == &lsquo;someFunction2&rsquo;) return {</span></p>
      <p class="c1"><span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;someData: someData.filter((todo, i) =&gt; i !== payload)</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; &nbsp; &nbsp; };</span></p>
      <p class="c1"><span class="c0">&nbsp; &nbsp; &nbsp; &nbsp; return someData; &nbsp;// a fail-safe, probably not reached</span></p>
      <p class="c1"><span class="c4 c11">&nbsp; &nbsp; };</span></p>
      <p class="c1 c5"><span class="c6 c4"></span></p>
      <p class="c1"><span>You won&rsquo;t see a call to </span><span class="c4">reducer()</span><span>&nbsp;in your code; that happens through the Redux framework. &nbsp;What gets passed in the action arg is the decomposition of our </span><span class="c4">actionCreator</span><span class="c3">&nbsp;functions.</span></p>
      <p class="c1 c5"><span class="c3"></span></p>
      <p class="c1"><span>Our App uses only one state variable of its own. </span><span class="c4">someData</span><span>, and we are entrusting its manipulation to Redux. &nbsp;We don&rsquo;t update it with any </span><span class="c4">setState()</span><span>&nbsp;calls. &nbsp;We initiate someData in our </span><span class="c4">reducer()</span><span class="c3">&nbsp;definition with a named argument.</span></p>
      <p class="c1 c5"><span class="c3"></span></p>
      <p class="c1"><span>(Note: &nbsp;to make the code as explicit and brief as possible, I&rsquo;ve omitted some standard practices, so see</span><span><a class="c8" href="https://www.google.com/url?q=http://www.react.express/react_redux&amp;sa=D&amp;ust=1501140647282000&amp;usg=AFQjCNESiQvY7HWZp80wqbDDGiB1lpL4CQ">&nbsp;</a></span><span class="c12"><a class="c8" href="https://www.google.com/url?q=http://www.react.express/react_redux&amp;sa=D&amp;ust=1501140647282000&amp;usg=AFQjCNESiQvY7HWZp80wqbDDGiB1lpL4CQ">http://www.react.express/react_redux</a></span><span class="c3">&nbsp;for a better way to write it.)</span></p>
      <p class="c1 c5"><span class="c3"></span></p>
      <p class="c1"><span class="c3">There is also a &lt;List&gt; and &lt;Input&gt; component, but they are completely unaware of Redux, and they don&rsquo;t manipulate state. &nbsp;Most of their important actions are methods defined in &lt;App&gt; and passed in as properties.</span></p>
      <p class="c1 c5"><span class="c3"></span></p>
      <h3 class="c15" id="h.ak2nablrbcu7"><span class="c2">Dan Abramov&rsquo;s tutorial</span></h3>
      <p class="c1"><span>First complete app: &nbsp;step 6,</span><span><a class="c8" href="https://www.google.com/url?q=https://egghead.io/lessons/javascript-redux-store-methods-getstate-dispatch-and-subscribe&amp;sa=D&amp;ust=1501140647283000&amp;usg=AFQjCNEnm_EDjWgAOVxadOjV0LpAxay8Jg">&nbsp;</a></span><span class="c12 c13"><a class="c8" href="https://www.google.com/url?q=https://egghead.io/lessons/javascript-redux-store-methods-getstate-dispatch-and-subscribe&amp;sa=D&amp;ust=1501140647284000&amp;usg=AFQjCNH60J_Bf3FzobdGyV7Kmm7ScebvCw">https://egghead.io/lessons/javascript-redux-store-methods-getstate-dispatch-and-subscribe</a></span></p>
      <p class="c1 c5"><span class="c3"></span></p>
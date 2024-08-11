<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    
<meta name="description" content="@if(isset($pageData['meta_description'])){{$pageData['meta_description']}}@endif">
<meta name="keywords" content="@if(isset($pageData['meta_keyword'])){{$pageData['meta_keyword']}}@endif">
<title>@if(isset($pageData['meta_title'])){{$pageData['meta_title']}}@endif</title>

<meta itemprop="name" content="@if(isset($pageData['meta_title'])){{$pageData['meta_title']}}@endif">
<meta itemprop="description" content="@if(isset($pageData['meta_description'])){{$pageData['meta_description']}}@endif">

<link href="{{url('tfi')}}/assets/css/main.css" rel="stylesheet">

@if(isset($pageData->image))

  <meta itemprop="image" content="{{url('/')}}/media/sm/{{$pageData->image}}">
@elseif(isset($pageData['featured_image']))
  <meta itemprop="image" content="{{url('/')}}/media/sm/{{$pageData['featured_image']}}">
@else
  <meta itemprop="image" content="{{url('/')}}/img/{{getWebsiteOptions()['website_logo']->option_value}}">
@endif

<meta property="og:type" content="article" />
<meta property="og:title" content="@if(isset($pageData['meta_title'])){{$pageData['meta_title']}}@endif" />

<meta property="og:image:type" content="image/jpeg" />
<meta property="og:url" content="{{ Request::url() }}" />
@if(isset($pageData['featured_image']))
  <meta property="og:image" content="{{url('/')}}/media/sm/{{$pageData['featured_image']}}" />
@else
  <meta property="og:image" content="{{url('/')}}/img/{{getWebsiteOptions()['website_logo']->option_value}}" />
@endif

<meta property="og:image:width" content="730" />
<meta property="og:image:height" content="548" />
<meta property="og:description" content="@if(isset($pageData['meta_description'])){{$pageData['meta_description']}}@endif" />
<meta property="og:site_name" content="https://www.giantinflatables.in" />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-zoom.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/css/justifiedGallery.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-thumbnail.css">
	  
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lightgallery-bundle.css">
	  
@if($pageData['search_index'] == 1 && $pageData['search_follow'] == 1)
  <meta name="robots" content="index,follow">
@elseif($pageData['search_index'] == 1 && $pageData['search_follow'] == 0)
  <meta name="robots" content="index,nofollow">
@elseif($pageData['search_index'] == 0 && $pageData['search_follow'] == 0)
  <meta name="robots" content="noindex,nofollow">
@elseif($pageData['search_index'] == 0 && $pageData['search_follow'] == 1)
  <meta name="robots" content="noindex,follow">
@endif


@if(isset($pageData['canonical_url']))
  <link rel="canonical" href="{{$pageData['canonical_url']}}" />
@else
  <link rel="canonical" href="{{ Request::url() }}" />
@endif


<link rel="shortcut icon" href="{{url('/')}}/img/{{getWebsiteOptions()['website_favicon']->option_value}}" type="image/x-icon">

   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('/')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <link rel="stylesheet" href="{{url('sardar')}}/css/all.min.css">
  	<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/slick.css"/>
  	<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/slick-theme.css"/>

  	<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/custom.css"/>
  	<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/button-media.css"/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
				
<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://cse.google.com/cse.js?cx=005070036219886076141:a7fxxahyg3u"></script>

<script>
(function(opts_){/*

Copyright The Closure Library Authors.
SPDX-License-Identifier: Apache-2.0
*/
var g=this||self,k=function(a,b){function d(){}d.prototype=b.prototype;a.l=b.prototype;a.prototype=new d;a.prototype.constructor=a;a.j=function(e,c,f){for(var h=Array(arguments.length-2),q=2;q<arguments.length;q++)h[q-2]=arguments[q];return b.prototype[c].apply(e,h)}},l=function(a){return a};function m(a){if(Error.captureStackTrace)Error.captureStackTrace(this,m);else{var b=Error().stack;b&&(this.stack=b)}a&&(this.message=String(a))}k(m,Error);m.prototype.name="CustomError";var n=function(a,b){a=a.split("%s");for(var d="",e=a.length-1,c=0;c<e;c++)d+=a[c]+(c<b.length?b[c]:"%s");m.call(this,d+a[e])};k(n,m);n.prototype.name="AssertionError";var p=function(a,b,d){if(!a){var e="Assertion failed";if(b){e+=": "+b;var c=Array.prototype.slice.call(arguments,2)}throw new n(""+e,c||[]);}},r=function(a,b){throw new n("Failure"+(a?": "+a:""),Array.prototype.slice.call(arguments,1));};var t;var w=function(a,b){this.h=a===u&&b||"";this.i=v};w.prototype.toString=function(){return"Const{"+this.h+"}"};var x=function(a){if(a instanceof w&&a.constructor===w&&a.i===v)return a.h;r("expected object of type Const, got '"+a+"'");return"type_error:Const"},v={},u={};var z=function(a,b){this.g=b===y?a:""};z.prototype.toString=function(){return this.g+""};
var A=function(a){if(a instanceof z&&a.constructor===z)return a.g;var b=typeof a;r("expected object of type TrustedResourceUrl, got '"+a+"' of type "+("object"!=b?b:a?Array.isArray(a)?"array":b:"null"));return"type_error:TrustedResourceUrl"},E=function(a,b){var d=x(a);if(!B.test(d))throw Error("Invalid TrustedResourceUrl format: "+d);a=d.replace(C,function(e,c){if(!Object.prototype.hasOwnProperty.call(b,c))throw Error('Found marker, "'+c+'", in format string, "'+d+'", but no valid label mapping found in args: '+
JSON.stringify(b));e=b[c];return e instanceof w?x(e):encodeURIComponent(String(e))});return D(a)},C=/%{(\w+)}/g,B=/^((https:)?\/\/[0-9a-z.:[\]-]+\/|\/[^/\\]|[^:/\\%]+\/|[^:/\\%]*[?#]|about:blank#)/i,F=/^([^?#]*)(\?[^#]*)?(#[\s\S]*)?/,J=function(a){var b=G;a=E(H,a);a=A(a).toString();a=F.exec(a);var d=a[3]||"";return D(a[1]+I("?",a[2]||"",b)+I("#",d,void 0))},y={},D=function(a){if(void 0===t){var b=null;var d=g.trustedTypes;if(d&&d.createPolicy)try{b=d.createPolicy("goog#html",{createHTML:l,createScript:l,
createScriptURL:l})}catch(e){g.console&&g.console.error(e.message)}t=b}a=(b=t)?b.createScriptURL(a):a;return new z(a,y)},I=function(a,b,d){if(null==d)return b;if("string"===typeof d)return d?a+encodeURIComponent(d):"";for(var e in d)if(Object.prototype.hasOwnProperty.call(d,e)){var c=d[e];c=Array.isArray(c)?c:[c];for(var f=0;f<c.length;f++){var h=c[f];null!=h&&(b||(b=a),b+=(b.length>a.length?"&":"")+encodeURIComponent(e)+"="+encodeURIComponent(String(h)))}}return b};var aa=/^[\w+/_-]+[=]{0,2}$/;var ba=new w(u,"https://www.google.com/cse/static/style/look/%{versionDir}%{versionSlash}%{theme}.css"),K=new w(u,"https://www.google.com/cse/static/element/%{versionDir}%{versionSlash}default%{experiment}+%{lang}.css"),H=new w(u,"https://www.google.com/cse/static/element/%{versionDir}%{versionSlash}cse_element__%{lang}.js"),L=new w(u,"/");window.__gcse=window.__gcse||{};window.__gcse.ct=Date.now();
window.__gcse.scb=function(){var a=window.__gcse;M()||delete opts_.rawCss;var b=ca(a.initializationCallback||a.callback);google.search.cse.element.init(opts_)&&("explicit"!==a.parsetags?"complete"===document.readyState||"interactive"===document.readyState?(google.search.cse.element.go(),b&&b()):google.setOnLoadCallback(function(){google.search.cse.element.go();b&&b()},!0):b&&b())};function ca(a){return"function"===typeof a?a:"string"===typeof a&&"function"===typeof window[a]?window[a]:null}
function M(){return!(window.__gcse&&window.__gcse.plainStyle)}
function N(a){var b=document.createElement("link");b.type="text/css";a:{try{var d=b&&b.ownerDocument,e=d&&(d.defaultView||d.parentWindow);e=e||g;if(e.Element&&e.Location){var c=e;break a}}catch(h){}c=null}if(c&&"undefined"!=typeof c.HTMLLinkElement&&(!b||!(b instanceof c.HTMLLinkElement)&&(b instanceof c.Location||b instanceof c.Element))){c=typeof b;if("object"==c&&null!=b||"function"==c)try{var f=b.constructor.displayName||b.constructor.name||Object.prototype.toString.call(b)}catch(h){f="<object could not be stringified>"}else f=
void 0===b?"undefined":null===b?"null":typeof b;r("Argument is not a %s (or a non-Element, non-Location mock); got: %s","HTMLLinkElement",f)}b.rel="stylesheet";p(a instanceof z,'URL must be TrustedResourceUrl because "rel" contains "stylesheet"');b.href=A(a).toString();a:{a=(b.ownerDocument&&b.ownerDocument.defaultView||g).document;if(a.querySelector&&(a=a.querySelector('style[nonce],link[rel="stylesheet"][nonce]'))&&(a=a.nonce||a.getAttribute("nonce"))&&aa.test(a))break a;a=""}a&&b.setAttribute("nonce",
a);return b};var O,G=opts_.usqp?{usqp:opts_.usqp}:{},P=opts_.language.toLowerCase();O=opts_.cselibVersion?J({versionDir:opts_.cselibVersion,versionSlash:L,lang:P}):J({versionDir:"",versionSlash:"",lang:P});var Q=window.__gcse.scb,R=document.createElement("script");R.src=A(O);var S,T,U=(R.ownerDocument&&R.ownerDocument.defaultView||window).document,V=null===(T=U.querySelector)||void 0===T?void 0:T.call(U,"script[nonce]");(S=V?V.nonce||V.getAttribute("nonce")||"":"")&&R.setAttribute("nonce",S);R.type="text/javascript";
Q&&(R.onload=Q);document.getElementsByTagName("head")[0].appendChild(R);if(M()){document.getElementsByTagName("head")[0].appendChild(N(opts_.cselibVersion?E(K,{versionDir:opts_.cselibVersion,versionSlash:L,experiment:"",lang:opts_.language}):E(K,{versionDir:"",versionSlash:"",experiment:"",lang:opts_.language})));var W,X=opts_.uiOptions.cssThemeVersion||2,Y=opts_.theme.toLowerCase(),Z=X?"v"+X:Y.match(/v2_/g)?"v2":"",da=Y.replace("v2_","");W=E(ba,{versionDir:Z,versionSlash:Z?L:"",theme:da});document.getElementsByTagName("head")[0].appendChild(N(W))};
})({
 "cx": "005070036219886076141:a7fxxahyg3u",
 "language": "en",
 "theme": "V2_DEFAULT",
 "uiOptions": {
   "resultsUrl": "",
   "enableAutoComplete": true,
   "enableImageSearch": false,
   "imageSearchLayout": "popup",
   "resultSetSize": "filtered_cse",
   "enableOrderBy": true,
   "orderByOptions": [{
     "label": "Relevance",
     "key": ""
   }, {
     "label": "Date",
     "key": "date"
   }],
   "overlayResults": true,
   "webSearchExtendedRestricts": {
     "cr": "countryIN",
     "gl": "in"
   },
   "imageSearchExtendedRestricts": {
     "cr": "countryIN",
     "gl": "in"
   },
   "enableHistory": false,
   "numTopRefinements": -1,
   "hideElementBranding": false,
   "cssThemeVersion": 4,
   "isSafeSearchActive": false
 },
 "protocol": "https",
 "rawCss": ".gsc-control-cse{font-family:arial, sans-serif}.gsc-control-cse .gsc-table-result{font-family:arial, sans-serif}.gsc-refinementsGradient{background:linear-gradient(to left,rgba(255,255,255,1),rgba(255,255,255,0))}",
 "cse_token": "AJvRUv3rbYoQSubT2DpY9QxLgnEF:1634381452205",
 "isHostedPage": false,
 "exp": ["csqr", "cc"],
 "cselibVersion": "cc267ab8871224bd",
 "usqp": "CAI\u003d"
});

</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141287418-1"></script>


<link rel="stylesheet" href="{{url('lightjs')}}/css/lightgallery.css">

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6142d467a2a5620019d2708a&product=sop' async='async'></script>
<?php

  $headerCode = DB::table('custom_codes')->where('type', 'header-code')->first();
  echo $headerCode->description;
?>

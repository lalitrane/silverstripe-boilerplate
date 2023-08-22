<!DOCTYPE html>
<!--
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
-->

<!--[if !IE]><!-->
<html lang="$ContentLocale">
<!--<![endif]-->
<!--[if IE 6 ]><html lang="$ContentLocale" class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html lang="$ContentLocale" class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="$ContentLocale" class="ie ie8"><![endif]-->
<head>
	
<% base_tag %>
<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> <% if $URLSegment == 'home' %> <% else %>- $SiteConfig.Title<% end_if %></title>
<meta charset="utf-8">
 <% with $SiteConfig %>
 <% if $headcode %>
 $headcode
<% end_if %>
<% if $favicon %>
 <link rel="shortcut icon" href="$favicon.URL" />
<% end_if %>
<% end_with %>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <% if $MetaImage.URL %>
<meta property="og:image" content="$MetaImage.URL" />
<% end_if %>
	
	$MetaTags(false)
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<%-- <% require themedCSS('reset') %> --%>
	<%-- <% require themedCSS('typography') %> --%>

		<% require themedCSS('main') %>

</head>
<body onload="offCanvas()" class="$ClassName.ShortName<% if not $Menu(2) %> no-sidebar<% end_if %>" <% if $i18nScriptDirection %>dir="$i18nScriptDirection"<% end_if %> >
<% include Header %>
<div class="main" role="main">
		$Layout

</div>

<% include Footer %>

<% require themedJavascript('main') %>

<script>
	AOS.init();
  </script>
</body>
</html>

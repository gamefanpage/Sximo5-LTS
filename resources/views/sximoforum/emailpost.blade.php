<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
<h2>Hello Admin , </h2>

<p> Someone has posting to <b> Sximo Forum </b> . here are detail post</p>
<hr/>
<h4> {{ $Title }}</h4>

<div>
	<?php echo SiteHelpers::BBCode2Html (strip_tags ($Content)); ?>
</div>
<hr/>
<p>
	Detail post can be found here <a href="{{ url('sximoforum/post/'.$PostID)}}">{{ url('sximoforum/post/'.$PostID)}}</a>
</p>

<p> Thank You </p><br/><br/>

{{ CNF_APPNAME }}
</body>
</html>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
<h2>Hello {{ $username }} , </h2>

<p> Someone has replying your post/comment on <b> Sximo Forum </b></p>
<hr/>
<div>
	<?php echo SiteHelpers::BBCode2Html (strip_tags ($Comment)); ?>
</div>
<hr/>

<p>
	Detail post can be found here <a href="{{ url('sximoforum/post/'.$PostID)}}">{{ url('sximoforum/post/'.$PostID)}}</a>
</p>

<p> Thank You </p><br/><br/>

{{ CNF_APPNAME }}
</body>
</html>
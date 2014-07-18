<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" />
	<title>Disqus</title>
</head>
<body>
	<div id="disqus_thread"></div>
	<script type="text/javascript">
		var disqus_shortname = 'rockodev0';
		var disqus_url = '<?php echo $_GET['url']; ?>';
		;(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	</script>
	<noscript>Debes tener activado Javascript para poder ver los comentarios</noscript>
</body>
</html>
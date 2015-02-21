<?php

require_once ('scraper.php');

$res = scrape();


$page_title = 'Is there a boat in Fenit ?';

$page_desc = 'Is There A Boat In Fenit Dot Com';

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $page_title ?></title>

  <style type="text/css">
	html, body {
		height: 100%;
		width: 100%;
		margin: 0;
		padding: 0;
	}
	body {
		text-align: center;
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	}

	h1#answer {
		display: inline-block;
		margin-top: 160px;
		font-weight: bold;
		font-size: 120pt;
		text-decoration: none;
		color: #252525;
		margin-bottom: 0px;
	}

	h2#legend {
		margin-top: 20px;
		font-size: 12pt;
		color: #999;
		font-weight: lighter;
	}

	footer {
		position: absolute;
		bottom: 10px;
		text-align: center;
		width: 100%;
		margin-top: 2px;
		vertical-align: middle;
	}

	footer a {
		text-decoration: none;
		color: #999;
	}

	footer a span {
		color: #ff3867;
		display: inline-block;
		animation: beat 10s infinite;
		transform-origin: center;
	}

	@keyframes beat {
	50% { /*transform: scale(1.2);*/
	color:red;
	}
	}

  </style>
  
  		<!--Twitter'in -->
		<meta name="twitter:card" content="photo">
		<meta name="twitter:url" content="http://IsThereABoatInFenit.com">
		<meta name="twitter:domain" content="IsThereABoatInFenit.com">
		<meta name="twitter:site" content="@voolist">
		<meta name="twitter:description" content="<?php echo $page_desc ?>" />
		<meta name="twitter:creator" content="@voolist">
		<meta name="twitter:title" content="<?php echo $page_title ?>">
		<meta name="twitter:image" content="<?php echo $res['vessels'][0]['img'] ?>">
		
		<!-- facebook'in -->
		<meta property="og:title" content="<?php echo $page_title ?>" />
		<meta property="og:description" content="<?php echo $page_desc ?>" />
		<meta property="og:image" content="<?php echo $res['vessels'][0]['img'] ?>" />
		<meta property="og:url" content="http://IsThereABoatInFenit.com" />
		<meta property="og:locale" content="en_GB" />


</head>

<body>
  <h1 id="answer">
  	<?php echo $res['vesselCount'] > 0 ? "Yes" : "No"; ?>
</h1>

<h2 id="legend">
	<?php echo $res['vesselCount'] > 0 ? "Her name is <strong>" . $res['vessels'][0]['name'] . "</strong> and she's a fine thing, " . $res['vessels'][0]['size']['l'] . " meters long and " . $res['vessels'][0]['size']['b'] . " meters wide !" : ''; ?>
</h2>

<footer>
<a href="http://vool.ie">Made with <span>❤</span> in Fenit</a>
</footer>

<script>
	(function(i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] ||
		function() {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o), m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-59747294-1', 'auto');
	ga('send', 'pageview');

</script>

</body>
</html>
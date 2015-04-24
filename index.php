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
		z-index:100;
	}

	footer a {
		text-decoration: none;
		color: #999;
		background: rgba(255, 255, 255, 0.3);
		padding:10px 20px;
		-webkit-border-top-left-radius: 10px;
		-webkit-border-top-right-radius: 10px;
		-moz-border-radius-topleft: 10px;
		-moz-border-radius-topright: 10px;
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
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
	
	.modalDialog {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(52, 152, 219, 0.5);
    z-index: 99;
    opacity:0;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    pointer-events: none;
    background-image: url(wave_bg.png);
	}
	
	.modalDialog:target {
	    opacity:1;
	    pointer-events: auto;
	}
	
	.modalDialog > div {
	    width: 600px;
	    position: relative;
	    margin: 5% auto;
	    padding: 5px 20px 13px 20px;
	    background: #fff;
	          box-shadow: 0 5px 5px 0 rgba(0, 0, 1, 0.4);
	
	}
	.close {
	    background: #c0392b;
	    color: #FFFFFF;
	    line-height: 25px;
	    position: absolute;
	    right: -12px;
	    text-align: center;
	    top: -10px;
	    width: 24px;
	    text-decoration: none;
	    font-weight: bold;
	    -webkit-border-radius: 12px;
	    -moz-border-radius: 12px;
	    border-radius: 12px;
	    -moz-box-shadow: 1px 1px 3px #000;
	    -webkit-box-shadow: 1px 1px 3px #000;
	    box-shadow: 1px 1px 3px #000;
	}
	.close:hover {
	    background: #e74c3c;
	}
	
	a.showboat{
		text-decoration:none;
	}
	
	.modalDialog img {
		width:100%;
	}
	
	.modalDialog h2 {
		text-align:left;
		color:#2c3e50;
	}
	
	.modalDialog a.sealink {
		background-color:#2980b9;
		color:#fff;
		padding:5px;
		text-decoration:none;
		display:block;
		margin-top:10px;
	}
	
	.modalDialog a.sealink:hover {
		background-color:#27ae60;
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
		<meta name="twitter:image" content="http://isthereaboatinfenit.com/image.png">
		
		<!-- facebook'in -->
		<meta property="og:title" content="<?php echo $page_title ?>" />
		<meta property="og:description" content="<?php echo $page_desc ?>" />
		<meta property="og:image" content="http://isthereaboatinfenit.com/image.png" />
		<meta property="og:url" content="http://IsThereABoatInFenit.com" />
		<meta property="og:locale" content="en_GB" />


</head>

<body>

<?php echo $res['vesselCount'] > 0 ? '<a href="#showBoat" class="showboat">' : ''; ?>
	
	<h1 id="answer">
	  	<?php echo $res['vesselCount'] > 0 ? "Yes" : "No"; ?>
	</h1>
	
	<h2 id="legend">
		<?php echo $res['vesselCount'] > 0 ? "Her name is <strong>" . $res['vessels'][0]['name'] . "</strong> and she's a fine thing, " . $res['vessels'][0]['size']['l'] . " meters long and " . $res['vessels'][0]['size']['b'] . " meters wide !" : ''; ?>
	</h2>

<?php echo $res['vesselCount'] > 0 ? '</a>' : ''; ?>


<!-- Modal -->

<div id="showBoat" class="modalDialog">
    <div>	<a href="#close" title="Close" class="close">X</a>
			<h2><?php echo $res['vessels'][0]['name'] ?></h2>
			<img src="<?php echo $res['vessels'][0]['img'] ?>" />
			<a href="<?php echo $res['vessels'][0]['link'] ?>" class="sealink" target="_blank"> View vessel on marinetraffic.com</a>
    </div>
</div>

<footer>
<a href="http://www.vool.ie/is-there-a-boat-in-fenit-dot-com/" target="_blank">Made with <span>❤</span> in Fenit</a>
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
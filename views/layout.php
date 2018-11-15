<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9984217952342812",
    enable_page_level_ads: true
  });
</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Nunito:700,700i" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="If you need help finishing your crossword, Crossword buddy is the fastest and easiest crossword solver available">
<title><?php if (isset($controller) && $controller == 'results') { echo 'Results | Crossword Buddy';} else { echo 'A Comprehensive, Free Crossword Solver | Crossword Buddy';} ?></title>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#23b5d3",
      "text": "#ffffff"
    },
    "button": {
      "background": "#0b4f6c",
      "text": "#ffffff"
    }
  },
  "theme": "edgeless"
})});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100430404-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body>

<header>
	<h1><a id="title" href="index.php">crossword buddy</a></h1>
</header>

<div id="wrapper">
	<div id="background">
	</div>
<?php require('routes.php'); ?>
</div>
</body>
</html>
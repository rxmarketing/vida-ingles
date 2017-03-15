<?php
	header("Content-Type: application/rss+xml; charset=ISO-8859-1");
	echo '<?xml version="1.0" encoding="ISO-8859-1" ?>
	<?xml-stylesheet type="text/xsl" media="screen" href="/~d/styles/rss2full.xsl"?>
	<?xml-stylesheet type="text/css" media="screen" href="http://feeds.feedburner.com/~d/styles/itemcontent.css"?>
	<rss
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	xmlns:feedburner="http://rssnamespace.org/feedburner/ext/1.0"
	version="2.0">
	<channel>
	<title>Vida Ingles</title>
	<link>http://vidaingles.com</link>
	<description>Vida Ingles es para estudiantes y maestro de Ingles. Ofrece lecciones, ejercicios de gramatica, canciones en ingles y cursos personalizados para estudiantes en todos los niveles.</description>';
	// Connect to your MySQL database whatever way you like to here
	require_once('inc/db_vidainglescore_conn.php');
	$rss_feed_list = "";
	$query = "SELECT * FROM lecciones order by lessonid desc";
	$rss = mysqli_query($db_conx,$query) or die (mysqli_error());
	$ImgPath='http://vidaingles.com/i/vidaingles-logo50x50.png';
	while($row=mysqli_fetch_array($rss)){
		$lid = $row['lessonid'];
		$ltitle = $row['lessontitle'];
		$lfriendly = $row['lesson_name'];
		$lcontent = $row['lessoncontent'];
		$lexcerpt = strip_tags(substr($lcontent, 0, 230));
		$rss_feed_list .= '
		<item>
		<title>vidaingles</title>
		<link>http://vidaingles.com/lecciones/'.$lid.'/'.$lfriendly.'</link>  
		<content:encoded>
		<![CDATA[<p align="left">
		<a href="http://vidaingles.com/lecciones/'.$row['lessonid'].'/'.$row['lesson_name'].'"><img style="background-image: none; " border="0" src="'.$ImgPath.'" />    </a></p>]]>
		</content:encoded>
		<description>'.$lexcerpt.'...</description>
		</item>';
	}
	echo $rss_feed_list;
	echo '</channel>
	</rss>';
	//RewriteRule ^rss.xml$ rss.php [L]
?>
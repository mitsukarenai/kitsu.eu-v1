<?php

// déterminer l'instance utilisée
switch($_SERVER['HTTP_HOST']) {
	case 'www.nek.ovh':$inst='NekoVH';break;
	default:$inst='Kitsu.eu';
}

// traitement du flux ATOM
if(isset($_GET['feed'])) {
	if(!file_exists('./feed.json')) header('Location: ./');
	$feed=json_decode(file_get_contents('./feed.json'), TRUE);
	header('content-type: application/atom+xml; charset=UTF-8');
	echo '<?xml version="1.0" encoding="UTF-8"?><feed xmlns="http://www.w3.org/2005/Atom" xmlns:thr="http://purl.org/syndication/thread/1.0" xml:lang="en-US">
	<title type="text">Kitsu.eu ~ news</title>
	<id>https://www.kitsu.eu/</id>
	<updated>'.date(DATE_ATOM, $feed['0']['timestamp']).'</updated>
	<link rel="self" href="https://www.kitsu.eu/?feed" />
	';

	foreach($feed as $entry) {
		echo '<entry><author><name>Mitsu</name><uri>https://www.kitsu.eu/</uri></author>'."\n";
		echo '<title type="text">'.$entry['title'].'</title>'."\n";
		echo '<link rel="alternate" type="text/html" href="https://www.kitsu.eu/#'.$entry['timestamp'].'" />'."\n";
		echo '<id>https://www.kitsu.eu/#'.$entry['timestamp'].'</id>'."\n";
		echo '<updated>'.date(DATE_ATOM, $entry['timestamp']).'</updated>'."\n";
		echo '<content type="text">'.$entry['content'].'</content>'."\n";
		echo '</entry>'."\n\n";
	}

	die('</feed>');
}

// indexation des pages
if(!isset($_GET['p'])) {
	$page = 0;$pagetitle='';
}
else {
	switch($_GET['p']) {
		case 'access':$page = 1;$pagetitle='Accès aux apps | ';break;
                case 'tools':$page = 2;$pagetitle='Outils publics | ';break;
                case 'repertory':$page = 3;$pagetitle='Répertoire | ';break;
		default:$page = 0;
	}
}

// en-tête pour le cache
switch ($page) {
	case '1':header("Last-Modified: " . gmdate("D, d M Y H:i:s", filemtime('i_access.php')) . " GMT");break;
	case '2':header("Last-Modified: " . gmdate("D, d M Y H:i:s", filemtime('i_tools.php')) . " GMT");break;
}

// traitement formulaire envoi email
if(isset($_POST['fma']) and isset($_POST['ftx']) ) {
	$email_from = htmlentities(strip_tags($_POST['fma']));
	$comments = htmlentities(strip_tags(stripslashes($_POST['ftx'])));
	$subject = htmlentities(strip_tags(stripslashes($_POST['subject'])));

	function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:","href");
		return str_replace($bad,"",$string);
	}
	$email_message = "".clean_string($comments)."\n";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$headers .= "From: $email_from\r\n";
	$headers .= 'Reply-To: '.$email_from."\r\n" .
	 'X-Mailer: PHP/' . phpversion();
 

	@mail('bla@bla.bla', '[contact kitsu.eu] '.clean_string($subject), $email_message, $headers); 
}

// SHOWTIME !

?>
<!DOCTYPE html><!-- <!DOCTYPE HTML PUBLIC> -->
<html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<title><?php echo $pagetitle; echo $inst; ?> ~ hébergement libre</title>
<link rel='stylesheet' href='style.css' type='text/css' media='all' />
<style type="text/css">
nav ul {margin:0;background-image:url(logo-<?php echo $inst; ?>.png);background-repeat:no-repeat;background-position:left top;padding-left:6em;}
</style>
<link href="favicon-<?php echo $inst; ?>.png" rel="icon" type="image/png">
<link rel="alternate" type="application/rss+xml" title="Kitsu.eu ~ news" href="https://www.kitsu.eu/?feed"/>
</head>
  <body>
<?php
	if($inst=='NekoVH')
		echo '<div style="background-color:#fff99b;text-align:center;">⚠ NekoVH utilise CloudFlare, entreprise américaine, pour contourner les blocages IP de certains régimes politiques ⚠<br>Si possible, <a href="//www.kitsu.eu/">basculez sur Kitsu</a> pour une connexion directe.</div>';
?>
<span style="float:right;"><a href="https://www.kitsu.eu/">kitsu</a> <a href="https://www.nek.ovh/">nekovh</a></span>
<?php 
$nav = str_replace('<?php die; ?>', '', file_get_contents('i_nav.php'));
switch ($page) {
	case '1':$nav = str_replace('<li><a href="./?p=access">', '<li id="current"><a href="./?p=access">', $nav);break;
        case '2':$nav = str_replace('<li><a href="./?p=tools">', '<li id="current"><a href="./?p=tools">', $nav);break;
        case '3':$nav = str_replace('<li><a href="./?p=repertory">', '<li id="current"><a href="./?p=repertory">', $nav);break;
	default:$nav = str_replace('<li><a href="./">', '<li id="current"><a href="./">', $nav);
}
echo $nav;
 ?>
<article><span style="float:right;padding:0.3em;border-bottom:1px dotted #ccc;"><a href="/?feed"><img alt="feed" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUBAMAAAB/pwA+AAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAASUExURfeaQtZNEtBtIPJbB/azdejn5lp1xwsAAAADdFJOU/veNH3oRMsAAAB5SURBVAjXNctLDsMgDATQqSD7VrkB7QHiOtmjEvZIydz/KsV8ZoGeGRvhHAn4TP7gJyN8JmMnFpLose8bc6grHRE7i+rDdosudCrQg0wbL+NWzzQXo9Y6HewUXntjffMtdO3MaqZGZ4VRThWvz1Ww6ojgPflFeI2EPyrLJui5yYgHAAAAAElFTkSuQmCC"></a> 
<?php
	$feed=json_decode(file_get_contents('feed.json'), TRUE);
	echo date('Y-m-d', $feed[0]['timestamp']).' ~ <b title="'.$feed[0]['content'].'">'.$feed[0]['title'].'</b>';
?> 
 </span>
<h1><?php echo $inst; ?></h1>
<h2>Hébergement de services respectueux de la vie privée</h2>
<?php
switch ($page) {
	case '1':$content = str_replace('<?php die; ?>', '', file_get_contents('i_access.php'));$content = str_replace('DOMAIN', $_SERVER['HTTP_HOST'], $content); break;
	case '2':$content = str_replace('<?php die; ?>', '', file_get_contents('i_tools.php'));break;
	case '3':include('i_repertory.php');break;
	default:$pubkey='PGPKEY';$content = str_replace('<?php die; ?>', '', file_get_contents('i_pres.php'));$content = str_replace('INSTANCE', $inst, $content);$content = str_replace('PGP_PUBKEY', $pubkey, $content); 
}
echo $content;
?>
</article>
</body>
</html>

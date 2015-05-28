<?php die; ?><p>INSTANCE est un service d'hébergement applicatif personnel (SaaS) respectueux de la vie privée, proposant des applications libres de communication et de partage.<br>
Mon but est de fournir une base fonctionnelle pour s'initier aux applications et aider à la transition vers l'auto-hébergement, sans devoir en supporter les surcoûts et les contraintes techniques.
<br>Ce service s'adresse donc aux débutants désireux de s'initier aux applications, ainsi qu'aux utilisateurs plus expérimentés mais n'ayant pas encore franchi le pas vers l'autonomie numérique, et de manière générale tout utilisateur voulant un hébergement sécurisé sans se prendre la tête avec la gestion d'un serveur et la maintenance des logiciels.<br>
INSTANCE est l'un de mes <a href="https://suumitsu.eu/">nombreux projets web</a> (^ω^)
</p>

<h3>Les applications disponibles:</h3>
<ul>
	<li>votre espace <a href="http://fr.wikipedia.org/wiki/OwnCloud">OwnCloud</a> pour stocker et synchroniser vos fichiers, agendas, contacts, mettre en ligne vos propres applications..</li>
	<li>votre propre <a href="http://sebsauvage.net/wiki/doku.php?id=php:shaarli">Shaarli</a> pour partager vos découvertes sur le web et ainsi rejoindre une formidable communauté</li>
	<li>votre instance <a href="http://respawn.warriordudimanche.net/index.php?public">Respawn</a> pour garder une copie des pages web qui vous intéressent</li>
	<li>votre agrégateur <a href="http://tontof.net/kriss/feed/">KrISS feed</a> pour ne rien rater du web grâce aux flux RSS/ATOM</li>
	<li>votre blog <a href="http://lehollandaisvolant.net/blogotext/fr/">BlogoText</a> pour partager vos articles et échanger avec les internautes</li>
	<li>..et d'autres trucs à venir ! 😉</li>
</ul>
En bonus:
<ul>
	<li>configuration de virtualhost pour vos domaines/sous-domaines</li>
	<li>redirections vers nouvelle adresse</li>
	<li>règles robots.txt personnalisées</li>
</ul>


Détails techniques, si ça vous intéresse:<br>
<img alt="https" title="Connexions chiffrés HTTPS avec le protocole TLS, Perfect Forward Secrecy total et maintien Strict Transport Security durant 1 an" src="https.png"><br>
<img alt="tech" title="Système GNU/Linux avec chiffrement disque LUKS-dmcrypt, serveur web Lighttpd, langage PHP, base de données SQLite" src="tech.png">

<h3>Combien ça coûte ?</h3>
&nbsp;&nbsp;&nbsp;Participation libre à partir de 1 € par mois. Vous pouvez envoyer:
<ul>
	<li><img class="btc" src="img_trans.gif"> Bitcoin → 4,5 mBTC</li>
	<li><img class="ltc" src="img_trans.gif"> Litecoin → 610 mLTC</li>
	<li><img class="dash" src="img_trans.gif"> Dash → 340 mDASH</li>
</ul>

Ou troc contre chèques cadeau, jeu offert, services en nature, ...  Juste pas Paypal, SEPA ou tout autre moyen non respectueux de la vie privée.

<h3>Et si je veux utiliser ma CB ou faire un virement ? </h3>

<a href="http://www.fdn2.org/"><img alt="fdn2" src="logo-fdn2.png"></a><br>

J'offre le service <a href="http://www.fdn2.org/">aux donateurs du FDN²</a> ! Vous pouvez leur faire un don CB·virement·prélèvement·chèque, et ensuite me contacter. Il me faut juste votre adresse email, la date et le montant de votre don. C'est tout ☺

<h3>Comment se passe l'activation ?</h3>
Précisez-moi:<ol>
	<li>le montant de votre participation</li>
	<li>la durée de service</li>
	<li>les applications souhaitées (modifiable à tout moment)</li>
	<li>quel pseudo vous voulez utiliser</li>
</ol>
À l'expiration je vous maile et vous pouvez renouveler ou renoncer. Sans réponse de votre part après 30 jours ou à la renonciation, vos données sont supprimées de manière sécurisée.
<h3>Ça marche ! Comment est-ce que je te contacte ?</h3>
<ul>
	<li><img alt="" src="54g654g65w4fh654jsjsjsj.png"> clé PGP: 0x237A463B4ABDB526  </li>
	<li>ou formulaire chiffré ci-dessous:</li>
</ul>

<form id="contact" name="contactform" method="post" action="index.php#contact" onsubmit="return encrypt();">
	<input  id="mail" type="email" name="fma" placeholder="votre adresse mail" required><br>
	<input type="text" name="subject" id="subject" placeholder="sujet" required><br>
	<textarea  id="message" name="ftx" placeholder="votre message" required></textarea><br>
<input type="submit" name="send" id="send">
</form><br>
À bientôt ! 😃
			<script src="jquery.min.js" type="text/javascript" charset="utf-8"></script>
			<script src="libencrypt.js" type="text/javascript" charset="utf-8"></script>
			<script type="text/javascript">
			if (! window.crypto.getRandomValues) {
				$('#form').html("Vraiment désolé, votre navigateur n'est pas compatible avec la technologie requise. Utilisez Chrome >= 11, Safari >= 3.1, Firefox >= 21 ou Opera >= 12");
				$('#form').addClass('error');
			}
			</script>
<pre id="pubkey" style="display:none;">
PGP_PUBKEY
</pre>

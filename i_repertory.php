<?php if (!isset($_GET['p'])) header('Location: /'); 

function getWeight($folder) {
	$weight = (int)exec("du -s $folder | awk -F ' ' '{print $1}'");
	return $weight;
}

?>

<h3>Shaarli</h3>
<ul class="rep">
<?php
	$privatecount=0;
	$folderlist = glob("*", GLOB_ONLYDIR);
	foreach($folderlist as $folder) {
		if(is_dir("$folder/shaarli")) {
			if(getWeight("$folder/shaarli/data/datastore.php") > 6)
				echo "<li><a href=\"$folder/shaarli/\">$folder</a></li>\n";
			else
				$privatecount++;
		}

	}

	echo "<li> + $privatecount autres </li>\n";
	
?>
</ul>

<h3>BlogoText</h3>
<ul class="rep">
<?php
	$privatecount=0;
	$folderlist = glob("*", GLOB_ONLYDIR);
	foreach($folderlist as $folder) {
		if(is_dir("$folder/blogotext")) {
			if(getWeight("$folder/blogotext/databases") > 40)
				echo "<li><a href=\"$folder/blogotext/\">$folder</a></li>\n";
			else
				$privatecount++;
		}

	}
	echo "<li> + $privatecount autres </li>\n";
	
?>
</ul>

<h3>Respawn</h3>
<ul class="rep">
<?php
	$privatecount=0;
	$folderlist = glob("*", GLOB_ONLYDIR);
	foreach($folderlist as $folder) {
		if(is_dir("$folder/respawn")) {
			if(getWeight("$folder/respawn") > 500)
				echo "<li><a href=\"$folder/respawn/\">$folder</a></li>\n";
			else
				$privatecount++;
		}

	}
	echo "<li> + $privatecount autres </li>\n";

	
?>
</ul>

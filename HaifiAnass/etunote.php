

<hr/>
<h2>Liste des étudiants participants</h2><a href="#" id="hideBlock"></a>
<hr/>

     
	
        
    </div>
    <hr/>


<?php


// lecture d'un flux RSS 
             
$handle = fopen("http://picasaweb.google.com/data/feed/base/user/112537161896190034287/albumid/5931538032377292977?alt=rss&kind=photo&authkey=Gv1sRgCJjJwc265LnxigE&hl=fr", "rb");

// buffer contenant les données du flux
$flux = '';

// si la lecture du flux RSS est ok
if (isset($handle) && !empty($handle)) {
    while (!feof($handle)) {
		
    // on charge les données de notre flux RSS par paquet
    $flux .= fread($handle, 4096);
    }

    // test avec la classe SimpleXML
    // on construit notre parser RSS avec notre flux RSS
    $RSS2Parser = simplexml_load_string($flux);

    // on se positionne sur la balise (racine de notre flux RSS)
    $racine = $RSS2Parser->channel;

    // pour chaque item
    foreach($racine ->item as $element) {
        
        /*var_dump($element->description);
        die();*/
        
        //retourne la position de la chaine en paramètre dans une chaine
        $linkPosition = stripos($element->description, "src");
        
        //couper la chaine de caractère à partir de la position indiqué
        $link = substr($element->description, $linkPosition);
        
        //on les découpe selon notre ...
        $trueLink = explode('</a>', $link);
		$desc = utf8_decode((string)$element->title);
		
		echo $desc  ;
		echo ("<br><img ");
		echo $trueLink[0]."<br>"  ;
		
		
		
		
       // $personne[] = new Personne($trueLink[0],$desc);
    } 	
    
    /*echo "<h2>Liste des étudiants participants</h2>";
    var_dump($personne);
    die();*/
}
?>




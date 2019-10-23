<?php
/**
 * Display a map of "kooperationspartner" pod items
 */

echo do_shortcode("[leaflet-map fitbounds scrollwheel=\"1\" zoomcontrol=\"1\"]");

$param = array(
    'limit' => 5,
);
$pods = pods('kooperationspartner', $param );
while ($pods->fetch()) {
  $name     = $pods->display('post_title');
  $address  = $pods->display('kontakt_adresse');
  $address2 = $pods->field('kontakt_adresse');
  $website  = $pods->field('webseite');
  echo do_shortcode("[leaflet-marker title=\"Kooperationspartner ".$name." - ".$address."\" address=\"".$address2."\"
                      alt=\"\"
                     ]
                     <b>".$name."</b>
                     <a href=\"".$website."\">".$website."</a>
                     [/leaflet-marker]");
}


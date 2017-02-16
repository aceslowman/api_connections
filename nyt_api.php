<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

/*
  Need to repeat these queries until all pages are gone through
*/

$query = array(
  "api-key" => getenv("NYT_API_KEY"),
  "q"=>"South Dakota"
);
curl_setopt($curl, CURLOPT_URL,
  "https://api.nytimes.com/svc/search/v2/articlesearch.json" . "?" . http_build_query($query)
);

$result = json_decode(curl_exec($curl));

foreach ($result->response->docs as $doc) {
    if (!empty($doc->multimedia)) {
        foreach ($doc->multimedia as $media) {
            echo '<img src="http://www.nytimes.com/'.$media->url.'"></img>';
        }
    }
    echo '<br>';
    echo '<strong>Headline: </strong>'.$doc->headline->main.'<br>';
    if (!empty($doc->headline->print_headline)&&$doc->headline->print_headline!==$doc->headline->main) {
        echo '<strong>(Print) </strong>'.$doc->headline->print_headline.'<br>';
    }
    echo '<strong>Lead: </strong>'.$doc->lead_paragraph.'<br>';
    echo '<strong>Publication Date: </strong>'.date("F j, Y, g:i a", strtotime($doc->pub_date)).'<br>';
    echo '<strong>Keywords: </strong><br>';
    foreach ($doc->keywords as $keyword) {
        echo ' '.$keyword->value.' ('.$keyword->name.')<br>';
    }
    echo "<br><br>";
}
//
echo '<pre>';
print_r($result->response);
echo '</pre>';

<?php
$request = new HttpRequest();
$request->setUrl('http://172.25.45.4:8000/api/zip/');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders([
  'Accept' => '*/*',
  'Authorization' => 'token 81bf88714241d3fce4e65d27ef9b62f48cf8cea9',
  'Content-Type' => 'application/json'
]);

$request->setBody('{
  "zip":"560078"
}');

try {
  $response = $request->send();
  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}
?>
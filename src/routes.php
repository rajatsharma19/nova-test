<?php

use Api\Model\FileData;
use Slim\Http\Request;
use Slim\Http\Response;

$app->post('/phase1', function(Request $request, Response $response) {
    $body = $request->getParsedBody();
    $data = new FileData();
    $data->name = $body['name'];
    $data->description = $body['description'];
    $data->extension = $body['extension'];
    $data->save();

    foreach($body['tags'] as $key => $label) {
        $tag = new \Api\Model\Tag();
        $tag->label = $label;
        $tag->file_data()->associate($data);
        $tag->save();
    }

    return $response->withJson($data);
});

$app->post('/phase2/{id}', function(Request $request, Response $response) {
  $data = FileData::find($request->getAttribute('route')->getArgument('id'));
  if (!$data) {
    return $response->withStatus(404)->withJson(['message' => 'File data not found']);
  }
  $files = $request->getUploadedFiles();
  if (empty($files['file'])) {
    return $response->withStatus(400)->withJson(['message' => 'Expected a document']);
  }
  $now = time();
  $target = strtotime($data->created_at);
  $diff = $now - $target;
  if ($diff > 900) { //check if time elapsed is more than 15 mins
    return $response->withStatus(404)->withJson(['message' => 'File data too old!']);
  }
  $fileNameFull = $files['file']->getClientFilename();
  $fileName = pathinfo($fileNameFull, PATHINFO_FILENAME);
  $fileExt = pathinfo($fileNameFull, PATHINFO_EXTENSION);

  if ($data->name != $fileName) {
    return $response->withStatus(400)->withJson(['message' => "File name does not match the given data [{$data->name}]"]);
  }
  if ($data->extension != $fileExt) {
    return $response->withStatus(400)->withJson(['message' => "File extension does not match the given data [{$data->extension}]"]);
  }
  $data->size = $files['file']->getSize();
  $data->is_complete = true;
  $data->save();

  return $response->withJson($data);
});

$app->get('/data/{id}', function(Request $request, Response $response) {
  $data = FileData::find($request->getAttribute('route')->getArgument('id'));
  if (!$data) {
    return $response->withStatus(404)->withJson(['message' => "File data not found"]);
  }
  if ($data->is_complete != true) {
    return $response->withStatus(404)->withJson(['message' => "File data not found"]);
  }
  return $response->withJson($data);
});

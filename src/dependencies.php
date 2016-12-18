<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function($c) {
  $settings = $c->get('settings')['renderer'];
  return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function($c) {
  $settings = $c->get('settings')['logger'];
  $logger = new Monolog\Logger($settings['name']);
  $logger->pushProcessor(new Monolog\Processor\UidProcessor());
  $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
  return $logger;
};

$container['db'] = function($c) {
  $settings = $c->get('settings')['db'];
  $capsule = new \Illuminate\Database\Capsule\Manager();
  $capsule->addConnection([
    'driver' => 'mysql',
    'host' => $settings['host'],
    'database' => $settings['db'],
    'username' => $settings['user'],
    'password' => $settings['pass'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
  ]);

  $capsule->setAsGlobal();
  $capsule->bootEloquent();

  return $capsule;
};

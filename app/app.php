<?php
    date_default_timezone_set ('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Place.php";

    session_start();
    if(empty($_SESSION['places'])){
      $_SESSION['places']= array();
    }

    $app = new Silex\Application();
    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {
      return $app['twig']->render('places.html.twig', array('places' => Place::getAll()));
    });

    $app->post('/list', function() use ($app) {
      $my_location = new Place($_POST['location'], $_POST['time'], $_POST['date'] );
      $my_location->save();
      return $app['twig']->render('list.html.twig', array('place' => $my_location));
    });
    $app->post('/delete_places', function() use($app){
      return $app['twig']->render('delete_places.html.twig', array('places' => Place::deleteAll()));
    });

    return $app;
?>

<?php

namespace Drupal\events\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\events\Service\WeatherService;

class EventsController extends ControllerBase {

  protected $weatherService;

  // We need to inject the WeatherService service into the controller.
  public function __construct(WeatherService $weatherService) {
    $this->weatherService = $weatherService;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('events.weather_service')
    );
  }

  public function list() {

  }
}

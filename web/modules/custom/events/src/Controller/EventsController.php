<?php

namespace Drupal\events\Controller;

use Drupal\Core\Controller\ControllerBase;

class EventsController extends ControllerBase {
  public function list() {
    return [
      '#markup' => $this->t('Events list'),
    ];
  }
}

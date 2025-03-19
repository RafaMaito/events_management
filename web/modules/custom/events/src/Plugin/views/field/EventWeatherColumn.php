<?php

namespace Drupal\events\Plugin\views\field;

use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Provides a custom column field for Views.
 *
 * This field is used to display weather information for events
 * in a Views table.
 *
 * @ViewsField("event_weather_column")
 */
class EventWeatherColumn extends FieldPluginBase {
  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   *
   * Renders the custom weather information column for each row in the View.
   *
   * @param ResultRow $values
   *   The result row object containing data for the current row.
   *
   * @return array
   *   A renderable array containing the weather information.
   */
  public function render(ResultRow $values) {
    // Ensure that the value exists and is a string before rendering.
    if (isset($values->event_weather_column) && is_string($values->event_weather_column)) {
      return [
        '#markup' => $values->event_weather_column,
      ];
    }
    // Return an empty array if no valid data is available.
    return [];
  }
}

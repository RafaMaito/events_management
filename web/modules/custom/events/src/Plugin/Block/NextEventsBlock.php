<?php

namespace Drupal\events\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block that displays upcoming events.
 *
 * @Block(
 *   id = "next_events_block",
 *   admin_label = @Translation("Next Events"),
 * )
 */
class NextEventsBlock extends BlockBase {

    /**
   * {@inheritdoc}
   *
   * Builds the block content to display upcoming events.
   *
   * @return array
   *   A render array containing a list of upcoming events.
   */
  public function build() {
    // Query nodes of type 'event'
    // where the event date is today or in the future.
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'event')
      ->condition('field_event_date_time', date('Y-m-d'), '>=')
      ->sort('field_event_date_time', 'ASC')
      ->accessCheck(TRUE);
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);

    // Prepare an array to store event titles.
    $items = [];
    foreach ($nodes as $node) {
      $items[] = [
        '#type' => 'link',
        '#title' => $node->getTitle(),
        '#url' => $node->toUrl(),
      ];
    }

    // Return a render array using the
    // 'item_list' theme to display event titles as a list.
    return [
      '#theme' => 'item_list',
      '#items' => $items,
    ];
  }
}

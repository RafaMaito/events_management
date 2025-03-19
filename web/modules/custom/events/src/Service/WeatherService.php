<?php

namespace Drupal\events\Service;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Drupal\Core\Config\ConfigFactoryInterface;
use Psr\Log\LoggerInterface;

/**
 * Provides a service for fetching weather data from an external API.
 */

class WeatherService {

    /**
   * HTTP client for making API requests.
   *
   * @var ClientInterface
   */
  protected ClientInterface $httpClient;

  /**
   * Configuration factory to retrieve API keys.
   *
   * @var ConfigFactoryInterface
   */
  protected ConfigFactoryInterface $configFactory;

    /**
   * Logger service for recording errors.
   *
   * @var LoggerInterface
   */
  protected LoggerInterface $logger;

    /**
   * Constructs the WeatherService.
   *
   * @param ClientInterface $httpClient
   *   The HTTP client for API requests.
   * @param ConfigFactoryInterface $configFactory
   *   The configuration factory to access settings.
   * @param LoggerInterface $logger
   *   The logger service for error handling.
   */
  public function __construct(ClientInterface $httpClient, ConfigFactoryInterface $configFactory, LoggerInterface $logger) {
    $this->httpClient = $httpClient;
    $this->configFactory = $configFactory;
    $this->logger = $logger;
  }

    /**
   * Fetches the current weather for a given city.
   *
   * @param string $city
   *   The name of the city for which weather data is requested.
   *
   * @return array|null
   *   An associative array containing weather data if successful,
   *   or NULL if an error occurs.
   */
  public function getCurrentWeather($city) {
    // Retrieve the API key from Drupal's configuration settings.
    $api_key = $this->configFactory->get('system.site')->get('weatherapi_key');

    if (empty($api_key)) {
      $this->logger->error('Weather API Key is missing!');
      return NULL;
    }

    try {
      // Make a request to the Weather API.
      $response = $this->httpClient->get("https://api.weatherapi.com/v1/current.json?key={$api_key}&q={$city}");

      // Decode and return the JSON response as an associative array.
      return json_decode($response->getBody(), TRUE);
    }
    catch (RequestException $e) {
      // Log any API errors and return NULL.
      $this->logger->error('API error: @message', ['@message' => $e->getMessage()]);
      return NULL;
    }
  }
}

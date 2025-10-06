<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/*
** Get Location by IP
*/
if ( !function_exists('newsx_get_city_name_by_ip') ) {
	function newsx_get_city_name_by_ip($ip = NULL) {
		if ( !$ip ) {
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		$url = "http://ip-api.com/json/" . $ip;
		$response = wp_remote_get($url);

		if ( is_wp_error($response) ) {
			return 'Error: ' . $response->get_error_message();
		}

		$body = wp_remote_retrieve_body($response);
		$data = json_decode($body);

		if ( 'success' != $data->status ) {
			echo '<div class="newsx-weather-error">WeatherError: Unable to get location. Auto location may not work on localhost.</div>';
			return '404';
		}

		return $data->city;
	}
}

/*
** Get Weather Data
*/
if ( !function_exists('newsx_get_weather_data') ) {
	function newsx_get_weather_data($city_name = '', $unit = 'cel', $instance = [], $minimal = false) {
		// Get API Key
		$api_key = isset($instance['weather_api_key']) ? $instance['weather_api_key'] : '';

		// Define a unique transient key based on the latitude and longitude
		$transient_key = 'newsx_weather_data_'. $city_name .'_'. $unit .'_'. $api_key;
		
		if ( get_transient( $transient_key ) ) {
			$weather_data = get_transient( $transient_key );
		} else {
			// Get Weather Data Now
			$weather_data['now'] = [];
			$unit = $unit === 'cel' ? 'metric' : 'imperial';
			$now_ping = 'https://api.openweathermap.org/data/2.5/weather?q='. $city_name .'&lang=en&units='. $unit .'&APPID=' . $api_key;
			$now_ping_get = wp_remote_get($now_ping, [ 'timeout' => 120 ]);

			$body = wp_remote_retrieve_body($now_ping_get);
			$weather_data_now = json_decode($body);

			$weather_data['now'] = $weather_data_now;

			// Get Weather Data Forecast
			$weather_data['forecast'] = [];

			if ( !$minimal ) {
				$forecast_ping = 'https://api.openweathermap.org/data/2.5/forecast?q='. $city_name .'&lang=en&units='. $unit .'&APPID=' . $api_key;
				$forecast_ping_get = wp_remote_get($forecast_ping, [ 'timeout' => 120 ]);

				$body = wp_remote_retrieve_body($forecast_ping_get);
				$weather_data_forecast = json_decode($body);

				$weather_data['forecast'] = $weather_data_forecast;
			}
		}

		// Cache the data for a set period of time (e.g., 1 hour)
		if ( $weather_data['now'] || $weather_data['forecast'] ) {
			set_transient($transient_key, $weather_data, HOUR_IN_SECONDS);
		}

		// Return the fresh data
		return $weather_data;
	}
}


/*
** Get Weather Icon Names
*/
if ( !function_exists('newsx_get_weather_icon_name_by_code') ) {
	function newsx_get_weather_icon_name_by_code( $code ) {
		if ( $code === '01d' ) {
			$icon = 'day-sunny';
		} elseif ( $code === '01n' ) {
			$icon = 'moon-full';
		} elseif ( $code === '02d' ) {
			$icon = 'day-cloudy';
		} elseif ( $code === '02n' ) {
			$icon = 'night-cloudy';
		} elseif ( $code === '04d' || $code === '04n' ) {
			$icon = 'cloudy';
		} elseif ( $code === '09d' || $code === '09n' ) {
			$icon = 'rain';
		} elseif ( $code === '10d' ) {
			$icon = 'day-rain';
		} elseif ( $code === '10n' ) {
			$icon = 'night-rain';
		} elseif ( $code === '11d' ) {
			$icon = 'storm-showers';
		} elseif ( $code === '11n' ) {
			$icon = 'storm-showers';
		} elseif ( $code === '13d' ) {
			$icon = 'day-snow';
		} elseif ( $code === '13n' ) {
			$icon = 'night-alt-snow';
		} elseif ( $code === '50d' ) {
			$icon = 'day-fog';
		} elseif ( $code === '50n' ) {
			$icon = 'night-fog';
		} else {
			$icon = 'cloudy';
		}

		return $icon;
	}
}

<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$city_name = '';
$api_key = newsx_get_option('header_weather_api_key');
$location_type = 'custom'; // TMP set to custom
$location = newsx_get_option('header_weather_location');
$header_weather_unit = newsx_get_option('header_weather_unit');
$temperature_unit = 'cel' == $header_weather_unit ? 'metric' : 'imperial';

// Get Args
$is_duplicate = isset($args['is_duplicate']) && $args['is_duplicate'];
$class = $is_duplicate ? ' newsx-duplicate-element' : '';

if ( 'Insert Your API key' == $api_key || '' == $api_key ) {
    newsx_header_weather_demo_content();
    return;
}

if ( 'auto' == $location_type )  {
    $city_name = newsx_get_city_name_by_ip();
} else {
    $city_name = $location;
}

if ( '404' === $city_name ) {
    return;
}

// Get weather data
$weather_data = newsx_get_weather_data($city_name, $header_weather_unit, ['weather_api_key' => $api_key], true);

if ( isset($weather_data['now']->cod) && 200 !== $weather_data['now']->cod ) :
    $error_message = '';

    if ( '404' === $weather_data['now']->cod || 404 === $weather_data['now']->cod ) :
        $error_message = 'City not found. Please check the city name.';
    elseif ( '400' === $weather_data['now']->cod || 400 === $weather_data['now']->cod ) :
        $error_message = 'Bad request. Please check your parameters.';
    elseif ( '401' === $weather_data['now']->cod || 401 === $weather_data['now']->cod ) :
        $error_message = 'Invalid API key. Please check your API key.';
    elseif ( '429' === $weather_data['now']->cod || 429 === $weather_data['now']->cod ) :
        $error_message = 'Too many requests. Please try again later.';
    endif;

    echo '<div class="newsx-weather-error">Weather Widget Error: ' . $error_message . '</div>';
    return;

// Display Weather
else :
    $icon_code = $weather_data['now']->weather[0]->icon;
    $icon_name = newsx_get_weather_icon_name_by_code($icon_code);

    $temperature = $weather_data['now']->main->temp; // Temperature in Kelvin

    if ( 'cel' == $header_weather_unit ) {
        $temperature = esc_html(round($temperature)) . '<sup>'. esc_html('°C', 'news-magazine-x') .'</sup>';
    } else {
        $temperature = esc_html(round($temperature)) . '<sup>'. esc_html('°F', 'news-magazine-x') .'</sup>';
    }

    echo '<div class="newsx-header-weather'. esc_attr($class) .'">';
        // Edit Button
        echo newsx_customizer_edit_button_markup('hd_weather');
        
        newsx_weather_icon_markup($icon_name);
        echo '<span class="location">'. esc_html(ucfirst($location)) .'</span>';
        echo '<span class="temperature">'. $temperature .'</span>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo '</div>';
    

endif;

function newsx_header_weather_demo_content() {
    ?>
    <div class="newsx-header-weather">
        <?php echo newsx_customizer_edit_button_markup('hd_weather'); ?>

        <svg class="svg-icon svg-day-sunny" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
            <g>
            <path fill="#f59e0b" d="M32 23.36A8.64 8.64 0 1123.36 32 8.66 8.66 0 0132 23.36m0-3A11.64 11.64 0 1043.64 32 11.64 11.64 0 0032 20.36z"></path>
            <path fill="none" stroke="#f59e0b" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" d="M32 15.71V9.5">
                <animate attributeName="stroke-dasharray" calcMode="spline" dur="5s" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1" keyTimes="0; .5; 1" repeatCount="indefinite" values="3 6; 6 6; 3 6"></animate>
            </path>
            <path fill="none" stroke="#f59e0b" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" d="M32 48.29v6.21">
                <animate attributeName="stroke-dasharray" calcMode="spline" dur="5s" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1" keyTimes="0; .5; 1" repeatCount="indefinite" values="3 6; 6 6; 3 6"></animate>
            </path>
            <path fill="none" stroke="#f59e0b" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" d="M43.52 20.48l4.39-4.39">
                <animate attributeName="stroke-dasharray" calcMode="spline" dur="5s" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1" keyTimes="0; .5; 1" repeatCount="indefinite" values="3 6; 6 6; 3 6"></animate>
            </path>
            <path fill="none" stroke="#f59e0b" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" d="M20.48 43.52l-4.39 4.39">
                <animate attributeName="stroke-dasharray" calcMode="spline" dur="5s" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1" keyTimes="0; .5; 1" repeatCount="indefinite" values="3 6; 6 6; 3 6"></animate>
            </path>
            <path fill="none" stroke="#f59e0b" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" d="M20.48 20.48l-4.39-4.39">
                <animate attributeName="stroke-dasharray" calcMode="spline" dur="5s" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1" keyTimes="0; .5; 1" repeatCount="indefinite" values="3 6; 6 6; 3 6"></animate>
            </path>
            <path fill="none" stroke="#f59e0b" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" d="M43.52 43.52l4.39 4.39">
                <animate attributeName="stroke-dasharray" calcMode="spline" dur="5s" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1" keyTimes="0; .5; 1" repeatCount="indefinite" values="3 6; 6 6; 3 6"></animate>
            </path>
            <path fill="none" stroke="#f59e0b" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" d="M15.71 32H9.5">
                <animate attributeName="stroke-dasharray" calcMode="spline" dur="5s" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1" keyTimes="0; .5; 1" repeatCount="indefinite" values="3 6; 6 6; 3 6"></animate>
            </path>
            <path fill="none" stroke="#f59e0b" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" d="M48.29 32h6.21">
                <animate attributeName="stroke-dasharray" calcMode="spline" dur="5s" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1" keyTimes="0; .5; 1" repeatCount="indefinite" values="3 6; 6 6; 3 6"></animate>
            </path>
            <animateTransform attributeName="transform" dur="45s" from="0 32 32" repeatCount="indefinite" to="360 32 32" type="rotate"></animateTransform>
            </g>
        </svg>
        <span class="location">New York</span>
        <span class="temperature">14<sup>°C</sup>
        </span>
        </div>
    <?php
}
<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Create a custom widget class
class Newsx_Weather_Widget extends Newsx_Widget {

    public function __construct() {
		$this->widget_cssclass = 'newsx-weather-widget';
		$this->widget_description = esc_html__( 'Sample description, remove if needed.', 'news-magazine-x' );
		$this->widget_name = esc_html__( 'NewsX: Weather Widget', 'news-magazine-x' );

        // Register Fields
		$this->sections = [
            'widget_general_section' => [
                'section_title' => [
                    'type'  => 'title',
                    'label' => esc_html__( 'General', 'news-magazine-x' ),
                ],
                'widget_title' => [
                    'type' => 'text',
                    'default' => 'Weather Widget',
                    'label' => esc_html__( 'Title', 'news-magazine-x' ),
                ],
                'weather_api_key' => [
                    'type' => 'text',
                    'label' => esc_html__( 'Insert Your API key', 'news-magazine-x' ),
                    'description' => 'To get your <strong>API key</strong>, please folow the steps in the <a href="https://wp-royal-themes.com/new-themes/news-magazine-x/docs/#weather-widget" target="_blank">Theme Documentation</a>',
                ],
                'temperature_unit' => [
                    'type' => 'select',
                    'default' => 'cel',
                    'choices' => [
                        'cel' => esc_html__( '°C', 'news-magazine-x' ),
                        'far' => esc_html__( '°F', 'news-magazine-x' ),
                    ],
                    'label' => esc_html__( 'Unit', 'news-magazine-x' ),
                ],
                // 'location_type' => [
                //     'type' => 'select',
                //     'default' => 'custom',
                //     'choices' => [
                //         'auto' => esc_html__( 'Auto', 'news-magazine-x' ),
                //         'custom' => esc_html__( 'Custom', 'news-magazine-x' ),
                //     ],
                //     'label' => esc_html__( 'Location Type', 'news-magazine-x' ),
                // ],
                'location' => [
                    'type' => 'text',
                    'default' => 'New York',
                    'label' => esc_html__( 'Location', 'news-magazine-x' ),
                    'description' => '<a target="_blank" href="https://openweathermap.org/find/">' . esc_html__( 'Find your location', 'news-magazine-x' ) . '</a>&nbsp;&nbsp;' . esc_html__( '(i.e: London, GB)', 'news-magazine-x' ),
                ],
                'forecast' => [
                    'type' => 'select',
                    'default' => '3',
                    'choices' => [
                        '1' => esc_html__( '1 Day', 'news-magazine-x' ),
                        '2' => esc_html__( '2 Day', 'news-magazine-x' ),
                        '3' => esc_html__( '3 Day', 'news-magazine-x' ),
                        '4' => esc_html__( '4 Day', 'news-magazine-x' ),
                        '5' => esc_html__( '5 Day', 'news-magazine-x' ),
                        'none' => esc_html__( 'None', 'news-magazine-x' ),
                    ],
                    'label' => esc_html__( 'Forecast', 'news-magazine-x' ),
                ]
            ],
        ];

		parent::__construct();
    }

    public function render_demo_content( $instance ) {
        ?>
        <div class="newsx-weather-wrap">
            <div class="newsx-weather-header">
                <span>Weather Widget</span>
            </div>
            <div class="newsx-weather-content">
                <div class="weather-info-wrap">
                <div class="weather-info">
                    <div class="weather-icon">
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
                    </div>
                    <h2 class="weather-temp">14°C</h2>
                </div>
                <div class="weather-info">
                    <div>
                    <h3 class="weather-location">New York</h3>
                    <div class="weather-condition">clear sky</div>
                    </div>
                    <div class="weather-extra-info">
                    <div>
                        <svg class="svg-icon svg-thermometer" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                        <circle cx="32" cy="42" r="4" fill="#ef4444"></circle>
                        <path fill="none" stroke="#ef4444" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M32 28.5v13">
                            <animate attributeName="y1" dur="5s" repeatCount="indefinite" values="28.5;25.5;28.5"></animate>
                        </path>
                        <path fill="none" stroke="#bbbbbb" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M36 36.07v-17a4 4 0 10-8 0v17a7.12 7.12 0 00-3 5.83 7 7 0 1014 0 7.12 7.12 0 00-3-5.83zM32.5 25h3M32.5 21h3M32.5 29h3"></path>
                        </svg>
                        <span> 5° - 11° </span>
                    </div>
                    <div>
                        <svg class="svg-icon svg-raindrop" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                        <path fill="none" stroke="#2885c7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M32 17c-6.09 9-10 14.62-10 20.09a10 10 0 0020 0C42 31.62 38.09 26 32 17z"></path>
                        </svg>
                        <span> 46% </span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512">
                        <defs>
                            <symbol id="a" viewBox="0 0 342 234">
                            <path fill="none" stroke="#e2e8f0" stroke-linecap="round" stroke-miterlimit="10" stroke-width="18" d="M264.2 21.3A40 40 0 11293 89H9m139.2 123.7A40 40 0 10177 145H9"></path>
                            </symbol>
                        </defs>
                        <use xlink:href="#a" width="342" height="234" transform="translate(85 139)"></use>
                        </svg>
                        <span> 4.12 km/h </span>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="newsx-weather-footer">
                <div class="weather-forecast">
                <div class="forecast-day">Mon</div>
                <div class="forecast-icon">
                    <svg class="svg-icon svg-rain" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                    <defs>
                        <clipPath id="weather">
                        <path fill="none" d="M12 35l-5.28-4.21-2-6 1-7 4-5 5-3h6l5 1 3 3L33 20l-6 4h-6l-3 3v4l-4 2-2 2z"></path>
                        </clipPath>
                    </defs>
                    <g clip-path="url(#weather)">
                        <g>
                        <path fill="#f59e0b" d="M19 20.05A3.95 3.95 0 1115.05 24 4 4 0 0119 20.05m0-2A5.95 5.95 0 1025 24a5.95 5.95 0 00-6-5.95z"></path>
                        <path fill="none" stroke="#f59e0b" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M19 15.67V12.5M19 35.5v-3.17M24.89 18.11l2.24-2.24M10.87 32.13l2.24-2.24M13.11 18.11l-2.24-2.24M27.13 32.13l-2.24-2.24M10.67 24H7.5M30.5 24h-3.17"></path>
                        <animateTransform attributeName="transform" dur="45s" from="0 19.22 24.293" repeatCount="indefinite" to="360 19.22 24.293" type="rotate"></animateTransform>
                        </g>
                    </g>
                    <path fill="none" stroke="#dddddd" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M43.67 45.5h2.83a7 7 0 000-14h-.32a10.49 10.49 0 00-19.11-8 7 7 0 00-10.57 6 7.21 7.21 0 00.1 1.14A7.5 7.5 0 0018 45.5a4.19 4.19 0 00.5 0v0"></path>
                    <g>
                        <path fill="none" stroke="#2885c7" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M24.08 45.01l-.16.98"></path>
                        <animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="translate" values="1 -5; -2 10"></animateTransform>
                        <animate attributeName="opacity" dur="1.5s" repeatCount="indefinite" values="0;1;1;0"></animate>
                    </g>
                    <g>
                        <path fill="none" stroke="#2885c7" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M31.08 45.01l-.16.98"></path>
                        <animateTransform attributeName="transform" begin="-0.5s" dur="1.5s" repeatCount="indefinite" type="translate" values="1 -5; -2 10"></animateTransform>
                        <animate attributeName="opacity" begin="-0.5s" dur="1.5s" repeatCount="indefinite" values="0;1;1;0"></animate>
                    </g>
                    <g>
                        <path fill="none" stroke="#2885c7" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M38.08 45.01l-.16.98"></path>
                        <animateTransform attributeName="transform" begin="-1s" dur="1.5s" repeatCount="indefinite" type="translate" values="1 -5; -2 10"></animateTransform>
                        <animate attributeName="opacity" begin="-1s" dur="1.5s" repeatCount="indefinite" values="0;1;1;0"></animate>
                    </g>
                    </svg>
                </div>
                <div class="forecast-temp">7°C</div>
                </div>
                <div class="weather-forecast">
                <div class="forecast-day">Tue</div>
                <div class="forecast-icon">
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
                </div>
                <div class="forecast-temp">4°C</div>
                </div>
                <div class="weather-forecast">
                <div class="forecast-day">Wed</div>
                <div class="forecast-icon">
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
                </div>
                <div class="forecast-temp">5°C</div>
                </div>
                <div class="weather-forecast">
                <div class="forecast-day">Thu</div>
                <div class="forecast-icon">
                    <svg class="svg-icon svg-rain" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                    <defs>
                        <clipPath id="weather">
                        <path fill="none" d="M12 35l-5.28-4.21-2-6 1-7 4-5 5-3h6l5 1 3 3L33 20l-6 4h-6l-3 3v4l-4 2-2 2z"></path>
                        </clipPath>
                    </defs>
                    <g clip-path="url(#weather)">
                        <g>
                        <path fill="#f59e0b" d="M19 20.05A3.95 3.95 0 1115.05 24 4 4 0 0119 20.05m0-2A5.95 5.95 0 1025 24a5.95 5.95 0 00-6-5.95z"></path>
                        <path fill="none" stroke="#f59e0b" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M19 15.67V12.5M19 35.5v-3.17M24.89 18.11l2.24-2.24M10.87 32.13l2.24-2.24M13.11 18.11l-2.24-2.24M27.13 32.13l-2.24-2.24M10.67 24H7.5M30.5 24h-3.17"></path>
                        <animateTransform attributeName="transform" dur="45s" from="0 19.22 24.293" repeatCount="indefinite" to="360 19.22 24.293" type="rotate"></animateTransform>
                        </g>
                    </g>
                    <path fill="none" stroke="#dddddd" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M43.67 45.5h2.83a7 7 0 000-14h-.32a10.49 10.49 0 00-19.11-8 7 7 0 00-10.57 6 7.21 7.21 0 00.1 1.14A7.5 7.5 0 0018 45.5a4.19 4.19 0 00.5 0v0"></path>
                    <g>
                        <path fill="none" stroke="#2885c7" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M24.08 45.01l-.16.98"></path>
                        <animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="translate" values="1 -5; -2 10"></animateTransform>
                        <animate attributeName="opacity" dur="1.5s" repeatCount="indefinite" values="0;1;1;0"></animate>
                    </g>
                    <g>
                        <path fill="none" stroke="#2885c7" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M31.08 45.01l-.16.98"></path>
                        <animateTransform attributeName="transform" begin="-0.5s" dur="1.5s" repeatCount="indefinite" type="translate" values="1 -5; -2 10"></animateTransform>
                        <animate attributeName="opacity" begin="-0.5s" dur="1.5s" repeatCount="indefinite" values="0;1;1;0"></animate>
                    </g>
                    <g>
                        <path fill="none" stroke="#2885c7" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M38.08 45.01l-.16.98"></path>
                        <animateTransform attributeName="transform" begin="-1s" dur="1.5s" repeatCount="indefinite" type="translate" values="1 -5; -2 10"></animateTransform>
                        <animate attributeName="opacity" begin="-1s" dur="1.5s" repeatCount="indefinite" values="0;1;1;0"></animate>
                    </g>
                    </svg>
                </div>
                <div class="forecast-temp">9°C</div>
                </div>
                <div class="weather-forecast">
                <div class="forecast-day">Fri</div>
                <div class="forecast-icon">
                    <svg class="svg-icon svg-rain" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                    <defs>
                        <clipPath id="weather">
                        <path fill="none" d="M12 35l-5.28-4.21-2-6 1-7 4-5 5-3h6l5 1 3 3L33 20l-6 4h-6l-3 3v4l-4 2-2 2z"></path>
                        </clipPath>
                    </defs>
                    <g clip-path="url(#weather)">
                        <g>
                        <path fill="#f59e0b" d="M19 20.05A3.95 3.95 0 1115.05 24 4 4 0 0119 20.05m0-2A5.95 5.95 0 1025 24a5.95 5.95 0 00-6-5.95z"></path>
                        <path fill="none" stroke="#f59e0b" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M19 15.67V12.5M19 35.5v-3.17M24.89 18.11l2.24-2.24M10.87 32.13l2.24-2.24M13.11 18.11l-2.24-2.24M27.13 32.13l-2.24-2.24M10.67 24H7.5M30.5 24h-3.17"></path>
                        <animateTransform attributeName="transform" dur="45s" from="0 19.22 24.293" repeatCount="indefinite" to="360 19.22 24.293" type="rotate"></animateTransform>
                        </g>
                    </g>
                    <path fill="none" stroke="#dddddd" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M43.67 45.5h2.83a7 7 0 000-14h-.32a10.49 10.49 0 00-19.11-8 7 7 0 00-10.57 6 7.21 7.21 0 00.1 1.14A7.5 7.5 0 0018 45.5a4.19 4.19 0 00.5 0v0"></path>
                    <g>
                        <path fill="none" stroke="#2885c7" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M24.08 45.01l-.16.98"></path>
                        <animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="translate" values="1 -5; -2 10"></animateTransform>
                        <animate attributeName="opacity" dur="1.5s" repeatCount="indefinite" values="0;1;1;0"></animate>
                    </g>
                    <g>
                        <path fill="none" stroke="#2885c7" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M31.08 45.01l-.16.98"></path>
                        <animateTransform attributeName="transform" begin="-0.5s" dur="1.5s" repeatCount="indefinite" type="translate" values="1 -5; -2 10"></animateTransform>
                        <animate attributeName="opacity" begin="-0.5s" dur="1.5s" repeatCount="indefinite" values="0;1;1;0"></animate>
                    </g>
                    <g>
                        <path fill="none" stroke="#2885c7" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M38.08 45.01l-.16.98"></path>
                        <animateTransform attributeName="transform" begin="-1s" dur="1.5s" repeatCount="indefinite" type="translate" values="1 -5; -2 10"></animateTransform>
                        <animate attributeName="opacity" begin="-1s" dur="1.5s" repeatCount="indefinite" values="0;1;1;0"></animate>
                    </g>
                    </svg>
                </div>
                <div class="forecast-temp">10°C</div>
                </div>
            </div>
        </div>
        <?php
    }

    public function widget($args, $instance) {
		$this->widget_start( $args );

        $city_name = '';
        $api_key = isset($instance['weather_api_key']) ? $instance['weather_api_key'] : '';
        $location_type = 'custom';
        $unit = $instance['temperature_unit'];

        if ( 'Insert Your API key' == $api_key || '' == $api_key ) {
            $this->render_demo_content( $instance );
            $this->widget_end( $args );
            return;
        }

        // TMP Disabled
        // if ( !isset($instance['location_type']) ) {
        //     $location_type = 'custom';
        // } else {
        //     $location_type = $instance['location_type'];
        // }

        if ( 'auto' == $location_type )  {
            $city_name = newsx_get_city_name_by_ip();
        } else {
            $city_name = isset($instance['location']) ? $instance['location'] : '';
        }

        if ( '404' === $city_name ) {
            return;
        }
        
        // Get weather data
        $weather_data = newsx_get_weather_data($city_name, $unit, $instance, false);

        if ( isset($weather_data['now']->cod) && 200 !== $weather_data['now']->cod ) :
            $error_message = '';

            if ( '404' === $weather_data['now']->cod || 404 === $weather_data['now']->cod ) :
                $error_message = 'City not found. Please type again.';
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

            $weather_data_now = $weather_data['now'];
            $weather_data_forecast = $weather_data['forecast'];

            $icon_code = $weather_data_now->weather[0]->icon;
            $icon_name = newsx_get_weather_icon_name_by_code($icon_code);

            $temperature = $weather_data_now->main->temp; // Temperature in Kelvin
            $condition = $weather_data_now->weather[0]->description; // Weather condition
            $humidity = $weather_data_now->main->humidity; // Humidity percentage
            $wind_speed = round($weather_data_now->wind->speed); // Wind speed in km/h
            
            // Get today's min/max from forecast data
            $today_date = date('Ymd', current_time('timestamp', 0));
            $min_temperature = null;
            $max_temperature = null;
            
            foreach ($weather_data_forecast->list as $forecast) {
                $forecast_date = date('Ymd', $forecast->dt);
                
                if ($today_date === $forecast_date) {
                    if (is_null($min_temperature) || $forecast->main->temp_min < $min_temperature) {
                        $min_temperature = $forecast->main->temp_min;
                    }
                    if (is_null($max_temperature) || $forecast->main->temp_max > $max_temperature) {
                        $max_temperature = $forecast->main->temp_max;
                    }
                }
            }
            
            // If no forecast found, fallback to current weather
            if (is_null($min_temperature)) {
                $min_temperature = $weather_data_now->main->temp_min;
            }
            if (is_null($max_temperature)) {
                $max_temperature = $weather_data_now->main->temp_max;
            }

            if ('cel' == $instance['temperature_unit']) {
                $temperature = round($temperature) . '°C';
            } else {
                $temperature = round($temperature) . '°F';
            }

            $min_temperature = round($min_temperature);
            $max_temperature = round($max_temperature);
            
            ?>
            
            <div class="newsx-weather-wrap">
                <div class="newsx-weather-header">
                    <span><?php echo esc_html($instance['widget_title']); ?></span>
                </div>
                <div class="newsx-weather-content">
                    <div class="weather-info-wrap">
                        <div class="weather-info">
                            <div class="weather-icon">
                                    <?php newsx_weather_icon_markup($icon_name); ?>
                            </div>
                            <h2 class="weather-temp"><?php echo esc_html($temperature) ?></h2>
                        </div>
                        <div class="weather-info">
                            <div>
                                <h3 class="weather-location"><?php echo esc_html(ucfirst($city_name)); ?></h3>
                                <div class="weather-condition"><?php echo esc_html($condition); ?></div>
                            </div>
                            <div class="weather-extra-info">
                                <div>
                                    <?php newsx_weather_icon_markup('thermometer'); ?>
                                    <span>
                                    <?php
                                        printf(
                                            esc_html__('%1$s° - %2$s°', 'news-magazine-x'),
                                            esc_html(round($max_temperature)),
                                            esc_html(round($min_temperature))
                                        );
                                    ?>
                                    </span>
                                </div>
                                <div>
                                    <?php newsx_weather_icon_markup('raindrop'); ?>
                                    <span>
                                        <?php
                                            printf(
                                                esc_html__('%1$s%%', 'news-magazine-x'),
                                                esc_html($humidity)
                                            );
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <?php newsx_weather_icon_markup('windy'); ?>
                                    <span>
                                        <?php
                                            printf(
                                                esc_html__('%1$s km/h', 'news-magazine-x'),
                                                esc_html($wind_speed)
                                            );
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="newsx-weather-footer">

                    <?php

                    $forecast_days_count = isset($instance['forecast']) ? $instance['forecast'] : 3;

                    if ( 'none' !== $forecast_days_count && (! empty( $weather_data['forecast'] ) || ! empty( $weather_data['forecast']->list )) ) : 
                        $weather_data_forecast = $weather_data['forecast'];

                    $forecast_days = [];
                    $today_date = date('Ymd', current_time('timestamp', 0));
                    $current_hour = date('H', current_time('timestamp', 0));

                    // Group and process forecast data
                    foreach ($weather_data_forecast->list as $day) :
                        $day_of_week = date('Ymd', $day->dt);
                        $forecast_hour = date('H', $day->dt);

                        // For future days, store the temperature for 12:00 (noon) forecast
                        if (empty($forecast_days[$day_of_week])) {
                            $forecast_days[$day_of_week] = [
                                'dt' => $day->dt,
                                'icon' => $day->weather[0]->icon,
                                'temp' => $day->main->temp,
                                'temp_min' => $day->main->temp_min,
                                'temp_max' => $day->main->temp_max,
                                'is_today' => ($today_date === $day_of_week)
                            ];
                        } else {
                            // For future days, prefer noon temperature (around 12:00)
                            if ($forecast_hour == '12' || $forecast_hour == '13') {
                                $forecast_days[$day_of_week]['temp'] = $day->main->temp;
                                $forecast_days[$day_of_week]['icon'] = $day->weather[0]->icon;
                            }
                            // Update min/max temperatures
                            if ($day->main->temp_min < $forecast_days[$day_of_week]['temp_min']) {
                                $forecast_days[$day_of_week]['temp_min'] = $day->main->temp_min;
                            }
                            if ($day->main->temp_max > $forecast_days[$day_of_week]['temp_max']) {
                                $forecast_days[$day_of_week]['temp_max'] = $day->main->temp_max;
                            }
                        }
                    endforeach;

                    // Display unique forecast days, starting from tomorrow
                    $count = 0;
                    foreach ($forecast_days as $forecast_day) : 
                        if ($forecast_day['is_today']) {
                            continue;
                        }
                        if ($count >= $forecast_days_count) break;
                    ?>
                        <div class="weather-forecast">
                            <div class="forecast-day"><?php echo date('D', $forecast_day['dt']); ?></div>
                            <div class="forecast-icon">
                                <?php
                                $daily_icon_code = $forecast_day['icon'];
                                $daily_icon_name = newsx_get_weather_icon_name_by_code($daily_icon_code);
                                newsx_weather_icon_markup($daily_icon_name);
                                ?>
                            </div>
                            <?php 
                                $day_temperature = round($forecast_day['temp']);

                                if ('cel' == $instance['temperature_unit']) {
                                    $day_unit = '°C';
                                } else {
                                    $day_unit = '°F';
                                } 
                            ?>
                            <div class="forecast-temp"><?php echo esc_html(round($day_temperature) . $day_unit); ?></div>
                        </div>

                    <?php 
                        $count++;
                    endforeach;
                    endif;
                    ?>

                </div>
            </div>

        <?php
        endif;

		$this->widget_end( $args );
    }  
}

// Register the widget
function register_weather_widget() {
    register_widget( 'Newsx_Weather_Widget' );
}

add_action( 'widgets_init', 'register_weather_widget' );
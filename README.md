# Interactive Weather Dashboard

This project is an advanced weather dashboard with user-centric functionality and modern design, built using Laravel and Vue.js.

## Project Background and Objectives

Developed during my internship to learn more about Laravel, Vue, and RESTful APIs, this project aims to provide a rich source of real-time and historical weather data. Users can interact, personalize, and share experiences. The project integrates Laravel Jetstream, Vue3, Tailwind CSS, and the [OpenWeatherMap API](https://openweathermap.org/api/one-call-3), utilizing Laravel's Queues/Jobs.

## Features

- Real-time and historical weather updates
- User authentication and personalized dashboards
- Responsive design and modern UI
- User interaction through profiles, saved locations, and comments
- Personalized weather notifications via OneSignal
- Explore weather for random locations

## Technical and Functional Requirements

- **Setup:** Configure Laravel Jetstream, Vue3, Inertia.js, and Tailwind CSS.
- **API Integration:** Custom integration with OpenWeatherMap API using packages like [Saloon](https://docs.saloon.dev/).
- **Database:** Design schema for weather data storage and periodic updates.
- **User Interaction:** CRUD operations for profiles, locations, and comments.
- **Notifications:** Implement OneSignal for weather updates.
- **Frontend:** Central user dashboard for weather information.

## Design and Style Guidelines

- **Colors:** Vibrant purple and blue tones
- **Typography:** Clean, sans-serif fonts
- **Layout:** Grid-based and structured
- **UI Elements:** Minimalist with subtle shadows
- **Whitespace:** Generous for clear UI
- **Data Visualizations:** Informative and readable

## Installation

### Prerequisites

- PHP >= 7.4
- Composer
- Node.js & npm
- Git

### Steps

1. Clone the repository and navigate to the directory:
   ```bash
   git clone https://github.com/your-username/interactive-weather-dashboard.git
   cd interactive-weather-dashboard
   ```
2. Install backend and frontend dependencies:
   ```bash
    composer install
    npm install
   ```
   

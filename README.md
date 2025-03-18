# 📅 Event Management Platform

A powerful, modern web application built using **Drupal 10**, **React**, and **Leaflet** to create, manage, and explore events interactively.

## Project Overview
This application allows organizers to create and manage events. Users can view detailed event information, register easily through intuitive forms, and visualize event locations on an interactive map.

---

## Technologies & Tools

- **Drupal 10**
- **DDEV (Docker-based development environment)**
- **Webform Module** (user registration forms)
- **Views Module** (reports & aggregations)
- **JSON:API Module** (RESTful API)
- **Twig** (custom theming)
- **React & React-Leaflet** (interactive frontend map)
- **OpenStreetMap & Nominatim** (geocoding event locations)
- **GitHub Actions** (CI/CD pipeline)

---

## Key Features

- **Event creation:** Easily create and manage events within Drupal.
- **Registration system:** Users can sign up directly for events using Drupal Webforms.
- **Dynamic reporting:** Generate real-time reports with the number of event registrations.
- **RESTful API:** JSON:API integration allows external apps and services to consume event data effortlessly.
- **Custom theme:** Modern and intuitive UI built with Twig and custom CSS.
- **Interactive map:** React-based frontend with Leaflet, displaying accurate event locations from addresses.
- **CI/CD:** Basic automated testing pipeline with GitHub Actions for continuous integration.

---

## Installation and Setup (Local Development)

### **1. Drupal Setup with DDEV**

Clone the repository and install Drupal dependencies:

```bash
git clone https://github.com/RafaMaito/event-management.git
cd event-management
ddev start
ddev composer install
```

### **2. React Frontend App**
The React frontend application is located inside the `react-map-app` directory of this repository.

To run locally:

```bash
cd react-frontend
npm install
npm start
```
### **3. Configure Drupal CORS**
Enable React app requests:
Edit file: web/sites/default/services.yml

```bash
cors.config:
  enabled: true
  allowedHeaders: ['x-csrf-token','authorization','content-type','accept','origin','x-requested-with']
  allowedMethods: ['GET','POST','PATCH','DELETE','OPTIONS']
  allowedOrigins: ['http://localhost:3000']
  exposedHeaders: ['Link']
  maxAge: 1000
  supportsCredentials: true
```
Clear Drupal cache:
```bash
ddev drush cr
```
### **REST API Endpoints (JSON:API)**
List events (title, date, location):

```
GET /jsonapi/node/event?fields[node--event]=title,field_event_date_time,field_event_location
```
### **Interactive Map**
The React application fetches event locations dynamically from Drupal, converting addresses to coordinates using OpenStreetMap (Nominatim API).

### **Continuous Integration (GitHub Actions)**
Basic workflow configured to:

- Run PHP lint checks
- Verify Drupal dependencies and setup
Check workflow files at: .github/workflows/ci-cd.yml

### **Future Improvements**
Implement a gamification system for frequent participants.
Advanced automated testing (PHPUnit, Cypress).
Email/SMS notifications for event reminders (Drupal & Symfony).

### **License**
This project is open-source and available under the [MIT License](https://opensource.org/license/mit).

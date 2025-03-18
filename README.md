# 📅 Event Management Platform

A powerful, modern web application built using **Drupal 10**, **React**, and **Leaflet** to create, manage, and explore events interactively.

## 🚀 Project Overview
This application allows organizers to create and manage events. Users can view detailed event information, register easily through intuitive forms, and visualize event locations on an interactive map.

---

## 🛠 Technologies & Tools

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

## ✨ Key Features

- ✅ **Event creation:** Easily create and manage events within Drupal.
- ✅ **Registration system:** Users can sign up directly for events using Drupal Webforms.
- ✅ **Dynamic reporting:** Generate real-time reports with the number of event registrations.
- ✅ **RESTful API:** JSON:API integration allows external apps and services to consume event data effortlessly.
- ✅ **Custom theme:** Modern and intuitive UI built with Twig and custom CSS.
- ✅ **Interactive map:** React-based frontend with Leaflet, displaying accurate event locations from addresses.
- ✅ **CI/CD:** Basic automated testing pipeline with GitHub Actions for continuous integration.

---

## 🚧 Installation and Setup (Local Development)

### 📌 **1. Drupal Setup with DDEV**

Clone the repository and install Drupal dependencies:

```bash
git clone https://github.com/RafaMaito/event-management.git
cd event-management
ddev start
ddev composer install

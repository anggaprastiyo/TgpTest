# The Gym Pod Simple Dashboard Apps
a simple application project that I created in order to take a skill test to be part of the gym pod team. This application was created using [Laravel](https://laravel.com/) and [Vue.js](https://vuejs.org/) and basic template admin [adminlte-3](https://adminlte.io/themes/v3/) with the following needs :

 1. Login Page (with hardcoded username & password)
 2. Once Login, Bring admin to Home Page to display pagination bookings with (Pod Name, User Name, Phone, Status, Price, Booking Date, Booking Time)
 3. Add filter option to the dashboard (Status, Pod Name, Date Range)
 4. Details Page for individual booking, Access the booking details from the List (**I choose to display the detail page with `modal`**)
 
## Apps Structure

[![](https://mermaid.ink/img/eyJjb2RlIjoic2VxdWVuY2VEaWFncmFtXG5WdWUgLS0-PiBMYXJhdmVsQ29udHJvbGxlcjogdmlhIGF4aW9zIChyb3V0ZS5hcGkpXG5MYXJhdmVsQ29udHJvbGxlci0tPj5MYXJhdmVsTW9kZWw6IGVsb3F1ZW50IC8gREIgYnVpbGRlclxuTGFyYXZlbE1vZGVsLS0-PkRhdGFiYXNlOiBxdWVyeVxuRGF0YWJhc2UtLT4-TGFyYXZlbE1vZGVsOiByZXN1bHRcbkxhcmF2ZWxNb2RlbC0tPj5MYXJhdmVsQ29udHJvbGxlcjogcmVzdWx0IChhY2Nlc3NvcixtdXRhdG9yKVxuTGFyYXZlbENvbnRyb2xsZXItLT4-VnVlOiBKU09OXG4iLCJtZXJtYWlkIjp7InRoZW1lIjoiYmFzZSJ9LCJ1cGRhdGVFZGl0b3IiOmZhbHNlfQ)](https://mermaid-js.github.io/mermaid-live-editor/#/edit/eyJjb2RlIjoic2VxdWVuY2VEaWFncmFtXG5WdWUgLS0-PiBMYXJhdmVsQ29udHJvbGxlcjogdmlhIGF4aW9zIChyb3V0ZS5hcGkpXG5MYXJhdmVsQ29udHJvbGxlci0tPj5MYXJhdmVsTW9kZWw6IGVsb3F1ZW50IC8gREIgYnVpbGRlclxuTGFyYXZlbE1vZGVsLS0-PkRhdGFiYXNlOiBxdWVyeVxuRGF0YWJhc2UtLT4-TGFyYXZlbE1vZGVsOiByZXN1bHRcbkxhcmF2ZWxNb2RlbC0tPj5MYXJhdmVsQ29udHJvbGxlcjogcmVzdWx0IChhY2Nlc3NvcixtdXRhdG9yKVxuTGFyYXZlbENvbnRyb2xsZXItLT4-VnVlOiBKU09OXG4iLCJtZXJtYWlkIjp7InRoZW1lIjoiYmFzZSJ9LCJ1cGRhdGVFZGl0b3IiOmZhbHNlfQ)

because this is a simple app, I don't separate the front end and back end into two applications, but still accommodate them in the same project but use the concept of SPA `(Single Page Application)` with `vue router`

## Installation

    prerequisite : create an database with name "tgpdb"

```sh
$ git clone https://github.com/anggaprastiyo/TgpTest.git
$ composer install
$ npm install
```
```sh
$ php artisan migrate
```
>  - pods
>  - customers
>  - booking_statuses
>  - bookings
```sh
$ php artisan db:seed
```
>  - seeding 5 data pods 
>  - seeding 100 data of customer
>  - seeding 3 data booking_statuses (Pending,Paid,Cancel)
>  - seeding 5000 data bookings based on customer, pods and booking_statuses

## Screen Shoot


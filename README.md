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

## API

![enter image description here](https://user-images.githubusercontent.com/8073479/105620471-20671600-5e30-11eb-8442-8c3c502830a0.JPG)


## Screen Shoot

 1. Sign In Page
 
 ![enter image description here](https://user-images.githubusercontent.com/8073479/105620319-51dee200-5e2e-11eb-8651-65d6885efee7.png)
 
 2. Home Page / Booking
 
 ![enter image description here](https://user-images.githubusercontent.com/8073479/105620326-6de28380-5e2e-11eb-9d68-fc95f7b0ee16.png)
 
 3. Filtering Data
 
 ![enter image description here](https://user-images.githubusercontent.com/8073479/105620372-011bb900-5e2f-11eb-8f4f-56f8f5ffd03e.png)
 
 4. Data Filtered

![enter image description here](https://user-images.githubusercontent.com/8073479/105620398-332d1b00-5e2f-11eb-8a65-42168a9ddebe.png)

 5. Booking Detail
 
 ![enter image description here](https://user-images.githubusercontent.com/8073479/105620408-5fe13280-5e2f-11eb-9308-1a04700b8e43.png)




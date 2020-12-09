# 🦷 Laravel Backend Dental Clinic 🦷

This is a project where I have used PhP and Laravel for a Dental Clinic.

You can be a client and create appointments, view and delete them, or you can be an administrator where you can view the appointments of all users.

- Links to test the demo:
  - Backend: https://guarded-harbor-30350.herokuapp.com/api
  - Frontend: https://front-dental-clinic-laravel.herokuapp.com/

🔧Technologies🔨

- PHP
- Laravel
- MySQL
- Composer
- Passport
- Postman
- GitHub
- Heroku

## Important

### You need to have certain things installed:

  > composer update

  > php artisan migrate

  > php artisan passport:install

### Configuration

- Set up the Database config and project in the .env file.

### Run it with: 
> php artisan serve

## Endpoints 📍

### Clients: 

- POST /client/register ➡ A new client is added.
- POST /client/login ➡ Client logs into his account.
- POST /client/logout ➡ Client extis his acccount.

### Appointments: 

- POST /appointment/create ➡ Client can create an appointment.
- DELETE /appointment/cancel/{id} ➡ Client can cancel an appointment.
- GET /appointment/show ➡ All appointments are displayed.
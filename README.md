### Desevens Senior PHP Developer (Task)

My name is Ilori Stephen Adejuwon and I am full-stack software developer. This **Git Branch (Main)** is the codebase that powers the live application on **Heroku**. The project is built on top of **Laravel** with some **Npm Packages** installed. To have this project on development, please, **Clone** the **development branch** and follow the guidelines below.

## Steps
1. Git Clone This Branch.
2. Verify That Composer Is Installed By Running The Command, `composer -v`.
3. If Composer Is Not Installed, Install Composer And Try Again. If You Have Composer Installed, Run The Command `composer install`.
4. After The Installation Is Complete, verify that **Nodejs & Npm** is installed by running the command `node -v`, `npm -v`.
5. After The Verification, Run The Command `npm install`.
6. Create A New file in the project's root directory using this command on linux `cat .env` and copy the code from **.env.exmaple** into the created **.env** file. On Windows, replace **cat** with **echo >** and continue.
7. Run the command **npm run build** to build the project's dependencies.
8. Run the command **php artisan migrate** and **php artisan db:seed**.
9. Run the command **php artisan serve**.

## Credentials
The **php artisan migrate** creates some default accounts which are useful for testing. The password all defaults to **password**.

In the .env file, be sure to replace the **MAILTRAP Configurations** with your own credentials.

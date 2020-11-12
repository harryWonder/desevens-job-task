My name is **Ilori Stephen A** and I am a full-stack software developer with two years of experience in building, updating, debugging, and testing web applications. In this lesson, I will be teaching you how to build a **Fullstack CRUD** application using **Laravel and Vuejs**.

Before we begin, I'm sure you'd like us to get straight to the codes but why don't we take some time off while I introduce you to some terms and the requirements for this lesson.

Laravel is a **PHP Framework** used in building sophisticated **SASS** applications while **Vuejs** is a javascript frontend framework for building **reactive** frontend applications or **Single Page Applications**.

## Why Should You Learn How To Build A Fullstack Application

There are so many reasons to build a **Fullstack Application**, but because of time, we will only touch a few points.

1. Building a **Fullstack Application** exposes one to a lot of development experience which actually makes you a better software developer. I mean who doesn't wanna get better?
2. When you build a **Fullstack Application**, you have all your codes in one place and this makes updating your code easier as it's within reach. Unlike other applications where you have the Client(Frontend) seperated from the server(Backend) writing updates for them can really be a huge pain.
3. Another cool reason about why you should learn how to build a fullstack application is that it gives you the edge over other developers as you have been able to gather more experience by working on both Frontend and Backend channels in the application development process.

With that being said, I'm sure you are already thinking about becoming a **Fullstack Developer**.

## Glossary

While I was building this lecture, I came across several **Tech Jargons** related to this lecture. So in order for you not to get lost when you come across some of the terms, I have decided to share them with you.

1. **Migrations**: When you hear the word migration, you start thinking of herds migrating or something but that's not the case really. For this lesson, A migration is a service that allows you to create a table in your database without actually using your database manager.
2. **Scaffolding**:  Well, we are not talking about physical building, but a **Scaffolding** aims to quickly help you get started in your project or app by creating a skeleton or boilerplate for you. Whatever you are comfortable with.
3. **Endpoints**: Simply put, an **Endpoint** is one End of a communication channel. When an **API** interacts with another system, The touchpoints of this communication are called **Endpoints**.
4. **Model**: In Laravel, A Model is a class that represents the logical structure and relationship of underlying data tables.

Those are the few terms I was able to research but as we proceed, I'll do my best to explain any term that I feel you might find difficult while reading.

## Project Requirements

In order for us to get the best out of this lecture, there are some requirements that needs to be satisfied. So I'd like us to go through the requirements before we get to the codes.

1. **Experience**: In order to get the best out of this course, I recommend that you have more than basic **PHP** programming experience. At least, you should be familiar with **MVC Designs** and have basic knowledge of frameworks like **Laravel** and also **Vuejs**.
2. **PHP**: It is also important that you have the latest version of **PHP** installed. If that's not possible, I recommend having at least **PHP** versions from **7**.
3. **Laravel**: After we have satisfied the requirements above, we can go ahead and install **Laravel**. Head to their [official website ](https://laravel.com)to learn how to install the **Framework**.
4. **NPM**: For this lesson, I also recommend that you have **Nodejs** and **NPM** installed. This is because we will have to install some **Nodejs** packages for development purposes. Head over to the [official Nodejs website](https://nodejs.org) to learn how to install the **Framework**.
5. **Passport**: For this lesson, I'd advise you understand how to setup passport for authentication in Laravel. I won't be covering this because of time. You can visit [laravel's Official Website](https://laravel.com) or check out this resource on [Medium](https://medium.com/modulr/create-api-authentication-with-passport-of-laravel-5-6-1dc2d400a7f). In coming weeks, I'd also like to talk about how to get started with passport on your laravel application with you.
6. **Heroku Account**: I also advise that you create an **Heroku Account** if you don't have one. I won't talk about this as well because of time.
7. **Text Editor Or IDE**: It is also important that you have a text editor or IDE to write out the codes listed in this lesson. There are a whole lot of text editors out there such as **Bracket, Atom, & Visual Studio Code**.

With the requirements all satisfied, we can start writing some codes now. Chuckles, I just wore a smile now. You can check the image below to get yourself familiar with **Laravel's folder structure.**

![Laravel's Folder Structure](https://res.cloudinary.com/dw0donhwr/image/upload/v1603135438/Screenshot_from_2020-10-19_20-06-25_sokmtf.png)

## **1. Setting The Application Environment**

Under this section, we will talk about how to set our application configuration which in this lecture is just about our **Database**.

### **The .env File (Root Directory)**

The first we will be editing in this project is the **.env** which exists in our projects root directory. This file contains all the credentials needed for our application to run.

For this lesson, we are editing the database section of the config alone. You can modify the line in the github gist to fit your database credentials.

[gist]95a35a5cfd7be9c101c740f5d3e54cb5[/gist]

### **The Database.php File (Config Folder)**

Just inside of the **config folder** is a **database.php file**. Inside of this file, we will find all the functions needed to establish a database connection dependng on the database driver.

Inside of the file, we will be editing the line that reads mysql since we are using mysql as our database. If you are stuck, I have attached a github gist below for you to get familiar with the line you have to edit with the same values we used when changing the database values in our **.env file**.

[gist]cb9b65ce1f8689a2dc3fc38b5a0f28f5[/gist]

With that out of the way, we have successfully set up our database connection for our application. The next thing we have to do is create Models, Migrations & Seeds For Our Application.

## **2. Creating The Models, Migrations & Database Seeds**

When building applications, we always need some data we can work with or manipulate at least. The creators of **Laravel** understood this so they made it very easy to create _mysql tables_ without visiting _phpmyadmin_ to create the tables manually.

They also made went extra and made some seeder functions that would help fill the created tables with some dummy data that we can test with.

### **The Models**

Under this section we will talk about how to create **Models** with **Laravel**. Luckily for us, **Laravel** has a whole bunch of amazing commands that we can run from the **cli** to get started.

With that said, let's open up our project's root directory in a new terminal window or command prompt and enter the command below.

[gist]8768c588f48964ad748944d4ee79ccb6[/gist]

By using the command above, we were able to create four files. We have two files created in the **app directory** and two files created in the **migrations folder** inside the **database directory**.

#### **Editing The Models File**

We will start by editing the two new files created inside of the **app folder root**. It is also important for us to note that we have a **User Model** inside of the same **app folder root**.

The **Comment.php Model/File** is an alias to the **comments table** in our created database. Inside of it, we can define **relationships** and also columnns related to the comments table. With that said replace the content of your **Comment.php file** with the github gist below. There will be some explanation later to the codes that was added to the file.

[gist]118250c783dbe4c49d7fde4cf1434263[/gist]

The **Forum.php Model/File** is also an alias to the **forums table** in our applications **mysql database**. Inside of this file, we can define **relationships, columnns and a few more sophisticated features as well.** Now that we understand what a **Laravel Model** is all about, replace the content of your **Forum.php file** with the code below. I will explain the additional codes in the file later.
[gist]6d0729cf93f9bd2b7d6e2cf0ce88a7cf[/gist]

By default, Laravel creates a **User.php Model** for us. I'm not going to go over what a model is at this juncture but I'll advise that you update the content of that **User.php file** with this instead.
[gist]1f804bef9a9da84719a4f0e6e51b9c43[/gist]

### **The Migrations**

While we were creating our **Application Models** with the `php artisan make:model -m` Command, **Laravel** took care of our **Migrations** for us thanks to the **-m alias** we added to our command.

I already explained what a migration is at the beginning of this lesson. So, we will get straight to updating the content of the created **migration files**.

By default, Laravel comes with around 2-3 migration files by default. But for this lesson, we will only be editing 2 of the files inside of this **migration folder**.

1. **Updating 2020_09_10_084130_create_comments_table Migration File:**
    This file is responsible for creating our **comments table** as it's name implies.
    It also contains a few methods from the _Blueprint_ class passed to the `Schema::create` callback function. The methods are similar to defining our database coulmns datatype.

    I'm sure the definition of a **Migration** is very clear now. Now that we are on the same page, we can replace exchange the content of the **comments migration file** with the code below.
    [gist]1a307a2a0ee59c71b73bf6b7145217a8[/gist]

2. **Updating 2020_09_11_102345_create_forums_table.php Migration File:**
    This File helps us create a **forum mysql table** in our application's database. I'm pretty sure we are on the same page with the definition of a **migration**. Let's get to the next code exchange by replacing the **forums migration file** with the git gist below.
    [gist]8f25fbe46bd9297daffc9f2088404402[/gist]

We are getting pretty close to creating controllers and views for our application but before we get to that, we have a few more things to do. One of which is creating **database seeds.**

### **Creating Database Seeds**

**Laravel** is filled with a lot of awesome packages which makes development a breeze. One of this packages is seeding or filling up our database with dummy data for testing/development. Let's create some dummy forums and some dummy users for our application.

#### **The Forums Table Seeder**

Copy the **code snippet below line by line and execute it by opening up the project root directory in your computer terminal or command prompt**.

[gist]fc3d2bb416d967b61c8afd4ae3c12ebc[/gist]

You'll find that after entering those command, two seeder files **ForumsTableSeeder.php** and **UsersTableSeeder.php** was created inside of the **seeds folder.** We will get to the third file created later.

Without saying much, I'd like us to replace the content of the **ForumsTableSeeder.php file** with the code below.

[gist]ae3f0b7f4acba2bd20c8ac63a7a25e7d[/gist]

We have a **method** that is fired by our application when we run the **artisan command**
`php artisan db:seed`.

Inside of this class, we have a **factory method** that takes two arguement. The first one being the path to the class and the second being the number of records we want to save in the database. The **create method** which is also attached to the **factory method** as it name implies is the final process in creating our factory. It also accepts optional arguements which can also be used for columns in our database.

#### **Users Table Seeder**

Open the **UserTableSeeder.php file** that was created and replace all the contents with the code provided below.

[gist]b5b54b4f95950fe2eee6614c5c606a7b[/gist]

I'm not going to explain what the code you just copied does because we went over the explanation in the first seeder that was created **ForumsTableSeeder.php**. With that all cleared out, we'd talk about the most important file in making our **seeds** work which is the **DatabaseSeeder.php**.

#### **Database Seeder File**

This file is responsible for loading and running all of the seeds that we created. We can run the command by utilizing an **artisan command**, but more of that later. Update the codes inside of the **DatabaseSeeder.php** file with the git gist below.

[gist]c52775e44ce177ffceefd08942b27fff[/gist]

### **Database Factories**

Inside of our **database folder**, we have a **sub-folder** called factories. Open opening this folder, you'll see two files. The **ForumFactory.php** and the **UserFactory.php**. One of those files was created from the **artisan command** we ran earlier. `php artisan make:factory **FACTORY_NAME**`, while the other file **UserFactory.php** is provided by **Laravel** by default.

#### **Updating The ForumFactory.php**

The fatcory file loads in our **Forum class**, a **Faker Class** and a **factory class** as well.

A method named **define** is called from the loaded **factory class**. This method accepts two **arguements**. The **Database Model to use** and a **callback function** with the **faker class** as a **dependency** to the **callback function**.

The faker instance is used to call other properties inside the **callback function** which returns an array at the end.

With that all cleared out, The next thing as always is to replace/update the code inside of the **ForumFactory.php file**

[gist]a0d5591ee8e5b385ddd76fc36797d693[/gist]

Now that we have completely set up our database, it's time for us to run some `artisan commands` and move on to the next phase in this lesson. Run the `artisan command` listed below by opening up the **project directory** in your **command prompt** or **terminal**.

[gist]d4f8cddfb9813a7355142543d31d0644[/gist]

If you have problems executing this file, you can replace the first command with `php artisan migrate:refresh`.

## **3. Installing The Auth Scaffolding**

Open your `phpMyAdmin Console` in yiur browser and navigate to the **database name** created for this lesson. You will find some tables and data all taken care of for by **Laravel**.

The next thing is to create an **Auth Scaffolding** for our application. Open your project root directory in your command prompt again and enter the following commands.

Depending on your laravel version, things might break but I recommend that you stick to **laravel versions from 7 upward**.

1. Run the **composer require laravel/ui** **command** with your project directory opened up in your terminal.
2. Run the **npm install command** with your project directory opened up in your terminal.
3. Open your terminal and navigate to this lesson directory and enter the command **php artisan ui vue --auth**.
4. Install the following npm packages as well **`npm install ckeditor4-vue sweetalert vue-router vuex --save `**

With all those command successfull, I can say we have successfully created an **Authentication Scaffold** for our application. The next thing we have to do is to create the **API** and all the neccessary **Endpoints** needed for our client.

## **4. Creating Controllers**

Next up, we will be creating controllers for our application. You can think of the controllers as the major part of our application. Under this lesson, we will be creating several controllers to utilize the models we created earlier.

### **Creating The Auth Controllers**

When you open the **Controllers Folder**, you'll find a new folder called **Auth**. This folder contains all the files needed to make authentication possible for us. But in our case, we will only be updating the **LoginController** and the **RegisterCotroller**.

Without much delay, I'd like us to replace the content of the **LoginController** with the code below.

[gist]58f42d6e753b3407925d188a1b83dd02[/gist]

The **LoginController.php file** has one major **method** that we are concerened about which is the **login method**. This method loads in the **Request Class** as a **dependency** and this _Class_ holds all the incoming requests coming from the client which we will be manipulating. You can check out the official [Laravel Documentation](https://laravel.com/docs/8.x/authentication) to learn more about authentications with Laravel.

The **SignupController.php file** is responsible for creating new **user accounts**. Inside of this file or _Class_, we have one **method** which is called **create**. This **method** also loads in the **Request Class** as a dependency. This file does some simple validation and it returns a **JSON** content back to the **Client**. With that out of the way, we can replace the content of the **SignupController.php file** with the gist provided below.

[gist]1582ba82a8107f641578301177de0290[/gist]

With those two section out of the way, we can say we have successfully created authentication for our application. Now, the next thing we have to do is create the other **Controllers** for this lesson.

### **Creating The Forums Controller**

Under this section, we will create a **Controller** for the **Forums Endpoint**. This **Endpoint** will help us achieve the following features.

1. Create A New Forum.
2. Fetch A Specific Forum.
3. Fetch All Forums.
4. Update A Forum.
5. Like A Forum.
6. Delete A Forum.

In order for us to start, there is another **artisan command** I will like to show us. This **artisan command** will help us create a new **controller** instead of doing it manually.

Open up the project in your **cmd** or **terminal** and enter the command `php artisan make:controller ForumsController`.

This command will create a new file inside of the **controllers folder**. Inside of the newly created file i'd like us to replace the contents of the file with the code provided below.

[gist]3c7e39b89b30946b1ec0c6ebd663df1e[/gist]

### **Creating The Comments Controller**

Now that we have created a **controller** for our forum, I think it's only fair to create another **controller** for our comments since there will be some comments.

With that said, let's open the project in a new terminal window and execute the command below. `php artisan make:controller CommentsController`. This will also create a new **controller** inside of the **controller folder**. Replace the content of the created **CommentsController** with the code snippet provided below.

[gist]282929fe3f6ef30cb136edd1a78453af[/gist]

We have been able to create controllers for our application and the next thing we will be looking at is creating **routes** or **Endpoints** for our application.

## **5. Creating Routes**

There is an **api.php file** inside of our **routes folder** in the project root directory. Open up that file and replace the code with the snippet provided below.

[gist]5fe2f69d5d6249a0ac0470572e6f51e4[/gist]

## **6. Writing Vuejs**

This is the final section in building our application. We will be using **Vuejs** for rendering our pages instead of **Laravel Blade**. Inside of the **js folder** in the **resources folder**. We will create some folders namely:

1. **components**
2. **includes**
3. **routes**
4. **views**

I decided to use skeleton css as my **Css Framework** for this lesson and the style assets are in the **Css folder** inside the public directory. You can use any **Css Framework** of choice provided you know your way around the framework.

We will also create a new file in the **js folder** root directory. The file will be our **Base Template** and it will be called **App.vue**. After creating the file, I'd like us to write the code below into the **App.vue file**.

[gist]0913dddb9b41020b7cb05e5e2d18afbd[/gist]

_The **router-view** tag is where all of our views will be created depending on the web page the user is visiting._ The next step is to create our **Base Nav** because we want to have the same header in all of our pages.

## **7. The Base Nav**

Inside of the newly created **includes folder**, I'd like us to create a new **Vue file** and call it **Nav.vue**. This is because we want to have a consistent Navigation across all of our web pages. After that open the created **Nav.vue** inside of the **includes folder** and replace add the following codes to it.

[gist]336c583b50a598641eda5eaacaa47f6b[/gist]

A basic **Vuejs file** is divided into 3 sections namely;

1. **Template:** This is what is inserted into the **DOM** and it contains your HTML Codes and some times you'd see other **Vuejs Component** used here as a component job is to _render a basic html page._

2. **Script:** This is where all our business logic goes. We have access to lifecycle hooks which can help us render actions at a point in time when the **Component** is being created.

3. **Style:** This is where our **CSS styles** go and another great thing here is that you can use **Css preprocessors** as well.

## **8. Creating The Welcome Component**

Inside of the **components folder** we created earlier, I'd like us to create a new file and call it **WelcomeComponent.vue**. This file is going to act as our **web app** _home page_, _login page_, and also the_signup page_.

After creating the file, copy and paste the codes below into the file.

[gist]383bf7999ef5f0a2eec94c829b7a9ada[/gist]

Inside of this file, we have our template section which contains **HTML Elements** that help us create our **Login Form** and our **Signup Form**.

In our **scripts section**, we require our **Nav.vue** file which contains our **Navbar Codes**. There are also some **third party packages such as sweetalert and axios** which are imported into the file. We have several objects such as;

1. **Components**: This is where other components that we will like to reuse stays.

2. **Methods**: This is where all our methods will stay. Inside of this object, we have several methods and some of them are responsible for authenticating a user. The methods provided here make an `HTTP Request` to the `Endpoints` we created earlier in our `Controllers`.

3. **Lifecycle Hook**: We have a **created lifecycle hook** and this hook is fired when our component has been created. Inside of this hook, we are checking our _localstorage_ for a value to see if the user is logged in or not.

4. **Data Object**: We have our **data object** inside of this data property and this is used for storing data that will be utilized in the template above or in some of our methods.

5. **Style**: We have some **CSS Style** which is used only in this Component for tweaking some things.

## **9. The Dashboard Component**

This is where **authenticated user** goes and this **Component** is also responsible for managing **CRUD** features or functionalities for the **Forums** we created earlier. Create a new file in the **components folder** and name it **DashboardComponent.vue**. Copy the github gist below into the file.

[gist]040f2c1a0e45d84949c8fd9643e7e715[/gist]

Inside of this file, we have our `template section` which is where our **HTML Code** goes and also other **Components** as well. Now, our scripts section under this component is where all of the major code lies.

Inside of the _methods object_ we have several methods that makes `HTTP Request` to the `ENDPOINTS` we created earlier which creates, updates, fetch, and delete forums. It also has methods that makes `HTTP Request` to fetch comments for each of the forums.

## **10. Creating The Views**

Our Components has been created. Now it's time for us to create our views. This views are the files that will be loaded into our routers. Let's get to creating our views right away.

### **The Welcome View**

Create a new file in the views folder and name it **Welcome.vue**. This file is going to be responsible for loading in our **WelcomeComponent** that was created earlier. This is because it's better for us to seperate the logic for our application so it will be easier to update. With that clear, paste the code below into the **Welcome.vue** file.

[gist]4f648216a85a399dd6b4906a014ae6f7[/gist]

### **The Dashboard View**

Let's repeat the same step for the welcome view by creating a new file called **Dashboard.vue** in the **views folder**. This file also loads in our **Dashboard Component** which will be rendered in the **Dashboard.vue** template section before it is inserted into the **DOM**.

Copy the code below into the **Dashboard.vue file**.

[gist]a26b9a905ea8afb3f2d41644eedf5c40[/gist]

## **11. The Routes**

Inside of this folder, create a new file and call it **index.js**. This file is going to load in all of the files in our **views folder** so that they can be rendered to the **DOM** depending on the **HTTP Path** requested. Copy and paste the code below into the file.

[gist]8d3cfc949e614c99bda5ce47b7593c97[/gist]

## **12. The App Core**

Inside of our **Js folder** root directory, there is a file called **app.js**. Replace the content of the file with the code snippet provided below.

[gist]1d6511e01c2879508733462045e4e497[/gist]

We are almost done with our application. The next thing we have to do is modify one of **Laravel's Blade File**. We will be editing the **welcome.blade.php**. This file is located in the **resources folder** inside of a **sub-folder** called **views**. Replace the content of that file with the code below.

[gist]dbaeeab6bfbc9456fafb3bb02d5bbbe6[/gist]

## **13. Testing Locally**

The next thing we have to do is to test our code locally. This is to ensure that the code works before we finally deploy the code to heroku. Run the command below in seperate terminal windows with the project path opened up.

1. `php artisan migrate`

2. `php artian passport:install --force`

3. `npm run watch`

4. `php artisan serve`

If everything works fine, Open up your browser and navigate to `http://127.0.0.1:8000`. The application then will now boot and render our page. You can create a few account to test and also create some forums and some comments as well. This is the view of the finished application on my system.

Meanwhile, you can get the complete development code for this tutorial from [Github](https://github.com/learningdollars/stepheni-laravel-vue-crud-heroku/tree/main).

![Ld Fullstack Image](https://res.cloudinary.com/dw0donhwr/image/upload/v1603711663/Screenshot_from_2020-10-26_11-40-34_kxjegk.png)

![Ld Fullstack Image II](https://res.cloudinary.com/dw0donhwr/image/upload/v1603711636/Screenshot_from_2020-10-26_12-01-14_jwtkud.png)

## **14. Deploying To Heroku**

The final step in this lesson is to deploy our code to a live server. We will be using heroku and I assume you already have an heroku account.
Please, I advise that you follow this step by step guide.

### **Step 1**

1. Install The [Heroku Cli](https://devcenter.heroku.com/articles/heroku-cli#download-and-install).

2. Login to the CLI from your terminal with the command `heroku login`.

3. Replace the **Package.json file** in the project root directory with the gist below.

   [gist]80b0d27394a47998c694c798c5a439b6[/gist]

4. Replace the **composer.json file** in the project root directory with the github gist provided below.

   [gist]dd452c4d0979eddb6d287eefd9de13fa[/gist]

5. Open the project root directory path in a command prompt window or a new terminal window and enter the command below.
   `heroku create`

### **Step 2**

6. With the command prompt or terminal window still opened, enter the following commands.
   `heroku buildpacks:set heroku/php`
   `heroku buildpacks:add --index 1 heroku/nodejs`

7. Commit the codes to github and also deploy the code to heroku using the command below.
   `git push heroku main`. If you are push from a seperate branch, you can do `git push heroku <branch name>:main`

8. Enter the code below after you have verified everything worked correctly and enter the code below.
   `heroku addons:create heroku-postgresql:hobby-dev`

9. Login to your heroku dashboard from your browser and open up the last app that was created by heroku. See the screenshot below as a guide.

   ![Heroku Project Board](https://res.cloudinary.com/dw0donhwr/image/upload/v1603726549/screencapture-dashboard-heroku-com-apps-glacial-woodland-75031-1603726402986_pvjmhr.png)

10. After clicking on the link in the highlighted section, you'll be redirected to another page. The page contains your database configurations. See the screenshot below as a guide.

    ![Heroku Postgress Configuration Page](https://res.cloudinary.com/dw0donhwr/image/upload/v1603717267/screencapture-data-heroku-com-datastores-2ac221aa-1439-4d5f-a45a-270d3046bed4-1603716553535_bkcdui.png)

11. The next step is to load our .env files into heroku. You can do that by using the command below in your terminal window or command prompt.

    `heroku config:set APP_NAME=Ld-Fullstack`

12. After you have successfully entered all the config from the .env, enter the command below.

    `heroku run php artisan migrate`
    `heroku run php artisan db:seed`
    `heroku run php artisan passport:install`

13. Login to your heroku dashboard again and click on the open app button by the top right corner.

### **Learning Tools**

There are a lot of learning tools online. But for this lesson, I utilized the resources below.

1. Laravel Doc: [Laravel Official Website](https://laravel.com).
2. Heroku Doc: [Heroku Official Website](https://devcenter.heroku.com/categories/reference).

### **Learning Strategy**

I used the learning tools above to achieve this with a ton of extra help from **Stack Overflow**. I got stuck several times while I was preparing this lesson and using **Stack Overflow** was the best thing I did. You can leave a comment below if you get stuck so we can treat the problem but at the same time, I recommend you use **Stack Overflow** most of the time.


### **Reflective Analysis**

It was very difficult especially with getting passport to work on **heroku** but I was able to gain some deeper insights into how **Heroku** works and programming in general.

Building a Fullstack application still comes in handy although most folks are migrating to building **JAMSTACK Apps** now but with a Fullstack application, you have all your codebase in one place and it makes updating or adding a new feature a lot easier.

You can also build a fullstack application with other technologies as well. Such as one with **Laravel & PHP**, **Nodejs & Vuejs**, **Nodejs & Reactjs**, and so much more.

While I was creating this lecture, I didn't make provision for the **logout** area but I believe you should be able to make that work. I have also provided you with the link to the active project and also the link to the development and test branch on github.

### **Conclusion**

This project mainly focuses on building a Fullstack application with **Laravel & Vuejs** but you can always build a Fullstack application with any technology provided you have good knowledge on how the technology works.

However, there are a few other combinations such as **Nodejs & Vuejs** or **Nodejs & Reactjs** you can try especially if you are from a javascript background. But I usually go with **Laravel** because it is very easy to setup and work with.

As a solo developer, you will find yourself building **Fullstack** applications more often because just as I said, it is easier to work with and it is also very easy to maintain.

[Get the complete project from github](https://github.com/learningdollars/stepheni-laravel-vue-crud-heroku)
[Test The Live Demo On Heroku](https://glacial-woodland-75031.herokuapp.com/#/home).

### Desevens Senior PHP Developer Task

This Branch (Main/Master) is the codebase powering the active or live application [View Project](https://shielded-stream-86154.herokuapp.com/). The codebase is built on top of Laravel & Vuejs as required. Please follow the steps listed below if the project has to be deployed on heroku.

## Steps

1. Run the `heroku create` command.
2. Add the php and nodejs buildpacks. `heroku buildpacks:set heroku/php
` and `heroku buildpacks:add --index 1 heroku/nodejs`.
3. Push the project to **Github**.
4. Push the project to heroku using **git push heroku main**.
5. After the project has been deployed successfully.
6. Install the **jawsdb addon**.
7. Get the **Jawsdb Env credentials** and upload the project .env file to **heroku**.
8. Open your terminal and run the command **heroku run bash**.
9. After the prompt or new terminal session, run the following command. **php artisan migrate && php artisan db:seed**.
10. You can now go ahead and view your app in the browser.

Good Luck. Ilori Stephen A

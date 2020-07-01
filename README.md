# CustomerDemo

A very basic CRUD mini Laravel project that allows user to create, update, and remove customer

  - This application handles **both API + Vue.js implementation** and **basic Laravel CRUD**
  - To check, go to /routes/web.php line 17; toggle $useBasicApi to false or true
  - Both implementations yields the same result
    - API + Vue.js (no page refresh)
    - basic Laravel (page refresh)

### Installation
Open command:
```sh
$ composer install
$ npm install
$ php artisan migrate
```
### Known bugs
  - Proper handling of 404 pages
  - Sometimes when creating user (right after creation) triggers bug
  - Poor CSS styling :(
  - No unit testing

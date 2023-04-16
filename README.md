<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## SYSTEM REQUIREMENTS
- PHP 7.4.30
- Composer 2.4.2
- MySQL 15.3
- Postman 10.10.7

## HOW TO INSTALL
- Please make sure you have compatible system
- Clone this project into your local machine
> git clone https://github.com/agusmichaelsianipar/bali-tower-test.git
- Move your terminal directory into the project
> cd bali-tower-test
- Install composer dependecies
> composer install
- Install NPM dependecies
> npm install && npm run dev
- Create a copy of your .env file
> cp .env.example .env
- Generate an app encryption key
> php artisan key:generate
- Make sure your database is well set-up
- Install Laravel Passport
> composer require laravel/passport
- Migrate your database
> php artisan migrate
- Install Laravel Passport
> php artisan passport:install
> php artisan vendor:publish --tag=passport-config

*DONE*

## HOW TO USE IT
- To generate your token using OAuth2 first you have to register through : 
> localhost:8000/register
- Make sure after register, you have completely login into your account
- First thing first we have to generate our client secret using :
> php artisan passport:client
- Please complete the client user id with your Account ID and client name with whatever name you like
- It's okay to leave the callback url blank
- Make sure you have copy the client secret
- Then, please open Postman collection API on folder Users
- Please access Get-Code endpoint
- Please fill client_id param with your client id that just generate from previous action
- Leave all the param as well and COPY the all of the endpoint with params and PASTE INTO browser and HIT ENTER
- If the page shown as "UNAUTHENTICATED", then you have to Login
- If you have login, the page will ask your permission to authorize the client
- Please authorize our clients
- And Obviously the page will shown as "This site can’t be reached"
- That is GOOD, you just have to copy the code param in url param that look like this : 
> def50200dcd90d8d791bba1945e6c22a79f0feefb582a50fda8f19b2dcc1d619397296999a848181ac6c3dfc2705a5689d2a960c41035599d19e991fb4e17aad583f8484c2cbfc58d4a9a808ca32734246fb6c74a2f0d6bafe040941de996e089a4b5e6d4c0655ac5d9e637a8f12cd69edb6d4b24af864cbe9ac94dfefe6ee370886325d2c5a4fa0dc87053e13e3dac01572b619f4c416f3dd125b0f7267ae3e54ca43828937c784bd979719036e3350edf0bde87d72fc584be97fe0a1280b361473deb603adbae50eae61864fd35557e45f46845d4667fa8a88a097251a2d1bfa3ea24581dbb3c975b0500ebd02a484a79f14495b416fb838b12c176d985861864d6b046a9a822753da59d4ee2f2a60b4576bb186b307cfce8dd0a8ba483aa94b30209dc1e5ab28a7ab79bc39e699aa99df0cbc3c3a9c4126fdcce125aefe
- Finally please access Get Token on Postman collection API Users Folder
- You just have to fill your client_id, client_secret and the code you have just copy
- Hit SEND button on Postman,
- Voila you have your OAuth2 token to access API
- Use it at Authorization using Bearer Token or at Header with Authorization on key and Bearer {your-token} on value
- Enjoy

- Feel Free to contact me if something looks wrong at
> agusmichaelsianipar99@gmail.com
> 081278443465

Thankyou

## POSTMAN COLLECTION LINK
https://www.postman.com/agusmichaelsianipar/workspace/public-workspace/api/e182a954-208c-47fe-80c6-d6718c6fe71b

# System Wizualizacji Rozdzielni (switchgear visualisation system)

## Table of contents
* [General info](#general-info)
* [Features](#features)
* [Screenshots](#screenshots)
* [Technologies](#technologies)
* [Setup](#setup)
* [Status](#status)
* [Contact](#contact)

## General info
Switchgear visualisation system - my project made for study subject called "Advanced internet programming technologies". It's simple web application written in PHP, it uses SQLite database to store information and GD2 library for dynamic image generation. For front-end only basic HTML and CSS was used.

This is my first encounter with PHP and the code is a bit messy. Despite this I managed to get the highest mark and distinction by teacher for making this project.

## Features
* graphical visualisation of switchgear - includes information about status, number and type of bay; shows information about devices installed in each bay (dynamic generation of picture using GD2 library and information stored in database)
* user control panel for system management, two types of accounts with different permission - normal user can add, edit and delete information about bays and devices; administrator can additionaly add, edit or delete users
* each user can change own password
* data stored in SQLite database (connection to database established using PDO library)


## Screenshots

### Homepage of the project
![screenshot](./img/1.JPG)

### Login page
![screenshot](./img/2.JPG)

### User control panel page
![screenshot](./img/3.JPG)

### Bay list page
![screenshot](./img/4.JPG)

### Bay management page
![screenshot](./img/5.JPG)

## Technologies
* HTML 5
* CSS 3
* PHP 7 (with PDO and GD2 libraries)
* SQLite 3

## Setup
1. Copy all files to your PHP-configured web server.
2. Remove semicolons in following lines in your php.ini file to enable required extensions:  
`;extension_dir = "ext"`  
`;extension=gd2`  
`;extension=pdo_sqlite`
3. Accounts in default database:  
  * `username: admin1`  
`password: !admin111`
  * `username: admin2`  
`password: @admin222`
  * `username: user1`  
`password: !user111`
  * `username: user2`  
`password: @user222`

## Status
Project is: **finished**

## Contact
Created by [@RafalMroz94](https://github.com/RafalMroz94)  
Feel free to contact me via e-mail: rafal.mroz@outlook.com

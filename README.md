# Gaelic Gatherer 🏴󠁧󠁢󠁳󠁣󠁴󠁿

## Work
This platform was developed in support of Rheanne McIntosh's dissertation for the degree of MSc in Computer Science in the Department of Computer Science at the University of Bath.

### Description
This repository hosts a custom-built e-learning platform, to support the research study element of the dissertation. It's aim is to provide a short course on Scottish Gaelic, to investigate the effects of independent gamification variables, on knowledge retention, in support for the preservation of endangered languages. As well as serving the short course to participants, it is also responsible for conducting the remainder of the study, including the study information, signing up for the study, questionnaires and knowledge assessments.

## Setup
Due to the complexity of the project, several steps are required to setup the project to run locally. These instructions are written from the perspective of a macOS user. Therefore, these instructions may not be exact for Windows and Linux users.

1. Install the Prerequisites
Several prerequisites are required to allow the project to run locally. Please ensure all of these are available, before continuing with the remainder of the setup.
    - **Git:** Used to clone this repository to your local machnine [HELP GUIDE](https://git-scm.com/download/mac)
    - **Brew:** Helpful for installing PHP with ease [HELP GUIDE](https://brew.sh/)
    - **PHP:** Allows for php based applications to run locally [HELP GUIDE](https://formulae.brew.sh/formula/php)
    - **Composer:** Composer is a package manager for PHP, and is needed to install the project's dependecies [HELP GUIDE](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)
    - **Node.js and NPM** NPM is a package manager for Node.js, and is required to install the project's dependencies [HELP GUIDE](https://nodejs.org/en/download/prebuilt-installer)

2. Clone the repository
```
git clone git@github.com:rheannemcintosh/gaelic-gatherer.git
```
3. Navigate to the project directory
```
cd gaelic-gatherer
```
4. Install the PHP Dependencies
```
composer install
```
5. Install the Node.js Dependencies
```
npm install
```
6. Setup the Environment File
```
cp .env.example .env
```
7. Generate an Application Key
```
php artisan key:generate
```
8. Configure the Database
9. Setup the `.env` File
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<database_name>
DB_USERNAME=<database_user>
DB_PASSWORD=<database_password>
```
10. Run the Database Migrations
```
php artisan migrate
```
11. Seed the Database
```
php artisan db:seed
```
12. Build the Frontend Assets
```
npm run dev
```
13. Start the Development Server
```
php artisan serve
```
14. View the Application


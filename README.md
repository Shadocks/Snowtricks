# Snowtricks
Community website on the theme of snowboarding

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b09b7dde-bd62-4bbe-bb22-b420c408fd56/big.png)](https://insight.sensiolabs.com/projects/b09b7dde-bd62-4bbe-bb22-b420c408fd56)

## Description
The Snowtricks app is a study project. It is programmed with the Symfony 4 framework.
The application by on the principle of a community site on the sharing of figures/tricks.

### Features
- create account
- login
- logout
- add/delete/update/comment trick -> Access to users with an account

## Local use
- Wampserver64 (PHP 7.1.9; MySQL 5.7.19; Apache 2.4.27; phpMyAdmin 4.7.4)
- Composer


## Start
Server PHP:

- In the CLI, move to the public folder `cd public` (ex: `cd wamp64\www\snowtricks\public`)
- Enter the following command to launch the server: `php -S localhost:9800`
- Access the project via your browser: http://localhost:9800

Virtualhost Apache:

```apache
<VirtualHost *:80>
	ServerName 'your server name'
	DocumentRoot "c:/wamp64/www/'your path'/snowtricks/public"
	<Directory  "c:/wamp64/www/'your path'/snowtricks/public/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
		FallbackResource /index.php
	</Directory>
</VirtualHost>
```

## Configuration project
Complete the `.env.dist` file with your connection data to MySQL and Sengrid.
Rename `.env.dist` to `.env` or create a copy and rename. To use [Sendgrid](https://sendgrid.com/pricing/) you must create a user account.
### Database

```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
DATABASE_USER=your_username
DATABASE_PWD=your_pwd
DATABASE_HOST=your_host
DATABASE_PORT=your_port
DATABASE_NAME=your_database_name
```
### Sendgrid

```
SENDGRID_TRANSPORT=transport
SENDGRID_HOST=host
SENDGRID_PORT=port
SENDGRID_ENCRYPTION=encryption
SENDGRID_USERNAME=username
SENDGRID_PASSWORD=password
```

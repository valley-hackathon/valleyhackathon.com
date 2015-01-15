# Git information

The primary code base is hosted on GitHub. First clone the repository by running:

```bash
  git clone valley-hackathon/valleyhackathon.com
```

Then add the server remote by running:

```bash
  git remote add production <server-remote>
```

To deploy to the server, first push up your changes to Bitbucket:

```bash
  git push origin master
```

Then deploy to the server:

```bash
  git push production master
```

If you want to deploy and push to Bitbucket at the same time:

```bash
  git remote set-url origin --add --push git@bitbucket.org:daviesgeek/valleyhackathon.com.git && git remote set-url origin --add --push <server-remote>
```

Then, to push to Bitbucket and deploy:

```bash
  git push origin master
```

# Folder Structure

### On the server

```
app.git (the bare repo) --> what you push to  
production              --> the production files (checked out by hash)  
public_html             --> a symlink to the current version  
```

### App structure

```
app          --> primary app directory (everything lives in here)
  data       --> data directory (definition code only, doesn't run anything)
  templates  --> HTML/Twig templates
  routes.php --> routes definition
  start.php  --> the app starter
hooks        --> Git hooks folder
public_html  --> actual public folder (served up by Apache)
  css,
  img,
  packages,
  scripts    --> CSS/JS/images folders
  index.php  --> this is where the application starts
vendor       --> Composer install directory

```

# For development

```bash
cd public_html && php -S localhost:3000
```

Acccess [localhost:3000](http://localhost:3000) in the browser

Use git to commit and push up changes. On push (`git push origin master`), it will automagically install composer dependencies and symlink the public_html directory so it can be served up by Apache on the server.
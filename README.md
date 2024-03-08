# READ ME

### For Newly Cloned Files
```
npm install
```
```
composer install
```

### Clone enviroment variables and insert your own accounts and dir
```
cp .env.example .env
```

### For Tailwind to work
> run this command first and wait a few minutes to build all the tailwind classes used
```
npm run build
```


### For Gulp Live Server
```
npm run serve
```
or
```
gulp serve
```

## Routing 2.0
> Bug Fix: Rootfolder and Routing issue <br>

### Try to understand how the Routing works at `routes.php` of your system folder<br><br>
Add this script at the bottom of your page before the end of the `</body>` tag
> the number of dots may vary on your route namings
```
<script  src="./../src/route.js"></script>
```

### Sample Usage
no need to include the root folder name just the route
> it only works on the given example html elements

```
<span route ='/po/sampleRoute'>

<a route='/fin/sampleRoute'>

<button route='/sls/sampleRoute'>

<div route='/dlv/sampleRoute'>
```

### Root Folder Filename issues fix

Go to `.htaccess` and change the Rewritebase into your folder name
> use lowercase to prevent any further issues
>
> make sure to rename it back to `master` before any pull request
```
RewriteEngine On
RewriteBase /changeME/
DirectoryIndex index.php
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php?/$1 [QSA,L]
```


### Everything should work perfectly fine!!!





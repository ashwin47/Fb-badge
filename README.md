# Net-Neutral
Facebook profile picture overlay creator.
http://isupportnetneutrality.in/

# Description
It downloads user's profile picture and paste an overlay image on it and presents an option to update it to his facebook feed.

# Installation
It uses Facebook_SDK_v4 for authentication and uploads.

Please add a file named `cred.php` to the folder and add the following lines in them:

```
<?php
$_YOUR_APP_ID = 'XYZ';
$_YOUR_APP_SECRET = 'XYZ';
$callback_url = '';// example.com/login.php
?>
```

Install curl

```
sudo apt-get install curl
```

Remember to fill 'App domains' , 'Site URL' , 'Valid OAuth redirect URIs' accordingly.

# Screenshots
![](http://i.imgur.com/g9EDY8n.png)

![](http://i.imgur.com/MIKC0ut.png)

![](http://i.imgur.com/hoYn7LD.png)

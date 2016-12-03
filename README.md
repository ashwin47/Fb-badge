# Fb-badge

Facebook profile picture badge creator.

# Description
It downloads user's profile picture and paste an overlay image on it and presents an option to update it to his facebook feed. Facebook does not allow make it profile picture automatically.

# Installation
It uses Facebook_SDK_v4 for authentication and uploads.

> Please add a file named `cred.php` to the folder and add the following lines in them:

```
<?php
$_YOUR_APP_ID = 'XYZ';
$_YOUR_APP_SECRET = 'XYZ';
$callback_url = '';  // example.com/login.php
?>
```

> Install curl

```
sudo apt-get install curl
```

> Make a facebook app and submit for "publish_actions" approvals for uploading pictures and feed poting.


> Make sure you fill 'App domains' , 'Site URL' , 'Valid OAuth redirect URIs' accordingly in the app settings.

Note : You will get error during facebook login when facebook configration is not correct.

# Screenshots
![](http://i.imgur.com/g9EDY8n.png)

![](http://i.imgur.com/MIKC0ut.png)

![](http://i.imgur.com/hoYn7LD.png)

App permissions :

![](http://i.imgur.com/URrUWOO.png)

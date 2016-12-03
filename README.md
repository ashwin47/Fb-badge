# Net-Neutral
Facebook profile picture overlay creator.
http://isupportnetneutrality.in/

# Description
It downloads user's profile picture and paste an overlay image on it and presents an option to update it to his facebook feed. Facebook does not allow make it profile picture automatically.

# Installation
It uses Facebook_SDK_v4 for authentication and uploads.

1. Please add a file named `cred.php` to the folder and add the following lines in them:

```
<?php
$_YOUR_APP_ID = 'XYZ';
$_YOUR_APP_SECRET = 'XYZ';
$callback_url = '';  // example.com/login.php
?>
```

2. Install curl

```
sudo apt-get install curl
```

3. Make a facebook app and submit for "publis_actions" approvals for uploading pictures and feed poting.


4. Make sure you fill 'App domains' , 'Site URL' , 'Valid OAuth redirect URIs' accordingly in the app settings.

# Screenshots
![](http://i.imgur.com/g9EDY8n.png)

![](http://i.imgur.com/MIKC0ut.png)

![](http://i.imgur.com/hoYn7LD.png)

![](http://i.imgur.com/URrUWOO.png)

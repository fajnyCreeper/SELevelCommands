# SELevelCommands
Allow you to get different bot responses depending on your user level. You can also call messages with custom parameters.

## Installation
### Composer
Install dependencies using  `/api/composer.json`

### SQL Database
Create table using the [levelPatterns.sql](../blob/main/levelPatterns.sql) file

### Web server
Download the repository, place all the files in your desired destination.

Locate `/api/config.example.php` copy the file rename to `config.php` and fill your credentials as explained here:
* `$key` - random string used to prevent unwanted requests
* `$bearer` - Bearer token found [here](https://streamelements.com/dashboard/account/channels) (after clicking *"show secrets"*)
* `$db` - credentials for accessing database

## Usage
### Adding patters
**This build is still in beta, so only way to add patterns is directly through SQL database**
> Please bear in mind, that in future, pattern id will be 10 random characters

## Custom variables
### Database
In database, you add your custom variables with `${number}`, so for example `Howdy ${1} how are you doing?`

There can be *unlimited* amount of parameters and can be placed in any order.

### URL
You can add custom variables by adding `params[]` parameter to your query.

So for example, if I have two variables, my path would look like `example.com/selevelcommands/api/chat.php?key=75fBu4EP4U2YTTbh&pattern=jNACabNDNA&level=${sender.level}&params[]=variable1&params[]=variable2`

## Calling patterns
After you have successfully added pattern to your database, you can add command to StreamElements following this example:
```
${customapi.example.com/selevelcommands/api/chat.php?key=75fBu4EP4U2YTTbh&pattern=jNACabNDNA&level=${sender.level}}
```

---

If you have any questions regarding installation and usage, feel free to join [my Discord](https://discord.gg/8DmPSFJ) and ask, what you need.

#Contactapp
A contact management application written in PHP.

##Installation
1. Import 'contacts.sql' into your MySQL database. Name the newly created database 'contacts'.
2. Edit the credentials in index.php and actions.php to match your MySQL installation.
3. Open folder in Apache-enabled local server (e.g. XAMMP).

##Usage
Use the form on the right hand side of the app to enter new contacts. The country of the contact can be a preset or custom three-letter version of the country name. In case the API doesn't support the country you entered, the database won't contain additional country data and the flag API likely won't include an image for the flag either. Instead you will see a question mark.

##Credits
- Flag image API: https://www.countryflags.io/
- Country data API: https://restcountries.eu/
- Chota CSS framework: https://jenil.github.io/chota/#!
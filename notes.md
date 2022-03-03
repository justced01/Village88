If you want to see whether what we have declared is really an array variable, we use PHP's var_dump() function. var_dump is same as echo or print() but its main purpose is to let the programmer know what types of data they are dealing with. Don't use it to render content, it should be used exclusively by the developer for testing!

$users = array();
var_dump($users);

The result tells us three things:
    The data type - array
    The size - how many items are in the array (0)
    The value - which is currently empty

=====================================================================================================

An HTTP protocol is really just about a client talking to a server where the client sends a 'message' to the server, and the server responds with a 'message'. A message is nothing but a chunk of information or data that is going through the connection between client and server. 

List of HTTP status codes:
https://en.m.wikipedia.org/wiki/List_of_HTTP_status_codes

=====================================================================================================

Cookies are used to enhance the user experience while sessions are used to allow you, as the developer, to create some levels of security all throughout your web application.

=====================================================================================================

Validation is done to sanitize submitted form from man-made errors. Yeah, when writing code, the number 1 to assume is clients have different level of proficiency. Sometimes, even professionals can be clumsy in filling up. Oops! This is why we need to sanitize our input fields.

When writing validations, don't be conscious on how long the lines will result first. Atleast you made your application error-proof! It's natural that it could contain numerous if-else lines, especially when there are lots of form input fields.

Before we start, this will be the pseudocode:

1. Identify what data do we want to validate
2. Check if the data is present
3. Make sure the data is in the correct format
4. Send the user to the correct destination depending on whether their data is valid or not
5. Alert the user of errors if they exist

=====================================================================================================

Multiple Process Files
You can have multiple forms within a single page, for example, Login and Registration. This means it's possible to have multiple "process" files handling each form: process_login.php to handle the login, and process_register.php to handle the registration, for example. We can improve this by just having a single file called process_account.php that handles login, registration, and even logout for our users.

This allows us to better organize our project. Imagine you are tasked to create a website with multiple features: users can login and register, users can post messages and other users can comment to those messages, users can like messages and comments, and users can join a survey, to name a few. With all these features, it's very difficult to manage our website if we just put them in a single process.php file, right? To fix this we create meaningful file names that handle specific tasks:

* account_process.php - handles login, register, logout, displaying member list, as well as showing and updating the profile page for each user.
* message_process.php - handles creating, updating and deleting messages and comments.
* like_process.php - handles creating and undoing likes.
* survey_process.php - handles creating, retrieving, updating, and deleting surveys
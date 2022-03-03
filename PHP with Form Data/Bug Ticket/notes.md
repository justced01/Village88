Bug Ticket
Objectives:
    - To apply proper form validation
    - To display proper error messages
    - To explore built in function in PHP
Create a simple form page allowing a user to file bug found in certain website. Fields that are marked with asterisk are required.
* date_today*
* first_name *
* last_name *
* email *
* issue_title*
* issue_details *
* screenshot (optional)

When the form is submitted, make sure the user submits appropriate information.

1. The date today should be in a valid date format.
2. The first name and the last name should not have any numbers.
3. Email should be in correct pattern.
4. The issue title should not be more than 50 characters.
5. Issue details should not be more than 250 characters.
6. If the user did not submit appropriate information, display the error(s) above the form that asks the user to correct the information.
7. Display the appropriate error messages at the top of form page.
8. (Optional) Make sure you check to see if they have uploaded a screenshot and save it to a folder called upload. For uploading a file, you will have to use the superglobal $_FILES. Hint: You will have to include enctype="multipart/form-data" in your form tag.

If the form is submitted with data that passes all validations, simply print a message saying "Thank you for your patience! Please wait a response from our IT team.”

For the date validation, avoid using regular expressions for this assignment but find ways to do this using explode and checkdate.
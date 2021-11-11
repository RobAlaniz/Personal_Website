// Name: Robert Alaniz Jr
// Coding 05
// Purpose: This does client side validation from the contact.php file.

"use strict";


function clearForm() {
    /*
     * this function replaces the text in text boxes with empty strings
     * and replaces the message area with an html <br>
     */

    $('#namebox').val('');
    $('#emailbox').val('');
    $('#reemailbox').val('');    
    $('#subjectbox').val('');    
    $('#messagebox').val('');

    $('#msg').html('<br>'); // minor violation of concerns, but okay for now
}

function validate() {
    
    // return true;
    var errorMessage = "";

    //get the strings from the text boxes and trim them
    var name = $('#namebox').val().trim();
    var email = $('#emailbox').val().trim();
    var reemail = $('#reemailbox').val().trim();
    var subject = $('#subjectbox').val().trim();
    var message = $('#messagebox').val().trim();

    //put the trimmed versions back into the form for good iser experience (UX)
    $('#namebox').val(name);
    $('#emailbox').val(email);
    $('#reemailbox').val(reemail);
    $('#subjectbox').val(subject);
    $('#messagebox').val(message);

    //test the strings from the form and store the error messages
    if (name === "") {
        errorMessage += "The Name area cannot be empty.<br>";
    }
    if (email === "") {
        errorMessage += "The Email area cannot be empty.<br>";
    }
    if (reemail === "") {
        errorMessage += "The Re-Enter email area cannot be empty.<br>";
    }
    if (subject === "") {
        errorMessage += "The Subject area cannot be empty.<br>";
    }
    if (message === "") {
        errorMessage += "The Message area cannot be empty.<br>";
    }
    if ((email === reemail) === false) {
        errorMessage += "The Email and Re-Enter Email areas cannot be different.<br>";
    }
    if (validEmail(email) === false){
        errorMessage += "This Email section is not in the correct format.<br>";
    }


    //send the errors back or send an empty string if there is no error
    return errorMessage;

}

/*
 * This is the jQuery docready method. It automatically executes when the DOM
 * is ready. You should always put handlers and other auto-executed code in
 * a docready function. It protects you from "race-conditions" when the JS
 * tries to execute before the DOM is complete.
 */
$(document).ready(function () {

    // event handler for the clear button
    $("#clear-button").click(function () {
        clearForm();
    });

    // event handler for the send button
    $("#submit-button").click(function () {

        // validate form and get back error messages (if any)
        var msg = validate();
        // report errors or submit the form
        if (msg === "") {

            return true;
        } else {
            $("#msg").html(msg);

            return false;
        }
    });

});
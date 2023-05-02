//Form Validation Function
function validate(e) {
  //Defining variables
  let emailId = $("#email").val().trim();
  let phoneNum = $("#phone").val().trim();

  //Defining regex for email
  let emailPattern = /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/;


  /*The code below will check  validation for nights
  1. Empty or null values
  2. Email pattern
  If above conditions satisfied default value "*" */
  if (emailId === "" || emailId === null) {
    console.log("in");
    $("#email").next().text("This field is required");
    e.preventDefault();
  } else if (emailPattern.test(emailId) === false) {
    $("#email").next().text("Enter a valid email address");
    e.preventDefault();
  } else {
    $("#email").next().text("*");
  }

  /*The code below will check  validation for nights
  1. Empty or null values
  2. Phone number format 999-999-9999
  If above conditions satisfied default value "*" */
  if (phoneNum === "" || phoneNum === null) {
    $("#phone").next().text("This field is required");
    e.preventDefault();
  } else {
    $("#phone").next().text("*");
  }
}


$(document).ready(function () {
  //focus to first name text box
  $("#fname").focus();

  //on submit of checkout form
  $("#checkout_form").submit(function (e) {
    validate(e);
  });
});
$(document).ready(function () {
  // Function to enable/disable submit button
  function enableSubmitButton() {
    if ($(".is-invalid").length === 0) {
      $("#signup-button").prop('disabled', false);
    } else {
      $("#signup-button").prop('disabled', true);
    }
  }

  // Toggle password visibility
  $(".password-toggle").click(function () {
    var passwordInput = $("#password");
    var type = passwordInput.attr("type") === "password" ? "text" : "password";
    passwordInput.attr("type", type);
    $(this).find("i").toggleClass("fa-eye fa-eye-slash");
  });

  // Toggle confirm password visibility
  $(".confirmpassword-toggle").click(function () {
    var confirmPasswordInput = $("#confirm-password");
    var type = confirmPasswordInput.attr("type") === "password" ? "text" : "password";
    confirmPasswordInput.attr("type", type);
    $(this).find("i").toggleClass("fa-eye fa-eye-slash");
  });

  // Validate email on input
  $("#email").on("input", function () {
    var email = $(this).val();
    var emailRegex = /^\S+@\S+\.\S+$/;
    if (!emailRegex.test(email) && email !== "") {
      $(this).addClass("is-invalid");
      $("#email-feedback").html("Please enter a valid email address.");
    } else {
      $(this).removeClass("is-invalid");
      $("#email-feedback").html("");
    }
    enableSubmitButton();
  });

  // Validate phone number on input
  $("#contact").on("input", function () {
    var contact = $(this).val();
    var contactRegex = /^\d{11}$/;
    if (!contactRegex.test(contact) && contact !== "") {
      $(this).addClass("is-invalid");
      $("#contact-feedback").html("Please enter a valid 11-digit phone number.");
    } else {
      $(this).removeClass("is-invalid");
      $("#contact-feedback").html("");
    }
    enableSubmitButton();
  });

  // Validate password on input
  $("#password").on("input", function () {
    var password = $(this).val();
    var passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
    if (password.length < 8 || !passwordRegex.test(password)) {
      $(this).addClass("is-invalid");
      $("#password-feedback").html("Password must be at least 8 characters long and contain at least one uppercase letter and one digit.");
    } else {
      $(this).removeClass("is-invalid");
      $("#password-feedback").html("");
    }
    enableSubmitButton();
  });

  // Validate confirm password on input
  $("#confirm-password").on("input", function () {
    var confirmPassword = $(this).val();
    var password = $("#password").val();
    if (confirmPassword !== password) {
      $(this).addClass("is-invalid");
      $("#confirm-password-feedback").html("Passwords do not match.");
    } else {
      $(this).removeClass("is-invalid");
      $("#confirm-password-feedback").html("");
    }
    enableSubmitButton();
  });

  // Handle form submission
  $("#checking").submit(function (event) {
    if ($(".is-invalid").length) {
      event.preventDefault();
    }
  });
});

/* --- Credit Card Detection --- */

function getCreditCardType(accountNumber)
{

  //start without knowing the credit card type
  var result = "unknown";

  //first check for MasterCard
  if (/^5[1-5]/.test(accountNumber))
  {
    result = "mastercard";
  }

  //then check for Visa
  else if (/^4/.test(accountNumber))
  {
    result = "visa";
  }

  //then check for AmEx
  else if (/^3[47]/.test(accountNumber))
  {
    result = "amex";
  }

  //then check for Discover
  else if (/^6(?:011|5[0-9]{2})[0-9]{12}/.test(accountNumber))
  {
    result = "discover";
  }

  return result;
}

function killRadios() {
  var inputArray = document.getElementById("card_image").getElementsByTagName("input");
  for (i in inputArray) {
    inputArray[i].disabled = true;
  };
  
};

function handleEvent(event)
{
  var value = event.target.value,    
      type = getCreditCardType(value);

  killRadios();

  switch (type)
  {
    case "mastercard":
        //show MasterCard icon
        document.getElementById("mastercard").checked = true;

        break;

    case "visa":
        //show Visa icon
        document.getElementById("visa").checked = true;
        break;

    case "amex":
        //show American Express icon
        document.getElementById("amex").checked = true;
        break;

    case "discover":
        //show Discover icon
        document.getElementById("discover").checked = true;
        break;

    default:
        //clear all icons?
        //show error?
  }
}

// or window.onload
document.addEventListener("DOMContentLoaded", function(){
  var textbox = document.getElementById("cc_number");
  textbox.addEventListener("keyup", handleEvent, false);
  textbox.addEventListener("blur", handleEvent, false);
}, false);



/* Modernizr Tests */

Modernizr.load([

  // Load in jQuery and validation library if HTML5 validation is unavailable
  {
    test: Modernizr.input.required,
    nope: ['//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js','assets/js/lib/jquery.validate.js'],
    complete: function(){
      jQuery(document).ready(function($){
        if(Modernizr.input.required){
          $("#whoo_signup").validate();
          $("input[required='required']").addClass("required");
        }
      })
    }
  }
]);


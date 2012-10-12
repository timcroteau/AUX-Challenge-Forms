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

  return result;
}

function handleEvent(event)
{
  var value   = event.target.value,    
      type    = getCreditCardType(value);

  switch (type)
  {
    case "mastercard":
        //show MasterCard icon
        break;

    case "visa":
        //show Visa icon
        break;

    case "amex":
        //show American Express icon
        break;

    default:
        //clear all icons?
        //show error?
  }
}

// or window.onload
document.addEventListener("DOMContentLoaded", function(){
  var textbox = document.getElementById("cc-num");
  textbox.addEventListener("keyup", handleEvent, false);
  textbox.addEventListener("blur", handleEvent, false);
}, false);









/* Modernizr Tests */







  let error = "";
  const name = document.getElementById('name');
  const lastname = document.getElementById('lastname');
  const email = document.getElementById('email');
  const phone = document.getElementById('phone');
  const address = document.getElementById('address');
  const city = document.getElementById('city');
  const postalCode = document.getElementById('postalCode');
  const country = document.getElementById('country');
  const birthdate = document.getElementById('birthdate');
  const c1 = document.getElementById('c1');
  const c2 = document.getElementById('c2');
  const c3 = document.getElementById('c3');
  const c4 = document.getElementById('c4');
  const c5 = document.getElementById('c5');
  const checkarray = document.getElementsByClassName('box');
  var currentPage = 0;
  const numberOfPages = 4;

// Validate form- first page
function validatePersonalDetails(){
  //delete errors 
  let error = false;
  document.getElementById('invalidInputMessage').innerHTML = "";
  //remove invalidInputMessage class
  var errorsList = document.getElementsByClassName('invalidInputMessage');

  for(var i = errorsList.length - 1; i >= 0; i--){
    errorsList[i].classList.remove("invalidInputMessage");
  }

  validateUserInput(name,"isEmpty");
  
  validateUserInput(lastname,"isEmpty");
  
  validateUserInput(email,"email");
  
  validateUserInput(phone,"phone");
  
  validateUserInput(address,"isEmpty");
  
  validateUserInput(city,"isEmpty");
  
  validateUserInput(postalCode,"postalCode");
  
  validateUserInput(birthdate,"birthdate");

  if(country.selectedIndex == 0){
    country.classList.add("invalidInputMessage");
    error = true;
  }
  
  if(validateCheckBox()==false){
    for (var i = 0; i < checkarray.length; i++){
      checkarray[i].classList.add("invalidInputMessage");
    }
    error = true;
  }
  

  if(error){

    document.getElementById('invalidInputMessage').innerHTML = "Please check the fields marked red";
    // need to be able to rewrite fields and check again
  }else{
    goToPage(1);
  }

}



// functions that handle validation

function validateUserInput(el,type){

  if(type == "isEmpty"){
    if(el.value.length<1){
      el.classList.add("invalidInputMessage");
      error = true;
      return false
    }
    
  }

  var filter;
  if(type == "email")filter = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  if(type == "phone")filter = /^\d{10}$/;
  if(type == "birthdate")filter = /^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;
  if(type == "postalCode")filter = /^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i;

  var regExp = new RegExp(filter);
  if (!regExp.test(el.value)) {
    el.classList.add("invalidInputMessage");
    error = true;
    return false;
  }
}

function validateCheckBox(){
  var checked = false;
  for (var i = 0; i < checkarray.length; i++){
    if(checkarray[i].checked){
      checked = true;
    }
  } 
  return checked; 
}




// function to change pages
// everything gets class isHidden
// remove class on current page
function goToPage(pageNumber){
  if(pageNumber < numberOfPages && pageNumber >= 0){
    for(var i = 0; i < numberOfPages; i++){
      var el = document.getElementById("page_" + i);
      el.classList.add("isHidden");
    }
    var el = document.getElementById("page_" + pageNumber);
    el.classList.remove("isHidden");
    currentPage = pageNumber;
  }
}

function goPreviousPage(){
  goToPage(currentPage - 1);
}

// Validate form second-page


function checkHealthBackground(){

  var q1_yes_checked = document.getElementById('q1-yes').checked;
  var q2_yes_checked = document.getElementById('q2-yes').checked;
  var q3_yes_checked = document.getElementById('q3-yes').checked;
  var q4_yes_checked = document.getElementById('q4-yes').checked;

  if (q1_yes_checked == true || q2_yes_checked == true || q3_yes_checked == true || q4_yes_checked == true){
    document.getElementById('healthWarning').innerHTML = "Please, you need to bring us an inform from your doctor so that our personal trainers can give you the best service";

  }

  var q1_no_checked = document.getElementById('q1-no').checked;
  var q2_no_checked = document.getElementById('q2-no').checked;
  var q3_no_checked = document.getElementById('q3-no').checked;
  var q4_no_checked = document.getElementById('q4-no').checked;

  if (q1_no_checked == true && q2_no_checked == true && q3_no_checked == true && q4_no_checked == true){
    goToPage(2);

  }

  if (q1_yes_checked == false && q1_no_checked == false || q2_yes_checked == false && q2_no_checked == false || q3_yes_checked == false && q3_no_checked == false || q4_yes_checked == false && q4_no_checked == false){
    document.getElementById('healthWarning').innerHTML = "Please, answer all the questions"; 
  }


}

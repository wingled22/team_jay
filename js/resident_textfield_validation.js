
const lastname= document.getElementById('last_name')
const firstname= document.getElementById('first_name')
const middlename= document.getElementById('middle_name')
const age= document.getElementById('age')
const gender= document.getElementById('gender')
const civil= document.getElementById('mobile')
const religion=document.getElementById('religion')
const citizenship=document.getElementById('citizenship')
const purok=document.getElementById('purok')
const dialect=document.getElementById('dialect')
const educational=document.getElementById('educational')
const profession=document.getElementById('profession')
const voter=document.getElementById('voter')
const precint=document.getElementById('precint')
const form=document.getElementById('form')

var isValid=false;

/*const errorElement=document.getElementById('error')
const fname_error=document.getElementById('fname-error')*/

document.getElementById("fname_errorMsg").style.display = "none";
document.getElementById("lname_errorMsg").style.display = "none";
form.addEventListener('submit',(e)=>{

	let messages=[]
	if(lastname.value===''|| lastname.value==null){
		e.preventDefault();
	    document.getElementById("lname_errorMsg").style.display = "inline";
		lastname.focus();
	    isValid=false;
  
     }

	if(firstname.value===''|| firstname.value==null){
		e.preventDefault();
		document.getElementById("fname_errorMsg").style.display = "inline";
		firstname.focus();
	    isValid=false;
	}
   if(messages.length>0){
  
    /* errorElement.innerText=messages.join(', ')
  	 fname_error.innerText=messages.join(', ')
  	*/ 
  }
})


var LoginForm = document.getElementById("LoginForm");
var RegForm = document.getElementById("RegForm");
var Indicator = document.getElementById("Indicator");

//Register DIV
function Register(){
	RegForm.style.transform = "translateX(0px)"
	LoginForm.style.transform = "translateX(0px)"
	Indicator.style.transform = "translateX(100px)"
}


//Login DIV
function Login(){
	RegForm.style.transform = "translateX(300px)"
	LoginForm.style.transform = "translateX(300px)"
	Indicator.style.transform = "translateX(0px)"
}		


var usersArray = []
function setUserArrayAndId() {
	if (!localStorage.userArrayLocal || JSON.parse(localStorage.userArrayLocal).length == []) {
		localStorage.userArrayLocal = JSON.stringify([])
		localStorage.setItem('userId', 1)
		localStorage.setItem('userIndex', 0)
	} else {
		usersArray = JSON.parse(localStorage.userArrayLocal)
		var userCount = localStorage.getItem('userId')
		var userIndexCount = localStorage.getItem('userIndex')
		localStorage.setItem('userId', ++userCount)
		localStorage.setItem('userIndex', ++userIndexCount)
	}
}

setUserArrayAndId()
var userId = localStorage.getItem('userId')
var userIndex = localStorage.getItem('userIndex')

//Register
var btnRegister = document.getElementById('btnRegister')
btnRegister.onclick = function(){
	
	var username = document.getElementById('register_username').value
	var email = document.getElementById('register_email').value
	var password = document.getElementById('register_password').value
	var rePassword = document.getElementById('register_rePassword').value
	if( username != '' && email != '' && password != '' && rePassword != '')
	{
		if( password === rePassword)
		{
			var userAddObj = new Object()
			userAddObj.uId = userId
			userAddObj.uName = username
			userAddObj.uEmail = email
			userAddObj.uPassword = password
			usersArray.push(userAddObj)
			addTolocalStorage( usersArray)
		}else{
			alert('Password donot match please correct it..')
		}
	}else{
		alert('Please fill all the fields')
	}
}

//Add to local storage
function addTolocalStorage( usersArray)
{
	localStorage.userArrayLocal = JSON.stringify(usersArray)
	localStorage.setItem('userIndex', userIndex++)
	localStorage.setItem('userId', userId++)
	alert('Successfully Registered')
}

//Login
var userArrayLogin = []
function userLogin()
{
	var email = document.getElementById('email').value
	var password = document.getElementById('password').value
	var flag = 0;
	
	var users = JSON.parse(localStorage.getItem('userArrayLocal'))
	for( i=0; i<users.length; i++)
	{   
		if(users[i].uEmail == email)
		{
			flag++
			if(users[i].uPassword == password)
			{
			 sessionStorage.loggedIn = JSON.stringify([])
			 var userObj = new Object()
			 userObj.uId = users[i].uId
			 userObj.uName = users[i].uName
			 userObj.uEmail = users[i].uEmail
			 userArrayLogin.push(userObj)
			 sessionStorage.loggedIn = JSON.stringify(userArrayLogin)
			 location.href = 'cart.html'
			}
			else
				alert('Incorrect Password')
		}
	}if(flag == 0 )
		alert('You have successfully logged in')
}

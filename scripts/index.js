const backend = "http://localhost:3000";

document.getElementById("login-login-button").addEventListener("click", e => 
{
	e.preventDefault();
	fetch(backend + "/login").then(res => res.json()).then(json => alert(JSON.stringify(json)));
});
document.getElementById("signup-signup-button").addEventListener("click", e => 
{
	e.preventDefault();
	let name = document.getElementById("signup-name").value;
	let email = document.getElementById("signup-email").value;
	let password = document.getElementById("signup-password").value;
	let url = `${backend}/signup?name=${name}&email=${email}&password=${password}`
	fetch(url).then(res => res.json()).then(json => alert(JSON.stringify(json)));
});
document.getElementById("login-signup-button").addEventListener("click", e => 
{
	e.preventDefault();
	document.getElementById("login").style.left = "0";
	document.getElementById("signup").style.left = "100vw";
	document.getElementById("login").className = "left-shift";
	document.getElementById("signup").className = "left-shift";
	setTimeout(() => document.getElementById("signup-name").focus(), 1300);
});
document.getElementById("signup-login-button").addEventListener("click", e => 
{
	e.preventDefault();
	document.getElementById("login").style.left = "-100vw";
	document.getElementById("signup").style.left = "0";
	document.getElementById("signup").className = "right-shift";
	document.getElementById("login").className = "right-shift";
	setTimeout(() => document.getElementById("login-email").focus(), 1300);
});

///
/// NodeJS without ExpressJS framework
///
const http = require('http');
const fs = require('fs');
const url = require('url');
const qs = require('querystring');

const port = 3000;
const hostname = "localhost";
const usersPath = "./users.json";
let users = [];

fs.readFile(usersPath, (err, content) =>
{
    if (err) 
    {
        console.log(err);
    }
    else 
    {
        users = JSON.parse(content);
    }
});

const login = (res, urlQueryObj) => 
{
	res.statusCode = 200;
	res.setHeader('Content-Type', 'application/json');
	res.setHeader('Access-Control-Allow-Origin', '*');



	res.end(JSON.stringify({name: "Logging in"}));
}

const returnError = res =>
{
	res.statusCode = 400;
	res.end("Bad request!");
}

const signup = (res, urlQueryObj) => 
{
	res.setHeader('Content-Type', 'application/json');
	res.setHeader('Access-Control-Allow-Origin', '*');

	if (!urlQueryObj || !urlQueryObj.name || !urlQueryObj.email || !urlQueryObj.password)
	{
		returnError(res);
		return;
	}

	if (users.some(a => a.email === urlQueryObj.email))
	{
		res.statusCode = 401;
		res.end("Email already in use");
		return;
	}

	users.push({
		name: urlQueryObj.name, 
		email: urlQueryObj.email, 
		password: urlQueryObj.password
	});
	saveFile(users);
	res.statusCode = 200;
	res.end(JSON.stringify(users.find(a => a.email === urlQueryObj.email)));
}

const saveFile = user =>
{
	fs.writeFile(usersPath, JSON.stringify(users), err => 
	{
    	if (err) return console.log(err);
	}); 
}

const server = http.createServer((req, res) => 
{
	let urlParts = url.parse(req.url, true);
	let urlPathname = urlParts.pathname;
	let urlQueryObj = urlParts.query;
	switch(urlPathname)
	{
		case "/": login(res, urlQueryObj); return;
		case "/login": login(res, urlQueryObj); return;
		case "/signup": signup(res, urlQueryObj); return;
		default: res.end("Error! Invalid operation")
	}
});


server.listen(port, () => 
{
	console.log(`Server running at http://${hostname}:${port}/`)
})
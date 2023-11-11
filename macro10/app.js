const express = require('express');
const fs = require('fs');
const hogan = require('hogan.js');

const app = express();

const port = 10063;

//load in templates
const templateString = fs.readFileSync('./views/template.hogan', 'utf-8');
const templateStringCompiled = hogan.compile(templateString);

let data;
try {
    const rawData = fs.readFileSync('data/file.json', 'utf-8');    
    data = JSON.parse( rawData );
}
catch(error) {
    // otherwise the file didn't read correctly - use the default object instead
    data = {
        'number': 0,
        'visitor': ''
    };
}

app.get('/', function(request, response) {
  response.type('html');

  data.number++;

  const customHTML = templateStringCompiled.render(
    {
      'visitor': data.visitor,
      'number': data.number
    }
  );
  response.write(customHTML);
  response.end();
});

app.get('/about', function(request, response){
  response.type('html');

  const customHTML = templateStringCompiled.render(
    {
      'about': 'nothing to see here' 
    }
  );

  response.write(customHTML);
  response.end();

});

app.get('/contact', function(request, response){
  response.type('html');

  const customHTML = templateStringCompiled.render(
    {
      'contact': 'contact rw2617@nyu.edu for more' 
    }
  );

  response.write(customHTML);
  response.end();

});

app.get('/pic', function(request, response){
  response.type('html');

  const customHTML = templateStringCompiled.render(
    {
      'pic': "/public/cat.jpg" 
    }
  );

  response.write(customHTML);
  response.end();

});

app.post('/visitor', function(request, response) {
  const visitor = request.query.visitor;
  
  data.visitor.push({'visitor':visitor});

  response.redirect('/');
  response.end();
});

app.listen(port, function(){
  console.log("app is running on port number " + port);
});
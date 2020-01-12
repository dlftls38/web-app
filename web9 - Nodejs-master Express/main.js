const express = require('express')
const app = express()
const port = 3000
var fs = require('fs');
var template = require('./lib/template.js');
var sanitizeHtml = require('sanitize-html');
var path = require('path');
var qs = require('querystring');
var bodyParser = require('body-parser');
var compression = require('compression')
var http = require('http');
var url = require('url');
var topicRouter = require('./routes/topic');
var indexRouter = require('./routes/index');
var helmet = require('helmet');
app.use(helmet());


app.use(express.static('public'));
app.use(bodyParser.urlencoded({ extended: false}));
app.use(compression());

app.get('*', function(request, response, next){
  fs.readdir('./data', function(error, filelist){
    request.list = filelist;
    next();
  });
});

app.use('/',indexRouter);
app.use('/topic',topicRouter);





app.use(function(req, res, next){
  res.status(404).send('Sorry cant find that!');
});

app.use(function(err, req, res, next){
res.status(500).send('Something broke!')
});

app.listen(port, () => console.log(`Example app listening on port ${port}!`))





/*

var app = http.createServer(function(request,response){
    var _url = request.url;
    var queryData = url.parse(_url, true).query;
    var pathname = url.parse(_url, true).pathname;
    if(pathname === '/'){
      if(queryData.id === undefined){
      } else {
        
      }
    } else if(pathname === '/create'){
      
    } else if(pathname === '/create_process'){
      
    } else if(pathname === '/update'){

    } else if(pathname === '/update_process'){

    } else if(pathname === '/delete_process'){

    } else {
      response.writeHead(404);
      response.end('Not found');
    }
});
app.listen(3000);
*/
var express     = require('express');
var app         = express();
var bodyParser  = require('body-parser');


// [CONFIGURE APP TO USE bodyParser]
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());


// [CONFIGURE SERVER PORT]
var port = 3000;


// [ CONFIGURE mongoose ]
var mongoose    = require('mongoose');
var db = mongoose.connection;
db.on('error', console.error);
db.once('open', function(){
    // CONNECTED TO MONGODB SERVER
    console.log("Connected to mongod server");
});

// CONNECT TO MONGODB SERVER
mongoose.connect('mongodb://localhost/capstone');


var Account = require('./models/account');


// [CONFIGURE ROUTER]
var router = require('./routes')(app, Account)


// [RUN SERVER]
var server = app.listen(port, function(){
 console.log("Express server has started on port " + port)
});
var express = require('express')
, routes = require('./routes')
, path = require('path'),
fileupload = require('express-fileupload'),
app = express(),
mysql = require('mysql'),
bodyParser =require("body-parser");

var connection = mysql.createConnection({
    host : 'localhost',
    user : 'root',
    password : '',
    database : 'Registration_Form',
    dateStrings : 'true'    
});


connection.connect();

global.db = connection;

// all environments
app.set('port', process.env.PORT || 3000);
app.set('views',__dirname + '/views');
app.set('view engine', 'ejs');
app.use(bodyParser.urlencoded({extended: false}));
app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, 'public')));
app.use(fileupload());

// development
app.get('/', routes.index);
app.post('/', routes.index);
// app.get('/',routes.index);
app.get('/profile/:id',routes.profile);


// Middleware

app.listen(3000);
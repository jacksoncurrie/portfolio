/*
 * Author      :  Jackson Currie
 * Date        :  2018-07-28
 * Description :  The server that controls the Roboarm
 */

// Librarys
const express = require('express');
const app = express();
const io = require('socket.io')();

// Start with roboarm in centre
var rotValue = 1450;
var forwValue = 1250;
var upValue = 1500;
var inValue = 1700;

// Views
app.set('view engine', 'ejs');
app.set('views', 'views');

// Static files
app.use('/styles', express.static('styles'));
app.use('/scripts', express.static('scripts'));
app.use('/images', express.static('images'));

// Home page
app.get('/', (req, res) => {
  res.render('index', {
    pageTitle: 'Home'
  });
});

// Control page
app.get('/control', (req, res) => {
  res.render('control', {
    pageTitle: 'Control'
  });
});

// About page
app.get('/about', (req, res) => {
  res.render('about', {
    pageTitle: 'About'
  });
});

// Start server on port 8080
var server = app.listen(8080, () =>
  console.log("Listening on port 8080")
);

io.attach(server);

// User connected
io.sockets.on('connection', (socket) => {

  // Load position of servos
  socket.emit('valueRotate', rotValue);
  socket.emit('valueForward', forwValue);
  socket.emit('valueUp', upValue);
  socket.emit('valueIn', inValue);

  // When rotate position is moved
  socket.on('rotate', (data) => {
    // Set the new value
    rotValue = data;
    io.emit('valueRotate', rotValue);
  });

  // When forward position is moved
  socket.on('forward', (data) => {
    // Set the new value
    forwValue = data;
    io.emit('valueForward', forwValue);
  });

  // When up position is moved
  socket.on('up', (data) => {
    // Set the new value
    upValue = data;
    io.emit('valueUp', upValue);
  });

  // When up position is moved
  socket.on('in', (data) => {
    // Set the new value
    inValue = data;
    io.emit('valueIn', inValue);
  });
});
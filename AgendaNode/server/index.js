const http = require('http'),
      path = require('path'),
      Routing = require('./rutas.js'),
      RoutingEventos = require('./rutas-eventos.js'),
      express = require('express'),
      bodyParser = require('body-parser'),
      mongoose = require('mongoose');

const PORT = 8082
const app = express()

const Server = http.createServer(app)

mongoose.connect('mongodb://localhost/agenda')


app.use(express.static('client'))
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({ extended: true}))
app.use('/', Routing)
app.use('/events', RoutingEventos)

Server.listen(PORT, function() {
  console.log('Server is listeng on port: ' + PORT)
})

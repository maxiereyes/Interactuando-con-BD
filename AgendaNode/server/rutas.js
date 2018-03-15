const Router = require('express').Router();
const UsuarioModel = require('./model.js');


// Obtener un usuario por su id
Router.post('/login', function(req, res) {
  let email = req.body.user
  let pass = req.body.pass
  UsuarioModel.findOne({email: email, contrasena: pass}).exec(function(err, doc){
      if (err) {
          res.status(500)
          res.json(err)
      }
      if (doc != null) {
        res.send('Validado')
      }
  })
})

module.exports = Router

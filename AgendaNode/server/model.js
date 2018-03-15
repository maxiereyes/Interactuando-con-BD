const mongoose = require('mongoose')

const Schema = mongoose.Schema

let UserSchema = new Schema({
  email: { type: String, required: true, unique: true},
  nombre: { type: String, required: true },
  contrasena: {type: String, required: true},
  fecha_nacimiento: {type: String, required: true}
})

let UsuarioModel = mongoose.model('usuarios', UserSchema)

module.exports = UsuarioModel

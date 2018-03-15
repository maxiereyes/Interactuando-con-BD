const mongoose = require('mongoose')

const Schema = mongoose.Schema

let EventsSchema = new Schema({
  id: {type: Number, required: true, unique: true},
  title: {type: String, required: true},
  start: {type: String, required: true},
  end: {type: String, required: false},
  allDay: {type: Boolean, required: true},
  fk_usuario: {type: String, required: true}
})

let EventosModel = mongoose.model('eventos', EventsSchema)

module.exports = EventosModel

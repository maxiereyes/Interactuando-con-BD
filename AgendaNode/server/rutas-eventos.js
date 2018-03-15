const Router = require('express').Router();
const EventosModel = require('./model-eventos.js');

Router.get('/all', function(req, res){
  EventosModel.find({}).exec(function(err, doc){
    if (err) {
      res.status(500)
      res.json(err)
    }
    res.json(doc)
  })
})

Router.post('/new', function(req, res){
  let diaComp = ""
  if (req.body.end == "") {
    diaComp = 1
  }else{
    diaComp =  0
  }
  let evento = new EventosModel({
    id: Math.floor(Math.random()*50),
    title: req.body.title,
    start: req.body.start,
    end: req.body.end,
    allDay: diaComp,
    fk_usuario: "mreyes@gmail.com"
  })
  evento.save(function(error){
    if (error) {
      console.log(error)
      res.status(500)
      res.json(error)
    }
    res.send("Registro Guardado")
  })
})

Router.post('/delete/:id', function(req, res) {
    let idEvento = req.params.id
    EventosModel.remove({id: idEvento}, function(error) {
        if(error) {
            res.status(500)
            res.json(error)
        }
        res.send("Registro eliminado")
    })
})

Router.post('/update/:id/:start/:end', function(req, res) {
    let id = req.params.id
    let newstart = req.params.start
    let newend = ""
    if (req.params.end == 'Invalid date') {
      newend = ""
    }else{
      newend = req.params.end
    }
    EventosModel.findOne({id: id}, function(err, doc) {
        if(err) {
            res.status(500)
            res.json(err)
        }
        if(doc!=null){
            doc.start = newstart
            doc.end = newend
            doc.save(function(error){
              if (error) {
                res.status(500)
                res.json(err)
              }
              res.send("Registro Actualizado")
            })
        }
    })

})


module.exports = Router

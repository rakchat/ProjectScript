const express = require('express')
const app = express();
const port = 3000
const path = require('path')
const aboutRouter = require('./routers/about')

app.set('views', path.join(__dirname, 'views') )
app.set('view engine', 'ejs')
app.set('view options', { delimiter: '?' })

app.use(express.json())
app.use(express.urlencoded( { extended: false }))
app.use(express.static(path.join(__dirname, 'public')))

app.use('/', aboutRouter)

app.listen(port,()=>{ console.log(`http://127.0.0.1:${port}`) })



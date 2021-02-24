const express = require('express')
const router = express.Router();

router.get('/', (req, res)=>{
    res.render('about' , { title: "About"});
})

router.get('/home', (req, res)=>{
    res.redirect('http://localhost/project/new_version10/frontend/index-non-login.php');
})

router.get('/contact', (req, res)=>{
    res.redirect('http://localhost/project/new_version10/frontend/contact-non-login.php');
})

router.get('/register', (req, res)=>{
    res.redirect('http://localhost/project/new_version10/frontend/register.php');
})

router.get('/login', (req, res)=>{
    res.redirect('http://localhost/project/new_version10/frontend/form_login.php');
})

module.exports = router
const express = require('express')
const router = express.Router();

router.get('/', (req, res)=>{
    res.render('about' , { title: "About"});
})

router.get('/home', (req, res)=>{
    res.redirect('http://localhost/Sciptlanguade/ProjectScript/version7/ProjectScript/new_version5.0%20success%20Update/frontend/form_login.php');
})

router.get('/contact', (req, res)=>{
    res.redirect('http://localhost/Sciptlanguade/ProjectScript/version7/ProjectScript/new_version5.0%20success%20Update/frontend/contact-non-login.php');
})

router.get('/register', (req, res)=>{
    res.redirect('http://localhost/Sciptlanguade/ProjectScript/version7/ProjectScript/new_version5.0%20success%20Update/frontend/register.php');
})

router.get('/login', (req, res)=>{
    res.redirect('http://localhost/Sciptlanguade/ProjectScript/version7/ProjectScript/new_version5.0%20success%20Update/frontend/form_login.php');
})

module.exports = router
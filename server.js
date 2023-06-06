const express = require('express');
const nodemailer = require('nodemailer');
process.env.NODE_TLS_REJECT_UNAUTHORIZED = '0';

const app = express();
const port = 3000;
const path = require('path');
const mime = require('mime');

app.use(express.json()); // Add this line to parse JSON-encoded bodies
app.use(express.urlencoded({extended: true})); // Add this line to parse URL-encoded form data


// for paths to load files and their styles -d
app.use(express.static(path.join(__dirname, 'views')));
app.use(express.static(path.join(__dirname, 'img')));
// Serve the index.html file
app.get('/', function (req, res) {
    res.sendFile(path.join(__dirname, 'views/index.html'));
});
// Serve the style.css file
app.get('/style.css', function (req, res) {
    res.setHeader('Content-Type', mime.getType('style.css'));
    res.sendFile(path.join(__dirname, 'views/style.css'));
});
app.get('/', function (req, res) {
    res.sendFile(path.join(__dirname, 'views/about.html'));
});
// Serve the style.css file
app.get('/style.css', function (req, res) {
    res.setHeader('Content-Type', mime.getType('about.css'));
    res.sendFile(path.join(__dirname, 'views/about.css'));
});
app.get('/', function (req, res) {
    res.sendFile(path.join(__dirname, 'views/reservation.html'));
});
// Serve the style.css file
app.get('/reservation.css', function (req, res) {
    res.setHeader('Content-Type', mime.getType('reservation.css'));
    res.sendFile(path.join(__dirname, 'views/reservation.css'));
});


// Handle form submission
app.post('/send-email', (req, res) => {
    const {name, email, places, people} = req.body;
    // Create a nodemailer transporter
    const transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: '20109@uktc-bg.com',
            pass: 'gkgclqxaafyjewpd'
        }
    });
    // Prepare email content
    const mailOptions = {
        from: "New reservation at CAC",
        to: `${email}`, // Replace with the recipient's email address
        subject: 'New reservation',
        text: `Name: ${name}\nPlaces:${places}\nPeople:${people}\nYou have reservation at the best nightclub on the Balkans\n\n\nPhone number for contact: 0888863866`
    };

    // Send email
    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.error(error);
            res.send('Error occurred while sending email');
        } else {
            console.log('Email sent: ' + info.response);
            res.redirect('/index.html');
            // res.send('Email sent successfully');
        }
    });
});
// Start the server
app.listen(port, () => {
    console.log(`Server started on port ${port}`);
});
// ,'192.168.65.143' || 'localhost'

//
// const transporter = nodemailer.createTransport({
//     service: 'gmail',
//     auth: {
//         user: 'dani.dimitrov.snack9@gmail.com',
//         pass: 'kwlorgscxslvrkzl'
//     }
// });
//
// const mailOptions = {
//     from: 'dani.dimitrov.snack9@gmail.com',
//     to: '20109@uktc-bg.com',
//     subject: 'Sending Email using Node.js',
//     text: 'That was easy!'
// };
//
// transporter.sendMail(mailOptions, function(error, info){
//     if (error) {
//         console.log(error);
//     } else {
//         console.log('Email sent: ' + info.response);
//     }
// });
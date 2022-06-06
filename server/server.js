const express = require('express');
const app = express();
const port = 5000;
const axios = require("axios");
let cors = require('cors');

app.use(cors());

const BASE_URL = `https://api.openweathermap.org/data/2.5/weather?q=`;

const API_KEY = `&appid=17b94874477730e32403161e9db5ccad`;

const location = (inputedCity) =>{
   let location = BASE_URL + inputedCity + API_KEY + '&units=metric';
   return location;
}

app.get('/weather/location/:city', (req, res) =>{

    let endpoint = location(req.params.city);

    axios.get(endpoint)
    .then((response) => {
            res.status(200).send({data: response.data});
    }).catch(function (error) {
        res.status(200).send({data: "not found"});
        console.error(error);
    });
    

});

app.listen(port, () =>{
    console.log(`Listening on port ${port}`);
});

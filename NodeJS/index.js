const express = require('express');
const app = express();
const path = require('path');
const route = require('./routes/routes');
const bodyParser = require('body-parser');
const cors = require('cors');
const PORT = process.env.PORT || 8181;

app.use(bodyParser.urlencoded({extended:true}));
app.use(bodyParser.json());
app.use(cors());
app.use(express.static(path.join(__dirname, 'public/')));
app.use('/',route);

app.listen(PORT,() => {
    console.log(`Server running on port ${PORT}`);
});
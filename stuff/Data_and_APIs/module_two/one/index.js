const express = require('express');

const app = express();

app.listen(4040, () => console.log('listening at port 4040'));
app.use(express.static('public'));
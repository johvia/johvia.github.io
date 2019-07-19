const express = require('express');
const dataStore = require('nedb');

const app = express();

app.listen(11000, () => console.log('listening at port 11000'));
app.use(express.static('public'));
app.use(express.json({
  limit: '1mb'
}));

const database = new dataStore('database.db');
database.loadDatabase();

app.post('/api', function(request, response) {
  console.log('I got a request!');
  const data = request.body;
  const timestamp = Date.now();
  data.timestamp = timestamp;
  database.insert(data);
  response.json(data);
});

app.get('/api', (request, response) => {
  database.find({}, (err, data) => {
    if (err) {
      response.end();
      return;
    }
    response.json(data);
  });

});
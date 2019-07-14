const express = require('express');
const dataStore = require('nedb');

const app = express();

app.listen(4040, () => console.log('listening at port 4040'));
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
  response.json({
    status: 'succes',
    timestamp: data.timestamp,
    latitude: data.lat,
    longitude: data.lon
  });
});
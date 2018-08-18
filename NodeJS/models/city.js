const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const CitySchema = new mongoose.Schema({
    id: {
        type: String
    },
    name: {
        type: String
    },
    state_id: {
        type: String
    }, 
},{collection: 'City'});


CitySchema.plugin(timestamp);


module.exports = {
    City: mongoose.model('City',CitySchema)
};
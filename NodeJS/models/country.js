const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const CountrySchema = new mongoose.Schema({
    id: {
        type: String
    },
    sortname: {
        type: String
    },
    name: {
        type: String
    }, 
},{collection: 'Country'});


CountrySchema.plugin(timestamp);


module.exports = {
    Country: mongoose.model('Country',CountrySchema)
};
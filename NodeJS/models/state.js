const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const StateSchema = new mongoose.Schema({
    id: {
        type: String
    },
    name: {
        type: String
    },
    country_id: {
        type: String
    }, 
},{collection: 'State'});


StateSchema.plugin(timestamp);


module.exports = {
    State: mongoose.model('State',StateSchema)
};
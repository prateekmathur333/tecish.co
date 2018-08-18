const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const ServiceSchema = new mongoose.Schema({
    name: {
        type: String,
        trim: true
    }
},{collection: 'Service'});


ServiceSchema.plugin(timestamp);


module.exports = {
    Service: mongoose.model('Service',ServiceSchema)
};
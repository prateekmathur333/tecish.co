const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const TechSchema = new mongoose.Schema({
    name: {
        type: String,
        trim: true
    }
},{collection: 'Tech'});


TechSchema.plugin(timestamp);


module.exports = {
    Tech: mongoose.model('Tech',TechSchema)
};
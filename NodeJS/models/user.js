const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const UserSchema = new mongoose.Schema({
    title: {
        type: String,
        trim: true
    },
    location: {
        type: String,
        trim: true
    },
    industry: {
        type: String,
        trim: true
    },
    linkedinProfile: {
        type: String,
        trim: true
    },
    twitterProfile: {
        type: String,
        trim: true
    },
    bio: {
        type: String,
        trim: true
    }, 
    name: {
        type: String
    },
    mobNo: {
        type: String, 
        trim: true 
    }, 
    imgUrl: {
        type: String
    }
},{collection: 'User'});


UserSchema.plugin(timestamp);


module.exports = {
    User: mongoose.model('User',UserSchema)
};
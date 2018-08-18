const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const ContactSchema = new mongoose.Schema({
    name: {
        type: String,
        required : true,
        trim: true,
    },
    email: {
    	type: String,
	trim: true
    },
    mobileNumber: {
    	type: String,
	trim: true
    },
    subject: {
    	type: String,
	trim: true
    },
    message: {
        type: String,
	trim: true
    },
},{collection: 'Contact'});


ContactSchema.plugin(timestamp);


module.exports = {
    Contact: mongoose.model('Contact',ContactSchema)
};
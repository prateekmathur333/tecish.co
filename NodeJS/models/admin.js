const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const AdminSchema = new mongoose.Schema({
    name: {
        type: String
    }, 
    pass: {
        type: String
    },
    role: {
        type: String
    },
    email: {
        type:String
    },
    mobNo: {
        type:String
    }
},{collection: 'Admin'});


AdminSchema.plugin(timestamp);


module.exports = {
    Admin: mongoose.model('Admin',AdminSchema)
};
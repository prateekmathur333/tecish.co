const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const RegSchema = new mongoose.Schema({
    userId: {
        type: mongoose.Schema.Types.ObjectId, 
        ref: 'User',
        required: true
    },
    email: {
        type : String,
        required : true,
        trim: true, 
	unique: true, 
        dropDups: true
    },
    pass: {
        type: String,
        required: true,
        trim: true
    }
},{collection: 'Registeration'});

RegSchema.plugin(timestamp);


module.exports = {
    Reg: mongoose.model('Registeration',RegSchema)
};
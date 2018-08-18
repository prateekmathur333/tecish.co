const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const GASchema = new mongoose.Schema({
    companyId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'Company'
    },
    details: {
        type: String,
        required : true,
        trim: true
    }
},{collection: 'GA'});


GASchema.plugin(timestamp);


module.exports = {
    GA: mongoose.model('GA',GASchema)
};
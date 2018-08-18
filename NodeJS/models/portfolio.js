const {mongoose} = require('../server/server'),
timestamp = require('mongoose-timestamp');


const PortfolioSchema = new mongoose.Schema({
    title: {
        type: String,
        trim: true,
        required:true
    },
    companyId: {
        type: mongoose.Schema.Types.ObjectId, 
        ref: 'Company',
        required: true
    },
    userId: {
        type: mongoose.Schema.Types.ObjectId, 
        ref: 'User',
        required: true
    },
    imageName: {
        type: String,
        required: true
    },
    description: {
        type: String,
        trim: true,
        required: true
    }
},{collection: 'Portfolio'});


PortfolioSchema.plugin(timestamp);


module.exports = {
    Portfolio: mongoose.model('Portfolio',PortfolioSchema)
};
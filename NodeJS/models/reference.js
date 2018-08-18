const {mongoose} = require('../server/server'),
timestamp = require('mongoose-timestamp');


const ReferenceSchema = new mongoose.Schema({
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
    fName: {
        type: String,
        trim: true,
        required: true
    },
    lName: {
        type: String,
        trim: true,
        required: true
    },
    company: {
        type: String,
        trim: true,
        required: true
    },
    positionAtCompany: {
        type: String,
        trim: true,
        required: true
    },
    mobNo: {
        type: String,
        trim: true,
        required: true
    },
    email: {
        type: String,
        trim: true,
        required: true
    },
    city: {
        type: String,
        trim: true,
        required: true
    },
    country: {
        type: String,
        trim: true,
        required: true
    },
    projectCost: {
        type: String,
        trim: true,
        required: true
    },
    projectDescription: {
        type: String,
        trim: true,
        required: true
    }
},{collection: 'Reference'});


ReferenceSchema.plugin(timestamp);


module.exports = {
    Reference: mongoose.model('Reference', ReferenceSchema)
};
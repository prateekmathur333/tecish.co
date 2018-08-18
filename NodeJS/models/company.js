const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const CompanySchema = new mongoose.Schema({
    userId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'User'
    },
    name: {
        type: String,
        required: true,
        trim: true,
	unique: true
    },
    logo: {
        type : String,
        required : true
    },
    tagline: {
        type: String,
        trim: true
    },
    founded: {
        type: String, // It is a date object
        trim: true
    },
    noOfEmp: {
        type: Number,
        trim: true
    },
    minProjectPrice: {
        type: Number,
        trim: true
    },
    avgPricePerHour: {
        type: Number,
        trim: true
    },
    websiteLink: {
        type: String,
        trim: true
    },
    emailTechSupport: {
        type: String,
        trim: true
    },
    emailAdmin: {
        type: String,
        trim: true
    },
    twitterProfile: {
        type: String,
        trim: true
    },
    facebookProfile: {
        type: String,
        trim: true
    },
    summary: {
        type: String,
        trim: true
    },
    client: {
        type: String,
        trim: true
    },
    country: {
        type: String,
        trim: true
    },
    street: {
        type: String,
        trim: true
    },
    city: {
        type: String,
        trim: true
    },
    state: {
        type: String,
        trim: true
    },
    postalCode: {
        type: String,
        trim: true
    },
    mobNo: {
        type: String,
        trim: true
    },
    cert: {
        type: String,
        trim: true
    },
    accolades: {
        type: String,
        trim: true
    },
    detailedDes: {
        type: String,
        trim: true
    },
    status: {
        type: String
    },
    services: {
        type: String
    }, 
    tech: {
        type: String
    }
},{collection: 'Company'});


CompanySchema.plugin(timestamp);


module.exports = {
    Company: mongoose.model('Company',CompanySchema)
};
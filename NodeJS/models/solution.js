const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const SolutionSchema = new mongoose.Schema({
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
    softwareCat: {
       type: String,
        trim: true

    },
    logo: {
        type : String,
        required : true
    },
    tagline: {
        type: String,
        trim: true
    },
    des : {
        type: String,
        trim: true
    },
    softwareSummary: {
        type: String, 
        trim: true
    },
    noOfEmp: {
        type: Number,
        trim: true
    },
    introText: {
        type: String,
        trim: true
    },
    optionToStart: {
        type: String,
        trim: true
    },
    websiteLink: {
        type: String,
        trim: true
    },
    client: {
        type:String,
        trim: true
    },
    priceRange: {
        type:String,
        trim: true
    },
    pricingOptions: {
        type: String,
        trim: true
    },
    summary: {
        type: String,
        trim: true
    },
    pricingPage: {
        type: String,
        trim: true
    },
	service: {
	type: String,
        trim: true
},
    status: {
        type: String
    }
},{collection: 'Solution'});


SolutionSchema.plugin(timestamp);


module.exports = {
    Solution: mongoose.model('Solution',SolutionSchema)
};
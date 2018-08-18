const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const RatingSchema = new mongoose.Schema({
    // Possible values are Company, Solution.
    type: {
        type: String,
        required: true
    },
    company_id: {
        type: mongoose.Schema.Types.ObjectId, 
        ref: 'Company'
    },
    solution_id: {
        type: mongoose.Schema.Types.ObjectId, 
        ref: 'Solution'
    },
    ratingList: {
        type: String,
        required : true,
        trim: true
    }, 
    userId: {
        type: mongoose.Schema.Types.ObjectId, 
        ref: 'User',
        required: true
    },
},{collection: 'Rating'});


RatingSchema.plugin(timestamp);


module.exports = {
    Rating: mongoose.model('Rating',RatingSchema)
};
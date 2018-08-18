const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const BlogSchema = new mongoose.Schema({
    title: {
        type: String,
        required : true,
        trim: true,
    },
    img: {
    	type: String
    },
    content: {
    	type: String
    },
    category: {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'Category'
    },
	author: {
		type: String,
		trim: true
    },
    type: {
		type: String,
        trim: true,
        required: true,
    },
    onHome: {
		type: Boolean,
	},
},{collection: 'Blog'});


BlogSchema.plugin(timestamp);


module.exports = {
    Blog: mongoose.model('Blog',BlogSchema)
};
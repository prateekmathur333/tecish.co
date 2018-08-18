const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const CategorySchema = new mongoose.Schema({
    name: {
        type: String,
        required : true,
        trim: true,
	unique: true
    }
},{collection: 'Category'});


CategorySchema.plugin(timestamp);


module.exports = {
    Category: mongoose.model('Category',CategorySchema)
};
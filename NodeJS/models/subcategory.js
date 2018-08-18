const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const SubCatSchema = new mongoose.Schema({
    cat_id: {
        type: mongoose.Schema.Types.ObjectId, 
        ref: 'Category',
        required: true
    },
    name: {
        type: String,
        required : true,
        trim: true,
	unique: true
    }
},{collection: 'SubCategory'});


SubCatSchema.plugin(timestamp);


module.exports = {
    SubCat: mongoose.model('SubCategory',SubCatSchema)
};
const {mongoose} = require('../server/server'),
    timestamp = require('mongoose-timestamp');


const ReviewSchema = new mongoose.Schema({
    userId: {
        type: mongoose.Schema.Types.ObjectId, 
        ref: 'User',
        required: true,
    },
    companyId: {
        type: mongoose.Schema.Types.ObjectId, 
        ref: 'Company',
        required: true,
    },
    typeOfProject: {
        type: mongoose.Schema.Types.ObjectId, 
        ref: 'Category',
        required: true
    },
    projectTitle: {
        type: String,
        required : true,
        trim: true
    },
    industry: {
        type: String,
        trim: true
    },
    cost: {
        type: Number,
        trim: true
    },
    startDate: {
        type: String,
        trim: true
    },
    endDate: {
        type: String,
        trim: true
    },
    background: {
        type: String,
        trim: true
    },
    challenge: {
            service: {
                type: String,
                trim: true
            },
            goal: {
                type: String,
                trim: true
            }
    },
    solution: {
        vendor: {
            type: String,
            trim: true
        },
        projectDetail: {
            type: String,
            trim: true
        },
        teamComposition: {
            type: String,
            trim: true
        }
    },
    result: {
        outcome: {
            type: String,
            trim: true
        },
        effective: {
            type: String,
            trim: true
        },
        keyFeature: {
            type: String,
            trim: true
        },
        improvements: {
            type: String,
            trim: true
        }
    },
    rating: {
        quality: {
            rating: {
                type: Number,
                trim: true
                
            },
            detail: {
                type: String,
                trim: true
                
            }
        },
        schedule: {
            rating: {
                type: Number,
                trim: true
                
            },
            detail: {
                type: String,
                trim: true
                
            }
        },
        cost: {
            rating: {
                type: Number,
                trim: true
                
            },
            detail: {
                type: String,
                trim: true
                
            }
        },
        refer: {
            rating: {
                type: Number,
                trim: true
                
            },
            detail: {
                type: String,
                trim: true
                
            }
        },
        overallRating: {
            rating: {
                type: Number,
                trim: true
                
            },
            detail: {
                type: String,
                trim: true
                
            }
        }
    },
    reviewer: {
        fullName: {
            type: String,
            trim: true
            
        },
        position: {
            type: String,
            trim: true
            
        },
        companyName: {
            type: String,
            trim: true
            
        },
        companySize: {
            type: String,
            trim: true
            
        },
        country: {
            type: String,
            trim: true
            
        }
    },
    reviewerDetail: {
        email: {
            type: String,
            trim: true
        },
        mobNo: {
            type: String,
            trim: true
        }   
    },
    status: {
        type: String
    }
},{collection: 'Review'});


ReviewSchema.plugin(timestamp);
ReviewSchema.index({userId: 1, companyId: 1}, {unique: true })

module.exports = {
    Review: mongoose.model('Review',ReviewSchema)
};
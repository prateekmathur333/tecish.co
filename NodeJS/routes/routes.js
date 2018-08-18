const express = require('express');
const router = express.Router();
const multer = require('multer');
const fs = require('fs');
const request = require('request');
const nodemailer = require('nodemailer');
 
const { User } = require('../models/user');
const { Reg } = require('../models/registeration');
const { Company } = require('../models/company');
const { Rating } = require('../models/rating');
const { Category } = require('../models/category');
const { Tech } = require('../models/tech');
const { Blog } = require('../models/blog');
const { Review } = require('../models/review');
const { Contact } = require('../models/contact');
const { SubCat } = require('../models/subcategory');
const { Portfolio } = require('../models/portfolio');
const { Reference } = require('../models/reference');
const { Solution } = require('../models/solution');
const {Admin} = require('../models/admin');
const {Country} = require('../models/country');
const {State} = require('../models/state');
const {City} = require('../models/city');
 
var download = function(uri, filename, callback){
  request.head(uri, function(err, res, body){
    console.log('content-type:', res.headers['content-type']);
    console.log('content-length:', res.headers['content-length']);
 
    request(uri).pipe(fs.createWriteStream(filename)).on('close', callback);
  });
};
 
 
 
let OTP = [];
const generateOTP = () => {
    let text = "";
    let possible = "0123456789";  
 
    for (let i = 0; i < 6; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));
 
    return text;
}


const generateDefaultMobNo = () => {
    let text = "";
    let possible = "abcdefghijklmnopqrstuvwxyz";  
 
    for (let i = 0; i < 8; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));
 
    return text;
}
 
const sendMail = (toEmail, sub, msg) => {
    let transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'tecish.co@gmail.com',
            pass: 'PrateekMathur'
        }
    });
       
    let mailOptions = {
        from: 'tecish.co@gmail.com',
        to: toEmail,
        subject: sub,
        text: msg
    };
   
   
    transporter.sendMail(mailOptions, function(error, info){
        if (error) {
            return false;
        } else {
            return true;
        }
    });
 
    return true;
}
 
 
const StorageProfileImages = multer.diskStorage({
    // destination
    destination: (req, file, cb) => {
      cb(null, './public/ProfileImages');
    },
    filename: (req, file, cb) => {
      cb(null, Date.now()+'-'+file.originalname);
    }
});
 
// Multer Configuration
const StorageBlogImage = multer.diskStorage({
    // destination
    destination: (req, file, cb) => {
      cb(null, './public/BlogImages');
    },
    filename: (req, file, cb) => {
      cb(null, Date.now()+'-'+file.originalname);
    }
});
 
const StorageLogo = multer.diskStorage({
    // destination
    destination: (req, file, cb) => {
      cb(null, './public/CompanyLogo');
    },
    filename: (req, file, cb) => {
      cb(null, Date.now()+'-'+file.originalname);
    }
});
 
// Multer Configuration
const StoragePortfolio = multer.diskStorage({
    // destination
    destination: (req, file, cb) => {
      cb(null, './public/PortfolioImages');
    },
    filename: (req, file, cb) => {
      cb(null, Date.now()+'-'+file.originalname);
    }
});
 
const StorageSoluLogo = multer.diskStorage({
    // destination
    destination: (req, file, cb) => {
      cb(null, './public/SolutionLogo');
    },
    filename: (req, file, cb) => {
      cb(null, Date.now()+'-'+file.originalname);
    }
});
 
const uploadProfileImages = multer({storage: StorageProfileImages});
const uploadBlogImage = multer({ storage: StorageBlogImage });
const uploadCompanyLogo = multer({ storage: StorageLogo });
const uploadPortfolioImage = multer({storage: StoragePortfolio});
const uploadSolutionLogo = multer({ storage: StorageSoluLogo });
 
router.get('/',(req,res) => {
    res.end('Welcome Admin');
});
 

router.get('/admin',(req,res) => {
    Admin.find({}, (err, data) => {
        if(err) {
          res.send({"status":"error"});
          console.log(err);
        } else {
            res.send({data, ...{status: "ok"}});
        }
    });
});
    
router.get('/admin/:adminId',(req,res) => {
    Admin.find({_id: req.params.adminId},(err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        } else {
            res.send({data, status: "ok"});
        }
        
    });
});


router.post("/admin/add", (req, res) => {
    let admin = new Admin({
        name: req.body.name,
        email: req.body.email,
        pass: req.body.pass,
        role: req.body.role,
        mobNo: req.body.mobNo
    });
 
    admin.save().then((data) => {
            res.send({data, ...{status: "ok"}})
    }, (e) => {
        res.send({"status":"error"});
        return false;
    });
});


router.post('/admin/edit', (req, res) => {
    const id = req.body.adminId;
    delete req.body.adminId;
    let update = req.body;

 
    Admin.findOneAndUpdate({_id: id}, {$set:update}, {new: true},(err, data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    });
});


router.post('/admin/delete/:adminId', (req, res) => {
    Admin.findOneAndRemove({_id:req.params.adminId}, (err, data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    })
});


router.post('/admin/login', (req,res) => {
    console.log(req.body);
    Admin.find({$and: [{email: req.body.email},{pass: req.body.pass}]}, (err,data) => {
        if(err) {
            console.log(err);
            res.send({"status":"error"});
            return false;
        } else {
            if(data.length === 0) {
                // Failed Login
                res.json({
                    login: false
                });
            } else {
                res.send({data, login: true, ...{status: "ok"}});
            }
        }
    });
});

// User Get and Add.
router.get('/user',(req,res) => {
    User.find({}, (err, data) => {
            if(err) {
          res.send({"status":"error"});
          console.log(err);
        } else {
            res.send({data, ...{status: "ok"}});
        }
    });
});
    
router.get('/user/:userId',(req,res) => {
    User.find({_id: req.params.userId},(err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        } else {
            const userInfo = data[0];
            Reg.find({userId: req.params.userId}, (err,data) => {
                if(err) {
                    res.send({"status":"error"});
                    return false;
                } else {
                    res.send({...userInfo._doc,email: data[0].email, status: "ok"});
                }
            });
        }
        
    });
});
 
router.get('/reg',(req,res) => {
    Reg.find({}, (err, data) => {
        if(err) {
            res.send({"status":"error"});
            console.log(err);
        } else {
            res.send({data, ...{status: "ok"}});
        }
    });
});
 


router.get('/reg/:userId',(req,res) => {
    Reg.find({userId: req.params.userId}, (err, data) => {
        if(err) {
            res.send({"status":"error"});
            console.log(err);
        } else {
            res.send({data, ...{status: "ok"}});
        }
    });
});
router.get('/user/email/:email',(req,res) => {
    Reg.find({email: req.params.email}).populate('userId').exec((err,data) => {
        if(err) {
            console.log(err);
            res.send({"status":"error"});
            return false;
        } else {
            console.log(data.length === 0? "Yes": "No");
            if(data.length === 0) {
                res.send({"status":"error", isRegistered: false});
                return false;
            } else {
                res.send({status: "ok", isRegistered: true, data});
            }
        }
    });
});
 
router.post("/user/add/linkedin",(req, res) => {
    console.log(req.body);
    const email = req.body.email;
    const atTheRateIndex = req.body.email.indexOf('@');
    const imgName = req.body.email.substring(0,atTheRateIndex);
    console.log(imgName);
    download(req.body.imgUrl, `./public/ProfileImages/${imgName}.jpg`, function(){
        console.log('done');
        let user = new User({
        name: req.body.name,
        title: req.body.title,
        location: req.body.location,
        industry: req.body.industry,
        linkedinProfile: req.body.linkedinProfile,
        bio: req.body.bio,
        mobNo: req.body.mobNo || "",
        imgUrl: imgName+'.jpg'
       });
     
      user.save().then((data) => {
        let response = data;
        let reg = new Reg({
                userId: data._id,
                email: req.body.email.toLowerCase(),
                pass: req.body.pass
            });
       
            reg.save().then((data) => {
                res.send({response, ...{status: "ok"}});
                sendMail(email,"Thanks for creating an account",`Your account has been created, your password is ${req.body.pass}`);
            }, (e) => {
                console.log('Error in email');
                User.findOneAndRemove({_id: response._id}, (err, data) => {
                    if(err) {
                        console.log('inside rollback feature');
                        console.log({status: "error while performing rollback"});
                    } else {
                        console.log('Deleted successfully');
                    }
                });
                if(e.name === "BulkWriteError")
                      res.send({"status":"error","msg":"Email alredy taken"});
                else
                    res.send({"status":"error", msg: "Something went Wrong"});
                return false;
            });
        }, (e) => {
            console.log(e);
            if(e.name === "BulkWriteError")
                  res.send({"status":"error","msg":"mobile number alredy taken"});
            else
                res.send({"status":"error", msg: "SOmething went wrong"});
            return false;
        });
    });
});
 
// Data should be multipart/formdata encoded
router.post("/user/add/form", (req, res) => {
    console.log(req.body);
    const email = req.body.email;
    let user = new User({
        name: req.body.name,
        title: req.body.title,
        location: req.body.location,
        industry: req.body.industry,
        linkedinProfile: req.body.linkedinProfile,
        twitterProfile: req.body.twitterProfile,
        bio: req.body.bio,
        mobNo: req.body.mobNo,
        imgUrl: req.body.imgUrl
    });
 
    user.save().then((data) => {
        let response = data;
        let reg = new Reg({
                userId: data._id,
                email: req.body.email.toLowerCase(),
                pass: req.body.pass
            });
       
            reg.save().then((data) => {
                res.send({response, ...{status: "ok"}});
                sendMail(email,"Thanks for creating an account",`Your account has been created, your password is ${req.body.pass}`);
            }, (e) => {
                console.log('Error in email');
                User.findOneAndRemove({_id: response._id}, (err, data) => {
                    console.log('inside rollback feature');
                    if(err) {
                        console.log({status: "error while performing rollback"});
                    } else {
                        console.log('Deleted successfully');
                    }
                });
                if(e.name === "BulkWriteError")
                      res.send({"status":"error","msg":"Email alredy taken"});
                else
                    res.send({"status":"error", msg: "Something went Wrong"});
                return false;
            });
        }, (e) => {
            console.log(e);
            if(e.name === "BulkWriteError")
                  res.send({"status":"error","msg":"mobile number alredy taken"});
            else
                res.send({"status":"error", msg: "SOmething went wrong"});
            return false;
        });
    });
 
router.post("/user/edit", (req, res) => {
    const email = "";
    const id = req.body.userId;
    delete req.body.userId;
    let update = req.body;
 
    User.findOneAndUpdate({_id: id}, {$set:update}, {new: true},(err, data) => {
        if(err) {
            if(e.name === "BulkWriteError")
                  res.send({"status":"error","msg":"alredy taken"});
            else
                res.send({"status":"error", msg: "SOmething went wrong"});
            return false;
        } else {
            sendMail(email,"Information Updated","Updated successfully");
            res.send({data, ...{status: "ok"}})
        }
    });
});

//isko bad me hi check krege
router.post('/user/delete/:userId', (req, res) => {
	User.findOneAndRemove({_id: req.params.userId}, (err,data) => {
		if(err)
			res.send({status: "error"});
		else {
            Reg.findOneAndRemove({userId: req.params.userId}, (err, data) => {
                if(err) {
                    res.send({status: "error"});
                    return;
                } else {
                    Company.find({userId: req.params.userId}).remove((err,data) => {
                        if(err) {
                            res.send({status: "error"});
                            return;
                        } else {
                            Solution.find({userId: req.params.userId}).remove((err, data) => {
                                if(err) {
                                    res.send({status: "error"});
                                    return;
                                } else {
                                    Review.find({userId: req.params.userId}).remove((err,data) => {
                                        if(err) {
                                            res.send({status: "error"});
                                            return;
                                        } else {
                                            Reference.find({userId: req.params.userId}).remove((err,data) => {
                                                if(err) {
                                                    res.send({status: "error"});
                                                    return;
                                                } else {
                                                    Portfolio.find({userId: req.params.userId}).remove((err,data) => {
                                                        if(err) {
                                                            res.send({status: "error"});
                                                            return;
                                                        } else {
                                                            res.send({status: "ok"});
                                                        }
                                                    });
                                                }   
                                            })
                                        }
                                    })
                                }
                            })
                        }
                    })
                }
            })
        }
	});
});
 
 
router.post('/login', (req,res) => {
    console.log(req.body);
    Reg.find({$and: [{email: req.body.email},{pass: req.body.pass}]}, (err,data) => {
        if(err) {
                console.log(err);
            res.send({"status":"error"});
            return false;
        } else {
            if(data.length === 0) {
                // Failed Login
                res.json({
                    login: false
                });
            } else {
                User.find({_id: data[0].userId}, (err, data) => {
                    if(err) {
                        console.log(err);
                            res.send({"status":"error"});
                            return false;
                            }
                            res.send({data, login: true, ...{status: "ok"}})
                });
            }
        }
    });
});
 
 
// Company Get and Add.
router.get('/company/approved',(req,res) => {
    Company.find({status: "Approved"}).populate('userId').exec((err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});

router.get('/company/rejected',(req,res) => {
    Company.find({status: "Rejected"}).populate('userId').exec((err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});

router.get('/company/pending', (req, res) => {
    Company.find({status: "Pending"}).populate('userId').exec((err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});


 
router.get('/company/all',(req,res) => {
    Company.find({}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});
 
 
router.post('/company/status/update', (req, res) => {
    let update = {
        status: req.body.status
    }
    Company.findOneAndUpdate({_id: req.body.companyId}, {$set:update}, {new: true},(err, data) => {
        if(err) {
                console.log(err);
            res.send({"status":"error"});
            return false;
        } else {
            Company.find({_id: req.body.companyId}, (err, data) => {
                if(err) {
                    res.send({status: "error"});
                    return;
                } else {
                    sendMail(data[0].emailAdmin,"Company status changes", `We would like to inform you that your company status has been updated to ${req.body.status}`);
                    res.send({data, ...{status: "ok"}});
                }
            })
        }
    });
});
 


router.post('/company/edit', (req, res) => {
    const id = req.body.companyId;
    delete req.body.companyId;
    let update = req.body;
    Company.findOneAndUpdate({_id: id}, {$set:update}, {new: true},(err, data) => {
        if(err) {
                console.log(err);
                if(e.name === "BulkWriteError")
                  res.send({"status":"error","msg":"Name alredy taken"});
            else
                res.send({"status":"error", msg: "SOmething went wrong"});
            return false;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    });
});


//review delete krne h
router.post('/company/delete/:companyId', (req, res) => {
	Company.findOneAndRemove({_id: req.params.companyId}, (err,data) =>{
		 if(err) {
                console.log(err);
            res.send({"status":"error"});
            return false;
        } else {
            res.send({data, ...{status: "ok"}})
        }
	});
});
 
 
router.get('/company/:companyId',(req,res) => {
    Company.find({_id: req.params.companyId}).populate('userId').exec((err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});

router.get('/company/service/:service', (req, res) => {
    const result = [];
    Company.find({}, (err, data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else {
            data.map(row => {
                let servicesArray = row.services.split(',');
                if(servicesArray.includes(req.params.service)) {
                    result.push(row);
                }
            });
            res.send(result);
        }
    })
});

router.get('/company/user/:userId', (req, res) => {
    Company.find({userId: req.params.userId}, (err, data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        } else {
            res.send({data, status: "ok"});
        }
    })
})

//company name and id
router.get('/company/only/name/list', (req, res) => {
    Company.find({},'name',(err, data) => {
        if(err) {
            console.log('Error');
            console.log(err);
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});
 
router.post("/company/add",(req, res) => {
    console.log(req.body);
    let email = "";
    Reg.find({userId: req.body.userId}, (err, data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
       }
       email = data[0].email;
       let company = new Company({
           userId: req.body.userId,
           name: req.body.name,
           ownerName: req.body.ownerName,
           logo: req.body.logo,
           tagline: req.body.tagline,
           founded: req.body.founded,
           noOfEmp: req.body.noOfEmp,
           minProjectPrice: req.body.minProjectPrice,
           avgPricePerHour: req.body.avgPricePerHour,
           websiteLink: req.body.websiteLink,
           emailTechSupport: req.body.emailTechSupport,
           emailAdmin: req.body.emailAdmin,
           twitterProfile: req.body.twitterProfile,
           facebookProfile: req.body.facebookProfile,
           summary: req.body.summary,
           client: req.body.client,
           country: req.body.country || "",
           street: req.body.street,
           city: req.body.city || "",
           state: req.body.state || "",
           postalCode: req.body.postalCode,
           mobNo: req.body.mobNo,
           cert: req.body.cert,
           accolades: req.body.accolades,
           detailedDes: req.body.detailedDes,
           services: req.body.services,
           tech: req.body.tech,
           status: "Pending"
       });
       
       company.save().then((data) => {
         res.send({data, ...{status: "ok"}})
         sendMail(email,"Company under approval","Your company will be verified and updated in 48 hours");
       }, (e) => {
           console.log(e);
        if(e.name === "BulkWriteError")
        res.send({"status":"error","msg":"Name alredy taken"});
  else
      res.send({"status":"error", msg: "SOmething went wrong"});
               return false;
       });
    });
});
 
// Rating Get and Add.
router.get('/rating',(req,res) => {
    Rating.find({}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.json({data, ...{status: "ok"}});
    });
});
 
router.get('/rating/:catId',(req,res) => {
    Rating.find({}).populate('company_id').exec((err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else {
            let result = [];
            for(let i=0; i < data.length; i++) {
                if(req.params.catId in JSON.parse(data[i].ratingList)) {
                    result.push(data[i]);
                }
            }
            res.send(result);
        }
    });
});
 
 
router.post("/rating/add", (req, res) => {
    const company_id = req.body.company_id || null;
    const solution_id = req.body.solution_id || null;
    const type = req.body.type;
    const userId = req.body.userId;
    if('company_id' in req.body)
        delete req.body.company_id;
    if('solution_id' in req.body)
        delete req.body.solution_id;
    delete req.body.type;
    delete req.body.userId;
    let rating = new Rating({
        company_id: company_id,
        solution_id: solution_id,
        type: type,
        userId: userId,
        ratingList: JSON.stringify(req.body)
    });
   
 
    rating.save().then((data) => {
        if(type == "Company".toLowerCase())
            res.send({data, ...{status: "ok"}})
        else
            res.send({data, ...{status: "ok"}})
    }, (e) => {
        res.send({"status":"error"});
            return false;
    });
});
 
 
// Category Get and Add.
router.get('/category', (req,res) => {
    Category.find({}, (err,data) => {
        if(err) {
            if(err.name === "BulkWriteError")
                  res.send({"status":"error","msg":"Categoy alredy taken"});
            else
                res.send({"status":"error", msg: "SOmething went wrong"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
 
});
 
router.get('/category/:categoryId',(req,res) => {
    // res.end(req.params.categoryId);
    Category.find({_id: req.params.categoryId}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});

router.post('/category/delete/:categoryId',(req,res) => {
    // res.end(req.params.categoryId);
    Category.findOneAndRemove({_id: req.params.categoryId}, (err,data) => {
        if(err) {
            console.log(err);
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});

 
router.post("/category/add", (req, res) => {
    console.log(req.body);
    let category = new Category({
        name: req.body.name
    });
 
    category.save().then((data) => {
            res.send({data, ...{status: "ok"}})
    }, (e) => {
        if(e.name === "BulkWriteError")
                  res.send({"status":"error","msg":"Category alredy taken"});
            else
                res.send({"status":"error", msg: "SOmething went wrong"});
        return false;
    });
});
 
router.get('/tech', (req,res) => {
    Tech.find({}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
 
});
 
router.get('/tech/:techId',(req,res) => {
    Tech.find({_id: req.params.techId}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});
 
router.post("/tech/add", (req, res) => {
    console.log(req.body);
    let tech = new Tech({
        name: req.body.name
    });
 
    tech.save().then((data) => {
            res.send({data, ...{status: "ok"}})
    }, (e) => {
        res.send({"status":"error"});
        return false;
    });
});
 
// Review Get and Add.
router.get('/review/approved', (req, res ) => {
    Review.find({status: "Approved"}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        res.json({data, ...{status: "ok"}});
    });
});
 

router.get('/review/rejected', (req,res) => {
    Review.find({status: "Rejected"}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        res.json({data, ...{status: "ok"}});
    });
});

router.get('/review/pending', (req,res) => {
    Review.find({status: "Pending"}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        res.json({data, ...{status: "ok"}});
    });
});

router.get('/review/all', (req,res) => {
    Review.find({}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        res.json({data, ...{status: "ok"}});
    });
});
 
router.get('/review/company/:companyId', (req,res) => {
    Review.find({$and: [
            {companyId: req.params.companyId},
            {status: "Approved"},
        ]}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        let items = 0;
        let total = 0;
        data = data.map(item => {
            items++;
            total += item.rating.overallRating.rating;
            return item;
        });
        let obj = {reviewsArray:data, avgRating: total/items}
        res.send(obj);
    });
}); 
 
router.get('/review/filter', (req,res) => {
    let mySort = {};
    if(id === 1)
        mySort = {updatedAt: -1}
    if(id === 2)
        mySort = {rating: {overallRating: {rating: 1}}}
    if(id === 3)
        mySort = {rating: {overallRating: {rating: -1}}}
    Review.find({$and: [
            {companyId: req.params.companyId},
            {status: "Approved"},
        ]},[],{sort: mySort},(err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        let items = 0;
        let total = 0;
        data = data.filter(item => {
            items++;
            total = item.rating.overallRating.rating;
            return parseInt(item.cost) > parseInt(req.query.cost);
        });
        let obj = {reviewsArray:data, avgRating: total/items}
        res.send(obj);
    });
 
});
 
 
 
router.get('/review/:userId', (req,res) => {
    // res.end(req.params.reviewId);
    Review.find({$and: [
            {userId: req.params.userId},
            {status: "Approved"},
        ]}).populate('companyId').exec((err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        if(data.length === 0) res.json({success:false});
        else res.json({...{success: true}, data});
    });
});
 
router.post('/review/delete/:reviewId', (req, res) => {
    Review.findOneAndRemove({_id: req.params.reviewId}, (err, data) => {
        if(err) {
            res.send({status: "error"});
            return;
        } else {
            res.send({data, ...{status: "ok"}});
        }
    })
});

router.post('/review/edit', (req, res) => {
    const email = req.body.email;
    let update = {
        projectTitle: req.body.projectTitle,
        industry: req.body.industry,
        cost: req.body.cost,
        startDate: req.body.startDate,
        endDate: req.body.endDate,
        background: req.body.background,
        challenge: {
            service: req.body.cService,
            goal: req.body.cGoal
        },
        solution: {
            vendor: req.body.vendor,
            projectDetail: req.body.projectDetail,
            teamComposition: req.body.teamComposition
        },
        result: {
            outcome: req.body.outcome,
            effective: req.body.effective,
            keyFeature: req.body.keyFeature,
            improvements: req.body.improvements
        },
        rating: {
            quality: {
                rating: req.body.qRating,
                detail: req.body.qDetail
            },
            schedule: {
                rating: req.body.sRating,
                detail: req.body.sDetail
            },
            cost: {
                rating: req.body.cRating,
                detail: req.body.cDetail
            },
            refer: {
                rating: req.body.rRating,
                detail: req.body.rDetail
            },
            overallRating: {
                rating: req.body.oRating,
                detail: req.body.oDetail
            }
        },
        reviewer: {
            fullName: req.body.fullName,
            position: req.body.position,
            companyName: req.body.companyName,
            companySize: req.body.companySize,
            country: req.body.country,
        },
        reviewerDetail: {
            email: req.body.email,
            mobNo: req.body.mobNo
        }
    };

    Review.findOneAndUpdate({_id: req.body.reviewId}, {$set:update}, {new: true},(err, data) => {
        if(err) {
            console.log(err);
            if(err.name === "BulkWriteError")
                  res.send({"status":"error","msg":"Overwrite error alredy taken"});
            else
                res.send({"status":"error", msg: "SOmething went wrong"});
            return false;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    });
});


router.post('/review/status/update', (req, res) => {
    let update = {
        status: req.body.status
    }
    Review.findOneAndUpdate({_id: req.body.reviewId}, {$set:update}, {new: true},(err, data) => {
        if(err) {
                console.log(err);
            res.send({"status":"error"});
            return false;
        } else {
            console.log(data);
            sendMail(data.reviewerDetail.email,"Updated status",  `We would like to inform you that your review's status has been updated to ${req.body.status}`);
            res.send({data, ...{status: "ok"}})
        }
    });
});


router.post("/review/add", (req, res) => {
    console.log(req.body);
    const email = req.body.email;
    let review = new Review({
        companyId: req.body.companyId,
        typeOfProject: req.body.typeOfProject,
        projectTitle: req.body.projectTitle,
        industry: req.body.industry,
        cost: req.body.cost,
        startDate: req.body.startDate,
        endDate: req.body.endDate,
        userId: req.body.userId,
        background: req.body.background,
        challenge: {
            service: req.body.cService,
            goal: req.body.cGoal
        },
        solution: {
            vendor: req.body.vendor,
            projectDetail: req.body.projectDetail,
            teamComposition: req.body.teamComposition
        },
        result: {
            outcome: req.body.outcome,
            effective: req.body.effective,
            keyFeature: req.body.keyFeature,
            improvements: req.body.improvements
        },
        rating: {
            quality: {
                rating: req.body.qRating,
                detail: req.body.qDetail
            },
            schedule: {
                rating: req.body.sRating,
                detail: req.body.sDetail
            },
            cost: {
                rating: req.body.cRating,
                detail: req.body.cDetail
            },
            refer: {
                rating: req.body.rRating,
                detail: req.body.rDetail
            },
            overallRating: {
                rating: req.body.oRating,
                detail: req.body.oDetail
            }
        },
        reviewer: {
            fullName: req.body.fullName,
            position: req.body.position,
            companyName: req.body.companyName,
            companySize: req.body.companySize,
            country: req.body.country,
            email: req.body.email,
            mobNo: req.body.mobNo
        },
        reviewerDetail: {
            email: req.body.email,
            mobNo: req.body.mobNo
        },
        status: "Pending"
    });
 
    review.save().then((data) => {
            res.send({data, ...{status: "ok"}})
            sendMail(email,"Review Under approval","Your review will be updated in 48 hours");
    }, (e) => {
        console.log(e);
        if(e.name === "BulkWriteError")
                  res.send({"status":"error","msg":"Overwrite error alredy taken"});
            else
                res.send({"status":"error", msg: "Something went wrong"});
            return false;
    });
});
 
 
// Subcategory
router.get('/subcategory', (req,res) => {
    SubCat.find({}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else {
            let catSubCat = {};
            data.map(item => {
                let cat_id = item.cat_id;
                delete item.cat_id;
                if(cat_id in catSubCat) {
                    catSubCat[cat_id].push(item);
                } else {
                    catSubCat[cat_id] = [];
                    catSubCat[cat_id].push(item);
                }
            });
            var result = [];
            const size = Object.keys(catSubCat).length;
            for(let key in catSubCat) {
                Category.find({_id: key}, (err, data) => {
                    if(err) {
                        result.push({status: "error"});
                    } else {
                        result.push({...data[0]._doc, subCat: catSubCat[key]});
                    }
                });
            }
            let timer = setTimeout(() => {
                if(result.length === size){
                    res.send(result);
                    clearInterval(timer);
                } else console.log("Wait");
            }, 1000);
        }
    });
});
 
router.post('/subcategory/add', (req,res) => {
    let subcat = new SubCat({
       cat_id: req.body.cat_id,
       name: req.body.name
    });
 
    subcat.save().then((data) => {
            res.json({data, ...{status: "ok"}});
    }, (e) => {
        res.send({"status":"error"});
            return false;
    });
});
 
router.post('/subcategory/edit', (req,res) => {
    const id = req.body.catId;
    delete req.body.catId;
    let update = req.body;
    SubCat.findOneAndUpdate({_id: id}, {$set:update}, {new: true},(err, data) => {
        if(err) {
                console.log(err);
                if(e.name === "BulkWriteError")
                  res.send({"status":"error","msg":"Name alredy taken"});
            else
                res.send({"status":"error", msg: "SOmething went wrong"});
            return false;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    });
});


router.post('/subcategory/delete/:subcatId', (req,res) => {
    SubCat.findOneAndRemove({_id: req.params.subcatId}, (err, data) => {
        if(err) {
            res.send({"status":"error", msg: "Deleted "});
            return false;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    });
});


router.get('/portfolio', (req,res) => {
    Portfolio.find({}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});
 
router.post("/portfolio/add" ,(req, res) => {
    let portfolio = new Portfolio({
        userId: req.body.userId,
        title: req.body.title,
        companyId: req.body.companyId,
        description: req.body.description,
        imageName : req.body.imgUrl
    });
 
    portfolio.save().then((data) => {
        res.send({data, ...{status: "ok"}})
    }, (e) => {
        res.send({"status":"error"});
            return false;
    });
});
 
router.get('/portfolio/:companyId',(req,res) => {
    Portfolio.find({companyId: req.params.companyId}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});
 
 
// Reference
router.get('/reference', (req,res) => {
    Reference.find({}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.json({data, ...{status: "ok"}});
    });
});

router.post('/reference/edit', (req, res) => {
    const id = req.body.refId;
    delete req.body.refId;
    let update = req.body;
    Reference.findOneAndUpdate({_id: id}, {$set:update}, {new: true},(err, data) => {
        if(err) {
            res.send({status: "error"});
            return;
        } else {
            res.send({data, status: "ok"});
        }
    });
});
 
router.get('/reference/user/:userId',(req,res) => {
    Reference.find({userId: req.params.userId}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});
 
 
router.post("/reference/add",(req, res) => {
    console.log(req.body);
    let reference = new Reference({
        userId: req.body.userId,
        companyId: req.body.companyId,
        fName: req.body.fName,
        lName: req.body.lName,
        company: req.body.company,
        positionAtCompany: req.body.positionAtCompany,
        mobNo: req.body.mobNo,
        email: req.body.email,
        city: req.body.city,
        country: req.body.country,
        projectCost: req.body.projectCost,
        projectLength: req.body.projectLength,
        projectDescription: req.body.projectDescription
    });
 
    reference.save().then((data) => {
        sendMail(req.body.email, "Invitation for Review", "Hello, You are invited to review the company on Tecish for your recent project Click on the link below to start review -\nhttp://139.59.42.1/review.php");
        res.send({data, ...{status: "ok"}})
    }, (e) => {
        res.send({"status":"error"});
        return false;
    });
});
 
 
router.get('/solution/all', (req,res) => {
    Solution.find({}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        res.json({data, ...{status: "ok"}});
    })
});
 
router.get('/solution/approved', (req,res) => {
    Solution.find({status: "Approved"}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        res.json({data, ...{status: "ok"}});
    })
});

router.get('/solution/rejected', (req,res) => {
    Solution.find({status: "Rejected"}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        res.json({data, ...{status: "ok"}});
    })
});

router.get('/solution/pending', (req,res) => {
    Solution.find({status: "Pending"}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        res.json({data, ...{status: "ok"}});
    })
});
 
router.post("/solution/add",(req, res) => {
    let solu = new Solution({
        userId: req.body.userId,
        name: req.body.name,
        softwareCat: req.body.softwareCat,
        logo: req.body.logo,
        tagline: req.body.tagline,
        des: req.body.des,
        softwareSummary: req.body.softwareSummary,
        noOfEmp: req.body.noOfEmp,
        introText: req.body.introText,
        optionToStart: req.body.optionToStart,
        websiteLink: req.body.websiteLink,
        client: req.body.client,
        priceRange: req.body.priceRange,
        pricingOptions: req.body.pricingOptions,
        summary: req.body.summary,
        pricingPage: req.body.pricingPage,
        service: req.body.service,
        status: "Pending"
    });
 
    solu.save().then((data) => {
        res.send({data, ...{status: "ok"}})
    }, (e) => {
        console.log(e);
                if(e.name === "BulkWriteError")
                  res.send({"status":"error","msg":"Name alredy taken"});
            else
                res.send({"status":"error", msg: "SOmething went wrong"});
            return false;
    });
});


router.post('/solution/status/update', (req, res) => {
    console.log("Start");
    let update = {
        status: req.body.status
    }
    console.log(req.body.solutionId);
    Solution.findOneAndUpdate({_id: req.body.solutionId}, {$set:update}, {new: true},(err, data) => {
        if(err) {
                console.log(err);
            res.send({"status":"error"});
            return false;
        } else {
            Reg.find({userId: data.userId}, (err, data) => {
                if(err) {
                    res.send({status: "error"});
                    return;
                } else {
                    console.log(data[0].email);
                    sendMail(data[0].email,"Status change", `${req.body.status}`);
                }
            })
            res.send({data, status:"ok"});    
        }
    });
});

router.post('/solution/edit', (req, res) => {
    const id = req.body.solutionId;
    delete req.body.solutionId;
    let update = req.body;
    Solution.findOneAndUpdate({_id: id}, {$set:update}, {new: true},(err, data) => {
        if(err) {
                console.log(err);
                if(e.name === "BulkWriteError")
                  res.send({"status":"error","msg":"Name alredy taken"});
            else
                res.send({"status":"error", msg: "SOmething went wrong"});
            return false;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    });
});

router.post('/solution/delete/:solutionId', (req, res) => {
	Solution.findOneAndRemove({_id: req.params.solutionId}, (err,data) =>{
		 if(err) {
                console.log(err);
            res.send({"status":"error"});
            return false;
        } else {
            res.send({data, ...{status: "ok"}})
        }
	});
});
 

router.post('/search', (req,res) => {
    // Search Company and
    let result = [];
    Company.find({
        $and: [
            {$or: [
                {name: { "$regex": req.body.name, "$options": "i" }},
                {services: {"$regex": req.body.name, "$options": "i" }},
                {tech: {"$regex": req.body.name, "$options": "i" }},
            ]},
            {status: "Approved"}
        ]}, (err,data) => {
            if(err) {
                res.send({"status":"error"});
                return false;
            }
            else {
                result = result.concat(data);
                Solution.find({
                    $and: [
                        {$or: [
                            {name: { "$regex": req.body.name, "$options": "i" }},
                            {softwareCat: {"$regex": req.body.name, "$options": "i" }},
                        ]},
                        {status: "Approved"}
                    ]}, (err, data)  => {
                        if(err) {
                            res.send({"status":"error"});
                            return false;
                        }
                        else {
                            result = result.concat(data);
                            res.send({data: result, status: "ok"});
                        }
                    }
                );
            }
    });
});

router.post('/search/filter', (req,res) => {
    // Search Company and
    console.log(req.body);
    let result = [];
    Company.find({
        $and: [
            {$or: [
                {name: { "$regex": req.body.name, "$options": "i" }},
                {services: {"$regex": req.body.name, "$options": "i" }},
                {tech: {"$regex": req.body.name, "$options": "i" }},
            ]},
            {status: "Approved"}
        ], 
            minProjectPrice: {$gte: req.body.minProjectPrice}, 
            avgPricePerHour: {$gte: req.body.avgPricePerHour}, 
            noOfEmp: {$gte: req.body.noOfEmp},    
        }, (err,data) => {
            if(err) {
                res.send({"status":"error"});
                return false;
            }
            else {
                result = result.concat(data);
                Solution.find({
                    $and: [
                        {$or: [
                            {name: { "$regex": req.body.name, "$options": "i" }},
                            {softwareCat: {"$regex": req.body.name, "$options": "i" }},
                        ]},
                        {status: "Approved"}
                    ]}, (err, data)  => {
                        if(err) {
                            res.send({"status":"error"});
                            return false;
                        }
                        else {
                            result = result.concat(data);
                            res.send({data: result, status: "ok"});
                        }
                    }
                );
            }
    });
});
 
router.get('/company/user/:userId', (req, res) => {
    Company.find({$and: [
            {userId: req.params.userId},
            {status: "Approved"},
        ]}, (err, data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});
 
router.post('/user/forget', (req, res) => {
    const givenEmail = req.body.email.toLowerCase();
    Reg.find({email: givenEmail}, (err, data) => {
        if( err ) {
            res.send({"status":"error", "msg": "Something went wrong."});
            return false;
        }
        if(data.length !== 1) {
            res.send({"status":"error", "msg": "Email Not Found"});
            return false;
        }
        let userId = data[0].userId;
        let otp = generateOTP();
        let transporter = nodemailer.createTransport({
            service: 'gmail',
            auth: {
                user: 'tecish.co@gmail.com',
                pass: 'PrateekMathur'
            }
        });
       
        let mailOptions = {
            from: 'tecish.co@gmail.com',
            to: givenEmail,
            subject: 'OTP for Tecish',
            text: `Your OTP for password reset request is: ${otp}`
        };
       
       
        transporter.sendMail(mailOptions, function(error, info){
            if (error) {
                console.log(error);
            } else {
                console.log('Email sent: ' + info.response);
                OTP.push(
                    {
                        userId: userId,
                        email: req.body.email,
                        otp: otp
                    }
                );
                console.log("inside",OTP);
                res.send({status:"ok", otp: OTP});
            }
        });
    });
});
 
 
router.post('/user/verify/otp', (req, res) => {
    console.log(req.body.otp);
    console.log(OTP);
    const result = OTP.filter((instance) => {
        console.log(instance.otp, req.body.otp);
        return instance.otp === req.body.otp;
    });
    if (result.length === 1) {
        res.json({"status": "ok","userId" : result[0].userId});
    } else {
        res.json({"status": "error"});
    }
});
 
router.post('/user/change/password', (req, res) => {
    Reg.findOneAndUpdate({userId: req.body.userId}, {$set:{pass:req.body.pass}}, {new: true}, function(err, data){
        if(err){
            res.send({"status":"error"});
            return false;
        } else {
            const id = data.userId;   
            User.find({_id: id}, (err, data) => {
                if(err) {
                    res.send({status: "error"});
                    return;
                } else {
                    res.send({data, status: "ok"});
                }
            })
        }
    });
});
 

 
 
router.post('/company/search/filter', (req, res) => {  
    Company.find({
        $and: [
            {$or: [
                {name: { "$regex": req.body.name, "$options": "i" }},
                {services: {"$regex": req.body.name, "$options": "i" }},
                {tech: {"$regex": req.body.name, "$options": "i" }},
            ]},
            {status: "Approved"}
        ]}, (err,data) => {
            if(err) {
                res.send({"status":"error"});
                return false;
            }
            else {
                data = data.filter(company => {
                    const minPrice = parseInt(company.minProjectPrice);
                    const emp = parseInt(company.noOfEmp);
                    const hourPrice = parseInt(company.avgPricePerHour);
                    let flag = true;
                    const serviceArray = company.services.split(',');
                    if(req.body.industryFocus.length !== 1) {
                        flag = false;
                        serviceArray.map(item => {
                            if(req.body.industryFocus.includes(item)) {
                                flag = true;
                            }
                        });
                    }
                    return flag && minPrice >= parseInt(req.body.minPrice) && hourPrice >= parseInt(req.body.hourPrice) && emp >= parseInt(req.body.emp);
                });
                res.send({data, ...{status: "ok"}})
            }
        }
    );
});
 
router.get('/leader/matrix/company',(req, res) => {
    Company.find({status: "Approved"},[],{skip: 0, limit:15}).populate('userId').exec((err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});


router.get('/leader/matrix/solution',(req, res) => {
    Solution.find({status: "Approved"},[],{skip: 0, limit:15}).populate('userId').exec((err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});
 
 
router.get('/blog', (req, res) => {
    Blog.find({}).populate('category').exec((err,data) => {
        if(err) {
            res.send({status: "error"});
            return;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    })
});

//get home page blogs
router.get('/blog/featured/:type', (req, res) => {
    console.log(req.params.type);
    Blog.find({onHome: true, type: req.params.type}).populate('category').exec((err,data) => {
        if(err) {
            res.send({status: "error"});
            return;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    })
});

router.get('/blog/:blogId', (req, res) => {
    Blog.find({_id: req.params.blogId}).populate('category').exec((err,data) => {
        if(err) {
            res.send({status: "error"});
            return;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    })
});


router.post('/blog/search', (req, res) => {
    Blog.find({}).populate('category').exec((err,data) => {
        if(err) {
            res.send({status: "error"});
            return;
        } else {
            let result = [];
            data.map(item  => {
                console.log(req.body.name);
                if(item.title.toLowerCase().includes(req.body.name.toLowerCase()) || item.category.name.toLowerCase().includes(req.body.name.toLowerCase())) {
                    result.push(item);
                    //return item;
                }
            });
            res.send({data:result, status: "ok"});
        }
    })
});
 
router.get('/blog/sorted/list', (req, res) => {
    Blog.find({},[],{limit:3, sort: {updatedAt: -1}}).populate('category').exec((err,data) => {
    if(err) {
        res.send({"status":"error"});
        return false;
    }
     res.send({data, ...{status: "ok"}})
    });
});

// Category here means serivce
router.get('/blog/category/:categoryId', (req, res) => {
    Blog.find({category: req.params.categoryId}).populate('category').exec((err,data) => {
        if(err) {
            res.send({status: "error"});
            return;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    })
});
 
router.post("/blog/add",(req, res) => {
    console.log(req.body);
    let blog = new Blog({
        title: req.body.title,
        img: req.body.imgUrl,
        content: req.body.content,
        category: req.body.category,
        author: req.body.author  || "none",
        type: req.body.type,
        onHome: req.body.onHome,
    });
 
    blog.save().then((data) => {
            res.send({data, ...{status: "ok"}})
    }, (e) => {
        res.send({"status":"error"});
            return false;
    });
});


router.post('/blog/edit', (req, res) => {
    const id = req.body.blogId;
    console.log(id);
    delete req.body.blogId;
    console.log(req.body);
    let update = req.body;
    Blog.findOneAndUpdate({_id: id}, {$set:update}, {new: true},(err, data) => {
        if(err) {
            res.send({"status":"error", msg: "Something went wrong"});
            return false;
        } else {
            res.send({data, ...{status: "ok"}})
        }
    });
});

router.post('/blog/delete/:blogId', (req, res) => {
    Blog.findOneAndRemove({_id: req.params.blogId}, (err, data) => {
        if(err) {
            res.send({status: "error"});
            return;
        }
        res.send({data, status: "ok"});
    });
});
 
 
 
router.get('/contact', (req,res) => {
    Contact.find({}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
 
});
 
router.get('/contact/:contactId',(req,res) => {
    // res.end(req.params.contactId);
    Contact.find({_id: req.params.contactId}, (err,data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}})
    });
});
 
router.post('/contact/serach', (req, res) => {
    Contact.find({$or: [
        {name: { "$regex": req.body.name, "$options": "i" }},
        {mobileNumber: {"$regex": req.body.name, "$options": "i" }},
        {email: {"$regex": req.body.name, "$options": "i" }},
    ]}, (err, data) => {
        if(err) {
            res.send({status: "error"});
            return;
        } else {
            res.send({data, status: "ok"});
        }
    })
})

router.post("/contact/add", (req, res) => {
    console.log(req.body.email);
    let contact = new Contact({
        name: req.body.name,
        email: req.body.email,
        mobileNumber: req.body.mobileNumber,
        subject: req.body.subject,
        message: req.body.message
    });
 
    contact.save().then((data) => {
            res.send({data, ...{status: "ok"}});
            //there is some error 
            sendMail(req.body.email,"Thanks for contacting Tecish.Co","Your query has been successfully submitted to us. We will try to get back to you asap.");
    }, (e) => {
        res.send({"status":"error"});
            return false;
    });
});

router.get("/country", (req, res) => {
    console.log("THis is country api...");
    Country.find({}, (err, data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}});
    });
});

router.get("/state/:countryId", (req, res) => {
    console.log(req.params.countryId);
    State.find({country_id: req.params.countryId}, (err, data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}});
    });
});

router.get("/city/:stateId", (req, res) => {
    console.log("THis is country api...");
    City.find({state_id: req.params.stateId}, (err, data) => {
        if(err) {
            res.send({"status":"error"});
            return false;
        }
        else res.send({data, ...{status: "ok"}});
    });
});

module.exports = router;
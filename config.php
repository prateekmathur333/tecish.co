<?php

/*
    This file contains all the API URLs, common paths of folders and linkedin login api url.
    These values can be updated as per the envirnoment.
*/

$config = array(
    "URLS" => array(

        "DOMAIN" => "http://139.59.42.1/",
        "API_PATH" => "http://139.59.42.1:8181/",
        
        //USER APIs
        "ADD_USER_LINKEDIN" => "user/add/linkedin",
        "ADD_USER_FORM" => "user/add/form",
        "EDIT_USER" => "user/edit",
        "EDIT_ACCOUNT" => "reg/edit",
        "DELETE_USER" => "user/delete/", //PASS USER ID
        "GET_USER_LIST" => "user/",
        "GET_REG_LIST" => "reg/",
        "GET_USER_PROFILE" => "user/", //PASS USER ID
        "GET_REG_DETAIL" => "reg/", //PASS USER ID
        "CHECK_REG" => "user/email/", //PASS THE MAIL ID
        "LOGIN" => "login/",
        "FORGOT_PASS_1" => "user/forget/",
        "FORGOT_PASS_2" => "user/verify/otp/",
        "FORGOT_PASS_3" => "user/change/password/",

        //company APIs
        "ADD_COMPANY" => "company/add/",
        "MY_COMPANY" => "company/user/", //PASS USER ID
        "GET_COMPANY_USER_WISE" => "company/user/", //pass user id
        "GET_COMPANY_PROFILE" => "company/", //pass company id
        "GET_ALL_COMPANIES" => "company/all/",
        "UPDATE_COMPANY_STATUS" => "company/status/update/", 
        "EDIT_COMPANY" => "company/edit/",

        //solution APIs
        "ADD_SOLUTION" => "solution/add/",
        "GET_ALL_SOLUTIONS" => "solution/all/",
        "UPDATE_SOLUTION_STATUS" => "solution/status/update",

        //reference APIs
        "ADD_REFERENCE" => "reference/add/",
        "MY_REFERENCES" => "reference/user/", //PASS USER ID

        //portfolio APIs
        "ADD_PORTFOLIO" => "portfolio/add/",
        "GET_PORTFOLIO" => "portfolio/",

        //search APIs
        "SEARCH" => "search/filter/",

        //categories
        "GET_CAT" => "category/",

        //review APIs
        "ADD_REVIEW" => "review/add/", 
        "GET_COMPANY_REVIEW" => "review/company/", //PASS COMPANY ID
        "GET_ALL_REVIEWS" => "review/all/",
        "UPDATE_REVIEW_STATUS" => "review/status/update/",

        //Blogs APIs
        "ADD_BLOG" => "blog/add/",
        "GET_ALL_BLOGS" => "blog/",
        "GET_BLOG" => "blog/", //pass blog Id
        "EDIT_BLOG" => "blog/edit",
        "DELETE_BLOG" => "",
        "TOP_BLOGS" => "blog/sorted/list/",
        "SEARCH_BLOG" => "blog/search/",
        "FEATURED_BLOG" => "blog/featured/", //pass type of blog TopItCompanies or TechnicalBlog 

        //Country-State-City APIs
        "GET_COUNTRIES" => "country/",
        "GET_STATES" => "state/", //pass country id
        "GET_CITIES" => "city/", //pass state id

        /*"SERVER" => "localhost/",
        "BASE_URL" => "https://wedigtech.prateekmathur.in/",
        "API_PATH" => "http://139.59.42.1:8181/",
        "LOGIN" => "login/",
        "ADD_CAT" => "addcategory/",
        "GET_CAT" => "category/",
        "GET_ACCOUNT_INFO" => "reg/",
        "ADD_PORTFOLIO" => "addportfolio/",
        "GET_PORTFOLIO" => "portfolio/",
        "ADD_USER_FORM" => "user/add/form/",
        "ADD_USER_LINKEDIN" => "user/add/linkedin/",
        "GET_USER_DETAIL" => "user/",
        "EDIT_PROFILE" => "updateuser/",
        "UPDATE_INFO" => "updateinfo/",
        "GET_COMPANY_PROFILE" => "company/",
        "GET_COMPANY_USER_WISE" => "mycompany", //pass the userId next to it.
        "GET_COMPANY_LIST_CAT_WISE" => "rating/",
        "ADD_COMPANY" => "addcompany/", //SAVE BASIC DETAILS
        "ADD_SOLUTION" => "addsolution/",
        "GET_REFERENCES" => "reference/",
        "GET_REFERENCES_USER_WISE" => "myReferences/",
        "ADD_REFERENCES" => "addreference/",
        "ADD_REVIEW" => "addreview/",
        "SEARCH" => "search",
        "GET_COMPANY_REVIEW" => "reviewCompany/",
        "FORGET_PASS_1" => "forget/", //email
        "FORGET_PASS_2" => "verifyotp", //otp varification forget pass and return regId
        "FORGET_PASS_3" => "changepass" //new pass, regId*/
    ),
    "linkedin" => array(
        "RESPONSE_TYPE" => "code",
        "CLIENT_ID" => "81sguy63zwc0ju",
        "REDIRECT_URL" => "http://wedigtech.prateekmathur.in/",
        "STATE" => random_int(1111111, 9999999), // A UNIQUE STRING
        "SCOPE" => "r_basicprofile%20r_emailaddress",
        "LINKEDIN_URL" => "https://www.linkedin.com/oauth/v2/authorization"   
    ),
    "paths" => array(
        "ASSETS" => "assets/",
        "IMGS" => "images/",
        "CSS" => "assets/css/",
        "JS" => "assets/js/",
        "FONTS" => "assets/fonts"
    )
);
?>
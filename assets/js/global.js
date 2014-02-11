/*
 * Variable names for input fields.
 */
var inputText   	= $('input[type="text"]'),
    inputPass   	= $('input[type="password"]'),
    firstname   	= $('input[name="firstname"]'),
    lastname    	= $('input[name="lastname"]'),
    middle_name 	= $('input[name="middle_name"]'),
    username    	= $('input[name="username"]'),
    password    	= $('input[name="password"]'),
    cpassword   	= $('input[name="cpassword"]'),
    email       	= $('input[name="email"]'),
    countries   	= $('select[name="country"]'),
    zip         	= $('input[name="zip"]'),
    fax         	= $('input[name="fax"]'),
    company     	= $('input[name="company"]'),
    company_address	= $('input[name="company_address"]'),
    company_phone	= $('input[name="company_phone"]'),
    company_fax		= $('input[name="company_fax"]'),
    sec_number		= $('input[name="sec_number"]'),
    error       	= 0;

/*  
 * RegEx validation for Email 
 */
function isValidEmail(email) {
    return /^[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}$/.test(email)
    && /^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/.test(email);
}

/* 
 * Force input fields to input 
 * numeric only 
 */
jQuery.fn.ForceNumericOnly = function() {
    return this.each(function() {
        $(this).keydown(function(e) {
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
                // home, end, period, and numpad decimal
                return ( key == 8 || key == 9 || key == 46 || key == 110 || key == 190 || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
        });
    });
};
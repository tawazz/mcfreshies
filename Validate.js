
    function validate()
    {
        var name = document.loginForm.username.value;
        var password = document.loginForm.password.value;

        if(name.length > 0 && password.length > 0)
        {
            return true;
        }else{
        //$("#error").html("wrong username or password </br> dont have a user name? <a href=\"register.php\">register now!</a>");
        return false;
        }
    }
    function checkEnq()
    {
        var name = document.enq.name.value;
        var email = document.enq.email.value;
        var sub = document.enq.sub.value;

        if(name.length >0 && email.length >0 && sub.length >0)
        {
            if(email.indexOf("@") > -1 && email.indexOf(".com") > -1)
            {
                return true;
            }
            else{
                alert("enter valid email");
                return false;
            }
        }
        else{
            alert("Please enter all text fields");
            return false;
        }
    }
     function check() {
                var name = document.reg.username.value;
                var password = document.reg.password.value;
                var password1 = document.reg.password1.value;
                var email = document.reg.email.value;
                var street = document.reg.street.value;
                var city = document.reg.city.value;
                var state = document.reg.state.value;
                var pcode = document.reg.pcode.value;

                if (name.length > 0 && password.length > 5 && password1.length > 5 && email.length > 0 && street.length > 0 && city.length > 0 && state.length > 0 && pcode.length > 0) {
                    if (password == password1) {
                        if (email.indexOf("@") > -1 && email.indexOf(".com") > -1) {
                            return true;
                        } else {
                            alert("enter valid email address");
                            return false;
                        }
                    } else {
                        alert("passwords did not match");
                        return false;
                    }
                } else {
                    alert("fill in all details");
                    return false;
                }
            }

    function checkprod(){
        var product = document.products.product.value;
        var price = document.products.price.value;
        if(product.length > 0 && price.length > 0)
        {
            return true;
        }else{
        alert("fill in all details");
        return false;
        }

    }

    function checkstaff(){
        var firstname = document.regstaff.firstname.value;
        var lastname = document.regstaff.lastname.value;
        var username = document.regstaffusername.value;
        var password = document.regstaff.password.value;
        var password2 = document.regstaff.password2.value;
        var email= document.regstaff.email.value;
        var street = document.regstaff.street.value;
        var surburb = document.regstaff.surburb.value;
        var state = document.regstaff.state.value;
        var postcode = document.regstaff.postcode.value;

        if(firstname.length>0 && lastname.length>0 && username.length>0 && password.length>0 && password2.length>0 && email.length>0 && street.length>0 && surburb.length>0 && state.length>0 && postcode.length>0){
            if (password == password2) {
                if (email.indexOf("@") > -1 && email.indexOf(".com") > -1) {
                    return true;
                }
                else {
                    alert("enter valid email");
                    return false;
                }
            } else {
                alert("password dont match");
                return false;
            }
        }else{
        alert("fill all form details");
            return false;
        }
    }

    function staffupdate()
    {
        var firstname = document.regstaff.firstname.value;
        var lastname = document.regstaff.lastname.value;
        var username = document.regstaffusername.value;
        var oldpassword = document.regstaff.oldpassword.value;
        var password = document.regstaff.password.value;
        var password2 = document.regstaff.password2.value;
        var email= document.regstaff.email.value;
        var street = document.regstaff.street.value;
        var surburb = document.regstaff.surburb.value;
        var state = document.regstaff.state.value;
        var postcode = document.regstaff.postcode.value;

        if (firstname.length > 0 && lastname.length > 0 && username.length > 0 &&  email.length > 0 && street.length > 0 && surburb.length > 0 && state.length > 0 && postcode.length > 0) {
            if (password == password2) { 
                if(email.indexOf("@") > -1 && email.indexOf(".com") > -1)
                    {
                        return true;
                    }
                    else{
                        alert("enter valid email");
                        return false;
                    }
            }else{
                alert("password dont match");
                return false;
            }
        }else{
            alert("fill neccesary form details");
            return false;
        }
    }
function checkData() {
    var idcard = document.forms["Form1"]["idcard"].value;
    if (idcard.length != 13)
    {
        alert("IDCard Form Fail.");
        return false;
    }

    var firstname = document.forms["Form1"]["firstname"].value;
    if(!isNaN(firstname))
    {
        alert("Firstname Form Fail. Alphabet only !!");
        return false;
    }

    if ((firstname.length < 2) || (firstname.length > 20))
    {
        alert("Firstname Form Fail.");
        return false;
    }

    var lastname = document.forms["Form1"]["lastname"].value;
    if(!isNaN(lastname))
    {
        alert("lastname Form Fail. Alphabet only !!");
        return false;
    }

    if (lastname.length < 2 || lastname.length > 30)
    {
        alert("lastname Form Fail.");
        return false;
    }

    var address1 = document.forms["Form1"]["address1"].value;
    if (address1.length < 5)
    {
        alert("address Form Fail.");
        return false;
    }

    var address2 = document.forms["Form1"]["address2"].value;
    if (address2.length < 5)
    {
        alert("address Form Fail.");
        return false;
    }

    var zone = document.forms["Form1"]["zone"].value;
    if(!isNaN(zone))
    {
        alert("zone Form Fail. Alphabet only !!");
        return false;
    }

    if (zone.length < 2)
    {
        alert("zone Form Fail.");
        return false;
    }

    var district = document.forms["Form1"]["district"].value;
    if(!isNaN(district))
    {
        alert("districts Form Fail. Alphabet only !!");
        return false;
    }

    if (district.length < 2)
    {
        alert("district Form Fail.");
        return false;
    }

    var post = document.forms["Form1"]["post"].value;
    if (post.length != 5)
    {
        alert("post Form Fail.");
        return false;
    }

    var tel = document.forms["Form1"]["tel"].value;
    if(isNaN(tel))
    {
        alert("tel Form Fail. Number only !!");
        return false;
    }

    if (tel.length < 9 || tel.length > 10)
    {
        alert("tel Form Fail.");
        return false;
    }
}
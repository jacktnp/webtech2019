
function validateForm(){
    /* บัตรประชา่ชน */
    var idcard = document.querySelector("#idcard").value;
    if (idcard.length != 13 || idcard != parseInt(idcard, 10)){
        alert("กรุณากรอกหมายเลขบัตรประชาชนให้ถูกต้อง");
        return false;
    }

    /* ชื่อจริง */
    var fname = document.querySelector("#fname").value;
    if (fname.length < 2 || fname.length > 20){
        alert("กรุณากรอกชื่อจริงให้ถูกต้อง");
        return false;
    }

    /* นามสกุล */
    var lname = document.querySelector("#lname").value;
    if (lname.length < 2 || lname.length > 30){
        alert("กรุณากรอกนามสกุลให้ถูกต้อง");
        return false;
    }

    /* ที่อยู่ */
    var address = document.querySelector("#address").value;
    if (address.length < 5){
        alert("กรุณากรอกที่อยู่ให้ถูกต้อง");
        return false;
    }

    /* แขวง/ตำบล  */
    var district = document.querySelector("#district").value;
    if (district.length < 2 || typeof district != 'string'){
        alert("กรุณากรอก แขวง/ตำบล ให้ถูกต้อง");
        return false;
    }

    /* อำเภอ/เขต  */
    var area = document.querySelector("#area").value;
    if (area.length < 2 || typeof area != 'string'){
        alert("กรุณากรอก อำเภอ/เขต ให้ถูกต้อง");
        return false;
    }

    /* รหัสไปรษณีย์  */
    var postnum = document.querySelector("#postnum").value;
    if (postnum.length != 5){
        alert("กรุณากรอกรหัสไปรษณีย์ให้ถูกต้อง");
        return false;
    }

    /* เบอร์โทรศัพท์  */
    var phone = document.querySelector("#phone").value;
    if (phone.length < 8 || phone.length > 10){
        alert("กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง");
        return false;
    }
}
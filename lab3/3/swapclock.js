function swapClock() {

    var image1 = document.getElementById("img1");
    var image2 = document.getElementById("img2");
    var image3 = document.getElementById("img3");
    var image4 = document.getElementById("img4");

    temp = image1.src
    image1.src = image3.src;
    image3.src = image4.src;
    image4.src = image2.src;
    image2.src = temp;
}

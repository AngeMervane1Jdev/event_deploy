require("./bootstrap");
var data = [
    {
        image: "http://thefader-res.cloudinary.com/private_images/w_1440,c_limit,f_auto,q_auto:best/3_oqhxf1/clairo-diary-001-pretty-girl-4ever-interview.jpg",
        name: "Clairo",
    },
    {
        image: "http://thefederalist.com/wp-content/uploads/2017/10/36321886892_aca37b4562_k-998x666.jpg",
        name: "Weezer",
    },
    {
        image: "https://image.redbull.com/rbcom/052/2017-11-20/9bb83833-4567-41e1-bb30-636af6d998f6/0012/0/408/0/2865/3686/1500/1/billieeilish.JPG",
        name: "Billie Eilish",
    },
    {
        image: "https://i1.sndcdn.com/artworks-000192685399-co64se-t500x500.jpg",
        name: "Englewood",
    },
    {
        image: "https://media1.fdncms.com/stranger/imager/u/original/25967832/joyn.jpg",
        name: "Joyner Lucas",
    },
    {
        image: "https://images.squarespace-cdn.com/content/576960d5579fb3601c08f130/1478775322105-ERMPTR0RCKQEWALLQ31Q/nujabes.jpg?content-type=image%2Fjpeg",
        name: "Nujabes",
    },
    {
        image: "https://0.soompi.io/wp-content/uploads/2017/10/20175251/BTS-4.jpg",
        name: "BTS",
    },
    {
        image: "https://www.sohh.com/wp-content/uploads/2017/11/XXXTentacion-3-759x500.jpg",
        name: "XXXTENTACION",
    },
    {
        image: "https://i.scdn.co/image/1bf54468fa9c772af8f514a20a99631fd35b2dbc",
        name: "RUN-DMC",
    },
    {
        image: "http://s3.amazonaws.com/hiphopdx-production/2017/05/170531-SuicideBoys-IG-800x600.jpg",
        name: "$uicideboy$",
    },
];

var cardPhoto = document.getElementsByClassName("card__photo");
var cardTitle = document.querySelectorAll("h2");

for (var i = 0; i < cardPhoto.length; i++) {
    cardPhoto[i].src = data[i].image;
    cardTitle[i].innerHTML = data[i].name;
}

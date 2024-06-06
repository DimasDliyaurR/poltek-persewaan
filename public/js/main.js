let sliderContainer = document.getElementById("sliderContainer");
let slider = document.getElementById("slider");
let cards = slider.getElementsByTagName("li");

let elementsToShow = 3
console.log(document.body.clientWidth);
if (document.body.clientWidth < 1000) {
    elementsToShow = 1
} else if (document.body.clientWidth < 1500) {
    elementsToShow = 2
}

let sliderContainerWidth = sliderContainer.clientWidth
let cardWidth = Math.ceil(sliderContainerWidth / elementsToShow);
console.log(sliderContainerWidth)

slider.style.width = cards.length * cardWidth + "px";
slider.style.transition = "margin ";
slider.style.transitionDuration = "1s";
for (let index = 0; index < cards.length; index++) {
    const element = cards[index];
    element.style.width = cardWidth + "px";
}

function convert_positive(a) {
    // Check the number is negative
    if (a < 0) {
        // Multiply number with -1
        // to make it positive
        a = a * -1;
    }
    // Return the positive number
    return a;
}

function prev() {
    console.log(document.body.clientWidth)
    if (
        convert_positive(+slider.style.marginLeft.slice(0, -2)) !=
        -cardWidth * (cards.length - elementsToShow)
    )
        slider.style.marginLeft =
            +slider.style.marginLeft.slice(0, -2) - cardWidth + "px";
}
function next() {

    if (+slider.style.marginLeft.slice(0, -2) != 0)
        slider.style.marginLeft =
            +slider.style.marginLeft.slice(0, -2) + cardWidth + "px";
}

// Gedung Lap
let sliderContainerGL = document.getElementById("sliderContainerGL");
let sliderGL = document.getElementById("sliderGL");
let cardsGL = sliderGL.getElementsByTagName("li");

let elementsToShowGL = 3;
if (document.body.clientWidth < 1000) {
    elementsToShowGL = 1;
} else if (document.body.clientWidth < 1500) {
    elementsToShowGL = 2;
}

let sliderContainerWidthGL = sliderContainer.clientWidth;
let cardWidthGL = sliderContainerWidthGL / elementsToShowGL;

sliderGL.style.width = cards.length * cardWidthGL + "px";
sliderGL.style.transition = "margin ";
sliderGL.style.transitionDuration = "1s";
for (let index = 0; index < cards.length; index++) {
    const element = cardsGL[index];
    element.style.width = cardWidthGL + "px";
}
function prevGL() {
    if (
        +sliderGL.style.marginLeft.slice(0, -2) !=
        -cardWidthGL * (cards.length - elementsToShowGL)
    )
        sliderGL.style.marginLeft =
            +sliderGL.style.marginLeft.slice(0, -2) - cardWidthGL + "px";
}
function nextGL() {
    if (+sliderGL.style.marginLeft.slice(0, -2) != 0)
        sliderGL.style.marginLeft =
            +sliderGL.style.marginLeft.slice(0, -2) + cardWidthGL + "px";
}
// ASRAMA
let sliderContainerA = document.getElementById("sliderContainerA");
let sliderA = document.getElementById("sliderA");
let cardA = sliderA.getElementsByTagName("li");

let elementsToShowA = 3;
if (document.body.clientWidth < 1000) {
    elementsToShowA = 1;
} else if (document.body.clientWidth < 1500) {
    elementsToShowA = 2;
}

let sliderContainerWidthA = sliderContainerA.clientWidth;
let cardWidthA = sliderContainerWidthA / elementsToShowA;

sliderA.style.width = cardA.length * cardWidthA + "px";
sliderA.style.transition = "margin ";
sliderA.style.transitionDuration = "1s";
for (let index = 0; index < cardA.length; index++) {
    const element = cardA[index];
    element.style.width = cardWidthA + "px";
}
function prevA() {
    if (
        +sliderA.style.marginLeft.slice(0, -2) !=
        -cardWidthA * (cardA.length - elementsToShowA)
    )
        sliderA.style.marginLeft =
            +sliderA.style.marginLeft.slice(0, -2) - cardWidthA + "px";
}
function nextA() {
    if (+sliderA.style.marginLeft.slice(0, -2) != 0)
        sliderA.style.marginLeft =
            +sliderA.style.marginLeft.slice(0, -2) + cardWidthA + "px";
}
// LAYANAN
let sliderContainerL = document.getElementById("sliderContainerL");
let sliderL = document.getElementById("sliderL");
let cardsL = sliderL.getElementsByTagName("li");

let elementsToShowL = 3;
if (document.body.clientWidth < 1000) {
    elementsToShowL = 1;
} else if (document.body.clientWidth < 1500) {
    elementsToShowL = 2;
}

let sliderContainerWidthL = sliderContainerL.clientWidth;
let cardWidthL = sliderContainerWidthL / elementsToShowL;

sliderL.style.width = cardsL.length * cardWidthL + "px";
sliderL.style.transition = "margin ";
sliderL.style.transitionDuration = "1s";
for (let index = 0; index < cardsL.length; index++) {
    const element = cardsL[index];
    element.style.width = cardWidthL + "px";
}
function prevL() {
    if (
        +sliderL.style.marginLeft.slice(0, -2) !=
        -cardWidthL * (cardsL.length - elementsToShowL)
    )
        sliderL.style.marginLeft =
            +sliderL.style.marginLeft.slice(0, -2) - cardWidthL + "px";
}
function nextL() {
    if (+sliderL.style.marginLeft.slice(0, -2) != 0)
        sliderL.style.marginLeft =
            +sliderL.style.marginLeft.slice(0, -2) + cardWidthL + "px";
}
// ALAT BARANG
let sliderContainerAB = document.getElementById("sliderContainerAB");
let sliderAB = document.getElementById("sliderAB");
let cardAB = sliderAB.getElementsByTagName("li");

let elementsToShowAB = 3;
if (document.body.clientWidth < 1000) {
    elementsToShowAB = 1;
} else if (document.body.clientWidth < 1500) {
    elementsToShowAB = 2;
}

let sliderContainerWidthAB = sliderContainerAB.clientWidth;
let cardWidthAB = sliderContainerWidthAB / elementsToShowAB;

sliderAB.style.width = cardAB.length * cardWidthAB + "px";
sliderAB.style.transition = "margin ";
sliderAB.style.transitionDuration = "1s";
for (let index = 0; index < cardAB.length; index++) {
    const element = cardAB[index];
    element.style.width = cardWidthAB + "px";
}
function prevAB() {
    if (
        +sliderAB.style.marginLeft.slice(0, -2) !=
        -cardWidthAB * (cardAB.length - elementsToShowAB)
    )
        sliderAB.style.marginLeft =
            +sliderAB.style.marginLeft.slice(0, -2) - cardWidthAB + "px";
}
function nextAB() {
    if (+sliderAB.style.marginLeft.slice(0, -2) != 0)
        sliderAB.style.marginLeft =
            +sliderAB.style.marginLeft.slice(0, -2) + cardWidthAB + "px";
}

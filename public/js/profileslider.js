// Get Slider Items | Array.from[Es6 feature]
var sliderImages = Array.from(document.querySelectorAll('.slider-container img'));

// Get Slider2 Items | Array.from[Es6 feature]
var sliderParagraph = Array.from(document.querySelectorAll('.slider-container2 p'));




// Get Number Of slides in images
var slidesCount = sliderImages.length;


// Get Number Of slides in para
var slidesCount = sliderParagraph.length;



// Set Current Slider image
var currentSlide = 1;

// Set Current Slider para
var currentSlide2 = 1;

// Slide NUmber String element 
var slideNumberElement = document.getElementById("slide-number");

// Slide NUmber String element para 
var slideNumberElement2 = document.getElementById("slide-number2");


// Previous And Next Buttons
var nextButton = document.getElementById('next');
var prevButton = document.getElementById('prev');


//Handel Click on Previous and Next Buttons
nextButton.onclick = nextSlide;
prevButton.onclick = prevSlide;


// Create The Main Ul element
var paginationElement = document.createElement('ul');

// Set Id On Created element
paginationElement.setAttribute('id', 'pagination-ul');

const slidesindicators = ["Hurgada", "Sharm", "Pyramids", "Salty Lakes", "Paroon Castle"]

// Create List  Items Based On Slides Count
for (var i = 1; i <= slidesCount; i++) {
    // Create The Li
    var paginationItem = document.createElement('li');

    // Set Custom Attribute
    paginationItem.setAttribute('data-index', i);

    // Set item Content
    paginationItem.appendChild(document.createTextNode(slidesindicators[i - 1]));

    // Append Items To The Main Ul List
    paginationElement.appendChild(paginationItem);
}

// Add The Created Created Ul Element To The Page
document.getElementById('indicator').appendChild(paginationElement);


// Get The New created ul
var paginationCreatedUl = document.getElementById('pagination-ul');

// Get Pagination Items | Array.from[Es6 Feature]
var paginationBullets = Array.from(document.querySelectorAll('#pagination-ul li')),
    paginationBulletsCount = paginationBullets.length;


// Loop throgth all bullets Items
for (var i = 0; i < paginationBulletsCount; i++) {
    paginationBullets[i].onclick = function() {
        currentSlide = parseInt(this.getAttribute('data-index'));
        currentSlide2 = parseInt(this.getAttribute('data-index'));
        theChecker();
    }
}




// Trigger The checker function
theChecker();






// Function Next Slide
function nextSlide() {

    if (nextButton.classList.contains('disapled')) {
        // Do Nothing
        return false;
    } else {
        currentSlide++;
        currentSlide2++;
        theChecker();
    }
}

// Function previous Slide
function prevSlide() {
    if (prevButton.classList.contains('disapled')) {
        // Do Nothing
        return false;
    } else {
        currentSlide--;
        currentSlide2--;
        theChecker();
    }
}

// Create Checker function



function theChecker() {
    const prices = ['150', '50', '199', '117', '165']
    slideNumberElement.textContent = 'Starts From : ' + prices[currentSlide - 1] + '$';
    // Remove All Active Classes
    removeAllActive();

    // set Active Class On Current slide
    sliderImages[currentSlide - 1].classList.add('active');

    sliderParagraph[currentSlide2 - 1].classList.add('active');

    // set Active Class On Curent Pagintaion Item
    paginationCreatedUl.children[currentSlide - 1].classList.add('active');

    // Check If current Slide Is The First
    if (currentSlide == 1) {
        // Add Disapled Class On previous button
        prevButton.classList.add('disapled');
    } else {
        // remove Disapled Class On previous button
        prevButton.classList.remove('disapled');
    }


    // Check If current Slide Is The Last
    if (currentSlide == slidesCount) {

        // Add Disapled Class On next button
        nextButton.classList.add('disapled');
    } else {
        // remove Disapled Class On next button
        nextButton.classList.remove('disapled');
    }
}

// Remove All Active Classes From Images And Bullets

function removeAllActive() {
    // Loop throgth Images
    sliderImages.forEach(function(img) {
        img.classList.remove('active');

    });
    sliderParagraph.forEach(function(p) {
        p.classList.remove('active');

    });
    // Loop throgth pagination bullets
    paginationBullets.forEach(function(bullet) {
        bullet.classList.remove('active');
    });
};

$(function () {
    $('[data-toggle="popover"]').popover()
  })
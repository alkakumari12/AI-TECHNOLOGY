function openPopup() {
  document.getElementById('popup').style.display = "block";
}

function closePopup() {
    document.getElementById('popup').style.display = "none";
}


function toggleReadMore() {
    var extraText = document.getElementById('extraText');
    var readMoreBtn = document.getElementById('readMoreBtn');
  
    if (extraText.style.display === 'none' || extraText.style.display === '') {
      extraText.style.display = 'block';
      readMoreBtn.textContent = 'Read Less';
    } else {
      extraText.style.display = 'none';
      readMoreBtn.textContent = 'Read More';
    }
  }
// filter category
function filterObjects(category) {
  const galleryItems = document.querySelectorAll('.image');
  galleryItems.forEach(item => {
      const itemCategory = item.getAttribute('data-filter');
      if (category === 'All' || category === itemCategory) {
          item.parentElement.style.display = 'block';
      } else {
          item.parentElement.style.display = 'none';
      }
  });
}


$(document).ready(function(){
  highlightActiveMenuitem();

  $(".navbar-nav .nav-item a").click(function() {
  
    $(".navbar-nav").find(".active").removeClass("active");
    $(this).parent().addClass("active");
  });
  function highlightActiveMenuitem(){
    
    var currentUrl=window.location.pathname;
    console.log(window.location.pathname);
    $(".navbar-nav .nav-item a").each(function () {
      var menuitemUrl = $(this).attr("href");
      if(currentUrl.includes(menuitemUrl)){
        $(this).parent().addClass("active");
        $(this).css("color","#00072d");
        $(this).css("background-color","lightpink");
      }
    });
  }
});
const images = [...document.querySelectorAll('.image')];
// popup
const popup = document.querySelector('.popup');
const closeBtn = document.querySelector('.close-btn');
const imageName = document.querySelector('.image-name');
const largeImage = document.querySelector('.large-image');
const imageIndex = document.querySelector('.index');
const leftArrow = document.querySelector('.left-arrow');
const rightArrow = document.querySelector('.right-arrow');

let index = 0; // will track our current image;

images.forEach((item, i) => {
item.addEventListener('click', () => {
updateImage(i);
popup.classList.toggle('active');
});
});

const updateImage = i => {
let path = `img/img${i + 1}.png?raw=true`;
largeImage.src = path;
imageName.innerHTML = path;
imageIndex.innerHTML = `0${i + 1}`;
index = i;
};

closeBtn.addEventListener('click', () => {
popup.classList.toggle('active');
});

leftArrow.addEventListener('click', () => {
if (index > 0) {
updateImage(index - 1);
}
});

rightArrow.addEventListener('click', () => {
if (index < images.length - 1) { updateImage(index + 1); } });




  

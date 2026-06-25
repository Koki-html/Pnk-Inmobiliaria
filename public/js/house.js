const slides =
document.querySelectorAll('.gallery-slide');

const thumbs =
document.querySelectorAll('.gallery-thumb');

let currentSlide = 0;

function showSlide(index)
{
    slides.forEach(slide => {
        slide.classList.remove('active');
    });

    thumbs.forEach(thumb => {
        thumb.classList.remove('active-thumb');
    });

    slides[index].classList.add('active');

    if (thumbs[index]) {
        thumbs[index].classList.add('active-thumb');
    }

    currentSlide = index;
}

document
.getElementById('Next-Image')
.addEventListener('click', () => {

    let next =
        (currentSlide + 1) % slides.length;

    showSlide(next);

});

document
.getElementById('Prev-Image')
.addEventListener('click', () => {

    let prev =
        (currentSlide - 1 + slides.length)
        % slides.length;

    showSlide(prev);

});

thumbs.forEach((thumb, index) => {

    thumb.addEventListener('click', () => {

        showSlide(index);

    });

});

showSlide(0);

setInterval(() => {

    let next =
        (currentSlide + 1) % slides.length;

    showSlide(next);

}, 5000);
require('./bootstrap');

/*CODE MODAL*/
const modalClose = document.querySelector('.close');
const modal = document.querySelector('.modal');
modalClose.addEventListener('click', ()=>{
    modal.classList.toggle('close')
})
let menu = document.querySelector('#menu')
let side = document.querySelector('.side');
menu.addEventListener('click',()=>{
  side.classList.toggle('active')
})
//catagory start
let listCat = document.querySelector('.list-cat');
let cat = document.querySelector('.cat');

listCat.addEventListener('click',()=>{
  cat.classList.toggle('active')
})

listCat.addEventListener('mouseover',()=>{
  cat.classList.add('active')
})
listCat.addEventListener('mouseout',()=>{
  cat.classList.remove('active')
})
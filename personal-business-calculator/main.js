let input = document.querySelector('#input');
let items = document.querySelectorAll('#header-btn');
let btns = document.querySelectorAll('#btn');
let equal = document.querySelector('.soman');
let c = document.querySelector('.c');
let cd = document.querySelector('.cd');
let totalDisply = document.querySelector('.mut')
let placeholder = document.querySelector('.h4');

//===========
let itemPrice = 0;
let btnValue = 0;
let itemName = '';
let totalDeshbord = 0;

//==

items.forEach((item)=>{
  item.addEventListener('click', ()=>{
    let itemValue = parseFloat(item.value);
    itemPrice = itemValue;
    
    let classList = item.classList.value;
    
    itemName = item.textContent;
    if (classList === classList) {
      placeholder.textContent = `কয়টি ${itemName}`    } 
    input.value = ' '
  })
})

//btn ===================
btns.forEach((btn)=>{
  btn.addEventListener('click', ()=>{
    let inpV = input.value = input.value + parseFloat(btn.value);
    btnValue = inpV;
    placeholder.textContent = ' '
  })
})

//==============equal ====

equal.addEventListener('click', ()=>{
  let foll = input.value = parseFloat(itemPrice * input.value);
  if (!itemPrice || !btnValue) {
    alert(' আইটেম এবং সংখ্যা সিলেক্ট করুন')
    
  }
  let tBody = document.querySelector('tbody');
  let lastChild = tBody.querySelector('tr:last-child')
  
  console.log(lastChild)
  let count = document.querySelectorAll('tr');
  let sotikCount = count.length > 1 ? count.length -1 :1;
  
  
  
  let tr = document.createElement('tr');
  let td1 = document.createElement('td');
  td1.textContent = sotikCount;
  tr.appendChild(td1)
  
  
  
  let td2 = document.createElement('td');
  td2.textContent = itemName;
  tr.appendChild(td2)
  
  let td3 = document.createElement('td');
  td3.textContent = itemPrice;
  tr.appendChild(td3)
  
  
  let td4 = document.createElement('td');
  td4.textContent = btnValue;
  tr.appendChild(td4)
  
  
  let td5 = document.createElement('td');
  td5.textContent = foll;
  tr.appendChild(td5)
  
  
  let mutTd = document.querySelector('#sMut');
mutTd.textContent = totalDeshbord = totalDeshbord + foll;
totalDisply.textContent = `মোট:${totalDeshbord} ৳`;
  //===============
  tBody.insertBefore(tr,lastChild);
 
})
//========c ========ccccc
c.addEventListener('click',()=>{
  input.value = ' ';
  placeholder.textContent = ' ';
})
//=====cd======cd================____________
cd.addEventListener('click',()=>{
  input.value = ' ';
  placeholder.textContent = ' ';
  
  totalDisply.textContent = ' মোট:0 ৳'
  document.querySelector('#sMut').textContent = '0 টাকা';
  

  let tBd = document.querySelector('tbody');
  tBd.innerHTML = `
  <tr>
              <td colspan="4" class="tMut">সর্বমোট</td>
              <td class="tMut" id="sMut">0 টাকা</td> 
            </tr>
 `
itemPrice = 0;
btnValue = 0;
itemName = '';
totalDeshbord = 0;
})
//______________________________________________
document.querySelector('#data-img').addEventListener('click',()=>{
  document.querySelector('.tebil-section').classList.toggle('active');
  document.querySelector('.calculator-body').classList.toggle('hide')
})
//========
 let menuBtn = document.querySelector('.sp');
 let menu = document.querySelector('.menu');
 menuBtn.addEventListener('click', ()=>{
   menu.classList.toggle('active');
 })
 //text efect========
 let moja = document.getElementById('moja');
 let mojaArr = [' ফুচকা হাউজ',' চটপটি হাউজ',' সিংগারা হাউজ'];
 let arrNum = 0;
 let itemNum = 0;
 let arrItem;
 let arrLetter;
 setInterval(mojaFun,250);
 function mojaFun() {
   arrItem = mojaArr[arrNum];
   arrLetter = arrItem.slice(0,itemNum++);
   moja.textContent = arrLetter ;
   if (itemNum > arrItem.length) {
     arrNum++
     itemNum = 0
   }
   if (arrNum == mojaArr.length) {
     arrNum = 0;
   }
 }
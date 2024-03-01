function alertPopup(msg) {
   alert("login first", 3000);
   
}

window.alert = function(message, timeout=null){
   const alert = document.createElement('div');
   const alertButton = document.createElement('button');
   alertButton.innerText = 'ok';
   alert.classList.add('alert');
   alert.setAttribute('style', `
   position:fixed;
   top:200px;
   left:45%;
   color:white;
   background: rgba(0, 0, 0, 0.5);
   height:150px;
   width:15%;
   text-align:center;
   font-size:30px;
   text-transform: capitalize;
   padding: 20px;
   display: flex;
   flex-direction:column;
   `);
   alertButton.setAttribute('style', `
   border: 1px solid #333;
   background: white;
   margin:10px 45px;
   padding: 5px;
   border-radius: 5px;
   cursor: pointer;

   `);
   alert.innerHTML = `<span style="padding:10px">${message}</span>`;
   alert.appendChild(alertButton);
   alert.addEventListener('click', (e)=>{
      alert.remove();
   });
   if(timeout != null){
      setTimeout(()=>{
         alert.remove();
      }, Number(timeout))
   }
   document.body.appendChild(alert);
}



function loginPassword() {
   var x = document.getElementById("password");
   if (x.type == "password") {
      x.type = "text";
   } else {
      x.type = "password";
   }
}


const modal = document.querySelector("#my-modal");
const modalBtn = document.querySelector("#modal-btn");
const closeBtn = document.querySelector(".fa-lg");

modalBtn.addEventListener("click", openModal);
closeBtn.addEventListener("click", closeModal);

function openModal() {
   modal.style.display = "block";
}

function closeModal() {
   modal.style.display = "none";
}


let star = document.querySelectorAll('input');
let showValue = document.querySelector('#rating-value');

for (let i = 0; i < star.length; i++) {
	star[i].addEventListener('click', function() {
		i = this.value;

		showValue.innerHTML = i + " out of 5";
	});
}



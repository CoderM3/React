const container= document.querySelector('.container');
const Loginlink=document.querySelector('.signinlink');
const Registerlink=document.querySelector('.signuplink');
Registerlink.addEventListener('click', ()=> {
    container.classList.add('active');
})
Loginlink.addEventListener('click', ()=> {
    container.classList.remove('active');
})
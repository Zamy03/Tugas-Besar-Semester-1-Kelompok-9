const wrapper = document.querySelector('.wrapper');
const signUpLink = document.querySelector('.signUp-link');
const signInLink = document.querySelector('signIn-link');


signUpLink.addEventListener('click', () =>{
    wrapper.classList.add('animate-signIn');
    wrapper.classList.remove('animate-signUp');
});

signInLink.addEventListener('click', () =>{
    wrapper.classList.add('animate-signUn');
    wrapper.classList.remove('animate-signIp');
});
// eye
// const togglePassword = button => {
//     button.classList.toggle("showing")
//     const input =
//     document.getElementById("password")
//     input.type =
//     input.type === "password"
//     ? "text"
//     : "password"
// }
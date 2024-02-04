
let body = document.body;
let button = document.getElementById('coolCheckbox');
button.addEventListener('click', function(){
    body.classList.toggle("darkmode")
    body.appendChild(body);
});


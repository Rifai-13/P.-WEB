const input = document.getElementById('input');
const list = document.getElementById('list');

function addTask() {
    if (input.value === '') {
        alert("Input Tidak boleh kosong")
    }
    else{
        const li = document.createElement('li');
        li.innerHTML = input.value;
        list.appendChild(li);

        const span = document.createElement('span');
        span.innerHTML = "\u00d7";
        li.appendChild(span);
    }
    input.value = '';
}

list.addEventListener('click', function(e) {
    if (e.target.tagName === 'LI') {
        e.target.classList.toggle('checked');
    }
    else if (e.target.tagName === 'SPAN') {
        e.target.parentElement.remove();
    }
    
}, false);

// function saveData() {
//     const data = list.innerHTML;
//     localStorage.setItem('data', data);
// }
// function showTask() {
//     list.innerHTML = localStorage.getItem('data');
// }
// showTask();
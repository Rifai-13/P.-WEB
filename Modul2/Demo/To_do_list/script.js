const input = document.getElementById('input');
const list = document.getElementById('list');



// Fungsi untuk menyimpan task ke LocalStorage
function saveTasks() {
    const tasks = [];
    document.querySelectorAll('li').forEach((li) => {
        tasks.push({
            text: li.firstChild.textContent,
            checked: li.classList.contains('checked')
        });
    });
    localStorage.setItem('tasks', JSON.stringify(tasks)); // Simpan task sebagai JSON
}

// Fungsi untuk memuat task dari LocalStorage
function loadTasks() {
    const tasks = JSON.parse(localStorage.getItem('tasks'));
    if (tasks) {
        tasks.forEach(task => {
            const li = document.createElement('li');
            li.innerHTML = task.text;
            if (task.checked) {
                li.classList.add('checked');
            }
            list.appendChild(li);

            const span = document.createElement('span');
            span.innerHTML = "\u00d7";
            li.appendChild(span);

            const spanedit = document.createElement('span');
            spanedit.classList.add('edit');
            spanedit.innerHTML = "\u270e"; // Simbol pena untuk edit
            li.appendChild(spanedit);

            // Fungsi untuk edit task
            spanedit.onclick = function() {
                const currentext = li.firstChild.textContent;
                const newText = prompt('Edit Task', currentext);
                if (newText !== null && newText.trim() !== '') {
                    li.firstChild.textContent = newText;
                    saveTasks(); // Simpan perubahan ke LocalStorage
                }
            };
        });
    }
}

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

        const spanedit = document.createElement('span');
        spanedit.classList.add('edit');
        spanedit.innerHTML = "\u270e";
        li.appendChild(spanedit);

        spanedit.onclick = function() {
            const currentext = li.firstChild.textContent;
            const newText = prompt('Edit Task', currentext);
            if (newText !== null && newText.trim() !== '') {
                li.firstChild.textContent = newText;
                saveTasks();
            }
        };
        saveTasks();
    }
    input.value = '';
}

list.addEventListener('click', function(e) {
    if (e.target.tagName === 'LI') {
        e.target.classList.toggle('checked');
    }
    else if (e.target.tagName === 'SPAN' && e.target.innerHTML === "\u00d7") {
        e.target.parentElement.remove();
        saveTasks();
    }
    
}, false);

loadTasks();
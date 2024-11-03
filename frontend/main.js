// Validation

function validateInput(input) {
    if(!input.value.trim()) {
        alert('Task name cannot be empty');
    } else {
        return false;
    }
    return true;
}

// Retrieves all tasks from the database
async function fetchTasks() {
    const response = await fetch('../backend/fetch_tasks.php');
    const tasks = await response.json();
    const taskList = document.getElementById('taskList');
    taskList.innerHTML = '';

    tasks.forEach(task => {
        const li = document.createElement('li');
        li.classList.add('list-group-item');
        li.innerHTML = `
        ${task.task_name}
        <button onclick = "deleteTask(${task.id})" class="btn btn-danger btn-sm float-end">Delete</button>
        <button onclick = "editTask(${task.id}, '${task.task_name}')" class="btn btn-warning btn-sm'
        ' float-end">Edit</button>
        `;
        taskList.appendChild(li);
    });
}

// Add new Task
async function addTask() {
    const taskInput = document.getElementById('taskName');
    if(!validateInput(taskInput)) return;

    const formData = new FormData();
    formData.append('task_name', taskInput.value);

    await fetch('../backend/add_task.php',{
        method: 'POST',
        body: formData
    });
    taskInput.value = '';
    fetchTasks();
}


// Update task
async function editTask(id, currentName) {
    const newTaskName = prompt("Edit tasks:", currentName);
    if(newTaskName == null || newTaskName.trim() === "") {
        alert("Task name cannot be empty");
        return;
    }

    const formData = new FormData();
    formData.append('id',id);
    formData.append('task_name', newTaskName);

    await fetch('../backend/edit_task.php', {
        method: 'POST',
        body: formData
    });
    fetchTasks();
}

// Delete task
async function deleteTask(id) {
    if(confirm("Are you sure you want to delete this task?")) {
        const formData = new FormData();
        formData.append('id',id);

        await fetch('../backend/delete_task.php', {
            method: 'POST',
            body: formData
        });
        fetchTasks();
    }
}


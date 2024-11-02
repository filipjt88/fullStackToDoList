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
    const taskList = document.createElement('taskList');
    taskList.innerHTML = '';

    tasks.forEach((task) => {
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
    formData.append('taskName', taskInput.value);

    await fetch('../backend/add_task.php',{
        method: 'POST',
        body: formData
    });
    taskInput.value = '';
    fetchTasks();
}

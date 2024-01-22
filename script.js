function addTask() {
    var taskInput = document.getElementById("taskInput");
    var dueDateInput = document.getElementById("dueDate");
    var dueTimeInput = document.getElementById("dueTime");

    if (taskInput.value.trim() !== "") {

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "addTask.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                console.log(xhr.status, xhr.responseText); 
                if (xhr.status == 200) {
                    loadTasks();
                }
            }
        };
        xhr.send(
            "task_name=" + encodeURIComponent(taskInput.value) +
            "&due_date=" + encodeURIComponent(dueDateInput.value) +
            "&due_time=" + encodeURIComponent(dueTimeInput.value)
        );

        taskInput.value = "";
        dueDateInput.value = "";
        dueTimeInput.value = "";
    }
}

function removeTask(button, taskId) {
   
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "removeTask.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                console.log(xhr.status, xhr.responseText); 
                if (xhr.status == 200) {
                    loadTasks();
                }
            }
        };
    };
    xhr.send("id=" + encodeURIComponent(taskId));
}

function loadTasks() {
    
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getTasks.php", true);
    xhr.onreadystatechange = function () {
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                console.log(xhr.status, xhr.responseText);
                if (xhr.status == 200) {
                    document.getElementById("taskList").innerHTML = xhr.responseText;
                }
            }
        };
    };
    xhr.send();
}


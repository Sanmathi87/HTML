<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Task Deletion Confirmation & Feedback</title>
<style>
  * {
    box-sizing: border-box;
  }
  body {
    font-family: 'Segoe UI', Arial, sans-serif;
    min-height: 100vh;
    margin: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }
  .card {
    background: rgba(255, 255, 255, 0.97);
    padding: 35px 40px;
    border-radius: 16px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
    text-align: center;
    max-width: 450px;
    width: 100%;
  }
  h2 {
    color: #2d2d2d;
    margin-bottom: 6px;
  }
  p.subtitle {
    color: #777;
    font-size: 14px;
    margin-top: 0;
    margin-bottom: 20px;
  }
  #addRow {
    display: flex;
    gap: 8px;
    margin-bottom: 20px;
  }
  #addRow input {
    flex: 1;
    padding: 10px 12px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 8px;
    outline: none;
  }
  #addRow input:focus {
    border-color: #764ba2;
  }
  #addRow button {
    background: linear-gradient(135deg, #56ccf2, #2f80ed);
    box-shadow: 0 4px 12px rgba(47, 128, 237, 0.4);
  }
  ul#taskList {
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
    text-align: left;
  }
  ul#taskList li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #f7f8fc;
    padding: 12px 15px;
    border-radius: 8px;
    margin-bottom: 10px;
    border-left: 4px solid #764ba2;
    font-size: 15px;
    color: #333;
  }
  .taskText {
    word-break: break-word;
    margin-right: 10px;
  }
  button {
    padding: 10px 18px;
    font-size: 14px;
    font-weight: 600;
    background: linear-gradient(135deg, #ff5f6d, #ffc371);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(255, 95, 109, 0.4);
    transition: transform 0.15s ease, box-shadow 0.15s ease;
    white-space: nowrap;
  }
  button:hover {
    transform: translateY(-2px);
  }
  button:active {
    transform: translateY(0);
  }
  .deleteBtn {
    padding: 7px 14px;
    font-size: 13px;
  }
  #output {
    font-size: 14px;
    color: #333;
    background: #eef1fb;
    border-left: 4px solid #2f80ed;
    padding: 12px 16px;
    border-radius: 8px;
    text-align: center;
    min-height: 20px;
  }
  .empty {
    color: #999;
    font-style: italic;
    text-align: center;
    padding: 10px;
  }
</style>
</head>
<body>

<div class="card">
  <h2>Task Deletion Confirmation & Feedback</h2>
  <p class="subtitle">Add tasks, then delete them using Alert, Confirm & Prompt</p>

  <div id="addRow">
    <input type="text" id="newTaskInput" placeholder="Enter a new task...">
    <button onclick="addTask()">Add</button>
  </div>

  <ul id="taskList"></ul>

  <div id="output">Status will appear here...</div>
</div>

<script>
  let tasks = [
    "Finish DevOps lab experiment",
    "Complete billing system report",
    "Prepare LCD seminar slides"
  ];

  const taskList = document.getElementById("taskList");
  const output = document.getElementById("output");
  const newTaskInput = document.getElementById("newTaskInput");

  function renderTasks() {
    taskList.innerHTML = "";

    if (tasks.length === 0) {
      taskList.innerHTML = '<li class="empty">No tasks left. Add one above!</li>';
      return;
    }

    tasks.forEach((task, index) => {
      const li = document.createElement("li");
      li.innerHTML = `
        <span class="taskText">${task}</span>
        <button class="deleteBtn" onclick="deleteTask(${index})">Delete</button>
      `;
      taskList.appendChild(li);
    });
  }

  function addTask() {
    const value = newTaskInput.value.trim();
    if (value === "") {
      output.textContent = "Please type a task before adding.";
      return;
    }
    tasks.push(value);
    newTaskInput.value = "";
    output.textContent = `Task added: "${value}"`;
    renderTasks();
  }

  function deleteTask(index) {
    const taskName = tasks[index];

    // 1. ALERT - Inform the user about the action
    alert(`You are about to delete: "${taskName}"`);

    // 2. CONFIRM - Ask if user really wants to delete
    const isConfirmed = confirm(`Are you sure you want to delete "${taskName}"?`);

    if (isConfirmed) {
      // 3. PROMPT - Ask for reason/remark
      const reason = prompt("Please enter a reason/remark for deletion:", "");

      if (reason === null || reason.trim() === "") {
        output.textContent = `Deletion cancelled: No reason provided for "${taskName}".`;
      } else {
        tasks.splice(index, 1);
        output.innerHTML = `Task deleted: "${taskName}"<br>Reason: ${reason}`;
        renderTasks();
      }
    } else {
      output.textContent = `Deletion cancelled for "${taskName}".`;
    }
  }

  // Allow pressing Enter to add a task
  newTaskInput.addEventListener("keypress", function(e) {
    if (e.key === "Enter") addTask();
  });

  renderTasks();
</script>

</body>
</html>
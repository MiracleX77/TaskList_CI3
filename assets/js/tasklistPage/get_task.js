

function getTask(status,user_id){
    console.log(status)
    if(status == "incomplete"){
        $.ajax({
            url: "http://127.0.0.1/tasklist_test/api/task/getInCompleteTasksByUserId",
            method: "GET",
            data: { user_id: user_id
            },
            dataType: "json",
            success: function(data){
                
                returnAllTask(data);
            },
            error: function(err){
                console.log(err.responseJSON.message);
            }
        })}
    else if(status == "done"){
        $.ajax({
            url: "http://127.0.0.1/tasklist_test/api/task/getDoneTasksByUserId",
            method: "GET",
            data: { user_id: user_id
            },
            dataType: "json",
            success: function(data){
                returnAllTask(data);
            },
            error: function(err){
                console.log(err.responseJSON.message);
            }
        })
    }
    else if(status == "due_today"){
        $.ajax({
            url: "http://127.0.0.1/tasklist_test/api/task/getInCompleteTasksByUserId",
            method: "GET",
            data: { user_id: user_id
            },
            dataType: "json",
            success: function(data){
                data['data'] = sortTask(data);
                returnAllTask(data);
            },
            error: function(err){
                console.log(err.responseJSON.message);
            }
        })
    }
    
}
    // sort task by due date in today
function sortTask(data){
    var task_today = []
    for (var i = 0 ;i<data['data'].length;i++){
        var taskData = data['data'][i];
        if (taskIsLate(taskData['due_date']) == "equal"){
            task_today.push(taskData);
        }
    }
    return task_today;
}


function returnAllTask(data){
    // get main element to append task list
    var tasklistContentElement = document.querySelector(".tasklist-content");
    // clear all task list
    tasklistContentElement.innerHTML = "";
    // loop to get all task

    for (var i = 0 ;i<data['data'].length;i++){
        var taskData = data['data'][i];
        var card_task = document.createElement("div");

        if(taskData['status'] == "incomplete"){
            if(taskIsLate(taskData['due_date']) == true){
                card_task.setAttribute("class","card-task late");
            }
            else{
                card_task.setAttribute("class","card-task in-progress");
            }
        }else if (taskData['status'] == 'complete') {
            card_task.setAttribute("class","card-task done");
        }

        var task = document.createElement("div");
        task.setAttribute("class","task");

            var head_task = document.createElement("div");
            head_task.setAttribute("class","head-task");
            head_task.setAttribute("id","clickShowDetail");

                var checkbox = document.createElement("input");
                checkbox.setAttribute("type","checkbox");
                checkbox.setAttribute("class","checkbox");
                checkbox.setAttribute("id","Task1");
                checkbox.setAttribute("value",taskData['id']);

                var test_h2 = document.createElement("h2");
                test_h2.setAttribute("id","task-"+(i+1));

                test_h2.innerHTML = taskData['title'];

            head_task.appendChild(checkbox);
            head_task.appendChild(test_h2);

            var tail_task = document.createElement("div");
            tail_task.setAttribute("class","tail-task");
                var duedate = document.createElement("div");
                duedate.setAttribute("class","duedate");
                    var calendar = document.createElement("i");
                    calendar.setAttribute("class","fa-solid fa-calendar");
                    var p_duedate = document.createElement("p");
                    p_duedate.innerHTML = "Due date: "+taskData['due_date'];
                duedate.appendChild(calendar);
                duedate.appendChild(p_duedate);
                var btn_edit = document.createElement("div");
                btn_edit.setAttribute("class","btn-edit");
                    var pen = document.createElement("i");
                    pen.setAttribute("class","fa-solid fa-pen-to-square");
                    var p_edit = document.createElement("p");
                    p_edit.innerHTML = "edit";
                btn_edit.appendChild(pen);
                btn_edit.appendChild(p_edit);
            tail_task.appendChild(duedate);
            tail_task.appendChild(btn_edit);
        task.appendChild(head_task);
        task.appendChild(tail_task);

        var showdetail = document.createElement("div");
        if(taskData['status'] == "incomplete"){
            if(taskIsLate(taskData['due_date']) == true){
                showdetail.setAttribute("class","showdetail late");
            }
            else{
                showdetail.setAttribute("class","showdetail in-progress");
            }
        }else if (taskData['status'] == 'complete') {
            showdetail.setAttribute("class","showdetail done");
        }
        showdetail.setAttribute("id","detail-"+(i+1));
            var h3 = document.createElement("h3");
            h3.innerHTML = "Description";
            var p = document.createElement("p");
            p.innerHTML = taskData['description'];
        showdetail.appendChild(h3);
        showdetail.appendChild(p);
        showdetail.setAttribute("style","display:none");
        card_task.appendChild(task);
        card_task.appendChild(showdetail);

        tasklistContentElement.appendChild(card_task);

    }

    //add event listener to show detail 
    const numCards = data['data'].length;
    const clickShowDetail = [];
    const showDetail = [];
    let display = [];

    for (let i = 1; i <= numCards; i++) {
        clickShowDetail[i] = document.getElementById(`task-${i}`);
        showDetail[i] = document.getElementById(`detail-${i}`);
        display[i] = 1;

        clickShowDetail[i].addEventListener('click', function(){
            if(display[i] == 1){
                showDetail[i].style.display = "block";
                display[i] = 0;
            }else{
                showDetail[i].style.display = "none";
                display[i] = 1;
            }
        });
}
}
// function to check if task is late
function taskIsLate(date){
    const date1 = new Date(date);
    const date2 = new Date();
    date2.setHours(0,0,0,0);
    if(date1.getTime()<date2.getTime()){
        return true;
    }else if (date1.getTime()==date2.getTime()){
        return "equal"
    }
    else{
        return false;
    }
}   

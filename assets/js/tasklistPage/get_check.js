var valueList = document.getElementsByClassName("valueList");
var text = '<span> you have selected: </span>';
var listTask =[];

var checkboxes = document.querySelectorAll('.checkbox');
console.log(checkboxes);

for(var checkbox of checkboxes) {
    checkbox.addEventListener('click', function() {
        if(this.checked == true) {
            listTask.push(this.value);
            console.log(listTask.join(', '));
        } else {
            //Remove the value from the array
            listTask = listTask.filter(e => e !== this.value);
            console.log(listTask.join(', '));
        }
    })
}

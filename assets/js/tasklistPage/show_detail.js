// const clickShowDetail = document.getElementById('clickShowDetail');
// const showDetail = document.getElementById('showDetail');
// let display = 1;
// clickShowDetail.addEventListener('click', function(){
//     if(display == 1){
//         showDetail.style.display = "block";
//         display = 0;
//     }else{
//         showDetail.style.display = "none";
//         display = 1;
//         console.log(display);
//     }
// })

const numCards = document.querySelector(".tasklist-content").childElementCount;
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


// custom mohamed sebai
let btnDelete = document.getElementById("btn-delete");
let DeleteSection = document.getElementById("deleteAccount");
let cancelDelete = document.getElementById("cancelDelete");


btnDelete.onclick = function(){
    DeleteSection.classList.toggle('deleteAccount');
}

cancelDelete.onclick = function(){
    DeleteSection.classList.toggle('deleteAccount');
}

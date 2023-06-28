const form = document.getElementById("add-book-form");
let formVisible = false;
function toggleForm() {
    if (formVisible) {
        form.style.display = "none";
        formVisible = false;
    } else {
        form.style.display = "block";
        formVisible = true;
    }
}
function confirmDelete() {
    var result = confirm("确定删除吗？");
    return result;
}
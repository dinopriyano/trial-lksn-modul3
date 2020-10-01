if(sessionStorage.getItem('token') === null)
{
    location.href = "login.php";
}

const form = document.getElementById('form');
form.addEventListener('submit',(e) =>
{
    e.preventDefault();
    sessionStorage.removeItem('token');
    sessionStorage.clear();
    window.location.href = "login.php";
});

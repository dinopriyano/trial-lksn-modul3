const form = document.getElementById('form');
const btnReg = document.getElementById('btnRegister');

if(sessionStorage.getItem('token') !== null)
{
    location.href = "index.php";
};

btnReg.onclick= function(e){

    e.preventDefault();
    window.location.href = "register.php";
};

form.addEventListener('submit',(e) => {

    e.preventDefault();

    var username = document.getElementById('txtUsername').value;
    var password = document.getElementById('txtPass').value;
    var uName = username;
    var pass = password;

    let payload = {
        'username': uName,
        'password': pass
    };

    fetch('../login.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'Application/json'
        },
        body: JSON.stringify(payload)
    })
    .then(response => response.json())
    .then(data => {
        var stringify = JSON.parse(JSON.stringify(data));
        var token = stringify[0]['token'];
        console.log(stringify[0]['token']);
        if(token != null && token != "")
        {
            sessionStorage.setItem('token',stringify[0]['token']);
            location.href = "index.php";
        }
        else{
            window.alert(stringify[0]['message']);
        }
    })
    .catch(error => console.error(error));
});
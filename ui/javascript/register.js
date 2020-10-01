const form = document.getElementById('form');
const btnLogin= document.getElementById('btnLogin');

if(sessionStorage.getItem('token') !== null)
{
    location.href = "index.php";
};

btnLogin.onclick= function(e){
    e.preventDefault();
    location.href = "login.php";
};

form.addEventListener('submit', (e)=>{

    e.preventDefault();
    var firstname = document.getElementById("txtFName").value;
    var lastname = document.getElementById("txtLName").value;
    var username = document.getElementById("txtUsername").value;
    var password = document.getElementById("txtPass").value;

    let _data = {
        'firstname':firstname,
        'lastname':lastname,
        'username': username,
        'password': password
    };

    fetch("../register.php",{
        method: 'POST',
        headers : {"Content-Type": "Application/json"},
        body: JSON.stringify(_data)
    })
    .then(response => response.json())
    .then(data => {
        var stringify = JSON.parse(JSON.stringify(data));
        var token = stringify[0]['token'];
        if(token != null && token != "")
        {
            sessionStorage.setItem('token',stringify[0]['token']);
            location.href = "index.php";
        }
        else{
            window.alert(stringify[0]['message']);
        }
    })
    .catch(error => {console.log(error)});

});
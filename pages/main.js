window.alert = function(message, timeout=null) {
    const alert = document.createElement('div');
    const alertButton = document.createElement('button');
    alertButton.innerText = 'OK';
    alert.classList.add('alert');
    alert.setAttribute('style', `
        position: fixed;
        top: 100px;
        left: 50%;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 10px 5px grey;
        display: flex;
        flex-direction: column;
        border: 1px solid #333;
        tranform: translateX(-50%);
        `
    );
    alertButton.setAttribute('style', `
        border: 1px solid #333;
        background: grey;
        border-radius: 5px;
        padding: 5px;
    `);
    alert.innerHTML = `<span style="padding:10px">${message}`;
    alert.appendChild(alertButton);
    alertButton.addEventListener("click", (e) => {
        alert.remove();
    });
    if (timeout != null) {
        setTimeout(() => {
            if(alert) alert.remove();
        }, Number(timeout))
    }
}  


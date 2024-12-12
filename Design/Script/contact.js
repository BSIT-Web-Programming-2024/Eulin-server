window.alert = function (message, timeout=null) {
  const alert = document.createElement ('div');
  const alertButton = document.createElement('button');
  alertButton.innerText = 'OK';
  alert.classList.add('alert');
  alert.setAttribute('style' , `
    position:fixed;
    top: 100px;
    left: 50%
    padding: 20px:
    border-raduis; 10px;
    box-shadow: 0 10px 5px #000000044;
    `);
  alert.innerHTML = `<span>${message}</span>`;
  alert.appendChild(alertButton);
  alertButton.addEventListener('click' , (e)=>{
    alert.remove();
  });
  if(timeout != null){
    setTimeout(()=>{
      alert.remove();
    }, Number(timeout))
  }
  document.body.appendChild(alert);
}
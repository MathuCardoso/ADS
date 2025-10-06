
document.querySelector('#btn').addEventListener('click', function() {
    n1 = parseInt(prompt("Digite um número:"))
    n2 = parseInt(prompt("Digite outro número:"))
    r = n1 + n2 
    
    if(isNaN(r)){
        document.querySelector('#h1').textContent = "Hello World!"
    } else {
        document.querySelector('#h1').textContent = r
    }
})

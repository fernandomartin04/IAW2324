function sumar() {
    let x = parseFloat(document.getElementById("numero1").value);
    let y = parseFloat(document.getElementById("numero2").value);
    return x + y;
}
function restar() {
    let x = parseFloat(document.getElementById("numero1").value);
    let y = parseFloat(document.getElementById("numero2").value);
    return x - y;
}
function multiplicar() {
    let x = parseFloat(document.getElementById("numero1").value);
    let y = parseFloat(document.getElementById("numero2").value);
    return x * y;
}
function dividir() {
    let x = parseFloat(document.getElementById("numero1").value);
    let y = parseFloat(document.getElementById("numero2").value);
    return x / y;
}
function potencia() {
    let x = parseFloat(document.getElementById("numero1").value);
    let y = parseFloat(document.getElementById("numero2").value);
    return Math.pow (x,y);
}
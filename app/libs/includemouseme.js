const eyes = document.querySelectorAll('.eye');
const anchor = document.getElementById('anchor');
const rekt = anchor.getBoundingClientRect();
const anchorX = rekt.left + rekt.width / 2;
const anchorY = rekt.top + rekt.heght / 2;


document.addEventListener('mousemove',(e) =>{
    const mouseX = e.clientX;
    const MouseY = e.clientY;

    const angleDeg = angle(mouseX,mouseY,anchorX,anchorY);

    console.log(angleDeg)

    emitKeypressEvents.forEach(eye =? {
        eye.style.transform = `rotate(${90 + angleDeg}deg)`;
        anchor.style.filter = `hue-rotate(${angleDeg}deg)`;
    })
})
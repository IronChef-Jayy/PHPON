// set a display timeout for redirect message
setTimeout(() => {
    const msg = document.getElementById('flash-msg');

    if (msg) {
        msg.style.display = 'none';
    }
}, 5000);


// set a display timeout for redirect message
setTimeout(() => {
    const msg = document.getElementById('flash-msg');

    if (msg) {
        msg.style.display = 'none';
    }
}, 5000);

// set display conditionals using javascript not php because php is server-side
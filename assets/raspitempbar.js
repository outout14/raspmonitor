// progressbar.js@1.0.0 version is used
// Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

// get value to set the progressbar size
var tempValueBefore = document.getElementById('tempValue').value;
tempValueAfter = tempValueBefore/100

var bar = new ProgressBar.SemiCircle(raspitemp, {
    strokeWidth: 6,
    color: '#D7493F',
    trailColor: '#eee',
    trailWidth: 1,
    easing: 'easeInOut',
    duration: 1400,
    svgStyle: null,
    text: {
        value: '',
        alignToBottom: false
    },
    from: {
        color: '#38CA75'
    },
    to: {
        color: '#FDCB2E'
    },
    // Set default step function for all animate calls
    step: (state, bar) => {
        bar.path.setAttribute('stroke', state.color);
        var value = Math.round(bar.value() * 100);
        if (value === 0) {
            bar.setText('');
        } else {
            bar.setText(value + "°C");
        }

        bar.text.style.color = state.color;
    }
});
bar.text.style.fontSize = '2rem';

bar.animate(tempValueAfter); // Number from 0.0 to 1.0

// Initial zoom level
let currentZoom = 1;

function zoomIn() {
    // Increase the zoom level
    currentZoom += 0.1;
    updateZoom();
}

function zoomOut() {
    // Decrease the zoom level
    currentZoom -= 0.1;
    updateZoom();
}

function updateZoom() {
    // Set the new zoom level on the image
    document.getElementById('mapImage').style.transform = 'scale(' + currentZoom + ')';
}

function move_img(str) {
    var step = 50; // change this to a different step value
    var imageElement = document.getElementById('mapImage');

    if (imageElement) {
        var x = imageElement.offsetTop;
        var y = imageElement.offsetLeft;

        switch (str) {
            case "down":
                x = x + step;
                imageElement.style.top = x + "px";
                break;

            case "up":
                x = x - step;
                imageElement.style.top = x + "px";
                break;

            case "left":
                y = y - step;
                imageElement.style.left = y + "px";
                break;

            case "right":
                y = y + step;
                imageElement.style.left = y + "px";
                break;

            default:
                console.error('Invalid direction');
        }
    } else {
        console.error('Image element not found');
    }
}

document.addEventListener('contextmenu', function (e) {
    e.preventDefault();
});

// Handle file input change and preview
function handleChange() {
    const fileInput = document.querySelector("#input-file");
    const files = fileInput.files;
    if (files.length !== 0) {
        const file = files[0];
        readFile(file);
    }
}

function readFile(file) {
    if (file) {
        const reader = new FileReader();
        reader.onload = function () {
            document.querySelector(".preview-box").innerHTML =
                `<img class="preview-content" src="${reader.result}" />`;
        };
        reader.readAsDataURL(file);
    }
}

// Initialize Uppy uploader
const uppy = new Uppy.Uppy()
    .use(Uppy.Dashboard, {
        inline: true,
        target: "#drag-drop-area"
    })
    .use(Uppy.Tus, {
        endpoint: "https://tusd.tusdemo.net/files/"
    });

uppy.on("complete", (result) => {
    // Handle upload complete event if needed
});
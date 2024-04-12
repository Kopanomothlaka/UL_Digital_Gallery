const fileInput = document.getElementById('image-upload');
const fileNameElement = document.getElementById('file-name');

fileInput.addEventListener('change', function() {
    const selectedFile = fileInput.files[0];
    fileNameElement.textContent = selectedFile.name;
});
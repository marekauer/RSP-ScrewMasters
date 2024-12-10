function showFiles(submissionName, filePaths, fileDates) {
    const files = filePaths.map((filePath, index) => {
        const fileDate = new Date(fileDates[index]);
        return {
            filePath: filePath,
            fileDate: fileDate
        };
    });

    files.sort((a, b) => b.fileDate - a.fileDate);

    document.getElementById('fileModalLabel').innerText = 'Nahrané soubory pro: ' + submissionName;

    const fileLinksElement = document.getElementById('fileLinks');
    fileLinksElement.innerHTML = '';
    const basePath = '/uploads/';

    files.forEach(function(file) {
        const listItem = document.createElement('li');
        listItem.classList.add('mb-2');

        const fileLink = document.createElement('a');
        fileLink.href = basePath + file.filePath;
        fileLink.target = '_blank';
        fileLink.classList.add('btn', 'btn-link'); 
        fileLink.innerText = file.filePath.split('_')[0];

        const formattedDate = file.fileDate.toLocaleString('cs-CZ', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });

        const fileDateElement = document.createElement('span');
        fileDateElement.classList.add('ms-2', 'text-muted');
        fileDateElement.innerText = 'Nahráno: ' + formattedDate;

        listItem.appendChild(fileLink);
        listItem.appendChild(fileDateElement);
        fileLinksElement.appendChild(listItem);
    });

    const modal = new bootstrap.Modal(document.getElementById('fileModal'));
    modal.show();

    document.getElementById('fileModal').addEventListener('hidden.bs.modal', function () {
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.remove();
        }
    });
}
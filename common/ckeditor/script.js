const characterLimit = 3005;
const characterAllowed = 3000;

// Maintain references to CKEditor instances
const editors = {};

function characterLimitNotification() {
    Swal.fire({
        icon: 'info',
        title: 'Oops...',
        text: 'You have reached the maximum character limit allowed.',
        timer: 3000,
        showConfirmButton: true
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('Alert was closed by timer');
        }
    });
}

function initializeCKEditor(editorElement, data, placeholder) {
    return ClassicEditor
        .create(editorElement, {
            extraPlugins: [MyCustomUploadAdapterPlugin],
            placeholder: placeholder
        })
        .then(editor => {
            editorElement.classList.add('ckeditor-initialized');
            editor.setData(data);
            editor.model.document.on('change', () => {
                handleCharacterLimit(editor);
            });

            // Store reference to the editor instance
            editors[editorElement.id] = editor;

            return editor;
        })
        .catch(handleSampleError);
}

function handleCharacterLimit(editor) {
    const text = editor.getData();
    if (text.length > characterLimit) {
        editor.setData(text.substring(0, characterAllowed));
        characterLimitNotification();
    }
}

function initEditor(id, data, placeholder) {
    const editorElement = document.querySelector(`#${id}`);
    if (!editorElement.classList.contains('ckeditor-initialized')) {
        return initializeCKEditor(editorElement, data, placeholder);
    } else {
        const editorInstance = editors[editorElement.id];
        editorInstance.setData(data);
        return Promise.resolve(editorInstance);
    }
}

function getEditorData(editorElementId) {
    const editorElement = document.querySelector(`#${editorElementId}`);
    const editorInstance = editors[editorElement.id];

    if (editorInstance) {
        const data = editorInstance.getData();
        console.log(`Data for editor with ID ${editorElementId}:`, data);
        return data;
    } else {
        console.error(`Editor instance for editor with ID ${editorElementId} not found.`);
        return null;
    }
}

function handleSampleError(error) {
    const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

    const message = [
        'Oops, something went wrong!',
        `Please, report the following error on ${ issueUrl } with the build id "q0zx9wi72l5r-7zpqmbwbirlx" and the error stack trace:`
    ].join('\n');

    console.log(message);
    console.log(error);
}
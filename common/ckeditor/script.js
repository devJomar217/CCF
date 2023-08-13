ClassicEditor
    .create(document.querySelector('.editor'), {
        // Editor configuration.
        extraPlugins: [MyCustomUploadAdapterPlugin],
    })
    .then(editor => {
        window.editor = editor;
    })
    .catch(handleSampleError);

function handleSampleError(error) {
    const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

    const message = [
        'Oops, something went wrong!',
        `Please, report the following error on ${ issueUrl } with the build id "q0zx9wi72l5r-7zpqmbwbirlx" and the error stack trace:`
    ].join('\n');

    console.error(message);
    console.error(error);
}
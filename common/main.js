class MyUploadAdapter {
    constructor(loader) {
        // The file loader instance to use during the upload.
        this.loader = loader;
    }

    // Starts the upload process.
    upload() {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {
                this._initRequest();
                this._initListeners(resolve, reject, file);
                this._sendRequest(file);
            }));
    }

    // Aborts the upload process.
    abort() {
        if (this.xhr) {
            this.xhr.abort();
        }
    }

    // Initializes the XMLHttpRequest object using the URL passed to the constructor.
    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();

        // Note that your request may look different. It is up to you and your editor
        // integration to choose the right communication channel. This example uses
        // a POST request with JSON as a data structure but your configuration
        // could be different.
        xhr.open('POST', '../../common/db.php', true);
        xhr.responseType = 'json';
    }

    // Initializes XMLHttpRequest listeners.
    _initListeners(resolve, reject, file) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${ file.name }.`;

        xhr.addEventListener('error', () => reject(genericErrorText));
        xhr.addEventListener('abort', () => reject());
        xhr.addEventListener('load', () => {
            const response = xhr.response;

            // This example assumes the XHR server's "response" object will come with
            // an "error" which has its own "message" that can be passed to reject()
            // in the upload promise.
            //
            // Your integration may handle upload errors in a different way so make sure
            // it is done properly. The reject() function must be called when the upload fails.
            if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
            }

            // If the upload is successful, resolve the upload promise with an object containing
            // at least the "default" URL, pointing to the image on the server.
            // This URL will be used to display the image in the content. Learn more in the
            // UploadAdapter#upload documentation.
            resolve({
                default: response.url
            });
        });

        // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
        // properties which are used e.g. to display the upload progress bar in the editor
        // user interface.
        if (xhr.upload) {
            xhr.upload.addEventListener('progress', evt => {
                if (evt.lengthComputable) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            });
        }
    }

    // Prepares the data and sends the request.
    _sendRequest(file) {
        // Prepare the form data.
        const data = new FormData();

        data.append('file', file);
        data.append('action', 'upload-forum-image');

        // Important note: This is the right place to implement security mechanisms
        // like authentication and CSRF protection. For instance, you can use
        // XMLHttpRequest.setRequestHeader() to set the request headers containing
        // the CSRF token generated earlier by your application.

        // Send the request.
        this.xhr.send(data);
    }
}

function MyCustomUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        // Configure the URL to the upload script in your back-end here!
        return new MyUploadAdapter(loader);
    };
}

function populateReplyRow(replyID, img, userName, status, date, yearLevel, reply, menu, specialization, studentID) {
    if (yearLevel == null || yearLevel == undefined) {
        yearLevel = "";
    }
    return `<div class="card-row py-2 pl-lg-5 pl-3" id="row-reply-${replyID}">
                <div class="row py-3">
                    <div class="col"> 
                        <div class="row mb-0 pb-0">
                            <div class="col-lg-1 col-12 mb-lg-0 mb-2">
                                <img loading="lazy" class="img-profile rounded-circle" style="width:40px; height: 40px" src="${img}">
                            </div>
                            <div class="col mb-0 pb-0">
                                <div class="row">
                                    <div class="col-lg-3 col-12">
                                        <h6 class="mb-lg-0 pb-lg-0 mb-1"><b class="mb-0 pb-0">${userName}</b></h6>    
                                    </div> 
                                    <div class="col-lg-8 col-11">
                                    </div> 
                                    <div class="col-lg-1 col-1 login-user" style="display: none" id="ellipsis-reply-${replyID}">
                                        <div class="btn-group d-flex flex-row-reverse dropright">
                                            <i class="fa fa-solid fa-ellipsis-vertical pl-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                            <div class="dropdown-menu">
                                                ${menu}
                                            </div>
                                        </div>
                                    </div>                                           
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <small class="text-muted">${specialization}</small>
                                        <small class="text-muted"> · </small>    
                                        <small class="text-muted">${yearLevel}</small>    
                                        <small class="text-muted"> · </small>
                                        <small class="text-muted">${date}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 pt-0 login-user">
                    <div class="col" id="reply-${replyID}">
                        ${reply}
                    </div>
                </div>

                <div class="row d-flex flex-row-reverse align-middle mt-3 pt-0">
                    <div class="">

                    </div>
                </div>
                <hr class="sidebar-divider mt-4">
            </div>`
}

function populateAnswerRow(answerID, img, userName, status, date, yearLevel, answer, replies, ratingID, thumbsUp, thumbsDown, hasUserThumbsUp, hasUserThumbsDown, menu, hasRateButton, specialization, studentID, attachment, markAsCorrect) {
    var thumbsUpSelected = `btn border-primary btn-sm px-4`;
    var thumbsUpSelectedColor = 'text-primary';
    var thumbsDownSelected = `btn border-danger btn-sm px-4`;
    var thumbsDownSelectedColor = 'text-danger';
    if (hasUserThumbsUp) {
        thumbsUpSelected = `btn border-primary btn-primary btn-sm px-4`;
        thumbsUpSelectedColor = 'text-white';
    }

    if (yearLevel == null || yearLevel == undefined) {
        yearLevel = "";
    }

    if (hasUserThumbsDown) {
        thumbsDownSelected = `btn border-danger btn-danger btn-sm px-4`;
        thumbsDownSelectedColor = 'text-white';
    }

    var rateButton = '';
    if (hasRateButton) {
        rateButton = `<button type="button" data-id="${answerID}" data-value="${thumbsUp}" data-ratingid="${ratingID}" data-accountid="${studentID}" data-selected="${hasUserThumbsUp}" id="btn-thumbs-up-${answerID}" class="btn-thumbs-up ${thumbsUpSelected}">
                <i class="fa fa-thumbs-up ${thumbsUpSelectedColor}" id="btn-thumbs-up-icon-${answerID}"></i> 
                <span id="btn-thumbs-up-value-${answerID}">${thumbsUp}</span>
            </button>
            <button type="button" data-id="${answerID}" data-value="${thumbsDown}" data-ratingid="${ratingID}" data-accountid="${studentID}" data-selected="${hasUserThumbsDown}" id="btn-thumbs-down-${answerID}" class="btn-thumbs-down ml-1 ${thumbsDownSelected}">
                <i class="fa fa-thumbs-down ${thumbsDownSelectedColor}" id="btn-thumbs-down-icon-${answerID}"></i> 
                <span id="btn-thumbs-down-value-${answerID}"> ${thumbsDown}</span>
            </button>`;
    }

    return `<div class="card-row card shadow-sm mb-3 py-2 px-3 px-0 mx-0" id="row-answer-${answerID}">
                <div class="row py-3 mx-0">
                    <div class="col">
                        <div class="row mb-0 pb-0 mx-0">
                            <div class="col-lg-1 col-12 mb-lg-0 mb-3">
                                <img loading="lazy" class="img-profile rounded-circle" style="width:60px; height: 60px" src="${img}">
                            </div>
                            <div class="col mb-0 pb-0">
                                <div class="row">
                                    <div class="col-lg-3 col-12 mt-2">
                                        <h6 class="mb-0 pb-0"><b class="mb-0 pb-0">${userName}</b></h6>
                                    </div>
                                    <div class="col-lg-8 col-12"></div>
                                    <div class="col-lg-1 col-12 login-user" style="display: none" id="ellipsis-answer-${answerID}">
                                        <div class="btn-group d-flex flex-row-reverse dropright">
                                            <i class="fa fa-solid fa-ellipsis-vertical pl-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                            <div class="dropdown-menu">
                                                ${menu}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <small class="text-muted">${specialization}</small>
                                        <small class="text-muted"> · </small>
                                        <small class="text-muted">${yearLevel}</small>
                                        <small class="text-muted"> · </small>
                                        <small class="text-muted">${date}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 px-3 pt-0 mx-1">
                    <div class="col-12 container-description" id="answer-${answerID}">
                        ${answer}
                    </div>
                    <div class="col-12 mt-4">
                        ${attachment}
                    </div>
                </div>

                <div class="row mt-3 pt-0 mb-1 mr-lg-0 mr-1">
                    <div class="col-lg-12 d-flex justify-content-end">
                        <div class="login-user col-lg-12 d-flex justify-content-end flex-wrap">
                            ${markAsCorrect}
                            <button type="button" class="btn btn-primary btn-sm px-3 button-reply mx-2 mb-2" id="${answerID}">
                                Comment <i class="fas fa-comment"></i>
                            </button>
                            ${rateButton}
                        </div>
                    </div>
                </div>

                <div class="d-none mb-3 mt-3" id="container-reply-${answerID}">
                    <hr class="sidebar-divider">
                    <div class="row d-flex">
                        <div class="col">
                            <textarea class="form-control " name="" id="textarea-reply-${answerID}" rows="2" placeholder="Enter your comment here..."></textarea>
                        </div>
                    </div>
                    <div class="row d-flex mt-1">
                        <div class="col flex-row-reverse text-right">
                        <button type="button" id="${answerID}" class="button-answer-reply btn btn-primary btn-sm px-3 mt-2">Post <i class="fas fa-reply"></i></button>
                        </div>
                    </div>
                </div>

                <div class="container-answer-replies">
                    ${replies}
                </div>
            </div>
            `;
}

function handleSampleError(error) {
    const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

    const message = [
        'Oops, something went wrong!',
        `Please, report the following error on ${ issueUrl } with the build id "q0zx9wi72l5r-7zpqmbwbirlx" and the error stack trace:`
    ].join('\n');

    console.error(message);
    console.error(error);
}

function populateRankingRow(image, name, specialization, yearLevel, rank, rating) {
    var styleSize = "";
    var styleRank = "";
    if (rank === "1") {
        styleSize = `style="width:75px; height: 75px; border: 5px solid #FFD700;"`;
        styleRank = `style="background-color: #FFD700; margin-left: 10px;"`;
    } else if (rank === "2") {
        styleSize = `style="width:70px; height: 70px; border: 4px solid #C0C0C0;"`;
        styleRank = `style="background-color: #C0C0C0; margin-left: 8px;"`;
    } else if (rank === "3") {
        styleSize = `style="width:65px; height: 65px; border: 3px solid #CD7F32;"`;
        styleRank = `style="background-color: #CD7F32; margin-left: 3px;"`;
    } else {
        styleSize = `style="width:60px; height: 60px;"`;
    }


    return `<div class="row">
                    <div class="col-lg-3 col-md-3 col-12 m-0 p-0 px-sm-2">
                        <div class="pt-2">
                            <div class="row">
                                <div class="profile-header-container">
                                    <div class="profile-header-img">
                                        <img loading="lazy" class="img-profile img-circle rounded-circle" ${styleSize} src="${image}">
                                        <div class="rank-label-container pt-2 text-center">
                                            <span class="label label-default rank-label text-white px-3 py-0" ${styleRank}>#${rank}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3 mt-lg-0">
                        <div class="row mt-2 mb-3">
                            <div class="col-12 mb-1">
                                <b>Username:</b>
                            </div>
                            <div class="col-12">
                                <span>${name}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 mb-1">
                                <b>Major:</b>
                            </div>
                            <div class="col-12">
                                <span>${specialization}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 mb-1">
                                <b>Year Level:</b>
                            </div>
                            <div class="col-12">
                                <span>${yearLevel}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <b>Likes:</b> <span>${rating}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider my-2">`;
}

function populateProfessionalRankingRow(image, name, specialization, rank, rating) {

    var styleSize = "";
    var styleRank = "";
    if (rank === "1") {
        styleSize = `style="width:75px; height: 75px; border: 5px solid #FFD700;"`;
        styleRank = `style="background-color: #FFD700; margin-left: 10px;"`;
    } else if (rank === "2") {
        styleSize = `style="width:70px; height: 70px; border: 4px solid #C0C0C0;"`;
        styleRank = `style="background-color: #C0C0C0; margin-left: 7px;"`;
    } else if (rank === "3") {
        styleSize = `style="width:65px; height: 65px; border: 3px solid #CD7F32;"`;
        styleRank = `style="background-color: #CD7F32; margin-left: 1px;"`;
    } else {
        styleSize = `style="width:60px; height: 60px;"`;
    }

    return `<div class="row">
                    <div class="col-lg-3 col-md-3 col-12 m-0 p-0 px-sm-2">
                        <div class="pt-2">
                            <div class="row">
                                <div class="profile-header-container">
                                    <div class="profile-header-img">
                                        <img loading="lazy" class="img-profile img-circle rounded-circle" ${styleSize} src="${image}">
                                        <div class="rank-label-container pt-2">
                                            <span class="label label-default rank-label text-white px-3 py-0" ${styleRank}>#${rank} <i class="fa-solid fa-trophy"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-3 mt-lg-0">
                        <div class="row mt-2 mb-3">
                            <div class="col-12 mb-1">
                                <b>Username:</b>
                            </div>
                            <div class="col-12">
                                <span>${name}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 mb-1">
                                <b>Job:</b>
                            </div>
                            <div class="col-12">
                                <span>${specialization}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <b>Likes:</b> <span>${rating}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider my-2">`;
}

function populateQuestionRow(questionID, img, userName, status, date, subject, title, description) {
    return `<div class="card-row p-0 p-0 py-lg-2 px-lg-5">
                <div class="row py-3">
                    <div class="col-lg-2 col-md-2 mx-lg-0 col-12 mb-lg-0 mb-3"><img class="img-profile rounded-circle" style="width:60px; height: 60px" src="${img}"></div>
                    <div class="col">
                        <div class="row mb-0 pb-0" >
                            <div class="col mb-0 pb-0">
                                <h6 class="mb-0 pb-0"><b class="mb-0 pb-0">${userName}</b></h6>
                            </div>
                            <div class="col text-right class="mb-0 pb-0"">
                                ${status}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <small class="text-muted">${subject}</small><small class="text-muted"> · </small><small class="text-muted">${date}</small>
                            </div>
                        </div>
                        <div class="row mt-4 mb-0 pb-0">
                            <div class="col">
                                <p class="mb-0 pb-0">
                                <a href="?id=${questionID}#main-forum" id="${questionID}" class="button-select-question stretched-link">
                                    ${title}
                                </a>
                            </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="sidebar-divider my-0">
            `;
}

function populateEmptyRow(message = "No Data Found") {
    return `<div class="row py-3">
                <div class="col-12 text-center"><h5>${message}</h5></div>
            </div>
            <hr class="sidebar-divider">`;
}
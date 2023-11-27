var SYMMETRIC_KEY = "hKGYOgnTVR8bOP0ViW7FFmX0q1x6ag6B";
var DIR_RESOURCE = "./../resource/profile/";

function populateTableData(data) {
    return "<td>" + data + "</td>";
}

function addCookie(key, value) {
    $.cookie(key, value);
}

function removeCookie(key, value) {
    $.removeCookie(key, value);
}

function removeCookieKey(key) {
    $.removeCookie(key);
}

function getCookie(key) {
    $.cookie(key);
}

function encrypt(value) {
    return CryptoJS.AES.encrypt(value, SYMMETRIC_KEY).toString();
}

function decrypt(value) {
    var bytes = CryptoJS.AES.decrypt(value, SYMMETRIC_KEY);
    return bytes.toString(CryptoJS.enc.Utf8);
}

function formatCodeSnippet(codeSnippet) {
    var preElement = document.createElement('pre');
    preElement.textContent = codeSnippet;

    // Apply inline styles
    preElement.style.fontFamily = 'inherit';
    preElement.style.fontSize = 'inherit';
    preElement.style.fontWeight = 'inherit';
    preElement.style.color = 'inherit';
    preElement.style.lineHeight = 'inherit';
    preElement.style.letterSpacing = 'inherit';
    preElement.style.textAlign = 'inherit';
    preElement.style.backgroundColor = 'inherit';
    preElement.style.border = 'inherit';
    preElement.style.padding = 'inherit';
    preElement.style.margin = 'inherit';

    return preElement.outerHTML;
}

function getYearLevel(yearLevel) {
    if (yearLevel == 1) {
        return "First year";
    } else if (yearLevel == 2) {
        return "Second Year";
    } else if (yearLevel == 3) {
        return "Third Year";
    } else if (yearLevel == 4) {
        return "Fourth Year";
    }
}

function getUserProfile() {
    $.ajax({
        url: "../../common/db.php",
        type: "POST",
        data: {
            action: 'retrieve-user-profile'
        },
        cache: false,
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $("#profile-name").html(dataResult.studentInformation.name);
                $("#profile-user-name").html(dataResult.studentInformation.username);
                $("#profile-year-level").html(dataResult.studentInformation.yearLevel);
                $("#profile-specialization").html(dataResult.studentInformation.specialization);
                $("#profile-ranking").html(dataResult.studentInformation.ranking);
            }
        },
        beforeSend: function() {
            // Code to be executed before the request is sent
            console.log('Request is about to be sent');
        },
        error: function(xhr, status, error) {
            // Code to be executed if there is an error
            console.error('Error:', error);
        },
        complete: function() {
            // Code to be executed after the request is complete (success, error, or abort)
            console.log('Request is complete');
        }
    });
}

function getNotificationCount() {
    $.ajax({
        url: "../../common/db.php",
        type: "POST",
        data: {
            action: 'retrieve-notification-count'
        },
        cache: false,
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                if (dataResult.notificationCount != 0) {
                    $('#notification-count').html(dataResult.notificationCount);
                } else {
                    $('#notification-count').html("");
                }
            }
        },
        beforeSend: function() {
            // Code to be executed before the request is sent
            console.log('Request is about to be sent');
        },
        error: function(xhr, status, error) {
            // Code to be executed if there is an error
            console.error('Error:', error);
        },
        complete: function() {
            // Code to be executed after the request is complete (success, error, or abort)
            console.log('Request is complete');
        }
    });
}

function showToast(message, type) {
    var backgroundColor;
    switch (type) {
        case 'info':
            backgroundColor = '#3498db'; // Dodger Blue
            break;
        case 'warning':
            backgroundColor = '#f39c12'; // Orange
            break;
        case 'error':
            backgroundColor = '#e74c3c'; // Light Red
            break;
        case 'success':
            backgroundColor = '#2ecc71'; // Green
            break;
        default:
            backgroundColor = '#00b09b'; // Turquoise Green
    }

    Toastify({
        text: message,
        duration: 3000, // 3 seconds
        close: true,
        gravity: 'top', // 'top' or 'bottom'
        position: 'right', // 'left', 'center', or 'right'
        backgroundColor: backgroundColor,
        stopOnFocus: true,
    }).showToast();
}

// Covert database time to 12 hour format
function formatTime(timeString) {
    const [hourString, minute] = timeString.split(":");
    const hour = +hourString % 24;
    return (hour % 12 || 12) + ":" + minute + (hour < 12 ? " AM" : " PM");
}

function convertTo12HourFormat(dbDateTime) {
    // Parse the input date-time string
    var dateTime = new Date(dbDateTime);

    // Get the current time
    var now = new Date();

    // Calculate the time difference in milliseconds
    var timeDifference = now - dateTime;

    // Calculate the difference in seconds, minutes, hours, and days
    var secondsDifference = Math.floor(timeDifference / 1000);
    var minutesDifference = Math.floor(timeDifference / (1000 * 60));
    var hoursDifference = Math.floor(timeDifference / (1000 * 60 * 60));
    var daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

    // Extract date, hours, and minutes
    var date = dateTime.toISOString().split('T')[0];
    var hours = dateTime.getHours();
    var minutes = dateTime.getMinutes();

    // Determine AM or PM
    var period = (hours >= 12) ? "PM" : "AM";

    // Convert hours to 12-hour format
    hours = (hours % 12 === 0) ? 12 : hours % 12;

    // Format the time in 12-hour format without seconds
    var time12 = hours + ":" + (minutes < 10 ? '0' : '') + minutes + " " + period;

    // Format the output based on the time difference
    if (secondsDifference < 60) {
        // Less than a minute ago
        return "Just now";
    } else if (minutesDifference < 60) {
        // Less than an hour ago
        return minutesDifference + " minute" + (minutesDifference === 1 ? " ago" : "s ago");
    } else if (hoursDifference < 24) {
        // Less than a day ago
        return hoursDifference + " hour" + (hoursDifference === 1 ? " ago" : "s ago");
    } else if (daysDifference < 30) {
        // Less than a month ago
        return daysDifference + " day" + (daysDifference === 1 ? " ago" : "s ago");
    } else {
        // More than a month ago, return the original date-time
        return date + " " + time12;
    }
}

function swalErrorNotification() {
    Swal.fire({
        icon: 'error',
        title: 'Oppss...',
        text: 'Unable to post the question, please try again later.',
        timer: 3000, // Time in milliseconds (e.g., 3000 = 3 seconds)
        showConfirmButton: true // Hides the "OK" button
    }).then((result) => {
        // You can add additional logic here if needed
        if (result.dismiss === Swal.DismissReason.timer) {
            // The alert was closed by the timer
            console.log('Alert was closed by timer');
        }
        // You can add more logic based on user interaction if needed
    });
}

function swalSuccessNotification(message) {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: message,
        timer: 3000, // Time in milliseconds (e.g., 3000 = 3 seconds)
        showConfirmButton: true // Hides the "OK" button
    }).then((result) => {
        // You can add additional logic here if needed
        if (result.dismiss === Swal.DismissReason.timer) {
            // The alert was closed by the timer
            console.log('Alert was closed by timer');
        }
        // You can add more logic based on user interaction if needed
    });
}

function swalInfoNotification(title, message) {
    Swal.fire({
        icon: 'success',
        title: title,
        text: message,
        timer: 3000, // Time in milliseconds (e.g., 3000 = 3 seconds)
        showConfirmButton: true // Hides the "OK" button
    }).then((result) => {
        // You can add additional logic here if needed
        if (result.dismiss === Swal.DismissReason.timer) {
            // The alert was closed by the timer
            console.log('Alert was closed by timer');
        }
        // You can add more logic based on user interaction if needed
    });
}

function validFileSize(file) {
    var maxSize = 20 * 1024 * 1024; // 20 MB in bytes
    if (file) {
        if (file.size > maxSize) {
            Swal.fire({
                icon: 'error',
                title: 'File Size Limit Exceeded',
                text: 'Please upload a file with a maximum size of 20 MB.',
            });
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}
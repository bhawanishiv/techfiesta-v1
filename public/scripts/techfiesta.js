ssl = "http://";
index = ssl + "www.techfiesta.org/";
url = index;
events = index + "events/";
account = index + "account/";
dashboard = index + "dashboard/";
hospitality = index + "hospitality/";
support = index + "support/";
about = index + "about/";
library = index + "library/";


//Facebook Sharer
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1&appId=271865470224501&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//Facebook login

window.fbAsyncInit = function () {
    FB.init({
        appId: '{271865470224501}',
        cookie: true,
        xfbml: true,
        version: '{api-version}'
    });
    FB.AppEvents.logPageView();
};
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().

    /*
     * Reponse
     {
     status: 'connected',
     authResponse: {
     accessToken: '...',
     expiresIn:'...',
     signedRequest:'...',
     userID:'...'
     }
     }    
     */

    if (response.status === 'connected') {
        // Logged into your app and Facebook.

    } else {
        // The person is not logged into your app or we are unable to tell.
        document.getElementById('status').innerHTML = 'Please log ' +
                'into this app.';
    }
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });
}

function fbLogin() {
    FB.api('/me', function (response) {
        $.ajax({
            url: account + 'postCreateAccount',
            type: 'POST',
            data: {lang: lang},
            success: function (data) {
                window.location = window.location.href;
            },
            error: function (data) {
                window.location = window.location.href;
            }

        });
    });
}


$(document).ready(function () {

    $('#file-input').click(function () {
        $('#input-file-hidden').click();
    });
    $('.fixed-action-btn').floatingActionButton();
    $('.modal').modal();
    $('.timepicker').timepicker();
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('#textarea1').val('New Text');
    M.textareaAutoResize($('.materialize-textarea'));
    $('select').formSelect();
    $('.datepicker').datepicker();
    $('.tabs').tabs();
    $('.collapsible').collapsible();
    $('.parallax').parallax();
    $('.carousel').carousel();
    $('.scrollspy').scrollSpy();
    $('.tooltipped').tooltip();
    $('.carousel.carousel-slider').carousel({
        fullWidth: true, indicators: true
    });
});

//
//
//particlesJS.load('particles-js', 'public/particles.json', function () {
//    console.log('callback - particles.js config loaded');
//});
function request(target, body, callback = {}, fallbackCallback = e => alert(e.issueMessage)) {
    const request = new XMLHttpRequest();
    request.open("POST", `${target}`, true);
    request.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
    request.responseType = "json";
    request.onreadystatechange = () => {
        if (request.readyState === XMLHttpRequest.DONE) {
            if (request.status === 200) callback(request.response);
            else if (request.status === 403) alert("Нет прав доступа!");
            else if (request.status === 204) {
            } else fallbackCallback(request.response);
        }
    };
    request.send(JSON.stringify(body));
}


function saleCourse() {

    let link = new URL(location.href);
    let split_link = link.href.split('=');
    let xhr = new XMLHttpRequest();
    let json = JSON.stringify({
        id_courses: split_link[1]
    });
    xhr.open("POST", '/doslab/application/action/saleCourse.php', true);
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.send(json);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let result = JSON.parse(xhr.responseText);
            alert(result);
        }
    };
}

function getUser() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", '/doslab/application/action/getUser.php', true);
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let result = JSON.parse(xhr.responseText);
            document.querySelector('.user-name').innerText = result['name'];
        }
    };

}


function getCourseInfo() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'http://gladdos.studio/doslab/application/action/getCourseInfo.php', true);
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let result = JSON.parse(xhr.responseText);
            console.log((result[0]['id_courses']));
            for (let i = 0; i < result.length; i++) {
                document.querySelector('.user-info').insertAdjacentHTML("beforeend", "<div class='info-course'><div class='courses-info-title'><a>" + result[i]['title'] + "</div><div class='courses-info-date'>" + result[i]['date_courses'] + "</div><div class='courseUnsale'><a style='cursor: pointer;margin-top: 5px' onclick='UnsaleCourse(" + result[i]['id_courses'] + ")'>Отписаться</a></div></div>");


            }
        }
    };

}

function SignUp(form) {
    request('http://gladdos.studio/doslab/application/action/signUp.php', {
            mail: form.mail.value,
            password: form.password.value,
            name: form.name.value
        }, (response) => {
            window.location.href = '/doslab/logIn';

        }, (response) => {
            alert(response);
        }
    );

}

function LogIn(form) {
    request('http://gladdos.studio/doslab/application/action/logIn.php', {
            ['mail']: form.mail_confirm.value,
            ['password']: form.password_confirm.value
        }, (response) => {
            window.location.href = '/doslab/lk';
        }, (response) => {
            alert(response);
        }
    );

}

function LogOut() {
    request('http://gladdos.studio/doslab/application/action/logOut.php', {}, (response) => {
            //window.location.href = '/doslab/';
        },
        e => {
            console.log(e);
        }
    );
}

function addCourses(form) {
    request('http://gladdos.studio/doslab/application/action/addCourses.php', {
            ['title']: form.title.value,
            ['description']: form.description.value,
            ['full_description']: form.full_description.value,
            ['date_courses']: form.date_courses.value,
            ['price']: form.price.value
        }, (response) => {
            location.reload();
        }, (response) => {
            alert(response);
        }
    );
}
function UnsaleCourse(id_courses) {
    let xhr = new XMLHttpRequest();
    let json = JSON.stringify({
        id_courses: id_courses
    });
    xhr.open("POST", 'http://gladdos.studio/doslab/application/action/unsaleCourse.php', true);
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.send(json);
    location.reload();
}

function deleteCourse(id_courses) {
    let xhr = new XMLHttpRequest();
    let json = JSON.stringify({
        id_courses: id_courses
    });
    xhr.open("POST", 'http://gladdos.studio/doslab/application/action/deleteCourse.php', true);
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.send(json);
    location.reload();
}

function deleteCoursesAdmin() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", 'http://gladdos.studio/doslab/application/action/getCourses.php', true);
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let result = JSON.parse(xhr.responseText);
            for (let i = 0; i < result.length; i++) {
                document.querySelector('.courses-admin').insertAdjacentHTML("beforeend", "<div class='admin-panel'><div class='title-admin'><a href='/doslab/course?id_courses=" + result[i]['id_courses'] + "'>" + result[i]['title'] + "</a></div><div class='deleteBtn' ><button onclick='deleteCourse(" + result[i]['id_courses'] + ")'>Удалить</button></div></div>");
            }
        }
    };
}

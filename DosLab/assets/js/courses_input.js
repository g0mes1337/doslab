
function courses_input() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", '/doslab/application/action/getCourses.php', true);
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let result = JSON.parse(xhr.responseText);
            for (let i = 0; i < result.length; i++) {
                document.querySelector('.courses').insertAdjacentHTML("beforeend", "<div class='course-input'><div class='course-title'><a href='/doslab/course?id_courses=" + result[i]['id_courses'] + "'>" + result[i]['title'] + "</a></div><div class='course-description'>" + result[i]['description']  + "</div><div class='course-date'>" + result[i]['date_courses']  + "</div></div>");
            }
        }
    };
}

function courses_input_main() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", '/doslab/application/action/getCourses_main.php', true);
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.send();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let result = JSON.parse(xhr.responseText);
            for (let i = 0; i < result.length; i++) {
                document.querySelector('.courses-3-section-text').insertAdjacentHTML("beforeend", "<div class='course-new-out'><div class='title-main'><a href='/doslab/course?id_courses=" + result[i]['id_courses'] + "'>" + result[i]['title'] + "</div><div class='description-main'>" + result[i]['description']  + "</div></div>");


            }
        }
    };
}
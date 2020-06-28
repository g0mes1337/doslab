function course_input() {
    let link = new URL(location.href);
    let split_link = link.href.split('=');
    let xhr = new XMLHttpRequest();
    let json = JSON.stringify({
        id_courses: split_link[1],
    });
    xhr.open("POST", '/doslab/application/action/getCourse.php', true);
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.send(json);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            let result = JSON.parse(xhr.responseText);
                // for (let i = 0; i < result.length; i++) {
                //document.querySelector('.course').insertAdjacentHTML("beforeend", "<div class='good'><div class='title'><a "  + result[i]['title'] + "</a></div><div class='description'>" + result[i]['description'] + "<div class='full_description '></div> "+ result[i]['full_description'] + "</div><div class='date_courses'>" + result[i]['date_courses'] + "</div><div class='price'>" + result[i]['price'] + "</div></div>");
                document.querySelector('.title').innerText = result['title'];
                document.querySelector('.description').innerText = result['description'];
                document.querySelector('.full_description').innerText = result['full_description'];
                document.querySelector('.date_courses').innerText = result['date_courses'];
                document.querySelector('.price').innerText = result['price'];
           // }
        }
    };
}